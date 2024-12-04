<?php
require_once "modelo/producto.php";

class InicioControlador{
    private $modelo;

    public function __CONSTRUCT(){
        $this->modelo=new Producto();
    }
    
    public function inicio(){
    //ADEMAS MENCIONO LOS ESTILOS
    //ESTE ES NAVBAR
    require_once "vista/encabezado.php";
    //LO DE ADENTRO DE LA PAGINA
    require_once "vista/inicio/principal.php";
    //Y LOS JAVASCRIPT DEL PIE DE EL HTML O FINAL DEL PHP SCRIPTS
    require_once "vista/pie.php";
    }
}


?>