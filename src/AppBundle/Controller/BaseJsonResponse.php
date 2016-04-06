<?php

// src/AppBundle/Controller/BaseJsonResponse.php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

Class BaseJsonResponse extends Controller {
	
	private $encoders;
	private $normalizers;
	private $serializer;
	
	public function __construct(){
		$this->encoders = array(new XmlEncoder(), new JsonEncoder());
		$this->normalizers = array(new ObjectNormalizer());
		$this->serializer = new Serializer($this->normalizers, $this->encoders);
	}
	
	protected function writeJson($object){
		$serializedResponse = $this->serializer->serialize($object, 'json');
		$response = new Response($serializedResponse);
		$response->headers->set('Content-Type', 'application/json');
		return $response;
	}
	
	protected function deserialize($data, $object){
		return $this->serializer->deserialize($data,'Ingredient','json');
	}
}

?>