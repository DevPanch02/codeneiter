<?php
  class Asignaturas extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->library("Grocery_CRUD");
      $this->load->model("asignatura");
    }

    public function gestionarAsignaturas(){
      $crudAsignaturas=new Grocery_CRUD();
      $crudAsignaturas->set_table('asignatura');//mysql
      $crudAsignaturas->set_language('spanish');
      $crudAsignaturas->display_as('fk_id_prof','Profesor');
      $crudAsignaturas->set_relation('fk_id_prof','profesor','{apellido_prof} {nombre_prof}');
      $output=$crudAsignaturas->render();
      $this->load->view("gestionarAsignaturas",$output);
    }

    public function obtenerListadoAsignaturas(){
      $listado=$this->asignatura->obtenerTodos();
      if ($listado) {
        echo json_encode(array("estado"=>"ok","datos"=>$listado->result()));
      } else {
        echo json_encode(array("estado"=>"error"));
      }
    }

  }
