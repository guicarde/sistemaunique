<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
//------------------------------------------------
include_once '../DAO/Registro/Reporte.php';



if (isset($_SESSION['accion_reporte']) && $_SESSION['accion_reporte'] != '') {

    if ($_SESSION['accion_reporte'] == 'detalle_reporte') {
        $sapsoa = $_SESSION['arreglo_sapsoa_por_reporte'];
    }
    if ($_SESSION['accion_reporte'] == 'filtro_reporte') {
        $sapsoa = $_SESSION['arreglo_filtro_reporte'];
    }
}
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
        <!-- DataTables -->
        <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="plugins/select2/select2.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .color-palette {
                height: 35px;
                line-height: 35px;
                text-align: center;
            }
            .color-palette-set {
                margin-bottom: 15px;
            }
            .color-palette span {
                display: none;
                font-size: 12px;
            }
            .color-palette:hover span {
                display: block;
            }
            .color-palette-box h4 {
                position: absolute;
                top: 100%;
                left: 25px;
                margin-top: -40px;
                color: rgba(255, 255, 255, 0.8);
                font-size: 12px;
                display: block;
                z-index: 7;
            }
        </style>
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
                            <img src="../Controles/Fotos/<?php echo $_SESSION['foto'] ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $_SESSION['user_personal'] ?></p>
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
                  <ul class="treeview-menu">
                      <li><a href="DashboardPorPais.php"><i class="fa fa-circle-o"></i> Dashboard Req. Por Pais </a></li>                    
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

                        <li class="active treeview">
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
                                <li class="active">
                                    <a href="#"><i class="fa fa-circle"></i> REPORTE<i class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li class="active"><a href="GuardarReporteSOA.php"><i class="fa fa-circle-o"></i> Registrar Reporte </a></li>                    
                                    </ul>
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
                <section class="content-header">
                    <h1>
                        DETALLE DE REPORTE SAP SOA
                        <small>BACKUPS SAP SOA</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-user"></i> SAP - SOA</a></li>
                        <li><a href="index.php">Reporte</a></li>
                        <li class="active">Registrar Reporte</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <form class="form-horizontal" action="../Controles/Registro/CReporte.php" method="POST">
                        <input type="hidden" name="hidden_reporte" value="filtrarreporte" id="hiddenfiltro">      
                        <div class="row"> 

                            <div class="col-md-6">
                                <!-- Horizontal Form -->
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Opciones de Filtro</h3>
                                    </div><!-- /.box-header -->
                                    <!-- form start -->


                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inputestado" class="col-sm-2 control-label">ESTADO</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" style="width: 100%;" name="c_estado">
                                                    <option value="">--SELECCIONE--</option>
                                                    <option value="2">OK</option>
                                                    <option value="4">EN PROGRESO</option>
                                                    <option value="3">NO PROGRAMADO</option>
                                                    <option value="5">FALLIDO</option>
                                                    <option value="6">RELANZADO</option>

                                                </select>
                                            </div>
                                        </div>    
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->

                            </div><!--/.col (right) -->  
                            <div class="col-md-6">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"></h3>
                                    </div><!-- /.box-header -->

                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inputnombres" class="col-sm-2 control-label">SERVIDOR</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="t_servidor" placeholder="Ingrese Servidor">
                                            </div>
                                        </div> 

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="box box-success">
                                    <div class="box-body">
                                        <div class="box-footer" align="center">
                                            <button type="submit" class="btn btn-yahoo">Buscar</button>
                                        </div>
                                    </div>                  
                                </div>
                            </div>


                        </div> <!--/.row  -->  
                    </form>

                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">DETALLE DE BACKUPS DE DEPORTE SAP - SOA</h3>
                                    <br><br>

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="background-color:#00A65A;font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>&nbsp;&nbsp;&nbsp;&nbsp;BACKUP OK</strong> 
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="background-color:#F4F4F4;font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>&nbsp;&nbsp;&nbsp;&nbsp;BACKUP NO PROGRAMADO</strong> 
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="background-color:#F39C12;font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>&nbsp;&nbsp;&nbsp;&nbsp;BACKUP EN PROGRESO</strong> 
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="background-color:#DD4B39;font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>&nbsp;&nbsp;&nbsp;&nbsp;BACKUP FALLIDO</strong> 
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="background-color:#00C0EF;font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>&nbsp;&nbsp;&nbsp;&nbsp;BACKUP RELANZADO</strong> 


                                    <hr>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <?php if ($sapsoa != null) { ?>
                                                <thead>
                                                    <tr>
                                                        <th> N</th>
                                                        <th> TURNO</th> 
                                                        <th> SERVIDOR</th>
                                                        <th> IP</th> 
                                                        <th> SITE</th>   
                                                        <th> HERRAMIENTA</th>
                                                        <th> TIPO DE BACKUP</th>
                                                        <th> FRECUENCIA</th>
                                                        <th> HORA</th>
                                                        <th> </th>
                                                        <th> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $num = 1;
                                                    foreach ($sapsoa as $s) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $num;
                                                $num++; ?></td>
                                                            <td><?php
                                                                if ($s['soa_turno'] == '1') {
                                                                    echo 'MAÑANA';
                                                                } else if ($s['soa_turno'] == '2') {
                                                                    echo 'TARDE';
                                                                } else if ($s['soa_turno'] == '3') {
                                                                    echo 'NOCHE';
                                                                }
                                                                ?>
                                                            </td>   
                                                            <td><?php echo $s['soa_servidor']; ?></td>
                                                            <td><?php echo $s['soa_ip']; ?></td>
                                                            <td><?php
                                                        if ($s['soa_site'] == '2') {
                                                            echo 'LA MOLINA';
                                                        } else if ($s['soa_site'] == '1') {
                                                            echo 'ARAMBURU';
                                                        }
                                                        ?>
                                                            </td>  
                                                            <td><?php echo $s['soa_herramienta']; ?></td>
                                                            <td><?php echo $s['soa_tipo']; ?></td>
                                                            <td><?php echo $s['periodo_nombre']; ?></td>
                                                            <td><?php echo $s['soa_hora']; ?></td>

                                                            <td style="font-size:8pt;color:#050355;font-weight:bold" width="5%">
                                                                <div id="estado_sap<?php echo $s['reportesoa_idreportesoa']; ?>">
        <?php if ($s['reportesoa_estado'] == '1') { ?>


                                                                        <input type="hidden" name="id_reporte_soa" id="id_reporte_soa<?php echo $s['reportesoa_idreportesoa'] ?>" value="<?php echo $s['reportesoa_idreportesoa'] ?>">
                                                                        <input type="hidden" name="hidden_reporte" id="hidden_reporte<?php echo $s['reportesoa_idreportesoa'] ?>" value="OK">
                                                                        <button type="button" class="btn btn-primary btn-xs" onclick="SapOK('<?php echo $s['reportesoa_idreportesoa']; ?>');" title="OK"><i class="fa fa-clock-o"> PENDIENTE</i></button>

                                                                    <?php } else if ($s['reportesoa_estado'] == '2') { ?>  
                                                                        <input type="hidden" name="id_reporte_soa" id="id_reporte_soa<?php echo $s['reportesoa_idreportesoa'] ?>" value="<?php echo $s['reportesoa_idreportesoa'] ?>">
                                                                        <input type="hidden" name="hidden_reporte" id="hidden_reporte<?php echo $s['reportesoa_idreportesoa'] ?>" value="NP">
                                                                        <button type="button" class="btn btn-success btn-xs" onclick="SapOK('<?php echo $s['reportesoa_idreportesoa'] ?>');" title="NP">OK</button>

                                                                    <?php } else if ($s['reportesoa_estado'] == '3') { ?>  
                                                                        <input type="hidden" name="id_reporte_soa" id="id_reporte_soa<?php echo $s['reportesoa_idreportesoa'] ?>" value="<?php echo $s['reportesoa_idreportesoa'] ?>">
                                                                        <input type="hidden" name="hidden_reporte" id="hidden_reporte<?php echo $s['reportesoa_idreportesoa'] ?>" value="EP">
                                                                        <button type="submit" class="btn btn-default btn-xs" onclick="SapOK('<?php echo $s['reportesoa_idreportesoa'] ?>');" title="EP"> NP</button>

        <?php } else if ($s['reportesoa_estado'] == '4') { ?>  
                                                                        <input type="hidden" name="id_reporte_soa" id="id_reporte_soa<?php echo $s['reportesoa_idreportesoa'] ?>" value="<?php echo $s['reportesoa_idreportesoa'] ?>">
                                                                        <input type="hidden" name="hidden_reporte" id="hidden_reporte<?php echo $s['reportesoa_idreportesoa'] ?>" value="FA">
                                                                        <button type="submit" class="btn btn-warning btn-xs" onclick="SapOK('<?php echo $s['reportesoa_idreportesoa'] ?>');" title="FA"> EP</button>

        <?php } else if ($s['reportesoa_estado'] == '5') { ?>  
                                                                        <input type="hidden" name="id_reporte_soa" id="id_reporte_soa<?php echo $s['reportesoa_idreportesoa'] ?>" value="<?php echo $s['reportesoa_idreportesoa'] ?>">
                                                                        <input type="hidden" name="hidden_reporte" id="hidden_reporte<?php echo $s['reportesoa_idreportesoa'] ?>" value="RE">
                                                                        <button type="submit" class="btn btn-danger btn-xs" onclick="SapOK('<?php echo $s['reportesoa_idreportesoa'] ?>');" title="RE"> F</button>
                                                        <?php } else if ($s['reportesoa_estado'] == '6') { ?>  
                                                                        <input type="hidden" name="id_reporte_soa" id="id_reporte_soa<?php echo $s['reportesoa_idreportesoa'] ?>" value="<?php echo $s['reportesoa_idreportesoa'] ?>">
                                                                        <input type="hidden" name="hidden_reporte" id="hidden_reporte<?php echo $s['reportesoa_idreportesoa'] ?>" value="OK">
                                                                        <button type="submit" class="btn btn-info btn-xs" onclick="SapOK('<?php echo $s['reportesoa_idreportesoa'] ?>');" title="OK"> R</button>
        <?php } ?>  
                                                                </div>
                                                            </td>
                                                            <td style="color:black;font-weight:bold;">
                                                            </td>       
                                                        </tr>
    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th> N</th>
                                                        <th> TURNO</th> 
                                                        <th> SERVIDOR</th>
                                                        <th> IP</th> 
                                                        <th> SITE</th>   
                                                        <th> HERRAMIENTA</th>
                                                        <th> TIPO DE BACKUP</th>
                                                        <th> FRECUENCIA</th>
                                                        <th> HORA</th>
                                                        <th> </th>
                                                        <th> </th>
                                                    </tr>
                                                </tfoot>
<?php } else { ?>
                                                <div class="alert alert-danger"><i class="fa fa-warning"></i><b> Error!</b><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Su búsqueda no produjo ningún resultado..!</div> 
                            <!--                                        <center><label>Su búsqueda no produjo ningún resultado. </label></center>-->


<?php } ?>
                                        </table>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box --> 
                        </div>

                        <br>

                    </div>
                    <!-- END TYPOGRAPHY -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; 2016 <a href="http://almsaeedstudio.com">Guillermo Cárdenas Studio</a>.</strong> All rights reserved.
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
        <!-- Select2 -->
        <script src="plugins/select2/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
        <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>

        <script type="text/javascript" src="../Recursos/js/JSGeneral.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
<!--        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>-->
        <!-- SlimScroll -->
<!--        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>-->
        <!-- FastClick -->
<!--        <script src="plugins/fastclick/fastclick.min.js"></script>-->
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
       
<!--        <script src="code.jquery.com/jquery-1.12.4.js"></script>-->
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<!--       <script src="cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!--       <script src="cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>   -->
<!--       <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>-->
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<!--        <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>-->
<script>
        $(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons : [
								{
								extend : 'pageLength',
								text : '<i class="fa fa-list-ol" aria-hidden="true"></i> Mostrar',
							},
							{
								extend : 'excelHtml5',
								text : '<i class="fa fa-file-excel-o"></i> Descargar en Excel',
// 								className : 'btn btn-default',
								customize : function(
										xlsx) {
									var sheet = xlsx.xl.worksheets['reporte.xml'];

									// jQuery selector to add a border
									$('row c[r*="10"]',sheet).attr('s','25');
								}
							} ]
    } );
} );
 </script> 
<!-- <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
        </script>-->
        <script>
            $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();

                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            },
                            startDate: moment().subtract(29, 'days'),
                            endDate: moment()
                        },
                        function (start, end) {
                            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                        }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>
    </body>
</html>
