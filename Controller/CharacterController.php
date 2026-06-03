<?php

class CharacterController {
    private $merchandiseModel;

    public function __construct($merchandiseModel) {
        $this->merchandiseModel = $merchandiseModel;
    }

    // Display all characters
    public function index() {
        $characters = $this->merchandiseModel->getAllMerchandise();
        include '../View/user/characters.php';
    }

    // Display Naruto merchandise
    public function naruto() {
        $naruto = $this->merchandiseModel->getMerchandiseByCharacter('Naruto');
        include '../View/user/naruto.php';
    }

    // Display Shippuden merchandise
    public function shippuden() {
        $shippuden = $this->merchandiseModel->getMerchandiseByCharacter('Shippuden');
        include '../View/user/shippuden.php';
    }

    // Display Boruto merchandise
    public function boruto() {
        $boruto = $this->merchandiseModel->getMerchandiseByCharacter('Boruto');
        include '../View/user/boruto.php';
    }

    // Display Anime merchandise
    public function anime() {
        $anime = $this->merchandiseModel->getMerchandiseByCharacter('Anime');
        include '../View/user/anime.php';
    }
}
?>
