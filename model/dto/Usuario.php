<?php
class Usuario{
    private $id;
    private $nombres;
    private $correo;
    private $cedula;
    private $telefono;
    private $direccion;
    private $tipoDeUsuario;   
    private $estado;
    private $contrasena;

    function __construct(){}

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function getCedula(){
        return $this->cedula;
    }

    public function setCedula($cedula){
        $this->cedula = $cedula;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }   

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getTipoDeUsuario(){
        return $this->tipoDeUsuario;
    }

    public function setTipoDeUsuario($tipoDeUsuario){
        $this->tipoDeUsuario = $tipoDeUsuario;
    }

    public function getEstado(){
        return $this->estado;
    }
    
    public function setEstado($estado){
        $this->estado = $estado;
    }

    public function getContrasena(){
        return $this->contrasena;
    }

    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }
}

?>