<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/prueba/controlador/controlador_noticias.php');
$controlador = new controladornoticias();
$accion = $_POST["accionPOST"];

switch ($accion) {
    case 1 :
        $controlador->guardarNoticia();
        break;

    case 2 :
        $controlador->guardarComentario();
        break;

    case 3 :
        $controlador->guardarRespComentario();
        break;

    default :
        echo 'No se encontró la opción';
        break;
}
