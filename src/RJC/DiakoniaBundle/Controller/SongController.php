<?php

namespace RJC\DiakoniaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SongController extends BaseController {

    public function indexAction() {
        return $this->render('RJCDiakonia:Song:index.html.twig');
    }

}