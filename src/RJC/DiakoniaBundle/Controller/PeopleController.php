<?php

namespace RJC\DiakoniaBundle\Controller;


class PeopleController extends BaseController {

    public function indexAction() {

        return $this->render('RJCDiakoniaBundle:People:index.html.twig');
    }
}
