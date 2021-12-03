<div class="row">
    <div class="col-1"></div>
    <h1 class="col-11">
        Popolari
    </h1>
</div>
<!--carosello-->
<div class="row">
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
                <img src="../../img/LP/rock/pinkfloyd.jpg" alt="" style="width: 200px;"/>
            </a>
        </div>
        <p class="text-center"><?php echo $category["Nome"]?></p>
    </div>
    <?php endforeach; ?>
</div>