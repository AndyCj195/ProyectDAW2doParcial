<!-- Autor: Chavez Jimenez Andres -->
<?php
class IndexController{
    public function index(){
        if(!empty($_GET['p'])){
            $page = $_GET['p']; //limpiar la variable
            //flujo de ventanas
            require_once 'view/statics/'.$page.'.php';
        }else{
            require_once 'view/homeView.php';
        }
    }
}
?>