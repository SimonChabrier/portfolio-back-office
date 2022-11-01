<?php

// https://symfony.com/doc/5.4/event_dispatcher.html#event-aliases
// https://www.php.net/manual/en/function.unlink.php

namespace App\EventSubscriber;

use App\Entity\Project;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityDeletedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class EasyAdminSubscriber implements EventSubscriberInterface
{   

    /**
     * Variable globale déclarée dans services.yaml 
     * contenant le chemin vers le path local $uploadPath => assets/media/
     * @var string
     */
    private $uploadPath;

     /**
     * Variable globale déclarée dans services.yaml 
     * contenant le chemin vers le path local $cachePath => media/cache/thumb/assets/upload/pictures/
     * @var string
     */
    private $cachePath;


    public function __construct(string $uploadPath, string $cachePath)
    {
        $this->uploadPath = $uploadPath;
        $this->cachePath = $cachePath;
    }

    // On souscrit à l'événement BeforeEntityDeletedEvent de EasyAdmin 
    // et on exécute le méthode unlinkPicture sur chaque événement
    public static function getSubscribedEvents()
    {
        return [
            AfterEntityDeletedEvent::class => ['unlinkPicture'],
            //AfterEntityPersistedEvent::class => ['unlinkPicture'],
        ];
    }

    public function unlinkPicture(AfterEntityDeletedEvent $event)
    //public function unlinkPicture(AfterEntityPersistedEvent $event)
    {   
        // On récupère une instance de la Classe Project pour accèder à ses méthodes sur $entity
        $entity = $event->getEntityInstance();

        // On vérifie qu'il s'agit bien de l'entité Picture.
        if (!($entity instanceof Project)) {
            return;
        }

        // On supprime chaque fichier image du rep $uploadPath et du rep $cachePath
        unlink($this->cachePath . $entity->getPicture());
        unlink($this->cachePath . $entity->getPicture() . '.webp');
        unlink($this->uploadPath . $entity->getPicture());
    }
}