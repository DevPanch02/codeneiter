<?php
  class Profesores extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->library("Grocery_CRUD");
      $this->load->model("profesor");
    }

    public function gestionarProfesores(){
      $crudProfesores=new Grocery_CRUD();
      $crudProfesores->set_table('profesor');//mysql
      $crudProfesores->set_field_upload('foto_prof','uploads/');
      $crudProfesores->set_language('spanish');
      $output=$crudProfesores->render();
      $this->load->view("gestionarProfesores",$output);
    }

    public function obtenerListadoProfesores(){
      $listado=$this->profesor->obtenerTodos();
      if ($listado) {
        echo json_encode(array("estado"=>"ok","datos"=>$listado->result()));
      } else {
        echo json_encode(array("estado"=>"error"));
      }
    }

  }
