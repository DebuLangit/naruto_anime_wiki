<?php

class MerchandiseController {
    private $merchandiseModel;

    public function __construct($merchandiseModel) {
        $this->merchandiseModel = $merchandiseModel;
    }

    // Display all merchandise
    public function index() {
        $merchandise = $this->merchandiseModel->getAllMerchandise();
        include '../View/user/merchandise.php';
    }

    // Display merchandise detail
    public function detail($id) {
        $merchandise = $this->merchandiseModel->getMerchandiseById($id);
        include '../View/user/detail_merchandise.php';
    }
}
?>
