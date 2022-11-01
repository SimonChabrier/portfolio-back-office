<?php

namespace App\EventListener;

use App\Entity\Project;
use App\Repository\ProjectRepository;
use Liip\ImagineBundle\Service\FilterService;

class PictureListener 
{

    /**
     * Paramètre déclaré => services.yaml
     * @var string
     */
    private $uploadPath;

    /**
     * Variable globale déclarée dans services.yaml 
     * contenant le chemin vers le path local $cachePath => media/cache/thumb/assets/upload/pictures/
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
     * services.yaml
     * apelle cette méthode sur les evenements Doctrine sur la class Project
     * @param Project $picture
     * @return void
     */
    public function cachePictureFileOnUpload(Project $picture)
    {   

        // On traite la mise en cache
        if($picture->getPicture() !== null) {
            $this->liipFilterService->getUrlOfFilteredImage($this->uploadPath . $picture->getPicture(), 'thumb');
        } 
        // je reconstruit l'url + le nom du fichier à traiter et je lui passe mon filtre liip
    }

    public function clearAllOrphanPictures()
    {
        // On récupère tous les noms de fichiers des images de la BDD
        $projects = $this->pr->findAll();
        $pictures = [];
        foreach($projects as $project) {
            $pictures[] = $project->getPicture();
        }

        // On récupère tous les noms de fichiers des images du répertoire upload
        $files = scandir($this->uploadPath);
        
        $files = array_diff($files, ['.', '..', '.DS_Store', '.gitkeep']);
        //dd($files);
        // On supprime les fichiers qui ne sont pas dans la BDD
        foreach($files as $file) {
            if(!in_array($file, $pictures)) {
                unlink($this->cachePath . $file);
                unlink($this->cachePath . $file . '.webp');
            }
        }

    }   
}