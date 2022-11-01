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

    public function updateCache()
    {
        $projects = $this->pr->findAll(); //On récupère tous les projets
        $pictures = []; //On prépare un tableau vide pour y stocker les noms des images

        //? 1
        // chercher les orphelins
        
        $cachedFiles = scandir($this->cachePath);
        $cachedFiles = array_diff($cachedFiles, ['.', '..']);

        foreach ($projects as $project) 
        {
            // On stocke les noms des images dans le tableau $pictures
            $pictures[] = $project->getPicture();
            $pictures[] = $project->getPicture() . '.webp';
            dump($pictures);
            //on supprime les images orphelines qui sont dans result mais pas dans $pictures
            if ($result = array_diff($cachedFiles, $pictures)) {
                dump($result);
                foreach ($result as $file) {
                    unlink($this->cachePath . $file);
                }
            }
        }
    }


}