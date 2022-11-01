<?php

namespace App\EventListener;

use App\Entity\Project;
use Liip\ImagineBundle\Service\FilterService;

class PictureListener 
{

    /**
     * Paramètre déclaré => services.yaml
     * @var string
     */
    private $uploadPath;

    public function __construct(FilterService $liipFilterService, string $uploadPath)
    {
        $this->liipFilterService = $liipFilterService;
        $this->uploadPath = $uploadPath;
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
}