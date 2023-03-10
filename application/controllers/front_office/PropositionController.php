<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "SecureController.php";
class PropositionController extends SecureController {

    public function __construct() {
        parent::__construct();
        $this->load->model("objectUser");
    }
    
    public function index() {
        $objUser = new ObjectUser();
        $categ = new Categories();

        $data["listProposition"] = $objUser->getListObjectProposition($this->session->idPers);
        $data["listPropositionToMe"] = $objUser->getListObjectProposeToMe($this->session->idPers);
        
        $data["listCateg"] = $categ->getListCategories();
        $data["active"] = "proposition";

        $this->load->view("front_office/header", $data);
        $this->load->view("front_office/proposition", $data);
        $this->load->view("footer");
    }
    
}