<?php
include('controlador/controlador_noticias.php');
$controlador = new controladornoticias();
$noticias = $controlador->cargarNoticias();

date_default_timezone_set("America/Mexico_City");
$fecha = date("Y") . "-" . date("m") . "-" . date("d");
?>

<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<?php include 'head.php'; ?>
<body>
<?php include 'header.php'; ?>

<!-- Modal -->

<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="    overflow: hidden;
    border-radius: 8px;
    background-color: #d0ecea;
    margin: auto;
    padding: 32px 20px 20px;
    position: relative;">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Captura los datos del curso que desea impartir</h4>
                            <form class="floating-labels white-box" enctype="multipart/form-data"
                                  id="form_solCurso">
                                <input type="hidden" id="accionPOST" name="accionPOST" value="1"/>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Título de la noticia</label>
                                                <input type="text" class="form-control" placeholder="Título*"
                                                       id="titulo" name="titulo" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Agrega la nota</label>
                                                <textarea class="form-control" name="txtnota" id="txtnota"
                                                          rows="3"
                                                          style="margin-top: 0px; margin-bottom: 0px; height: 93px;"
                                                          required></textarea>

                                            </div>
                                        </div>
                                        <input type="hidden" name="fechaRegis" id="fechaRegis"
                                               value="<?php echo $fecha; ?>"
                                               max="<?php echo $fecha; ?>" class="form-control" placeholder="">

                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-info" onclick="registrarSoliCurso()"
                                                value="GUARDAR" id="botonSolCur">Enviar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Fin modal -->


<?php include 'footer.php'; ?>

<?php include 'recursos_js.php'; ?>

</body>
</html>
