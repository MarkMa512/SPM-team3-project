<?php

class Session{
    //I make class into session

    private $className;
    private $classID;
    private $sections = [];
    public function __construct($className, $classID) {
        $this->className = $className;
        $this->classID = $classID;
        $this->sections = [];
    }

    public function createSection($sectionName, $sectionID) {
        $this->sessions[] = new Section($sectionName, $sectionID);
    }


}

?>