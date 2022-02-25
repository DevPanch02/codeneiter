<?php

  class Profesor extends CI_Model{
    function __construct(){
      parent::__construct();
    }

    function obtenerTodos(){
      $query=$this->db->get("profesor");
      if ($query->num_rows()>0) {
        return $query;
      } else {
        return false;
      }
    }

  }
