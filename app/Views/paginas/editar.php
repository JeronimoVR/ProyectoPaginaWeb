<?= $cabecera ?>
<section>
    <div class="container m-8 mt-4 mb-8">
        <?php if (session('mensaje')) : ?>
            <div class="alert <?= session('mensaje.type') ?> text-center" role="alert">
                <strong><?php echo session('mensaje.body') ?></strong>
            </div>
        <?php endif ?>

        <div class="row mb-8">

            <div class="card text-black bg-light col-sm-4 col-lg-4">
                <figure>
                    <img src="https://affinitaslegal.com/wp-content/uploads/2020/08/imagen-perfil-sin-foto.jpg" class="rounded-circle img-fluid" alt="image-perfil">
                </figure>
                <div class="card-body">
                    <h4 class="card-title text-center text-capitalize"><?= $personas['nombre'] ?> <?= $personas['apellido'] ?></h4>
                    <hr>
                    <h6 class="card-title text-center text-capitalize"><?= $personas['type'] ?></h6>
                </div>
            </div>

            <div class="card col-sm-6 col-lg-8">
                <div class="card-body">
                    <h4 class="card-title">Editar cuenta</h4>
                    <p class="card-text">

                    <form method="POST" action="<?= site_url('actualizar') ?>" enctype="multipart/form-data">

                        <input type="hidden" name="id" value="<?= $personas['id'] ?>">

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" value="<?= $personas['nombre'] ?>" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" value="<?= $personas['apellido'] ?>" name="apellido" id="apellido" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" value="<?= $personas['telefono'] ?>" name="telefono" id="telefono" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="text" value="<?= $personas['correo'] ?>" name="correo" id="correo" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" value="<?= $personas['usuario'] ?>" name="usuario" id="usuario" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <?php if (session('type') == 'superAdministrador') : ?>
                            <div class="mb-3">
                                <label for="type" class="form-label">Tipo de usuario</label>

                                <?php if ($personas['type'] == 'usuario') : ?>
                                    <select name="type" id="type" class="form-control">
                                        <option class="form-control" value="usuario">Usuario</option>
                                        <option class="form-control" value="administrador">Administrador</option>
                                    </select>
                                <?php endif ?>

                                <?php if ($personas['type'] == 'administrador') : ?>
                                    <select name="type" id="type" class="form-control">
                                        <option class="form-control" value="administrador">Administrador</option>
                                        <option class="form-control" value="usuario">Usuario</option>
                                    </select>
                                <?php endif ?>

                            </div>

                        <?php endif ?>
                        <?php if (session('type') == 'superAdministrador') : ?>
                            <div class="row center">
                                <div class="col-3 "></div>
                                <div class="col-6 ">
                                    <button type="submit" class="btn btn-success me-4 mt-3">ACTUALIZAR</button>
                                    <?php if ($personas['type'] == 'usuario') : ?>
                                        <a href="<?= base_url('/listarU'); ?>" class="btn btn-info mt-3">REGRESAR</a>
                                    <?php else : ?>
                                        <a href="<?= base_url('/listarA'); ?>" class="btn btn-info mt-3">REGRESAR</a>
                                    <?php endif ?>
                                </div>
                                <div class="col-3 "></div>
                            <?php else : ?> <td>
                                    <div class="row center">

                                        <div class="col-6 ">
                                            <?php if ($personas['type'] == 'usuario') : ?>
                                                <a href="<?= base_url('/listarU'); ?>" class="btn btn-info mt-3">REGRESAR</a>
                                            <?php else : ?>
                                                <a href="<?= base_url('/listarA'); ?>" class="btn btn-info mt-3">REGRESAR</a>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-3 "></div>
                                    <?php endif ?>

                    </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
</section>
<?= $pie ?>