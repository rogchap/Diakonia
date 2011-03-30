<?php

namespace RJC\DiakoniaBundle\Menu;

use Knplabs\MenuBundle\Menu;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

class MainMenu extends Menu {
    
    public function __construct(Request $request, Router $router) {
        parent::__construct();

        $this->setCurrentUri($request->getRequestUri());

        $this->addChild('Dashboard', $router->generate('dashboard'));
        $this->addChild('Services', 'http://www.stormid.com');
        $this->addChild('People', $router->generate('people'));
        $this->addChild('Songs', 'http://www.stormid.com');

        $this->setIsMaster(true);
    }
}