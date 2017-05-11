<?php

session_start();

include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Sap.php';


$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerSOA.php";
$direccionGuardar = "location: ../../Vistas/GuardarSOA.php";
 
if (isset($_POST['hidden_sap'])) {
    
    $accion = $_POST['hidden_sap'];
//    var_dump($accion);
//    exit();
     
    if ($accion == 'save') {

        if (isset($_SESSION['accion_soa']))  {
            if ($_SESSION['accion_soa'] == 'editar') {
              $id = $_POST['idsap'];
              $turno=$_POST['c_turno'];  
              $servidor=trim(strtoupper($_POST['t_servidor']));              
              $ip= trim(strtoupper($_POST['t_ip']));  
              $site=$_POST['c_site'];  
              $herramienta=trim(strtoupper($_POST['t_herramienta']));
              $tipo=trim(strtoupper($_POST['t_tipo']));
              $periodo=$_POST['c_periodo'];
              $hora=$_POST['t_hora'];
              
              
                      
            $backup = new Sap();
            $backup->setId($id);
            $backup->setTurno($turno);
            $backup->setServidor($servidor);
            $backup->setIp($ip);
            $backup->setSite($site);
            $backup->setHerramienta($herramienta);
            $backup->setTipo($tipo);
            $backup->setIdperiodo($periodo);
            $backup->setHora($hora);
            $valor=$backup->actualizar($backup);
            
            header("location: ../../Vistas/MantenerSOA.php");
            } else {
              $turno=$_POST['c_turno'];  
              $servidor=trim(strtoupper($_POST['t_servidor']));              
              $ip= trim(strtoupper($_POST['t_ip']));  
              $site=$_POST['c_site'];  
              $herramienta=trim(strtoupper($_POST['t_herramienta']));
              $tipo=trim(strtoupper($_POST['t_tipo']));
              $periodo=$_POST['c_periodo'];
              $hora=$_POST['t_hora'];
              
            $backup = new Sap();
            $backup->setTurno($turno);
            $backup->setServidor($servidor);
            $backup->setIp($ip);
            $backup->setSite($site);
            $backup->setHerramienta($herramienta);
            $backup->setTipo($tipo);
            $backup->setIdperiodo($periodo);
            $backup->setHora($hora);
            
            $valor=$backup->grabar($backup);
            
            
            header("location: ../../Vistas/MantenerSOA.php");
            }
        } else {
             $turno=$_POST['c_turno'];  
              $servidor=trim(strtoupper($_POST['t_servidor']));              
              $ip= trim(strtoupper($_POST['t_ip']));  
              $site=$_POST['c_site'];  
              $herramienta=trim(strtoupper($_POST['t_herramienta']));
              $tipo=trim(strtoupper($_POST['t_tipo']));
              $periodo=$_POST['c_periodo'];
              $hora=$_POST['t_hora'];
              
            $backup = new Sap();
          
            $backup->setTurno($turno);
            $backup->setServidor($servidor);
            $backup->setIp($ip);
            $backup->setSite($site);
            $backup->setHerramienta($herramienta);
            $backup->setTipo($tipo);
            $backup->setIdperiodo($periodo);
            $backup->setHora($hora);
            
            $valor=$backup->grabar($backup);
            
            
            header("location: ../../Vistas/MantenerSOA.php");
        }
    } 
    
         else if($accion=='buscar')
    {
           
        $servidor=trim(strtoupper($_POST['t_servidor']));    
        $turno = $_POST['c_turno'];
        $estado = $_POST['c_estado'];
        $periodo = $_POST['c_periodo'];
        
        $backup = new Sap();
        $backup->setServidor($servidor);
        $backup->setTurno($turno);
        $backup->setEstado($estado);
        $backup->setIdperiodo($periodo);
        
        
        $arreglo = $backup->buscar($backup);
        
        $_SESSION['arreglo_buscado_sap'] = $arreglo;
        $_SESSION['accion_soa'] = 'busqueda';
        header("location: ../../Vistas/MantenerSOA.php");
    }
         else if($accion=='buscarid')
     {
        $id = $_POST['idsap'];
        $ob_sap = new Sap();
        $ob_sap->setId($id); 
        $ob_sap->buscarPorId($ob_sap);
        $_SESSION['accion_soa']='editar';
        unset($_SESSION['arreglo_buscado_sap']);
        header("location: ../../Vistas/GuardarSOA.php");
     }
     }
     else {
    header("location: ../../Vistas/Registros/MantenerActividad.php");
}

//----------------- funciones ajax -----------

