<?php

namespace App\Controller;

use App\Entity\Actor;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * ActorController.
 * @Route("/api",name="api_")
 */
class ActorController extends AbstractFOSRestController
{
    /**
     * Lists all Movies.
     * @Rest\Get("/actors")
     *
     * @return Response
     */
    public function getActorsAction()
    {
        $repository = $this->getDoctrine()->getRepository(Actor::class);
        $actors = $repository->findAll();
        return $this->handleView($this->view($actors));
    }

    /**
     * @Rest\Get("/actor/{id}")
     *
     * @param $id
     * @return Response
     */
    public function getActorByIdAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Actor::class);
        $actor = $repository->find($id);
        return$this->handleView($this->view($actor));
    }
}