<?php

namespace RJC\DiakoniaBundle\Controller;


class PeopleController extends BaseController {

    public function indexAction() {

        return $this->render('RJCDiakonia:People:index.html.twig');
    }
}
