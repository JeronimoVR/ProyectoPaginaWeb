<?= $cabecera ?>
<section>

    <div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-pause=“false”>
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
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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
<?= $pie ?>