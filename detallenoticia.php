<?php
include('controlador/controlador_noticias.php');

$id = $_GET["idnoticia"];
$controlador = new controladornoticias();
$noticiasdeta = $controlador->cargarDetalleNoti($id);

date_default_timezone_set("America/Mexico_City");
$fecha = date("Y") . "-" . date("m") . "-" . date("d");

$hora = date('h:i:s');
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

<!-- END #fh5co-header -->
<div class="container-fluid">
    <div class="row fh5co-post-entry single-entry">
        <?php
        foreach ($noticiasdeta

        as $row) {
        ?>
        <article
                class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
            <figure class="animate-box">
                <img src="<?php echo $row[3] ?>" alt="Image" class="img-responsive">
            </figure>
            <span class="fh5co-meta animate-box">NOTICIAS</span>
            <h2 class="fh5co-article-title animate-box"><?php echo $row[1] ?>
            </h2>
            <span class="fh5co-meta fh5co-date animate-box"><?php echo $row[4] ?></span>

            <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
                <div class="row">
                    <div class="col-lg-8 cp-r animate-box">
                        <p><?php echo $row[2] ?></p>

                    </div>
                    <div class="col-lg-4 animate-box">
                        <div class="fh5co-highlight right">
                            <h4>Frase del día</h4>
                            <p>«No pares cuando estés cansado. Para cuando hayas terminado» —Marilyn Monroe</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </article>

    <?php }
    ?>


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
                                <h4 class="card-title text-center">COMENTAR</h4>
                                <form class="floating-labels white-box" enctype="multipart/form-data"
                                      id="form_comentario">
                                    <input type="hidden" id="accionPOST" name="accionPOST" value="2"/>
                                    <input type="hidden" id="id_noti" name="id_noti" value="<?php echo $id; ?>"/>

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Agrega el comentario</label>
                                                    <textarea class="form-control" name="txtnota" id="txtnota"
                                                              rows="3"
                                                              style="margin-top: 0px; margin-bottom: 0px; height: 93px;"
                                                              required></textarea>

                                                </div>
                                            </div>
                                            <input type="hidden" name="fechaRegis" id="fechaRegis"
                                                   value="<?php echo $fecha; ?>"
                                                   max="<?php echo $fecha; ?>" class="form-control" placeholder="">
                                            <input type="hidden" name="horaRegis" id="horaRegis"
                                                   value="<?php echo $hora; ?>"
                                                   max="<?php echo $hora; ?>" class="form-control" placeholder="">


                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info" onclick="registrarComent()"
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

    <div class="row fh5co-post-entry single-entry">

        <article>
            <div class="row">
                <div class="col-md-12 animate-box">
                    <h2>COMENTARIOS</h2>
                </div>
                <?php $curs = $controlador->impcomentario($id);
                foreach ($curs as $row) { ?>

                    <div class="col-md-4 animate-box">
                        <figure>

                            <figcaption><?php echo $row[1] ?>
                            </figcaption>
                            <p></p>
                            <button type='button' class='btn btn-secondary comentario' value='<?php echo $row[0] ?>'><i
                                        class='fas fa-upload'></i> Responder
                            </button>
                        </figure>

                        <?php $curs = $controlador->imprrespu($row[0]);
                        foreach ($curs as $row) { ?>
                            <figure>

                                <figcaption><?php echo $row[1] ?>
                                </figcaption>
                                <p></p>

                            </figure>
                        <?php } ?>


                    </div>

                <?php } ?>
            </div>

        </article>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="comentario" tabindex="-1" role="dialog" aria-labelledby="modalRegistroTitle"
     aria-hidden="true">
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
                                <h4 class="card-title text-center">COMENTAR</h4>
                                <form class="floating-labels white-box" enctype="multipart/form-data"
                                      id="form_comentarioresp">
                                    <input type="hidden" id="accionPOST" name="accionPOST" value="3"/>
                                    <input type="hidden" id="idcomentario" name="idcomentario" value="0"/>


                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Agrega el comentario</label>
                                                    <textarea class="form-control" name="txtnotares" id="txtnotares"
                                                              rows="3"
                                                              style="margin-top: 0px; margin-bottom: 0px; height: 93px;"
                                                              required></textarea>

                                                </div>
                                            </div>
                                            <input type="hidden" name="fechaRegisres" id="fechaRegisres"
                                                   value="<?php echo $fecha; ?>"
                                                   max="<?php echo $fecha; ?>" class="form-control" placeholder="">
                                            <input type="hidden" name="horaRegisres" id="horaRegisres"
                                                   value="<?php echo $hora; ?>"
                                                   max="<?php echo $hora; ?>" class="form-control" placeholder="">


                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info" onclick="responderComent()"
                                                    value="GUARDAR" id="btnrespo">Enviar
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
</div>
<!-- Fin modal -->


<?php include 'footer.php'; ?>

<?php include 'recursos_js.php'; ?>

</body>
</html>
