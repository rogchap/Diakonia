<?php

namespace RJC\DiakoniaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller {
    
    public function indexAction() {
    
        return $this->render('RJCDiakonia:Dashboard:index.html.twig');
    }

    public function calendarAction() {

        return $this->render('RJCDiakonia:Dashboard:index.html.twig');
    }


}
