<?php

class tour
{
    private $id;
    private $place;
    private $tdesc;
    private $image;

    public function __construct($id, $place, $tdesc, $image)
    {
        $this->id = $id;
        $this->place = $place;
        $this->tdesc = $tdesc;
        $this->image = $image;
    }
    public function getid()
    {
        return $this->id;
    }
    public function setid($id)
    {
        $this->id = $id;
    }
    public function getplace()
    {
        return $this->place;
    }
    public function setplace($place)
    {
        $this->place = $place;
    }
    public function gettdesc()
    {
        return $this->tdesc;
    }
    public function settdesc($tdesc)
    {
        $this->tdesc = $tdesc;
    }
    public function getimage()
    {
        return $this->image;
    }
    public function setimage($image)
    {
        $this->image = $image;
    }
}
