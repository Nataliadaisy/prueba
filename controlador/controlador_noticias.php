<?php

ini_set('date.timezone', 'America/Mexico_City');
require_once($_SERVER['DOCUMENT_ROOT'] . '/prueba/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/prueba/controlador/prepararCadena.php');


static $class;

//require_once './estructura_configurar.php';
class controladornoticias extends Conexion
{

    public function __construct()
    {
        parent::__construct();
    }

    public function cargarNoticias()
    {
        $statement = $this->_db->prepare("SELECT * FROM noticia ORDER BY RAND();");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function cargarDetalleNoti($id)
    {
        $statement = $this->_db->prepare("SELECT * FROM noticia WHERE idnoticia = $id");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }


    public function guardarNoticia()
    {

        $data['estado'] = 0;

        try {
            $titulo = addslashes(htmlspecialchars($_POST["titulo"]));
            $nota = addslashes(htmlspecialchars($_POST["txtnota"]));
            $foto = "http://localhost/prueba/images/noti3.jpg";
            $fecha = addslashes(htmlspecialchars($_POST["fechaRegis"]));

            $statement = $this->_db->prepare("insert into noticia values (0,'$titulo','$nota','$foto','$fecha',1);");
            if ($statement->execute()) {
                $data['estado'] = 1;

            } else {
                $data['estado'] = 0;
            }
        } catch
        (Exception $ex) {
            $data['estado'] = 0;
        }
        echo json_encode($data);
    }


    public function guardarComentario()
    {

        $data['estado'] = 0;

        try {
            $descomentario = addslashes(htmlspecialchars($_POST["txtnota"]));
            $fechacomentario = addslashes(htmlspecialchars($_POST["fechaRegis"]));
            $horacomentario = addslashes(htmlspecialchars($_POST["horaRegis"]));
            $idnoticia = addslashes(htmlspecialchars($_POST["id_noti"]));

            $statement = $this->_db->prepare("insert into comentario values (0,'$descomentario','$fechacomentario','$horacomentario',$idnoticia,2);");
            if ($statement->execute()) {
                $data['estado'] = 1;

            } else {
                $data['estado'] = 0;
            }
        } catch
        (Exception $ex) {
            $data['estado'] = 0;
        }
        echo json_encode($data);
    }


    public function impcomentario($id)
    {
        $statement = $this->_db->prepare("SELECT * FROM comentario WHERE idnoticia = $id ORDER BY RAND();");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function guardarRespComentario()
    {

        $data['estado'] = 0;

        try {
            $respuesta = addslashes(htmlspecialchars($_POST["txtnotares"]));
            $fechacomentario = addslashes(htmlspecialchars($_POST["fechaRegisres"]));
            $horacomentario = addslashes(htmlspecialchars($_POST["horaRegisres"]));
            $idcomentario = addslashes(htmlspecialchars($_POST["idcomentario"]));

            $statement = $this->_db->prepare("insert into respcomentario values (0,'$respuesta','$fechacomentario','$horacomentario',2,$idcomentario);");
            if ($statement->execute()) {
                $data['estado'] = 1;

            } else {
                $data['estado'] = 0;
            }
        } catch
        (Exception $ex) {
            $data['estado'] = 0;
        }
        echo json_encode($data);
    }

    public function imprrespu($id)
    {
        $statement = $this->_db->prepare("SELECT * FROM respcomentario WHERE idcomentario = $id ;");
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }



}
