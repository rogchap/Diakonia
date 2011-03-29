<?php

namespace RJC\DiakoniaBundle\Document;
use FOS\UserBundle\Document\Group as GroupBase;

/** @mongodb:Document(collection="groups") */
class Group extends GroupBase {

    /** @mongodb:Id(strategy="auto") */
    protected $id;
    
}