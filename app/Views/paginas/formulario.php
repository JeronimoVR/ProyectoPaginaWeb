<?= $cabecera ?>
<script src="path/to/chartjs/dist/chart.umd.js"></script>

<section id="articles" class="mt-4 mb-4 ms-4 ">
    <div class="container m-8 mt-4 mb-8">
        <?php if (session('mensaje')) : ?>
            <div class="alert <?= session('mensaje.type') ?> text-center" role="alert">
                <strong><?php echo session('mensaje.body') ?></strong>
            </div>
        <?php endif ?>

        <div class="fluid-container me-4">
            <h2>Encuesta de satisfacción</h2>
            <hr>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10 bg-light">
                    <form action="<?= site_url('/encuesta') ?>" method="get" class="m-4">
                        <div class="input-group">
                            <div class="m-2 ms-4 mb-3">
                                <legend class="m-2">¿Cómo calificaría su experiencia con este sitio web?</legend>
                                <input type="radio" class="ms-4" name="CalificacionExpe" value="Malo" id="Malo"><label for="Malo">Malo</label><br>
                                <input type="radio" class="ms-4" name="CalificacionExpe" value="Regular" id="Regular"><label for="Regular">Regular</label><br>
                                <input type="radio" class="ms-4" name="CalificacionExpe" value="Indiferente" id="Indiferente"><label for="Indiferente">Indiferente</label><br>
                                <input type="radio" class="ms-4" name="CalificacionExpe" value="Bueno" id="Bueno"><label for="Bueno">Bueno</label><br>
                                <input type="radio" class="ms-4" name="CalificacionExpe" value="Excelente" id="Excelente"><label for="Excelente">Excelente</label><br>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="m-2 ms-4 mb-3">
                                <legend class="m-2">¿Qué le falta a la página para mejorar?</legend>
                                <input type="radio" class="ms-4" name="ExperienciaPersonal" value="MejoresImagenes" id="MejoresImagenes"><label for="MejoresImagenes">Mejores imagenes</label><br>
                                <input type="radio" class="ms-4" name="ExperienciaPersonal" value="MejorContenido" id="MejorContenido"><label for="MejorContenido">Mejor contenido</label><br>
                                <input type="radio" class="ms-4" name="ExperienciaPersonal" value="MasDinamica" id="MasDinamica"><label for="MasDinamica">Que sea más dinamica</label><br>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="m-2 ms-4 mb-3">
                                <legend class="m-2">El tema proporcionado, ¿le parce util y de interes?</legend><br>
                                <input type="radio" class="ms-4" name="OpinionTema" value="si" id="si3"><label for="si3">Si</label><br>
                                <input type="radio" class="ms-4" name="OpinionTema" value="no" id="no3"><label for="no3">No</label><br>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="m-2 ms-4 mb-3">
                                <legend class="m-2">En general ¿cómo puntuaria este sitio web?</legend><br>
                                <input type="radio" class="ms-4" name="Puntuacion" value="1" id="1"><label for="1">⭐</label><br>
                                <input type="radio" class="ms-4" name="Puntuacion" value="2" id="2"><label for="2">⭐⭐</label><br>
                                <input type="radio" class="ms-4" name="Puntuacion" value="3" id="3"><label for="3">⭐⭐⭐</label><br>
                                <input type="radio" class="ms-4" name="Puntuacion" value="4" id="4"><label for="4">⭐⭐⭐⭐</label><br>
                                <input type="radio" class="ms-4" name="Puntuacion" value="5" id="5"><label for="5">⭐⭐⭐⭐⭐</label><br>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="m-2 ms-4 mb-3">
                                <legend class="m-2">¿Recomendaria esta página a un amigo?</legend><br>
                                <input type="radio" class="ms-4" name="Recomendacion" value="si" id="si5"><label for="si5">Si</label><br>
                                <input type="radio" class="ms-4" name="Recomendacion" value="no" id="no5"><label for="no5">No</label><br>
                            </div>

                        </div>

                        <div class="row m-4">
                            <button class="btn btn-primary m-2" type="submit">ENVIAR</button>
                        </div>
                    </form>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
</section>

<?= $pie ?>