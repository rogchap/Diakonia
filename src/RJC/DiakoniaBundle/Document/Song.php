<?php

namespace RJC\DiakoniaBundle\Document;

/** @mongodb:Document(collection="songs") */
class Song {
    
    /** @mongodb:Id(strategy="auto") */
    protected $id;

    /** @mongodb:Field(type="string") */
    protected $title;

    /** @mongodb:Field(type="string") */
    protected $defaultKey;

    /** @mongodb:Field(type="string") */
    protected $chordSheet;
}
