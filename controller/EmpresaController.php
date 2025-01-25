<?php
require_once 'model/dao/EmpresaDao.php';
require_once 'model/dto/Empresa.php';

class EmpresaController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new EmpresaDao();
    }

    public function index()
    {
        $titulo = "Nueva Empresa";
        require_once VEMPRESA . 'crear.php';
    }

}

?>