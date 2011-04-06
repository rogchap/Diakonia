<?php

namespace RJC\DiakoniaBundle\Controller;

class DashboardController extends BaseController {
    
    public function indexAction() {
        
        return $this->render('RJCDiakoniaBundle:Dashboard:index.html.twig');
    }

    public function calendarAction() {

        return $this->render('RJCDiakoniaBundle:Dashboard:index.html.twig');
    }


}
