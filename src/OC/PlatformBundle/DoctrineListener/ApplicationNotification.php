<?php

namespace OC\PlatformBundle\DoctrineListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use OC\PlatformBundle\Entity\Application;


/**
 * Service pour envoyer un email de notification après chaque insertion d'une entité de type candidature (Application
 * Class ApplicationNotification
 * @package OC\PlatformBundle\DoctrineListener
 */
class ApplicationNotification
{
    private $mailer;

    /**
     * ApplicationNotification constructor.
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /*
     * Implémentation des EventListener postPersist
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        // On veut envoyer un email que pour les entités Application
        if (!$entity instanceof Application) {
            return;
        }

        $message = new \Swift_Message(
            'Nouvelle candidature',
            'Vous avez reçu une nouvelle candidature.'
        );

        // Ici bien sûr il faudrait un attribut "email", j'utilise "author" à la place
        $message
            ->addTo($entity->getAdvert()->getAuthor())
            ->addFrom('admin@votresite.com');

        $this->mailer->send($message);
    }
}