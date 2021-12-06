<div class="row">
    <div class="col-1"></div>
    <h1 class="col-11">
        Popolari
    </h1>
</div>

<!--carosello-->

<div id="carouselExampleControls" class="carousel slide mx-auto" data-bs-ride="carousel" style="width: 300px;">
    <div class="carousel-inner w-100">
        <div class="carousel-item active w-100">
            <img src="../../img/LP/raggae/Legend-BobMarley.png" class="d-block w-100" alt="...">
            <div class="carousel-caption">
                <h5>Legend - Bob Marley</h5>
            </div>
        </div>
        <div class="carousel-item w-100">
            <img src="../../img/LP/rock/HighwayToHell-ACDC.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
                <h5>Highway To Hell - ACDC</h5>
            </div>
        </div>
        <div class="carousel-item w-100">
            <img src="../../img/LP/rap/NothingWasTheSame-Drake.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
                <h5>Nothing Was The Same - Drake</h5>
            </div>
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
</div>

<div class="row">
    <div class="col-1"></div>
    <h1 class="col-11">
        Categorie
    </h1>
</div>
<!--categorie-->
<div class="row" >
    <?php foreach($templateParams["categories"] as $category) : ?>
        <div class="col-6 col-md-4">
        <div class="d-flex justify-content-center py-3">
            <a href="../../php/common/category.php?nomeCategoria=<?php echo $category["Nome"];?>">
                <img src="<?php echo UPLOAD_DIR.$category["Copertina"];?>" alt="" style="width: 200px;"/>
            </a>
        </div>
        <p class="text-center"><?php echo $category["Nome"]?></p>
    </div>
    <?php endforeach; ?>
</div>