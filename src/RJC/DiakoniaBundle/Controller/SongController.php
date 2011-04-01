<?php

namespace RJC\DiakoniaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RJC\DiakoniaBundle\Document\Song;
use \RJC\DiakoniaBundle\Form\SongForm;

class SongController extends BaseController {

    public function indexAction() {
        return $this->render('RJCDiakonia:Song:index.html.twig');
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

        return $this->render('RJCDiakonia:Song:edit.html.twig', array('song' => $song, 'form' => $form));
    }

}