<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/style.css">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            background: #fbffcc;
            font-family: 'Roboto', sans-serif;
        }

        .alert {
            margin-bottom: 15px;
            padding: 20px 30px;
            color: #fff;
            text-align: center;
            border-radius: 15px;
            -webkit-border-radius: 15px;
            -moz-border-radius: 15px;
            -ms-border-radius: 15px;
            -o-border-radius: 15px;
        }

        .alert.success {
            background: #8ec006;
        }

        .alert.danger {
            background: #e55961;
        }

        form {
            position: relative;
            background: #fff;
            padding: 30px;
            margin-bottom: 100px;
            border-radius: 6px;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            -ms-border-radius: 6px;
            -o-border-radius: 6px;
        }

        form h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        textarea {
            min-height: 75px;
            resize: none;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .input-group label {
            margin-bottom: 5px;
        }

        .input-group input,
        .input-group textarea {
            padding: 7px;
            outline: none;
            border: 1px solid #ccc;
            box-shadow: 0 0 0 0 #fff;
            border-radius: 5px;
            transition: 0.2s box-shadow ease;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            -webkit-transition: 0.2s box-shadow ease;
            -moz-transition: 0.2s box-shadow ease;
            -ms-transition: 0.2s box-shadow ease;
            -o-transition: 0.2s box-shadow ease;
        }

        .input-group input:focus,
        .input-group textarea:focus {
            box-shadow: 0 0 0 3px rgba(80, 155, 254, 0.25);
        }

        .button-container {
            display: flex;
            justify-content: center;
        }

        .button-container button {
            border: none;
            outline: none;
            padding: 8px 20px;
            background: #7392fe;
            color: #fff;
            border-radius: 3px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s all ease;
            -webkit-transition: 0.3s all ease;
            -moz-transition: 0.3s all ease;
            -ms-transition: 0.3s all ease;
            -o-transition: 0.3s all ease;
        }

        .button-container button:hover {
            background: #577bfb;
        }

        .button-container button:focus {
            box-shadow: 0 0 0 3px rgba(80, 155, 254, 0.25);
        }

        form::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            background: #b2d9f7;
            display: inline-block;
            width: 100%;
            height: 10px;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }

        form .contact-info {
            position: absolute;
            top: 96%;
            left: 50%;
            display: flex;
            width: calc(100%);
            font-size: 13px;
            background: #b2d9f7;
            color: #000;
            border-radius: 3px;
            transform: translateX(-50%);
            -webkit-transform: translateX(-50%);
            -moz-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            -o-transform: translateX(-50%);
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            -ms-border-radius: 3px;
            -o-border-radius: 3px;
        }

        form .contact-info .info {
            display: flex;
            align-items: center;
            width: 50%;
            padding: 30px;
        }

        form,
        .alert {
            min-width: 80%;
        }

        @media (min-width: 450px) {

            form,
            .alert {
                min-width: 370px
            }

        }
    </style>
</head>

<body>
    <div>
        <div class="container">
            <?php if (session('mensaje')) : ?>
                <div class="alert alert-danger" role="alert">
                    <strong><?php echo session('mensaje') ?></strong>
                <?php endif ?>
                </div>
        </div>

            <form action="<?= site_url('/guardar') ?>" method="post">

                <div class="input-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre">
                </div>

                <div class="input-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido">
                </div>

                <div class="input-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="number" name="telefono" id="telefono">
                </div>

                <div class="input-group">
                    <label for="correo">Correo:</label>
                    <input type="correo" name="correo" id="correo">
                </div>

                <div hidden class="input-group">
                    <label for="type"></label>
                    <input type="text" name="type" id="type">
                </div>

                <div class="input-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" name="usuario" id="usuario">
                </div>

                <div class="input-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="">
                    <button class="btn btn-primary" type="submit" name="g" value="guardar">GUARDAR</button>
                    <a href="<?= base_url(''); ?>" class="btn btn-info">Cancelar</a>
                </div>



                <div class="contact-info">

                    <div class="info">
                        <span><i class="fas fa-map-marker-alt"></i> Avenida 6N <br>No. 28N - 102. <br>Cali - Valle</span>
                    </div>

                    <div class="info">
                        <span><i class="fas fa-phone"></i> +57 602 6652828</span>
                    </div>

                </div>
            
    </form>
        <script src="https://kit.fontawesome.com/bbff992efd.js" crossorigin="anonymous"></script>

</body>

</html>