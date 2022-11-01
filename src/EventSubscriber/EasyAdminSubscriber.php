<?php

namespace App\EventSubscriber;

use App\Entity\Project;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityDeletedEvent;

class EasyAdminSubscriber implements EventSubscriberInterface
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


    public function __construct(string $uploadPath, string $cachePath)
    {
        $this->uploadPath = $uploadPath;
        $this->cachePath = $cachePath;
    }


    // On souscrit à l'événement AfterEntityDeletedEvent de EasyAdmin déclenché après la suppression d'une entité
    public static function getSubscribedEvents()
    {
        return [
            AfterEntityDeletedEvent::class => ['unlinkPictureOnDelete'],
        ];
    }

    public function unlinkPictureOnDelete(AfterEntityDeletedEvent $event)
    {   
        // On récupère une instance de la Classe Project pour accèder à ses méthodes sur $entity
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Project)) 
        {
            return;
        }

        // On supprime l'ensemble des images' à la suppression du projet en BackOffice
        unlink($this->cachePath . $entity->getPicture());
        unlink($this->cachePath . $entity->getPicture() . '.webp');
        unlink($this->uploadPath . $entity->getPicture());
    }

}