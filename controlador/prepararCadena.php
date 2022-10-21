<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of prepararCadena
 *
 * @author didas
 */
class prepararCadena {

    function quitarCaracteres($string) {
        $string = trim($string);

        $string = str_replace(
                array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'), $string
        );

        $string = str_replace(
                array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'e', 'e', 'e', 'e'), $string
        );

        $string = str_replace(
                array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'i', 'i', 'i', 'i'), $string
        );

        $string = str_replace(
                array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'o', 'o', 'o', 'o'), $string
        );

        $string = str_replace(
                array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'u', 'u', 'u', 'u'), $string
        );

        $string = str_replace(
                array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'n', 'c', 'c'), $string
        );
        
        $string = str_replace(
                array(':',','), array('-',''), $string
        );

        return $string;
    }
    
    function calcular_publicacion($fecha_i, $fecha_f, $hour) {
        date_default_timezone_set("America/Mexico_City");
        $dias = (strtotime($fecha_i) - strtotime($fecha_f)) / 86400;
        $dias = abs($dias);
        $dias = floor($dias);
        $cadena = '';

        if ($dias == 0) {
            $h = date("H:i:s");
            $horas = date("H", strtotime($h));
            $minutos = date("i", strtotime($h));
            $segundos = date("s", strtotime($h));

            $hora_p = $hour;
            $horas_p = date("H", strtotime($hora_p));
            $minutos_p = date("i", strtotime($hora_p));
            $segundos_p = date("s", strtotime($hora_p));


            if ((floatval($horas) - floatval($horas_p)) == 0 && (floatval($minutos) - floatval($minutos_p)) == 0) {
                $cadena = 'Hoy hace ' . (floatval($segundos) - floatval($segundos_p)) . ' Segundos';
            } else {
                if ((floatval($horas) - floatval($horas_p)) == 0) {
                   if((floatval($minutos) - floatval($minutos_p))>1){
                         $cadena = 'Hoy hace ' . (floatval($minutos) - floatval($minutos_p)) . ' Minutos';
                    } else {
                      $cadena = 'Hoy hace ' . (floatval($minutos) - floatval($minutos_p)) . ' Minuto';   
                    }
                } else {
                    if ((floatval($horas) - floatval($hora_p)) > 1) {
                        $cadena = 'Hoy hace ' . ((floatval($horas) - floatval($hora_p))) . ' Horas';
                    } else {
                        $cadena = 'Hoy hace ' . ((floatval($horas) - floatval($hora_p))) . ' Hora';
                    }
                }
            }
        } else {
            switch ($dias) {
                case 1:
                    $cadena = 'Ayer a las ' . $hour;
                    break;
                case 2:
                    $cadena = 'El ' . $this->saber_dia($fecha_i) . " a las " . $hour;
                    break;
                case 3:
                    $cadena = 'El ' . $this->saber_dia($fecha_i) . " a las " . $hour;
                    break;
                case 4:
                    $cadena = 'El ' . $this->saber_dia($fecha_i) . " a las " . $hour;
                    break;
                case 5:
                    $cadena = 'El ' . $this->saber_dia($fecha_i) . " a las " . $hour;
                    break;
                case 6:
                    $cadena = 'El ' . $this->saber_dia($fecha_i) . " a las " . $hour;
                    break;
                case 7:
                    $cadena = 'Hace una semana a las ' . $hour;
                    break;
                default :
                    $cadena = 'Hace ' . $dias . ' días';
                    break;
            }
        }

        return $cadena;
    }

    function calcular_comentario($fecha_i, $fecha_f, $hour) {
        date_default_timezone_set("America/Mexico_City");
        $dias = (strtotime($fecha_i) - strtotime($fecha_f)) / 86400;
        $dias = abs($dias);
        $dias = floor($dias);
        $cadena = '';

        if ($dias == 0) {
            $h = date("H:i:s");
            $horas = date("H", strtotime($h));
            $minutos = date("i", strtotime($h));
            $segundos = date("s", strtotime($h));

            $hora_p = $hour;
            $horas_p = date("H", strtotime($hora_p));
            $minutos_p = date("i", strtotime($hora_p));
            $segundos_p = date("s", strtotime($hora_p));


            if (($horas - $horas_p) == 0 && ($minutos - $minutos_p) == 0) {
                $cadena = 'Hoy hace ' . ($segundos - $segundos_p) . ' Segundos';
            } else {
                if (($horas - $horas_p) == 0) {
                    if (($minutos - $minutos_p) > 1) {
                        $cadena = 'Hoy hace ' . ($minutos - $minutos_p) . ' Minutos';
                    } else {
                        $cadena = 'Hoy hace ' . ($minutos - $minutos_p) . ' Minuto';
                    }
                } else {
                    if (($horas - $hora_p) > 1) {
                        $cadena = 'Hoy hace ' . ($horas - $hora_p) . ' Horas';
                    } else {
                        $cadena = 'Hoy hace ' . ($horas - $hora_p) . ' Hora';
                    }
                }
            }
        } else {
            switch ($dias) {
                case 1:
                    $cadena = 'Ayer a las ' . $hour;
                    break;
                case 2:
                    $cadena = 'El ' . $this->saber_dia($fecha_i) . " a las " . $hour;
                    break;
                case 3:
                    $cadena = 'El ' . $this->saber_dia($fecha_i) . " a las " . $hour;
                    break;
                case 4:
                    $cadena = 'El ' . $this->saber_dia($fecha_i) . " a las " . $hour;
                    break;
                case 5:
                    $cadena = 'El ' . $this->saber_dia($fecha_i) . " a las " . $hour;
                    break;
                case 6:
                    $cadena = 'El ' . $this->saber_dia($fecha_i) . " a las " . $hour;
                    break;
                case 7:
                    $cadena = 'Hace una semana a las ' . $hour;
                    break;
                default :
                    $cadena = 'Hace ' . $dias . ' días';
                    break;
            }
        }

        return $cadena;
    }

    function saber_dia($nombredia) {
        $dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
        $fecha = $dias[date('N', strtotime($nombredia))];
        return $fecha;
    }

}
