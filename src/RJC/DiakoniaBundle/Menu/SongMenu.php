<?php

namespace RJC\DiakoniaBundle\Menu;

use Knplabs\MenuBundle\Menu;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

class SongMenu extends Menu {

    public function __construct(Request $request, Router $router) {
        parent::__construct();

        $this->setCurrentUri($request->getRequestUri());

        $this->addChild('Song Library', $router->generate('song'));
        $this->addChild('Add Song to Library', $router->generate('song_create'));
    }
}