<?php

$sql ="SELECT * FROM orders
WHERE account = '{$_SESSION['account']}'";

$result = $conn->query($sql);
	if ($result->num_rows > 0) 
		{
		// output data of each row
		while($row = $result->fetch_assoc()) 
			{?>
			
				<div class="container">
				  <div class="row">
					<div class="col-lg-3 col-md-6 col-md-offset-3 col-lg-offset-0">
					  <div class="well">
						<h3 class="text-center">訂單資訊</h3>
						<form class="form-horizontal">
						  <div class="form-group">
							<label for="" class="control-label">訂單#<?php echo $row["id"];?></label>
							<div class="input-group">
							  <div class="input-group-addon">狀態</div>
							  <input type="text" class="form-control" id="" name="" placeholder="<?php echo $row["status"]; ?>" disabled>
							</div>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">購買人</label>
							<div class="input-group">
							  <div class="input-group-addon">姓名</div>
							  <input type="text" class="form-control" id="" name="buyer" placeholder="<?php echo $row["buyer_name"]; ?>" disabled>
							</div>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">電子信箱</label>
							<div class="input-group">
							  <div class="input-group-addon">E-mail</div>
							  <input type="text" class="form-control" id="" name="mail" placeholder="<?php echo $row["buyer_email"] ?>" disabled>
							</div>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">連絡電話</label>
							<div class="input-group">
							  <div class="input-group-addon">手機</div>
							  <input type="text" class="form-control" id="" name="phone" placeholder="<?php echo $row["buyer_phone"] ?>" disabled>
							</div>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">付款取貨方式(運費120)</label>
							<select class="form-control" name="payment" id="" disabled>
							  <option value="<?php $row["payment"] ?>"><?php echo $row["payment"]; ?></option>
							</select>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">配送地點</label>
							<div class="input-group">
							  <div class="input-group-addon">地址/店名</div>
							  <input type="text" class="form-control" id="" name="location" placeholder="<?php echo $row["location"] ?>" disabled>
							</div>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">含運總價:<?php echo $row["price"]; ?></label>
						  </div>
						  <div class="form-group">
							<label for="" class="control-label">其他事項</label>
							<div class="input-group">
							  <div class="input-group-addon">備註</div>
							  <input type="text" class="form-control" id="" name="notice" value="<?php echo $row["notice"] ?>" disabled>
							</div>
						  </div>
						</form>
					  </div>
					 </div>
					 
					<div class="col-lg-9 col-md-12">
						<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
											  <div class="thumbnail"> <img src="<?php echo $row["shirt_image"]; ?>" alt="Thumbnail Image 1" class="img-responsive" width="400px" height="200px">
												<div class="caption"><br>
												  <h3>球衣(每件400)</h3><br>
												  <form action="index.php?action=orders" method="post">
												  <label for="" class="control-label">S:身高150cm~160cm的數量</label><br>
												  <input type="number" name="cloth_S_amount" required min="0" max="100" value="<?php echo $row["shirt_s_number"] ;?>" class="form-control" disabled><br><br><br>
												  <br><br>
												  <label for="" class="control-label">M:身高161cm~171cm的數量</label><br>
												  <input type="number" name="cloth_M_amount" required min="0" max="100" value="<?php echo $row["shirt_m_number"]; ?>" class="form-control" disabled><br><br><br>
												  <br><br>
												  <label for="" class="control-label">L:身高172cm~185cm的數量</label><br>
												  <input type="number" name="cloth_L_amount" required min="0" max="100" value="<?php echo $row["shirt_l_number"]; ?>" class="form-control" disabled><br>
												  <br>
											  </div> 
												</div>
											  </div>
													<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
											  <div class="thumbnail"> <img src="<?php echo $row["short_image"]; ?>" alt="Thumbnail Image 1" class="img-responsive" width="400px" height="200px">
												<div class="caption"><br>
												  <h3>褲子(每件400)</h3><br>
												  
												  <label for="" class="control-label">S:腰圍24吋-27吋的數量</label><br>
												  <input type="number" name="short_S_amount" required min="0" max="100" value="<?php echo $row["short_s_number"]; ?>" class="form-control" disabled><br><br><br><br><br>
												  <label for="" class="control-label">M:腰圍28吋~31吋的數量</label><br>
												  <input type="number" name="short_M_amount" required min="0" max="100" value="<?php echo $row["short_m_number"]; ?>" class="form-control" disabled><br><br><br><br><br>
												  <label for="" class="control-label">L:腰圍32吋~35吋的數量</label><br>
												  <input type="number" name="short_L_amount" required min="0" max="100" value="<?php echo $row["short_l_number"]; ?>" class="form-control" disabled><br><br>
												</div>
											  </div>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 hidden-sm hidden-xs">
											  <div class="thumbnail"> <img src="<?php echo $row["shoes_image"]; ?>" alt="Thumbnail Image 1" class="img-responsive" width="400px" height="200px">
												<div class="caption"><br>
												  <h3>球鞋(每雙1500)</h3><br>
												  <label for="" class="control-label">23:腳長23cm的數量(雙)</label><br>
												  <input type="number" name="shoes_23_amount" required min="0" max="100" value="<?php echo $row["shoes_23_number"]; ?>" class="form-control" disabled><br>
												  <label for="" class="control-label">24:腳長24cm的數量(雙)</label><br>
												  <input type="number" name="shoes_24_amount" required min="0" max="100" value="<?php echo $row["shoes_24_number"]; ?>" class="form-control" disabled><br>
												  <label for="" class="control-label">25:腳長25cm的數量(雙)</label><br>
												  <input type="number" name="shoes_25_amount" required min="0" max="100" value="<?php echo $row["shoes_25_number"]; ?>" class="form-control" disabled><br>
												  <label for="" class="control-label">26:腳長26cm的數量(雙)</label><br>
												  <input type="number" name="shoes_26_amount" required min="0" max="100" value="<?php echo $row["shoes_26_number"]; ?>" class="form-control" disabled><br>
												  <label for="" class="control-label">27:腳長27cm的數量(雙)</label><br>
												  <input type="number" name="shoes_27_amount" required min="0" max="100" value="<?php echo $row["shoes_27_number"]; ?>" class="form-control" disabled><br><br>
												</div>
											  </div>
											</div>
					  </div>

					</div>
					</div>
				</div>

			<br>
			<hr>
			<br>
			;
			
			<?php
			}
			
		} 
	else 
		{
		echo '<html><h3>hi,<br>您尚未有任何訂單</h3></html>';
		}

$conn->close();
?>