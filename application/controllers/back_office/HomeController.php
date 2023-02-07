<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include("SecureController.php");
class HomeController extends SecureController {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->model("categories");
        $categ = new Categories();

        $data["listCateg"] = $categ->getListCategories();

        $this->load->view("back_office/header");
        $this->load->view("back_office/gestion_categ", $data);
        $this->load->view("footer");
    }
    
}