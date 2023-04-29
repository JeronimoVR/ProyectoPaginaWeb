<?= $cabecera ?>
<section>
    <div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-pause=“true”>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://assets.unileversolutions.com/recipes-v2/109068.jpg?imwidth=700" class="d-block w-100" alt="carne">
            </div>
            <div class="carousel-item">
                <img src="https://assets.unileversolutions.com/recipes-v2/165292.jpg?imwidth=2000" class="d-block w-100" alt="ensalada">
            </div>
            <div class="carousel-item">
                <img src="https://assets.unileversolutions.com/recipes-v2/210670.jpg?imwidth=2000" class="d-block w-100" alt="crema de mariscos">
            </div>
            <div class="carousel-item">
                <img src="https://assets.unileversolutions.com/recipes-v2/210690.jpg?imwidth=2000" class="d-block w-100" alt="sopa">
            </div>
        </div>

        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> -->
        <div class="overlay carousel-caption">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 offset-md-6">
                        <h1>Disfruta preparando tus propias recetas</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="articles" class="mt-4 mb-4 ms-5 ml-5">
    <div class="fluid-container">

        <div class="row">
            <div class="col text-center text-uppercase">
                <small>Conoce un poco más</small>
                <h2>Articulos</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 mb-4">
                <div class="card">
                    <img src="https://marketingastronomico.com/wp-content/uploads/2017/09/Airbnb-Restaurant-Reservations-Kin-Khao.jpg" class="card-img-top img-fluid" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">¿Por qué cocinar?</h5>
                        <p class="card-text">
                            Cocinar es una actividad que trae muchos beneficios económicos, sociales, terapéuticos y para la salud. Sin embargo, algunos piensan que se trata de una tarea complicada. Sin embargo, no tiene por qué ser así.
                            <br>
                            <br>
                            Asi mismo, cocinar es una actividad que permite unir e involucrar a la familia en torno a la cocina y a la mesa, preparar platos diversos y balanceados y aprovechar el tiempo libre en una actividad provechosa. La gastronomía va más allá de comer; se trata de una actividad que tiene una historia y hace parte de la cultura.
                        </p>
                    </div>
                </div>
            </div>

            <div class=" col-12  mb-4 col-lg-6">
                <div class="card">
                    <img src="https://icocina.com.es/wp-content/uploads/2022/03/blog-intur-higiene2.jpg" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">Recuerda mantener la higiene</h5>
                        <p class="card-text">
                            La cocina debe ser una estancia limpia y ordenada puesto que allí se manipulan los alimentos. La falta de higiene puede crear focos de contaminación por lo que debe cuidarse su mantenimiento y limpieza.
                            <br> <br>
                            Una serie de consejos sobre higiene adecuada en la cocina así como en la manipulación y cocinado correcto de los alimentos pueden evitar en gran medida posibles intoxicaciones alimentarias
                        </p>
                        <ul>
                            <p>Algunos punto claves son:</p>
                            <li>Los animales no deberian de entrar en la cocina ya que comparten diversas bacterias, ademas de su pelaje que pueden entrar en los alimentos los cuales se estan prepearando </li>
                            <li>Se recomienda emplear un trapo o bayeta para cada uso y se deben lavar y escurrir después de utilizarlos</li>
                            <li>Se puede lavar con una solución de cloro especial para usar en la cocina (cuidando que el mismo luego no se mezcle con los alimentos) o con alguna solución comercial bactericida.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class=" col-12 col-md-6 lg-4">
                <div class="card">
                    <img src="https://www.elmueble.com/medio/2022/03/09/seguridad-en-casa-00485600_c4dd3c09_800x1200.jpg" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title">Mantén tus alimentos frescos</h5>
                        <p class="card-text">
                            Cada alimento tiene su tiempo de vida y cuando deja de estar fresco, empiezan a actuar los microorganismos, que se encargan de su deterioro y putrefacción. Para evitar esto, existen una serie de consejos para conservar los alimentos frescos en casa, algunos de ellos son:
                        </p>
                        <ul>
                            <li>Congela estos alimentos lo antes posible</li>
                            <li>Envasa al vacío o haz el vacío en las bolsas</li>
                            <li>Guarda los alimentos en bolsas o túpers</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
 
</section>
<?= $pie ?>