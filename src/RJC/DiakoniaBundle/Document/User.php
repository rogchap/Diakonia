<?php

namespace RJC\DiakoniaBundle\Document;
use FOS\UserBundle\Document\User as UserBase;

/** @mongodb:Document(collection="users") */
class User extends UserBase {
    
    /** @mongodb:Id(strategy="auto") */
    protected $id;

    /** @mongodb:ReferenceMany(targetDocument="FOS\UserBundle\Document\DefaultGroup") */
    protected $groups;
}
