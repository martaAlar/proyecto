<?php
/** Incluye la clase Usuario. */
include '../../capaNegocio/usuario.php';

header('Content-Type: text/plain');

$datos = file_get_contents('php://input'); 

    /** @var Usuario Instancia un objeto de la clase. */
    $usuario = new Usuario();
    /** Inicializa los atributos del objeto. */
    $usuario->setEmail($datos);
    if($usuario->existeEmail()){
        echo 'true';
    }else{
        echo 'false';
    }
//echo json_encode($datos);

