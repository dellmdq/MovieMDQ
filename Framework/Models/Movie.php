<?php
namespace Models;
class Movie{
    private $id;
    private $name;
    private $summary;
    private $language;
    private $image;
    private $releaseDate;
    private $genres=array();

    public function setName($name)
    {
        $this->name=$name;
    }

    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate=$releaseDate;
    }
    public function setSummary($summary){

        $this->summary=$summary;

    }

    public function setLanguage($language){
        $this->language=$language;
    }

    public function setImage($image){
        $this->image=$image;
    }

    public function setGenres($genres){
        $this->genres=$genres;
    }

    public function getName(){
        return $this->name;
    }

    public function getReleaseDate(){
        return $this->releaseDate;
    }

    public function getSummary(){
        return $this->summary;
    }

    public function getLanguage(){
        return $this->language;
    }

    public function getImage(){
        return $this->image;
    }

    public function getGenres(){
        return $this->genres;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function getId(){
        return $this->id;
    }

    public function setPlayingNow($playingNow){
        $this->playingNow=$playingNow;
    }

    public function getPlayingNow(){
        return $this->playingNow;
    }
}
?>