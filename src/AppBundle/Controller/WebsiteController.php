<?php
// src/AppBundle/Controller/WebsiteController

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

Class WebsiteController extends Controller {
	
	/**
	 * @Route("/", name="homepage")
	 */
	public function homepageAction(){
		return $this->render("website/smakweb.html.twig");
	}
}
