<?php

namespace App\EventListener;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Liip\ImagineBundle\Service\FilterService;

class PictureListener 
{

    /**
     * Paramètre déclarée dans services.yaml 
     * @var string
     */
    private $uploadPath;

    /**
     * Paramètre déclarée dans services.yaml 
     * @var string
     */
    private $cachePath;

    /**
     * @var Repository
     */
    private $pr;

    public function __construct(FilterService $liipFilterService, string $uploadPath, string $cachePath, ProjectRepository $pr)
    {
        $this->liipFilterService = $liipFilterService;
        $this->uploadPath = $uploadPath;
        $this->cachePath = $cachePath;
        $this->pr = $pr;
    }

    /**
     * services.yaml apelle cette méthode sur les evenements Doctrine sur la class Project
     * @param Project $picture
     * @return void
     */
    public function cachePictureFile(Project $picture)
    {   
        // Gestion de la mise en cache automatique des images
        if($picture->getPicture() !== null) 
        {   
            // je reconstruit l'url + le nom du fichier à traiter et je lui passe mon filtre liip
            $this->liipFilterService->getUrlOfFilteredImage($this->uploadPath . $picture->getPicture(), 'thumb');
        } 
    }

    /**
     * services.yaml apelle cette méthode sur les evenements Doctrine sur la class Project
     * pour nettoyer les images en cache à la mise à jour du projet en BackOffice
     * @param Project $picture
     * @return void
     */
    public function clearAllOrphanPictures()
    {   
        
        $projects = $this->pr->findAll(); //On récupère tous les projets
        $pictures = []; //On prépare un tableau vide pour y stocker les noms des images

        //? 1
        //  Si $picture est vide c'est que aucun projet n'a d'image on supprime tout le cache et on sort de la méthode
        if(empty($pictures))
        {   
            $cachedFiles = scandir($this->cachePath);
            $cachedFiles = array_diff($cachedFiles, ['.', '..']);

            foreach ($cachedFiles as $file) 
            {
                unlink($this->cachePath . $file);
            }
        }

        //? 2
        //  Sinon on gère la mise à jour du cache à la mise à jour de l'image en backOffice
        //  la supression des images si supression de l'entité est gérée dans le EasyAdminSubscriber
        foreach ($projects as $project) 
        {
            $pictures[] = $project->getPicture();

            if ($project->getPicture() !== null) 
            {
                $files = scandir($this->uploadPath);
                $cachedFiles = scandir($this->cachePath);
                $files = array_diff($files, ['.', '..', '.DS_Store', '.gitkeep']);

                foreach ($files as $file) 
                {
                    if (!in_array($file, $pictures)) 
                    {
                        unlink($this->uploadPath . $file);
                    }
                }

                $cachedFiles = array_diff($cachedFiles, ['.', '..']);

                foreach ($cachedFiles as $file) 
                {
                    if (!in_array($file, $pictures)) 
                    {
                        unlink($this->cachePath . $file);
                    }
                }
            }
        }
    }   
}