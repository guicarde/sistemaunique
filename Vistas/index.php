<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    
}
include_once '../DAO/Registro/Rct.php';
$rct = new Rct();
$rcts = $rct->listar_en_progreso();

unset($_SESSION['actividad_idactividad']);
unset($_SESSION['actividad_team']);
unset($_SESSION['actividad_horaejecucion']);
unset($_SESSION['actividad_servidor']);
unset($_SESSION['procedimiento_idprocedimiento']);
unset($_SESSION['actividad_descripcion']);
unset($_SESSION['actividad_tws']);
unset($_SESSION['actividad_estado']);
unset($_SESSION['accion_actividad']);
unset($_SESSION['arreglo_buscado_actividad']);
unset($_SESSION['arreglo_turnos']);
unset($_SESSION['arreglo_dias']);
unset($_SESSION['arreglo_cargado_actividad']);
unset($_SESSION['arreglo_buscado_periodo']);
unset($_SESSION['accion_periodo']);
unset($_SESSION['arreglo_cargado_fecha']);
unset($_SESSION['fechas']);
unset($_SESSION['mensaje_periodo']);
unset($_SESSION['periodo_idperiodo']);
unset($_SESSION['periodo_nombre']);
unset($_SESSION['periodo_estado']);

unset($_SESSION['accion_procedimiento']);
unset($_SESSION['procedimiento_idprocedimiento']);
unset($_SESSION['procedimiento_nombre']);
unset($_SESSION['procedimiento_archivo']);
unset($_SESSION['procedimiento_estado']);
unset($_SESSION['arreglo_buscado_procedimiento']);
unset($_SESSION['accion_procedimiento']);

unset($_SESSION['mensaje_usuario']);
unset($_SESSION['arreglo_buscado_rct']);
unset($_SESSION['accion_rct']);

unset($_SESSION['mensaje_rct']);
unset($_SESSION['rct_idrct']);
unset($_SESSION['rct_tiporegistro']);
unset($_SESSION['rct_fechain']);
unset($_SESSION['rct_fechafin']);
unset($_SESSION['rct_asignado']);
unset($_SESSION['rct_ticket']);
unset($_SESSION['rct_servidor']);
unset($_SESSION['rct_detalle']);
unset($_SESSION['rct_observacion']);
unset($_SESSION['rct_archivo']);
unset($_SESSION['rct_fecharegistro']);
unset($_SESSION['rct_estado']);
unset($_SESSION['usu_idusu']);
unset($_SESSION['promedio_col']);
unset($_SESSION['promedio_ecu']);
unset($_SESSION['promedio_gua']);
unset($_SESSION['promedio_mex']);
unset($_SESSION['promedio_per']);
unset($_SESSION['promedio_ven']);
unset($_SESSION['accion_requerimiento']);


unset($_SESSION['arreglo_sapsoa_por_reporte']);
unset($_SESSION['accion_reporte']);
unset($_SESSION['id_reporte']);
unset($_SESSION['arreglo_filtro_reporte']);
unset($_SESSION['accion_reporte']);
unset($_SESSION['Schedule']);
unset($_SESSION['Schedule_cabecera']);
unset($_SESSION['id_schedule']);
unset($_SESSION['accion_requerimiento']);
unset($_SESSION['arreglo_buscado_requerimiento']);
unset($_SESSION['arreglo_buscado_categoria']);

unset($_SESSION['mensaje_requerimiento']);
unset($_SESSION['requerimiento_idrequerimiento']);
unset($_SESSION['requerimiento_fecha_formato']);
unset($_SESSION['requerimiento_turno']);
unset($_SESSION['requerimiento_operador']);
unset($_SESSION['requerimiento_hora_solicitud']);
unset($_SESSION['requerimiento_ticket']);
unset($_SESSION['requerimiento_tipo']);
unset($_SESSION['requerimiento_pais']);
unset($_SESSION['requerimiento_menu']);
unset($_SESSION['requerimiento_detalle']);
unset($_SESSION['requerimiento_archivo']);
unset($_SESSION['requerimiento_fecha_ejecucion']);
unset($_SESSION['requerimiento_hora_inicio']);
unset($_SESSION['requerimiento_inicio_tsm']);
unset($_SESSION['requerimiento_fin_tsm']);
unset($_SESSION['requerimiento_duracion_tsm']);
unset($_SESSION['requerimiento_inicio_dia']);
unset($_SESSION['requerimiento_fin_dia']);
unset($_SESSION['requerimiento_duracion_dia']);
unset($_SESSION['requerimiento_inicio_desa']);
unset($_SESSION['requerimiento_fin_desa']);
unset($_SESSION['requerimiento_duracion_desa']);
unset($_SESSION['requerimiento_inicio_condiciones']);
unset($_SESSION['requerimiento_fin_condiciones']);
unset($_SESSION['requerimiento_duracion_condiciones']);
unset($_SESSION['requerimiento_inicio_comisiones']);
unset($_SESSION['requerimiento_fin_comisiones']);
unset($_SESSION['requerimiento_duracion_comisiones']);
unset($_SESSION['requerimiento_hora_fin']);
unset($_SESSION['requerimiento_hora_duracion']);
unset($_SESSION['requerimiento_team']);
unset($_SESSION['requerimiento_estado']);
unset($_SESSION['requerimiento_incidente']);
unset($_SESSION['requerimiento_tamano']);
unset($_SESSION['requerimiento_cantidad']);

