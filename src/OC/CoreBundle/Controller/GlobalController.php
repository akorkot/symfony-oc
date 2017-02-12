<?php


namespace OC\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class GlobalController extends Controller
{

    /**
     * Retourne le rendu html temporaire de notre home page pour l'activité OC
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        // Ici, on récupérera la liste des annonces, puis on la passera au template
        // Notre liste d'annonce sera en dur juste pour le teste
        $listAdverts = array(
            array(
                'title'   => 'Recherche développpeur Symfony2',
                'id'      => 1,
                'author'  => 'Alexandre',
                'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
                'date'    => new \Datetime()),
            array(
                'title'   => 'Mission de webmaster',
                'id'      => 2,
                'author'  => 'Hugo',
                'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
                'date'    => new \Datetime()),
            array(
                'title'   => 'Offre de stage webdesigner',
                'id'      => 3,
                'author'  => 'Mathieu',
                'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
                'date'    => new \Datetime())
        );

        return $this->render('OCCoreBundle:Global:index.html.twig', array(
            'listAdverts' => $listAdverts
        ));
    }

    /**
     * Afficher un message de notice et rediriger l'internaute à la page d'accueil global
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function contactAction(){
        $session = new Session();

        $session->getFlashBag()
                ->add("notice", "Message flash : La page de contact n'est pas encore disponible, merci de revenir plutard");

        $url = $this->generateUrl('oc_core_homepage');

        return $this->redirect($url);
    }

}