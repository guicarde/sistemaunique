<?php
include_once '../../DAO/Conexion.php';
include_once '../../Recursos/classes_excel/PHPExcel/IOFactory.php'; 
include_once '../../DAO/Registro/Actividad.php';
include_once '../../DAO/Registro/Requerimiento.php';
//if(isset($_SESSION))
//session_start();



$direccionInicio = "location:../../Vistas/index.php";
$direccionMantener = "location: ../../Vistas/MantenerActividad.php";
$direccionGuardar = "location: ../../Vistas/GuardarExcel.php";
 
if (isset($_POST['hidden_excel'])) {

    $accion = $_POST['hidden_excel'];
    
   
    if ($accion == 'save')
    {
        ini_set('max_execution_time', 300);
        ini_set('memory_limit', '-1');        
                
        $archivo = $_FILES["fileArchivo"]['name'];
        move_uploaded_file($_FILES['fileArchivo']['tmp_name'],$archivo);
        
        $inputFileType = PHPExcel_IOFactory::identify($archivo);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($archivo);
        
        //numero de pestaña
        $sheet = $objPHPExcel->getSheet(0);
     
        $ultima_fila = $sheet->getHighestRow();
        $ultima_columna = $sheet->getHighestColumn();
            
        
        $MaxArreglo=array();
        
        for ($row = 5; $row <= 348; $row++)
        {
            //extraer fila
            $rowData = $sheet->rangeToArray('A' . $row . ':' . 'P' . $row,NULL, TRUE, FALSE);
            
            $Arreglo=array();
            
            foreach($rowData as $r)
                {
                    if($r!=null)
                    {
                        // DIAS DE LA SEMANA
                        $dias=array();
                        if($r[4]!=null){ $dias[]=1; } //lun
                        if($r[5]!=null){ $dias[]=2; } //mar
                        if($r[6]!=null){ $dias[]=3; } //mie
                        if($r[7]!=null){ $dias[]=4; } //jue
                        if($r[8]!=null){ $dias[]=5; } //vie
                        if($r[9]!=null){ $dias[]=6; } //sab
                        if($r[10]!=null){ $dias[]=7; } //dom
                        
                        //Columna A
                        $A = $r[0]; if($A==null){ $A=''; }
                        //Columna B
                        $B = $r[1]; if($B==null){ $B=''; }
                        //Columna C
                        $C = $r[2]; if($C==null){ $C=''; }
                        //Columna M
                        $M = $r[12]; if($M==null){ $M=''; }
                        //Columna N
                        $N = $r[13]; if($N==null){ $N=''; }
                        //Columna O
                        $O = PHPExcel_Style_NumberFormat::toFormattedString($r[14], 'hh:mm:ss');;
                        //Columna P 
                        $P = $r[15]; if($P==null){ $P=''; }
                        //Columna R 
                        $R = $r[17]; if($R==null){ $R=''; }
                        //Columna S 
                        $S = $r[18]; if($S==null){ $S=''; }
                        //Columna T
                        $T = $r[19]; if($T==null){ $T=''; }
                        
                        
                        $Arreglo = [$B,$C,$M,$N,$O,$P,$R,$S,$T];
                        
                    }
                }
                
           $MaxArreglo[] = array($Arreglo,$dias);
        }
        
        
        //Grabar
        foreach($MaxArreglo AS $gordo)
            {
                $datos = $gordo[0];
                $dias  = $gordo[1];
                
                $ob = new Actividad();
                
                //guardar datos
                $id = $ob->grabarExcel( $datos[0],$datos[1],$datos[2],$datos[3],$datos[4],
                                  $datos[5],$datos[6],$datos[7],$datos[8]);
                
               if($datos[0]=='MAÑANA UNIQUE'){
                   $turno_a=1;                   
               }else if($datos[0]=='TARDE UNIQUE'){
                   $turno_a=2;                   
               }else if($datos[0]=='NOCHE UNIQUE'){
                   $turno_a=3;                   
               }
               
               if($datos[1]=='X'){
                   $turno_b=4;                   
               }else {
                   $turno_b=5;   
               }
               
               if($datos[0]!= ''){
               $ob_t=new Actividad();
               $ob_t->setId($id);
               $ob_t->setIdturno($turno_a);
               $ob_t->grabar_turno($ob_t);
               }
               
               
               $ob_t=new Actividad();
               $ob_t->setId($id);
               $ob_t->setIdturno($turno_b);
               $ob_t->grabar_turno($ob_t);
               
               
                //guardar dias
                $obj = new Actividad();
                
                foreach($dias as $d)
                {
                    $obj->setIddia($d);
                    $obj->setId($id);
                    
                    $obj->grabar_dia($obj);
                }
            }
            
            header("location: ../../Vistas/MantenerActividad.php");
    }  
    
    
    if ($accion == 'requerimientos')
    {
            ini_set('max_execution_time', 3600);
        ini_set('memory_limit', '-1');        
                
        $archivo = $_FILES["fileArchivo"]['name'];
        move_uploaded_file($_FILES['fileArchivo']['tmp_name'],$archivo);
        
        $inputFileType = PHPExcel_IOFactory::identify($archivo);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($archivo);
        
        //numero de pestaña
        $sheet = $objPHPExcel->getSheet(0);
     
        $ultima_fila = $sheet->getHighestRow();
        $ultima_columna = $sheet->getHighestColumn();
            
        
        $MaxArreglo=array();
        
        for ($row = 3; $row <= 4590; $row++)
        {
            //extraer fila
            $rowData = $sheet->rangeToArray('A' . $row . ':' . 'AH' . $row,NULL, TRUE, FALSE);
            
            $Arreglo=array();
            
            foreach($rowData as $r)
                {
                    if($r!=null)
                    {
                                                
                        //Columna B
                        $B = PHPExcel_Style_NumberFormat::toFormattedString($r[1], 'yyyy/mm/dd');
                        //Columna C
                        $C = $r[2]; if($C==null){ $C=''; }
                        //Columna D
                        $D = $r[3]; if($D==null){ $D=''; }
                        //Columna E
                        $E = PHPExcel_Style_NumberFormat::toFormattedString($r[4], 'hh:mm:ss');
                        //Columna F
                        $F = $r[5]; if($F==null){ $F=''; }
                        //Columna G
                        $G = $r[6]; if($G==null){ $G=''; }
                        //Columna H
                        $H = $r[7]; if($H==null){ $H=''; }
                        //Columna I
                        $I = $r[8]; if($I==null){ $I=''; }
                        //Columna J
                        $J = $r[9]; if($J==null){ $J=''; }
                        //Columna K
                        if($r[10]==''){
                        $K = '';   
                        }else
                        {
                        $K = PHPExcel_Style_NumberFormat::toFormattedString($r[10], 'yyyy/mm/dd');
                        }
                        //Columna L
                        if($r[11]==''){
                        $L = '';   
                        }else
                        {
                        $L = PHPExcel_Style_NumberFormat::toFormattedString($r[11], 'hh:mm:ss');
                        }
                        //Columna M
                        if($r[12]==''){
                        $M = '';   
                        }else
                        {
                        $M = PHPExcel_Style_NumberFormat::toFormattedString($r[12], 'hh:mm:ss');
                        }
                        //Columna N
                        if($r[13]==''){
                        $N = '';   
                        }else
                        {
                        $N = PHPExcel_Style_NumberFormat::toFormattedString($r[13], 'hh:mm:ss');
                        }
                        //Columna O
                         if($r[14]==''){
                        $O = '';   
                        }else
                        {
                        $O = PHPExcel_Style_NumberFormat::toFormattedString($r[14], 'hh:mm:ss');
                        }
                        //Columna P
                        if($r[15]==''){
                        $P = '';   
                        }else
                        {
                        $P = PHPExcel_Style_NumberFormat::toFormattedString($r[15], 'hh:mm:ss');
                        }
                        //Columna Q
                        if($r[16]==''){
                        $Q = '';   
                        }else
                        {
                        $Q = PHPExcel_Style_NumberFormat::toFormattedString($r[16], 'hh:mm:ss');
                        }
                        //Columna R
                        if($r[17]==''){
                        $R = '';   
                        }else
                        {
                        $R = PHPExcel_Style_NumberFormat::toFormattedString($r[17], 'hh:mm:ss');
                        }
                        //Columna S
                        if($r[18]==''){
                        $S = '';   
                        }else
                        {
                        $S = PHPExcel_Style_NumberFormat::toFormattedString($r[18], 'hh:mm:ss');
                        }
                        //Columna T
                         if($r[19]==''){
                        $T = '';   
                        }else
                        {
                        $T = PHPExcel_Style_NumberFormat::toFormattedString($r[19], 'hh:mm:ss');
                        }
                        //Columna U
                        if($r[20]==''){
                        $U = '';   
                        }else
                        {
                        $U = PHPExcel_Style_NumberFormat::toFormattedString($r[20], 'hh:mm:ss');
                        }
                        //Columna V
                        if($r[21]==''){
                        $V = '';   
                        }else
                        {
                        $V = PHPExcel_Style_NumberFormat::toFormattedString($r[21], 'hh:mm:ss');
                        }
                        //Columna W
                        if($r[22]==''){
                        $W = '';   
                        }else
                        {
                        $W = PHPExcel_Style_NumberFormat::toFormattedString($r[22], 'hh:mm:ss');
                        }
                        //Columna X
                        if($r[23]==''){
                        $X = '';   
                        }else
                        {
                        $X = PHPExcel_Style_NumberFormat::toFormattedString($r[23], 'hh:mm:ss');
                        }
                        //Columna Y
                        if($r[24]==''){
                        $Y = '';   
                        }else
                        {
                        $Y = PHPExcel_Style_NumberFormat::toFormattedString($r[24], 'hh:mm:ss');
                        }
                        //Columna Z
                        if($r[25]==''){
                        $Z = '';   
                        }else
                        {
                        $Z = PHPExcel_Style_NumberFormat::toFormattedString($r[25], 'hh:mm:ss');
                        }
                        //Columna AA
                        if($r[26]==''){
                        $AA = '';   
                        }else
                        {
                        $AA = PHPExcel_Style_NumberFormat::toFormattedString($r[26], 'hh:mm:ss');
                        }
                        //Columna AB
                        if($r[27]==''){
                        $AB = '';   
                        }else
                        {
                        $AB = PHPExcel_Style_NumberFormat::toFormattedString($r[27], 'hh:mm:ss');
                        }
                        //Columna AC
                        if($r[28]==''){
                        $AC = '';   
                        }else
                        {
                        $AC = PHPExcel_Style_NumberFormat::toFormattedString($r[28], 'hh:mm:ss');
                        }
                        //Columna AD
                        $AD = $r[29]; if($AD==null){ $AD=''; }
                        //Columna AE
                        $AE = $r[30]; if($AE==null){ $AE=''; }
                        //Columna AF
                        $AF = $r[31]; if($AF==null){ $AF=''; }
                        //Columna AG
                        $AG = $r[32]; if($AG==null){ $AG=''; }
                        //Columna AH
                        $AH = $r[33]; if($AH==null){ $AH=''; } 
                        
                        
                        
                        $Arreglo = [$B,$C,$D,$E,$F,$G,$H,$I,$J,$K,$L,$M,$N,$O,$P,$Q,$R,$S,$T,$U,$V,$W,$X,$Y,$Z,$AA,$AB,$AC,$AD,$AE,$AF,$AG,$AH];
                        
                    }
                }
                
           $MaxArreglo[] = array($Arreglo);
        }   
        
        
        //Grabar
        foreach($MaxArreglo AS $lista)
            {
                $datos = $lista[0];
                
                $ob = new Requerimiento();
                
                //guardar datos
                $id = $ob->SubirMasivo( $datos[0],$datos[1],$datos[2],$datos[3],$datos[4],
                                  $datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10],$datos[11],$datos[12],
                                  $datos[13],$datos[14],$datos[15],$datos[16],$datos[17],$datos[18],$datos[19],$datos[20],
                                  $datos[21],$datos[22],$datos[23],$datos[24],$datos[25],$datos[26],$datos[27],$datos[28],
                                  $datos[29],$datos[30],$datos[31],$datos[32]);
            }
            
            header("location: ../../Vistas/MantenerRequerimiento.php");
    }
   
 
} else {
    header("location: ../../Vistas/error.php");
}
