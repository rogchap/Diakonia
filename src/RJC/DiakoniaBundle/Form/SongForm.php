<?php
namespace RJC\DiakoniaBundle\Form;

use Symfony\Component\Form;

class SongForm extends Form\Form {

    protected function configure(){

        parent::configure();

        $this->add(new Form\TextField('title'));
        $this->add(new Form\TextField('author'));
        $this->add(new Form\TextField('copyright'));
        $this->add(new Form\ChoiceField('defaultKey', array( 'choices' => array(
            'C' => 'C',
            'C#' => 'C#',
            'Db' => 'Db',
            'D' => 'D',
            'D#' => 'D#',
            'Eb' => 'Eb',
            'E' => 'E',
            'F' => 'F',
            'F#' => 'F#',
            'Gb' => 'Gb',
            'G' => 'G',
            'G#' => 'G#',
            'Ab' => 'Ab',
            'A' => 'A',
            'A#' => 'A#',
            'Bb' => 'Bb',
            'B' => 'B'))));
        $this->add(new Form\TextareaField('chordSheet', array('required'=>false)));
    }
}