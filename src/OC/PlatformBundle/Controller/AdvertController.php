<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdvertController extends Controller
{

	/**
	 * @return Response
	 * @throws \Twig_Error
	 */
    public function indexAction()
    {

        $content = $this
			->get('templating')
			->render('OCPlatformBundle:Advert:index.html.twig', array(
				"name" => "Korkot"
			)
		);
		return new Response($content);
    }

	/**
	 * @param $id
	 * @return Response
	 */
	public function viewAction($id)
	{
        $url = $this->generateUrl(
            'oc_platform_view',
            array('id' => $id),
            true
        );

        return new Response("L'URL de l'annonce d'id 5 est : ".$url);
	}

    /**
     * @param $id
     * @return Response
     */
    public function viewSlugAction($slug, $year, $format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '".$slug."', créée en ".$year." et au format ".$format."."
        );
    }
}