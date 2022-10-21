<?php
include('controlador/controlador_noticias.php');
$controlador = new controladornoticias();
$noticias = $controlador->cargarNoticias();
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
    <div class="row fh5co-post-entry">
        <?php
        $cont = 0;
        foreach ($noticias as $row) {
            ?>
            <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                <figure>
                    <img src="<?php echo $row[3] ?>" alt="Image" class="img-responsive">
                </figure>
                <span class="fh5co-meta">NOTICIAS</span>
                <h2 class="fh5co-article-title"><a href="detallenoticia.php?idnoticia=<?php echo $row[0] ?>"><?php echo $row[1] ?></a></h2>
                <span class="fh5co-meta fh5co-date"><?php echo $row[4] ?></span>
                <a href="detallenoticia.php?idnoticia=<?php echo $row[0] ?>" class="btn btn-info btn-lg active" role="button" aria-pressed="true">VER</a>

            </article>

        <?php } ?>

        <div class="clearfix visible-xs-block"></div>
    </div>
</div>
<?php include 'footer.php'; ?>

<?php include 'recursos_js.php'; ?>

</body>
</html>

