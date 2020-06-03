<?php

    class UsrProd{
        private $idprod;
        private $cod_producto;
        private $idusr;
        private $stsprodusr;
        
        public function __construct() {
            $this->db = Database::connect();
        } 

        function getIdprod() {
            return $this->idprod;
        }
        
        function getCodProducto() {
            return $this->cod_producto;
        }

        function getIdusr() {
            return $this->idusr;
        }
    
        function getStsprodusr() {
            return $this->stsprodusr;
        }
    

        function setIdprod($idprod) {
            $this->idprod = $idprod;
        }
        
        function setCodProducto($cod_producto) {
            $this->cod_producto = $this->db->real_escape_string($cod_producto);
        }

        function setIdusr($idusr) {
            $this->idusr = $this->db->real_escape_string($idusr);
        }
    
        function setStsprodusr($stsprodusr) {
            $this->stsprodusr = $this->db->real_escape_string($stsprodusr);
        }
    

        public function registro(){

            $result = false;
            //Sección de código que se usará únicamente para Mysql, al usar oracle, se manejará de forma diferente
            //Se consulta primero el último id generado en la tabla para generar uno nuevo
            $sql       = "SELECT MAX(idprod) as maxid FROM prod_usr";
            $resultado = $this->db->query($sql);
            
            $sqIdprod = $resultado->fetch_object();
            $sqIdprod = (int)$sqIdprod->maxid;
            $sqIdprod++;

            $sql = "INSERT INTO prod_usr VALUES(
                {$sqIdprod}, '{$this->getCodProducto()}', '{$this->getIdusr()}','ACT');";

            // var_dump($sql);
            // die();
            $save = $this->db->query($sql);

            if($save){
                //Regresamos el id que se usó para registrar al usuario para que sea usado en otro proceso
                $result = $sqIdprod;
            }
            return $result;

        }

}