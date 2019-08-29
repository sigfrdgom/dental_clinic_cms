<?php

if ((session_status() == 2)&&(isset($_SESSION['id_sesion']))) {

    if ($_SESSION['tipoUsuario']==$_SESSION['admin']) {
        require_once RUTA_APP . '/views/include/header.php';
    }else if ($_SESSION['tipoUsuario']==$_SESSION['admin2'] ){
        require_once RUTA_APP . '/views/include/headerDocente.php';
    }else{
        require_once RUTA_APP . '/views/include/headerParticipante.php';
    }
}else{
    
    // echo "<script> alert(' NO HAY SESISION EN HEADER ".session_status()."');</script>";
    if (session_status() != 2) {
        session_start();
    }    
    if (isset($_SESSION['id_sesion'])) {
        // echo "<script> alert('SI HAY SESIONES EN HEADER PERO NO HAY ID  ".session_status()."');</script>";
        
        if ($_SESSION['tipoUsuario']==$_SESSION['admin']) {
            require_once RUTA_APP . '/views/include/header.php';
        }else if ($_SESSION['tipoUsuario']==$_SESSION['admin2'] ){
            require_once RUTA_APP . '/views/include/headerDocente.php';
        }else{
            require_once RUTA_APP . '/views/include/headerParticipante.php';
        }

    }else{
        require_once '../app/controllers/errores.php';
        $this->controladorActual = new Errores();
        $this->controladorActual->errorNoLOG();
        
        //CAMBIARRRRRRRR ESTOS MENSAJE
        // echo "<script> alert('NO ESTA AUTORIZADO');
        //  window.location='".RUTA_URL."';
        // </script>";
        exit;}
    
}
?>
