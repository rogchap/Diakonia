<?php

namespace RJC\DiakoniaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RJC\DiakoniaBundle\Document\Song;
use \RJC\DiakoniaBundle\Form\SongForm;

class SongController extends BaseController {

    public function indexAction() {

        $dm = $this->getDocumentManager();
        $query = $dm->createQueryBuilder('RJCDiakonia:Song')->getQuery();

        $adapter = $this->get('knplabs_paginator.adapter');
        $adapter->setQuery($query);

        $paginator = new \Zend\Paginator\Paginator($adapter);  
        $paginator->setCurrentPageNumber($this->getRequest()->query->get('page', 1));
        $paginator->setItemCountPerPage(20);
        $paginator->setPageRange(5);

        return $this->render('RJCDiakonia:Song:index.html.twig', array('paginator' => $paginator));
    }

    public function createAction() {

        $song = new Song();
        $form = SongForm::create($this->get('form.context'), 'song');

        $form->bind($this->get('request'), $song);

        if ($form->isValid()) {

            $dm = $this->getDocumentManager();
            $dm->persist($song);
            $dm->flush();

            $session = $this->getSession();
            $session->setFlash('message_success', 'Song was succesfully added to the Library');
            return $this->redirect($this->generateUrl('song_edit', array('id' => $song->getId())));
        }

        return $this->render('RJCDiakonia:Song:create.html.twig', array('form' => $form));
    }

    public function editAction($id) {

        $dm = $this->getDocumentManager();
        $song = $dm->find('RJCDiakonia:Song', $id);

        $form = SongForm::create($this->get('form.context'), 'song');

        $form->bind($this->get('request'), $song);

        if ($form->isValid()) {

            $dm = $this->getDocumentManager();
            $dm->persist($song);
            $dm->flush();

            $session = $this->getSession();
            $session->setFlash('message_success', 'Song was succesfully saved');
        }

        return $this->render('RJCDiakonia:Song:edit.html.twig', array('song' => $song, 'form' => $form));
    }

    public function viewAction($id) {

        $dm = $this->getDocumentManager();
        $song = $dm->find('RJCDiakonia:Song', $id);

        return $this->render('RJCDiakonia:Song:view.html.twig', array('song' => $song));
    }

}