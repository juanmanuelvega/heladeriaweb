<?php
require_once 'app/localidades/modelos/ModeloLocalidades.php';
require_once 'app/localidades/vistas/VistaLocalidades.php';

class ControladorLocalidades
{
    //Definimos las propiedades
    private $modelo;
    private $vista;
    
    public function __construct() {
        $this->vista=new VistaLocalidades();
        $this->modelo=new ModeloLocalidades();
        
        if (isset($_REQUEST["accion"])){
            switch ($_REQUEST["accion"]) {
                case 'listar':
                    $this->listar();
                    break;
                case 'eliminar':
                    $this->eliminar();
                    break;
                default:
                    $this->listar();
                    break;
            }        
        }
        else
            $this->listar();
    }
    
    public function listar(){
        $registrosObtenidos=$this->modelo->obtenerTodos();
        $this->vista->listar($registrosObtenidos);
    }
    
    public function eliminar() {
        $this->modelo->eliminar();
        $this->listar();
    }
}

