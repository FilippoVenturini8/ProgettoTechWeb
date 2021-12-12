<div class="row my-3">
    <h1>
        <spam class="mx-5 border-bottom border-danger">
            Popolari
        </spam>
    </h1>
</div>

<!--carosello-->

<div id="carouselExampleControls" class="carousel slide mx-auto" data-bs-ride="carousel" style="width: 300px;">
    <div class="carousel-inner w-100">
        <?php $i=0; foreach($templateParams["popularsDisks"] as $popularDisk) :?>
            <div class="carousel-item <?php if($i==0){ echo "active";}?> w-100">
                <a href="../../php/common/category.php?nomeCategoria=Popolari&CodiceDisco=<?php echo $popularDisk["Codice"];?>">
                    <img src="<?php echo UPLOAD_DIR.$popularDisk["Copertina"]?>" class="d-block w-100" alt="...">
                </a>
                <div class="carousel-caption">
                    <h5><?php echo $popularDisk["Titolo"]?> - <?php echo $popularDisk["Artista"];?></h5>
                </div>
            </div>
        <?php $i=$i+1; endforeach; ?>
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

<div class="row mt-4 mb-3">
    <h1>
        <spam class="mx-5 border-bottom border-danger">
            Categorie
        </spam>
    </h1>
</div>

<!--categorie-->
<div class="row" >
    <?php foreach($templateParams["categories"] as $category) : ?>
        <div class="col-6 col-md-4 col-lg-3">
        <div class="d-flex justify-content-center mt-3 mb-0">
            <a href="../../php/common/category.php?nomeCategoria=<?php echo $category["Nome"];?>">
                <img class="pb-1 border-bottom border-danger" src="<?php echo UPLOAD_DIR.$category["Copertina"];?>" alt="" style="width: 200px;"/>
            </a>
        </div>
        <p class="text-center fw-bold"><?php echo $category["Nome"]?></p>
    </div>
    <?php endforeach; ?>
</div>