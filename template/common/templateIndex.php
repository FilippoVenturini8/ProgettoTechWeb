<div class="row my-3">
    <h1>
        <span class="mx-5 border-bottom border-danger border-2 py-1">
            Popolari
        </span>
    </h1>
</div>

<!--carosello-->
<div id="carouselExampleControls" class="carousel slide mx-auto" data-bs-ride="carousel" style="width: 300px;">
    <div class="carousel-inner w-100">
        <?php $i=0; foreach($templateParams["popularsDisks"] as $popularDisk) :?>
            <div class="carousel-item <?php if($i==0){ echo "active";}?> w-100">
                <a href="../../php/common/category.php?nomeCategoria=Popolari&CodiceDisco=<?php echo $popularDisk["Codice"];?>#<?php echo $popularDisk['Codice']?>">
                    <img src="<?php echo UPLOAD_DIR.$popularDisk["Copertina"]?>" class="d-block w-100" alt="...">
                </a>
                <div class="carousel-caption">
                    <p class="fw-bold"><?php echo $popularDisk["Titolo"]?> - <?php echo $popularDisk["Artista"];?></p>
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

<div class="row mt-5 mb-2">
    <h1>
        <span class="mx-5 border-bottom border-danger border-2 py-1">
            Categorie
        </span>
    </h1>
</div>

<!--categorie-->
<div class="row" >
    <?php foreach($templateParams["categories"] as $category) : ?>
        <div class="col-6 col-md-4 col-lg-3 mt-5">
        <div class="d-flex justify-content-center mt-3 mb-0">
            <a href="../../php/common/category.php?nomeCategoria=<?php echo $category["Nome"];?>">
                <img class="" src="<?php echo UPLOAD_DIR.$category["Copertina"];?>" alt="" style="width: 200px;"/>
            </a>
        </div>
        <div class= "row">
            <div class="col-2"></div>
            <div class="col-8 text-center">
                <span class="badge rounded-pill px-3" style="background-color:#d9534f !important; width:150px;"><?php echo $category["Nome"]?></span>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    <?php endforeach; ?>
</div>