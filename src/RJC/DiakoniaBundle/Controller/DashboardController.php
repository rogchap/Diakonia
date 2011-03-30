<?php

namespace RJC\DiakoniaBundle\Controller;

class DashboardController extends BaseController {
    
    public function indexAction() {
        
        return $this->render('RJCDiakonia:Dashboard:index.html.twig');
    }

    public function calendarAction() {

        return $this->render('RJCDiakonia:Dashboard:index.html.twig');
    }


}
