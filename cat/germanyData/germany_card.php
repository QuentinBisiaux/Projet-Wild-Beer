<?php

//$myArray = array_map('str_getcsv', file('germanyData/bdd.csv'));

$myConnector = new Connector();
$results = $myConnector->selectCat('germany');
$myConnector->close();

foreach ($results as $biere) {
?>

<div class="col-12 col-sm-6 col-md-4 col-lg-3 px-1 py-2">
  <div class="card p-1 tom-card-border">
    <div class="row m-0">
      <div class="col-sm-12  col-12 px-0 d-flex align-items-center">
        <img class="card-img-top " data-toggle="modal" data-target="#<?=substr($biere['imgName'], 0, -4)?>" src="../asset/img/thomas/<?=$biere['imgName']?>" alt="Card image">
      </div>
      <div class="card-body  col-sm-12  col-12 tom-card-bg text-white">
        <h4 class="card-title tom-card-text tom-caviar text-center  "><?=utf8_encode($biere['beerName'])?></h4>
        <p class="card-text tom-card-desc tom-caviar text-justify"><?=utf8_encode($biere['beerDesc'])?></p>
        <p class="tom-card-text font-weight-bold tom-caviar text-center"><?=$biere['beerPrice']?> €</p>
        <button type="button" name="button" class="btn tom-caviar tom-btn-bg btn-block  p-1"> Ajouter au Panier !</button>
      </div>
    </div>
  </div>
</div>

<div id="<?=substr($biere['imgName'], 0, -4)?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header tom-card-bg text-light">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
              <!-- TITRE DU POPUP  -->
              <h4 class="modal-title tom-card-text tom-caviar"><?=utf8_encode($biere['beerName'])?></h4>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
              <!--  BOUTON CROIX FERMETURE -->
              <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <!-- CORPS DU POP UP  -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12 d-none d-lg-block">
              <!--  IMAGE DANS LE POPUP -->
              <img class="card-img-top tom-image" src="../asset/img/thomas/<?=$biere['imgName']?>" alt="Card image">
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
              <div class="row">
                <table class="table table-borderless table-responsive">
                  <tr>
                    <td>
                      <table class="table table-borderless">
                        <!-- TABLEAU GOUT/SOIF  -->
                        <tr>
                          <td class="font-weight-bold tom-caviar">Gout</td>
                          <td class="font-weight-bold tom-caviar">Soif</td>
                          <td class="font-weight-bold tom-caviar">Amertume</td>
                        </tr>
                        <tr>
                          <td class="tom-caviar"><?=$biere['beerTaste']?></td>
                          <td class="tom-caviar"><?=$biere['beerThirsty']?></td>
                          <td class="tom-caviar"><?=$biere['beerBitterness']?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold tom-caviar">Alcool/volume</td>
                    <td class="tom-caviar"><?=$biere['beerAlcohol']?></td>
                  </tr>
                  <tr>
                    <td class="font-weight-bold tom-caviar">Fermentation</td>
                    <td class="tom-caviar"><?=$biere['beerFermentation']?></td>
                  </tr>
                </table>
              </div>
              <div class="row">
                <!-- BOUTON RESEAU SOCIAUX  -->
                  <a class="fa-lg p-2 m-2 li-ic "><i class="fab fa-linkedin-in "></i></a>
                  <a class="fa-lg p-2 m-2 tw-ic"><i class="fab fa-twitter "></i></a>
                  <!-- Dribbble -->
                  <a class="fa-lg p-2 m-2 fb-ic"><i class="fab fa-facebook-f"></i></a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <br><br>
              <table class="table">
                <!--TABLEAU PRIX   -->
                <tr>
                  <td class="font-weight-bold tom-caviar">Unité</td>
                  <td class="tom-caviar"><?=$biere['beerPrice']?> €</td>
                </tr>
                <tr>
                  <td class="font-weight-bold tom-caviar">Caisse (x6)</td>
                  <td class="tom-caviar"><?=$biere['sixPackPrice']?> €</td>
                </tr>
                <tr>
                  <td class="font-weight-bold tom-caviar">Fut</td>
                  <td class="tom-caviar"><?=$biere['kegPrice']?> €</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php ;} ?>