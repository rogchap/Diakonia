<?php

namespace RJC\DiakoniaBundle\Document;

/** @mongodb:Document(collection="songs") */
class Song {
    
    /** @mongodb:Id(strategy="auto") */
    protected $id;

    /**
     * @validation:NotBlank
     * @mongodb:Field(type="string")
     */
    protected $title;

    /**
     * @validation:NotBlank
     * @mongodb:Field(type="string")
     */
    protected $author;

    /** @mongodb:Field(type="string") */
    protected $defaultKey;

    /** @mongodb:Field(type="string") */
    protected $chordSheet;


    ////////// getters //////////

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getDefaultKey(){
        return $this->defaultKey;
    }

    public function getChordSheet(){
        return $this->chordSheet;
    }

    ////////// setters /////////

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setAUthor($author) {
        $this->author = $author;
    }

    public function setDefaultKey($defaultKey) {
        $this->defaultKey = $defaultKey;
    }

    public function setChordSheet($chordSheet) {
        $this->chordSheet = $chordSheet;
    }
}
