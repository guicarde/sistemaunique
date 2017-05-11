<?php
include_once '../DAO/Conexion.php';


if(!isset($_SESSION)){
session_start();
}

class Reporte  {
    
    private $id;
    private $fecha;
    private $servidor;
    private $estado;
    private $idusu;
    private $id2;
    
        
    function __construct() {}
    
function getId() {
    return $this->id;
}

function getFecha() {
    return $this->fecha;
}

function getEstado() {
    return $this->estado;
}

function setId($id) {
    $this->id = $id;
}

function setFecha($fecha) {
    $this->fecha = $fecha;
}

function setEstado($estado) {
    $this->estado = $estado;
}
function getIdusu() {
    return $this->idusu;
}

function setIdusu($idusu) {
    $this->idusu = $idusu;
}

function getId2() {
    return $this->id2;
}

function setId2($id2) {
    $this->id2 = $id2;
}

function getServidor() {
    return $this->servidor;
}

function setServidor($servidor) {
    $this->servidor = $servidor;
}
//------------------------------------------------------------------------------
 //------------------------------------------------------------------------------

    function listar(){
       
        $con = Conectar();
        $sql = "SELECT * FROM reporte_listar()";
        $res = pg_query($con,$sql);
        $array=null;
        while($fila = pg_fetch_assoc($res))
        {
                   $array[] = $fila;
        }
       
        if(count($array)!=0){
            return $array; 
        }
        else{
            return null;
        }
    }
        function buscar(Reporte $r){
       
        $con = Conectar();
        $sql = "SELECT * FROM reporte_buscar('$r->estado','$r->servidor',$r->id)";
//        var_dump($sql);
//        exit();
        $res = pg_query($con,$sql);
        $array=null;
        while($fila = pg_fetch_assoc($res))
        {
                   $array[] = $fila;
        }
       
        if(count($array)!=0){
            return $array; 
        }
        else{
            return null;
        }
    }
    
        function buscarReportePorId(Reporte $r){
       
        $con = Conectar();
        $sql = "SELECT * FROM reporte_por_id($r->id)";
        $res = pg_query($con,$sql);
        $array=null;
        while($fila = pg_fetch_assoc($res))
        {
                   $array[] = $fila;
        }
       
        if(count($array)!=0){
            return $array; 
        }
        else{
            return null;
        }
    }
               function soa_ok(Reporte $r){
       
        $con = Conectar();
        $sql = "SELECT * FROM reporte_soa_ok($r->id,$r->idusu,$r->id2)";
//        var_dump($sql);
//        exit();
        $res = pg_query($con,$sql);
        $array=null;
        while($fila = pg_fetch_assoc($res))
        {
                   $array[] = $fila;
        }
       
        if(count($array)!=0){
            return $array; 
        }
        else{
            return null;
        }
    }
                   function soa_np(Reporte $r){
       
        $con = Conectar();
        $sql = "SELECT * FROM reporte_soa_np($r->id,$r->idusu,$r->id2)";
//        var_dump($sql);
//        exit();
        $res = pg_query($con,$sql);
        $array=null;
        while($fila = pg_fetch_assoc($res))
        {
                   $array[] = $fila;
        }
       
        if(count($array)!=0){
            return $array; 
        }
        else{
            return null;
        }
    }
                   function soa_ep(Reporte $r){
       
        $con = Conectar();
        $sql = "SELECT * FROM reporte_soa_ep($r->id,$r->idusu,$r->id2)";
//        var_dump($sql);
//        exit();
        $res = pg_query($con,$sql);
        $array=null;
        while($fila = pg_fetch_assoc($res))
        {
                   $array[] = $fila;
        }
       
        if(count($array)!=0){
            return $array; 
        }
        else{
            return null;
        }
    }
                   function soa_fa(Reporte $r){
       
        $con = Conectar();
        $sql = "SELECT * FROM reporte_soa_fa($r->id,$r->idusu,$r->id2)";
//        var_dump($sql);
//        exit();
        $res = pg_query($con,$sql);
        $array=null;
        while($fila = pg_fetch_assoc($res))
        {
                   $array[] = $fila;
        }
       
        if(count($array)!=0){
            return $array; 
        }
        else{
            return null;
        }
    }
                   function soa_re(Reporte $r){
       
        $con = Conectar();
        $sql = "SELECT * FROM reporte_soa_re($r->id,$r->idusu,$r->id2)";
//        var_dump($sql);
//        exit();
        $res = pg_query($con,$sql);
        $array=null;
        while($fila = pg_fetch_assoc($res))
        {
                   $array[] = $fila;
        }
       
        if(count($array)!=0){
            return $array; 
        }
        else{
            return null;
        }
    }
    
}