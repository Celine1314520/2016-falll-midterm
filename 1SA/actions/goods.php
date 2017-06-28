<?php if (isset ($myuser)) : ?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs">
        <div id="carousel-299058" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#carousel-299058" data-slide-to="0" class=""> </li>
            <li data-target="#carousel-299058" data-slide-to="1" class="active"> </li>
            <li data-target="#carousel-299058" data-slide-to="2" class=""> </li>
          </ol>
          <div class="carousel-inner">
            <div class="item"> <img class="img-responsive" src="img/4066457.jpg" alt="thumb">
              <div class="carousel-caption"> A3O1獨家優惠 </div>
            </div>
            <div class="item active"> <img class="img-responsive" src="img/subscribe_optin_topzone_curryone_sansdrama_010815-1280x604.jpg" alt="thumb">
              <div class="carousel-caption">A3O1獨家授權 </div>
            </div>
            <div class="item"> <img class="img-responsive" src="img/3.PNG" alt="thumb">
              <div class="carousel-caption"> A3O1最強訂製 </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel-299058" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel-299058" data-slide="next"><span class="icon-next"></span></a></div>
      </div>
    </div>
    <hr>
  </div>
  
<div class="container">
<div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="thumbnail"> <img 
		  <?php if ($_SESSION['i']==0): {?> src="http://i.imgur.com/58NZ5ef.jpg" <?php ;} ?>
			<?php elseif ($_SESSION['i']==1):{ ?> src="http://i.imgur.com/x0DCClK.jpg" <?php } ?>
			<?php elseif ($_SESSION['i']==2):{ ?> src="http://i.imgur.com/SmQKj2d.jpg" <?php } ?>
			<?php elseif ($_SESSION['i']==3):{ ?> src="http://i.imgur.com/zevlbMU.jpg" <?php } ?>
			<?php elseif ($_SESSION['i']==4):{ ?> src="http://i.imgur.com/vZyZPPu.jpg" <?php } ?>
			<?php endif; ?>
		  alt="Thumbnail Image 1" class="img-responsive" width="400px" height="200px">
            <div class="caption">
              <h3>球衣(每件400)</h3><br>
              <form action="index.php?action=orders" method="post">
              <label for="" class="control-label">S:身高150cm~160cm的數量</label><br>
              <input type="number" name="cloth_S_amount" required min="0" max="100" value="0" class="form-control"><br><br><br>
              <br>
              <label for="" class="control-label">M:身高161cm~171cm的數量</label><br>
              <input type="number" name="cloth_M_amount" required min="0" max="100" value="0" class="form-control"><br><br><br>
              <br>
              <label for="" class="control-label">L:身高172cm~185cm的數量</label><br>
              <input type="number" name="cloth_L_amount" required min="0" max="100" value="0" class="form-control"><br>
              <br>
          </div> 
            </div>
          </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
          <div class="thumbnail"> <img src="http://i.imgur.com/aSJXnm3.jpg" alt="Thumbnail Image 1" class="img-responsive" width="400px" height="200px">
            <div class="caption">
              <h3>褲子(每件400)</h3><br>
              
              <label for="" class="control-label">S:腰圍24吋-27吋的數量</label><br>
              <input type="number" name="short_S_amount" required min="0" max="100" value="0" class="form-control"><br><br><br><br>
              <label for="" class="control-label">M:腰圍28吋~31吋的數量</label><br>
              <input type="number" name="short_M_amount" required min="0" max="100" value="0" class="form-control"><br><br><br><br>
              <label for="" class="control-label">L:腰圍32吋~35吋的數量</label><br>
              <input type="number" name="short_L_amount" required min="0" max="100" value="0" class="form-control"><br><br>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 hidden-sm hidden-xs">
          <div class="thumbnail"> <img src="http://i.imgur.com/BYnHuqY.jpg" alt="Thumbnail Image 1" class="img-responsive" width="400px" height="200px">
            <div class="caption">
              <h3>球鞋(每雙1500)</h3>
              <label for="" class="control-label">23:腳長23cm的數量(雙)</label><br>
              <input type="number" name="shoes_23_amount" required min="0" max="100" value="0" class="form-control"><br>
              <label for="" class="control-label">24:腳長24cm的數量(雙)</label><br>
              <input type="number" name="shoes_24_amount" required min="0" max="100" value="0" class="form-control"><br>
              <label for="" class="control-label">25:腳長25cm的數量(雙)</label><br>
              <input type="number" name="shoes_25_amount" required min="0" max="100" value="0" class="form-control"><br>
              <label for="" class="control-label">26:腳長26cm的數量(雙)</label><br>
              <input type="number" name="shoes_26_amount" required min="0" max="100" value="0" class="form-control"><br>
              <label for="" class="control-label">27:腳長27cm的數量(雙)</label><br>
              <input type="number" name="shoes_27_amount" required min="0" max="100" value="0" class="form-control"><br>
            </div>
          </div>
        </div>
      </div>
 <section>
  <div class="container">
    <div class="row">
              <p class="text-center"><input type="submit" class="btn btn-primary btn-success"></p></form>
              <hr>
        </div>
      </div>
</section>
</div>
<?php else:{?>
<br><br><br><h2>請先登入!</h2><br><br><br>
<?php ;}endif; ?>