<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("personne");
    }

    public function index() {
        $data["email"] = "judi@gmail.com";
        $data["pwd"] = "judi";
        $this->load->view("login", $data);
    }

//    Admin par defaut
    public function index_2() {
        $data["email"] = "toky@gmail.com";
        $data["pwd"] = "toky";
        $this->load->view("login", $data);
    }

    public function checkUser() {
        $email = $this->input->post("email");
        $pwd = $this->input->post("pwd");

        $personne = new Personne();

        if($personne->check($email, $pwd)) {
            $this->session->set_userdata("idPers", $personne->getIdPers());

            if($personne->getIsAdmin() == 1) {
                redirect(base_url("back_office/homeController/"));
            }
            redirect(base_url("front_office/homeController/"));
        }
        redirect(base_url("loginController/"));
    }

    public function inscription() {
        $this->load->view("inscription");
    }

    public function inscrire() {
        $nom = $this->input->post("nom");
        $email = $this->input->post("email");
        $pwd = $this->input->post("pwd");

        $this->load->model("personne");
        $personne = new Personne();

        $personne->inscrire($nom, $email, $pwd);
        redirect(base_url("loginController/"));
    }

    public function logout() {
        $this->session->unset_userdata("idPers");
        redirect(base_url("loginController/"));
    }
    
}