unset($_SESSION['arreglo_buscado_sap']);
unset($_SESSION['accion_soa']);
unset($_SESSION['mensaje_sap']);
unset($_SESSION['soa_idsoa']);
unset($_SESSION['soa_turno']);
unset($_SESSION['soa_servidor']);
unset($_SESSION['soa_ip']);
unset($_SESSION['soa_site']);
unset($_SESSION['soa_herramienta']);
unset($_SESSION['soa_tipo']);
unset($_SESSION['periodo_idperiodo']);
unset($_SESSION['soa_hora']);

unset($_SESSION['accion_schedule']);
unset($_SESSION['arreglo_buscado_actividad_sc']);
unset($_SESSION['fecha']);
unset($_SESSION['id_sede']);
unset($_SESSION['id_turno']);
unset($_SESSION['id_turnob']);
unset($_SESSION['id_dia']);
unset($_SESSION['hora_turno']);
unset($_SESSION['arreglo_actividad_por_schedule']);
unset($_SESSION['arreglo_cargado_schedule']);
unset($_SESSION['id_schedule']);
unset($_SESSION['soa_hora']);
unset($_SESSION['arreglo_filtro_schedule']);
unset($_SESSION['arreglo_buscado_schedule_finalizado']);
unset($_SESSION['accion_schedule_finalizado']);
unset($_SESSION['arreglo_buscado_usuario']);
unset($_SESSION['accion_usuario']);
unset($_SESSION['usu_idusu']);
unset($_SESSION['usu_nombres_usuario']);
unset($_SESSION['usu_apellidos_usuario']);
unset($_SESSION['usu_numdoc_usuario']);
unset($_SESSION['usu_nom_usuario']);
unset($_SESSION['usu_contrasenia']);
unset($_SESSION['usu_estado']);
unset($_SESSION['usu_foto']);
unset($_SESSION['usu_email_institucional']);
unset($_SESSION['usu_fecharegistro']);
unset($_SESSION['rol_idrol']);
unset($_SESSION['mensaje_usuario']);


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INTEGRATION  | UNIQUE</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

       <?php require 'Cabecera.php' ?>  
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../Controles/Fotos/<?php echo $_SESSION['foto']?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['user_personal']?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <a href="index.php">
                <li class="header">MENU PRINCIPAL</li>
            </a>   
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i> <span>USUARIO</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Usuarios <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="GuardarUsuario.php"><i class="fa fa-circle-o"></i> Registrar Usuario </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerUsuario.php"><i class="fa fa-circle-o"></i> Mantener Usuario </a></li>                    
                  </ul>                  
                </li>
                   
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-building"></i> <span>MANTENIMIENTOS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Procedimientos <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarProcedimiento.php"><i class="fa fa-circle-o"></i> Guardar Procedimiento </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerProcedimiento.php"><i class="fa fa-circle-o"></i> Mantener Procedimiento </a></li>                    
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Periodo <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarPeriodo.php"><i class="fa fa-circle-o"></i> Guardar Periodo </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerPeriodo.php"><i class="fa fa-circle-o"></i> Mantener Periodo </a></li>                    
                  </ul>
                </li>
                   
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-tasks"></i> <span>ACTIVIDADES</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Actividad <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarActividad.php"><i class="fa fa-circle-o"></i> Guardar Actividad </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerActividad.php"><i class="fa fa-circle-o"></i> Mantener Actividad </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="SubirExcel.php"><i class="fa fa-circle-o"></i> Subir Tareas Excel</a></li>                    
                  </ul>
                </li>
                   
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar"></i> <span>SCHEDULE</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Ejecutar Schedule <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="SeleccionarSchedule.php"><i class="fa fa-circle-o"></i> Seleccionar Schedule </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MisSchedules.php"><i class="fa fa-circle-o"></i> Mis Schedules </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="SchedulesFinalizados.php"><i class="fa fa-circle-o"></i> Schedules Finalizados </a></li>                    
                  </ul>
                </li>
                   
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>REQUERIMIENTOS</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li>
                  <a href="#"><i class="fa fa-circle"></i> Requerimientos <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarRequerimiento.php"><i class="fa fa-circle-o"></i> Registrar Requerimiento </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerRequerimiento.php"><i class="fa fa-circle-o"></i> Mantener Requerimientos </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="DashboardRequerimiento.php"><i class="fa fa-circle-o"></i> Dashboard Requerimientos </a></li>                    
                  </ul>
                </li>
                   
              </ul>
            </li>
            
            <li  class="treeview" >
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>RCT</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li>
                  <a href="#"><i class="fa fa-circle"></i> RCT <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarRCT.php"><i class="fa fa-circle-o"></i> Registrar RCT </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerRCT.php"><i class="fa fa-circle-o"></i> Mantener RCT </a></li>                    
                  </ul>
                </li>
                   
              </ul>
            </li>
            
           <li class="treeview">
              <a href="#">
                <i class="fa fa-database"></i> <span>SAP - SOA</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li>
                  <a href="#"><i class="fa fa-circle"></i> SAP - SOA <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="GuardarSOA.php"><i class="fa fa-circle-o"></i> Registrar SAP - SOA </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="MantenerSOA.php"><i class="fa fa-circle-o"></i> Mantener SAP - SOA </a></li>                    
                  </ul>
                  <ul class="treeview-menu">
                      <li><a href="DashboardSOA.php"><i class="fa fa-circle-o"></i> Dashboard SAP - SOA </a></li>                    
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle"></i> REPORTE<i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="ReporteSOA.php"><i class="fa fa-circle-o"></i> Reportes SAP - SOA </a></li>                    
                  </ul>
                </li>
              </ul>
            </li> 
           <li class="treeview">
              <a href="#">
                <i class="fa fa-unlock"></i> <span>PASSWORD</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Password <i class="fa fa-angle-left pull-right"></i></a>                  
                  <ul class="treeview-menu">
                      <li><a href="CambiarPassword.php"><i class="fa fa-circle-o"></i> Cambiar Password </a></li>                    
                  </ul>
                </li>                   
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
<!--        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>-->

        <!-- Main content -->
        <section class="content">
       
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              

              <!-- Chat box -->
              <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">RCT (REPORTES DE CAMBIO DE TURNO)</h3>
                  <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                    <div class="btn-group" data-toggle="btn-toggle" >
                      <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                    </div>
                  </div>
                </div>
                <div class="box-body chat" id="chat-box">
                  <!-- chat item -->
                <?php if ($rcts != null) { ?>
                  <?php
                    $num = 1;
                    foreach ($rcts as $r) {
                  ?>
                  <div class="item">
                    <img src="../Controles/Fotos/<?php echo $r['usu_foto']?>" alt="user image" class="online">
                    <p class="message">
                      <a href="#" class="name">
                        <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?php echo date("d-m-Y h:m",strtotime($r['rct_fechain']))?></small>
                       <?php echo $r['usu_nombres_usuario'].' '.$r['usu_apellidos_usuario']?>
                      </a>
                      <?php echo $r['rct_detalle']?>
                    </p>
                    <div class="attachment">
                      <h4>Plan de Trabajo:</h4>
                      <p class="filename">
                        <?php echo $r['rct_archivo']?>
                      </p>
                      <div class="pull-right">
                       <a href="../Controles/Rct/<?php echo $r['rct_archivo']?>" target="_new"> <button class="btn btn-primary btn-sm btn-flat">OPEN</button></a>
                      </div>
                    </div><!-- /.attachment -->
                  </div><!-- /.item -->  
                   <?php } ?>
                  
                  <?php } else { ?>
                    <div class="alert alert-danger"><i class="fa fa-warning"></i><b> ADVERTENCIA!</b><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO SE HAN REGISTRADO CAMBIOS EN EL RCT..!</div> 
<!--                                        <center><label>Su búsqueda no produjo ningún resultado. </label></center>-->


                    <?php } ?>
                </div><!-- /.chat -->
                <div class="box-footer">
                  <div class="input-group">
                    <input class="form-control" placeholder="Type message...">
                    <div class="input-group-btn">
                      <button class="btn btn-success"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                </div>
              </div><!-- /.box (chat box) -->


            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
           
          </div><!-- /.row (main row) -->
           <div class="row">
            <div class="col-md-6">
              <!-- Block buttons -->
              <div class="box">
                <div class="box-header">
                    <i class="fa fa-tasks"></i>
                  <h3 class="box-title">GENERACION DE SCHEDULE MANUAL</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" id="form_8hrs" action="../Controles/Registro/CSchedule.php" method="POST" onsubmit="return confirm('Esta realmente Seguro que desea generar Schedule de 8 hrs?');">
                    <input type="hidden" id="hiddenschedule" name="hidden_schedule" value="generar_turno_8"> 
                    <button class="btn btn-default bg-purple btn-lg btn-block" onclick="generar_turno_8();"><strong>GENERAR SCHEDULE DE 8 HORAS</strong></button>
                    </form>
                    <br>
                    <form class="form-horizontal" id="form_12hrs" action="../Controles/Registro/CSchedule.php" method="POST" onsubmit="return confirm('Esta realmente Seguro que desea generar Schedule de 12 hrs?');">
                        <input type="hidden" id="hiddenschedule" name="hidden_schedule" value="generar_turno_12"> 
                    <button class="btn btn-default bg-navy btn-lg btn-block" onclick="generar_turno_12();"><strong>GENERAR SCHEDULE DE 12 HORAS</strong></button>
                    </form>
                </div>
              </div><!-- /.box -->
            </div>
           </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2016 <a href="http://www.ibm.com/pe-es/">IBM DEL PERÚ</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <script type="text/javascript" src="../Recursos/js/JSGeneral.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>

