<?php

namespace RJC\DiakoniaBundle\Menu;

use Knplabs\MenuBundle\Menu;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

class DashboardMenu extends Menu {

    public function __construct(Request $request, Router $router) {
        parent::__construct();

        $this->setCurrentUri($request->getRequestUri());

        $this->addChild('Overview', $router->generate('dashboard'));
        $this->addChild('Calendar', $router->generate('dashboard_calendar'));
        $this->addChild('Other', 'http://www.stormid.com');
    }
}