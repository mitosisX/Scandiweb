<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Scandiweb</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <link rel="stylesheet" href="css/style.css"/>
  <?php
		include_once 'api/core/starter/ClassInvoker.php';

		$db_con = new Database();

		$columns = $db_con->getQuery(true);
		$products = new ShopProductWriter($columns);

		$products_data = $products->getProducts();
	?>
</head>
<body>

	<div id="app">
		<div class="container">
			<div class="col-md-12" style="border-bottom: 2px solid black;">
			    <div class="text-right" style="height: 58px;padding: 0px;margin-top: 10px;">
			    	<h2 style="float:left;">Product List</h2>
			    	<a class="btn btn-primary" href="./add-product" role="button" style="margin-right: 6px;">ADD</a>
			    	<button id="mass-delete" class="btn btn-danger" type="button">MASS DELETE</button>
			    </div>
				</div>

			<div class="row">
				<?php
					foreach($products_data as $data):
						$id = $data['ID'];
						$sku = $data['SKU'];
						$name = $data['Name'];
						$price = $data['Price'];
						$attributes = $data['Attributes'];
						?>
				<div class="col-lg-3 col-md-4 col-7">
					<div class="box">
						<input class="delete-checkbox" type="checkbox" data-id="<?= $id; ?>"/>
						<h6><?= $sku; ?></h6>
						<h6><?= $name; ?></h6>
						<h6><?= $price; ?> $</h6>
						<h6><?= $attributes; ?></h6>
					</div>
				</div>
				<?php
					endforeach?>
			</div>
			<footer>
				<p>Scandidweb Test Assignment</p>
			</footer>
		</div>
	</div>
	<script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/app.js"></script>
</body>
</html>
