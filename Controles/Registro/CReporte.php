<?php

session_start();

include_once '../../DAO/Conexion.php';
include_once '../../DAO/Registro/Reporte.php';
include_once '../../DAO/Registro/Sap.php';

$direccionInicio = "location:../../Vistas/index.php";
    $direccionMantener = "location: ../../Vistas/ReporteSOA.php";
$direccionGuardar = "location: ../../Vistas/GuardarReporteSOA.php";
 
if (isset($_POST['hidden_reporte'])) {
    
    $accion = $_POST['hidden_reporte'];

      if($accion=='ver_det_reporte')
     {
        $id = $_POST['id_reporte'];
        $ob_reporte = new Reporte();
        $ob_reporte->setId($id); 
        $arreglo = $ob_reporte->buscarReportePorId($ob_reporte);
        
        $_SESSION['arreglo_sapsoa_por_reporte'] = $arreglo;
        $_SESSION['accion_reporte'] = 'detalle_reporte';
        $_SESSION['id_reporte'] = $id ;
        header("location: ../../Vistas/GuardarReporteSOA.php");
     }
     
          else if ($accion == 'OK')
    {
          $id_reporte_soa = $_POST['id_reporte_soa'];
          $id_usuario = $_SESSION['id_username'];
          $id_reporte = $_SESSION['id_reporte'];
         
          $ob_soa = new Reporte();
          $ob_soa->setId($id_reporte_soa);
          $ob_soa->setIdusu($id_usuario);
          $ob_soa->setId2($id_reporte);
          $ob_soa->soa_ok($ob_soa);
          ?>
          <input type="hidden" name="id_reporte_soa" id="id_reporte_soa<?php echo $id_reporte_soa; ?>" value="<?php echo $id_reporte_soa; ?>">
          <button type="button" class="btn btn-success btn-xs" onclick="SapOK('<?php echo $id_reporte_soa; ?>');" title="NP">OK</button>
          <input type="hidden" name="hidden_reporte" id="hidden_reporte<?php echo $id_reporte_soa; ?>" value="NP">
           
          <?php
          
          exit();
       
    }
              else if ($accion == 'NP')
    {
          $id_reporte_soa = $_POST['id_reporte_soa'];
          $id_usuario = $_SESSION['id_username'];
          $id_reporte = $_SESSION['id_reporte'];
         
          $ob_soa = new Reporte();
          $ob_soa->setId($id_reporte_soa);
          $ob_soa->setIdusu($id_usuario);
          $ob_soa->setId2($id_reporte);
          $ob_soa->soa_np($ob_soa);
          ?>
          <input type="hidden" name="id_reporte_soa" id="id_reporte_soa<?php echo $id_reporte_soa; ?>" value="<?php echo $id_reporte_soa; ?>">
          <button type="button" class="btn btn-default btn-xs" onclick="SapOK('<?php echo $id_reporte_soa; ?>');" title="EP"> NP</button>
          <input type="hidden" name="hidden_reporte" id="hidden_reporte<?php echo $id_reporte_soa; ?>" value="EP">
           
          <?php
          
          exit();
       
    }
              else if ($accion == 'EP')
    {
          $id_reporte_soa = $_POST['id_reporte_soa'];
          $id_usuario = $_SESSION['id_username'];
          $id_reporte = $_SESSION['id_reporte'];
         
          $ob_soa = new Reporte();
          $ob_soa->setId($id_reporte_soa);
          $ob_soa->setIdusu($id_usuario);
          $ob_soa->setId2($id_reporte);
          $ob_soa->soa_ep($ob_soa);
          ?>
          <input type="hidden" name="id_reporte_soa" id="id_reporte_soa<?php echo $id_reporte_soa; ?>" value="<?php echo $id_reporte_soa; ?>">
          <button type="button" class="btn btn-warning btn-xs" onclick="SapOK('<?php echo $id_reporte_soa; ?>');" title="FA"> EP</button>
          <input type="hidden" name="hidden_reporte" id="hidden_reporte<?php echo $id_reporte_soa; ?>" value="FA">
           
          <?php
          
          exit();
       
    }
              else if ($accion == 'FA')
    {
          $id_reporte_soa = $_POST['id_reporte_soa'];
          $id_usuario = $_SESSION['id_username'];
          $id_reporte = $_SESSION['id_reporte'];
         
          $ob_soa = new Reporte();
          $ob_soa->setId($id_reporte_soa);
          $ob_soa->setIdusu($id_usuario);
          $ob_soa->setId2($id_reporte);
          $ob_soa->soa_fa($ob_soa);
          ?>
          <input type="hidden" name="id_reporte_soa" id="id_reporte_soa<?php echo $id_reporte_soa; ?>" value="<?php echo $id_reporte_soa; ?>">
          <button type="button" class="btn btn-danger btn-xs" onclick="SapOK('<?php echo $id_reporte_soa; ?>');" title="RE"> F</button>
          <input type="hidden" name="hidden_reporte" id="hidden_reporte<?php echo $id_reporte_soa; ?>" value="RE">
           
          <?php
          
          exit();
       
    }
              else if ($accion == 'RE')
    {
          $id_reporte_soa = $_POST['id_reporte_soa'];
          $id_usuario = $_SESSION['id_username'];
          $id_reporte = $_SESSION['id_reporte'];
         
          $ob_soa = new Reporte();
          $ob_soa->setId($id_reporte_soa);
          $ob_soa->setIdusu($id_usuario);
          $ob_soa->setId2($id_reporte);          
          $ob_soa->soa_re($ob_soa);
          ?>
          <input type="hidden" name="id_reporte_soa" id="id_reporte_soa<?php echo $id_reporte_soa; ?>" value="<?php echo $id_reporte_soa; ?>">
          <button type="button" class="btn btn-info btn-xs" onclick="SapOK('<?php echo $id_reporte_soa; ?>');" title="OK"> R</button>
          <input type="hidden" name="hidden_reporte" id="hidden_reporte<?php echo $id_reporte_soa; ?>" value="OK">
           
          <?php
          
          exit();
       
    }
        else if($accion=='filtrarreporte')
    {
           
        $estado=trim(strtoupper($_POST['c_estado']));    
        $servidor = trim(strtoupper($_POST['t_servidor']));
        $id_reporte = $_SESSION['id_reporte'];
        
        $reporte = new Reporte();
        $reporte->setEstado($estado);
        $reporte->setServidor($servidor);
        $reporte->setId($id_reporte);
        
        
        $arreglo = $reporte->buscar($reporte);
        
        $_SESSION['arreglo_filtro_reporte'] = $arreglo;
        $_SESSION['accion_reporte'] = 'filtro_reporte';
        header("location: ../../Vistas/GuardarReporteSOA.php");
    }
} else {
    header("location: ../../Vistas/Registros/MantenerActividad.php");
}

//----------------- funciones ajax -----------

