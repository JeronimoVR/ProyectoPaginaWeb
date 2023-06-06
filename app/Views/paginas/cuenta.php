<?= $cabecera ?>

<div class="container m-8 mt-4 mb-8">

    <?php if (session('mensaje')) : ?>
        <div class="alert <?= session('mensaje.type') ?> text-center" role="alert">
            <strong><?= session('mensaje.body') ?></strong>
        </div>
    <?php endif ?>

    <div class="row mb-8">

        <div class="card text-black bg-light col-sm-4 col-lg-4">
            <figure class="">
                <img src="https://affinitaslegal.com/wp-content/uploads/2020/08/imagen-perfil-sin-foto.jpg" class="rounded-circle img-fluid" alt="image-perfil">
            </figure>
            <div class="card-body">
                <h4 class="card-title text-center text-capitalize"><?= session('nombre') ?> <?= session('apellido') ?></h4>
                <hr>
                <h6 class="card-title text-center text-capitalize"><?= session('type') ?></h6>
            </div>
        </div>

        <div class="card col-sm-6 col-lg-8">
            <div class="card-body">
                <h4 class="card-title">Editar cuenta</h4>
                <p class="card-text">

                <form method="post" action="<?= site_url('/actualizarCuenta') ?>" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?= session('id') ?>">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" value="<?= session('nombre') ?>" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" value="<?= session('apellido') ?>" name="apellido" id="apellido" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" value="<?= session('telefono') ?>" name="telefono" id="telefono" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" value="<?= session('correo') ?>" name="correo" id="correo" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" value="<?= session('usuario') ?>" name="usuario" id="usuario" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>

                    <?php if (session('type') == 'superAdministrador') : ?>
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipo de usuario</label>
                            <input type="text" value="<?= session('type') ?>" name="type" id="type" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    <?php endif ?>
                    <div class="row center">
                        <div class="col-4 center"></div>
                        <div class="col-4 center">
                            <button type="submit" class="btn btn-success me-4 mt-3">ACTUALIZAR</button>
                        </div>
                        <div class="col-4 center"></div>
                    </div>

                </form>

                </p>
            </div>
        </div>
    </div>
</div>
<br>
<?= $pie ?>