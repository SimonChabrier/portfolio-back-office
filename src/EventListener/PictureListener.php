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
        //? 1 path Upload source
        $media = scandir($this->uploadPath); 
        $media = array_diff($media, ['.', '..', '.DS_Store', '.gitkeep']); 

        //? 2 path Cache
        $cachedFiles = scandir($this->cachePath);
        $cachedFiles = array_diff($cachedFiles, ['.', '..']);

        //? 3 Comparaison
        $result = array_diff($cachedFiles, $media);

        //? 4 Delete files in cache
        foreach ($result as $file) {
            unlink($this->cachePath . $file);
        }
    }


}