<?php

namespace RJC\DiakoniaBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ODM\MongoDB\DocumentManager;

abstract class BaseController extends Controller {

    private $request, $response, $session, $dm;

    /**
     * @return Symfony\Component\HttpFoundation\Request
     */
    public function getRequest() {
        if(\is_null($this->request)){
            $this->request = $this->get('request');
        }
        return $this->request;
    }

    /**
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function getResponse() {
        if(\is_null($this->response)){
            $this->response = $this->get('response');
        }
        return $this->response;
    }

    /**
     * @return Symfony\Component\HttpFoundation\Session
     */
    public function getSession() {
        if(\is_null($this->session)){
            $this->session = $this->getRequest()->getSession();
        }
        return $this->session;
    }

    /**
     * @return Doctrine\ODM\MongoDB\DocumentManager
     */
    public function getDocumentManager() {
        if(\is_null($this->dm)) {
            $this->dm = $this->get('doctrine.odm.mongodb.document_manager');
        }
        return $this->dm;
    }
}
