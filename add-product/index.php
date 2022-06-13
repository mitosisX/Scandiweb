<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Scandiweb</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/style.css"/>
</head>
<body>

	<div id="app">
		<div class="container">
			<div class="col-md-12" style="border-bottom: 2px solid black;">
			    <div class="text-right" style="height: 58px;padding: 0px;margin-top: 10px;">
			    	<h2 style="float:left;">Product Add</h2>
			    	<button id="save" class="btn btn-primary" style="margin-right: 6px;">SAVE</button>
			    	<a class="btn btn-primary" href="../" role="button" style="margin-right: 6px;">CANCEL</a>
			    </div>
			</div>

			<div class="row">
				<div class="col-lg-3 col-md-4 col-7">
					<form id="product_form" action="" method="post" class="form-horizontal">
				       <div class="row form-group">
				         <div class="col col-md-3">
				           <label class="form-control-label">SKU</label>
				       </div>
				       <div class="col-12 col-md-9">
				        <p class="form-control-static">
				         <input type="text" id="sku" name="text-input" class="form-control">
				        </p>
				       </div>
				      </div> 
				       <div class="row form-group">
				         <div class="col col-md-3">
				           <label class="form-control-label">Name</label>
				       </div>
				       <div class="col-12 col-md-9">
				        <p class="form-control-static">
				         <input type="text" id="name" name="text-input" class="form-control">
				        </p>
				       </div>
				      </div> 
				       <div class="row form-group">
				         <div class="col col-md-3">
				           <label class="form-control-label">Price ($)</label>
				       </div>
				       <div class="col-12 col-md-9">
				        <p class="form-control-static">
				            <input type="number" id="price" name="text-input" class="form-control">
				        </p>
				       </div>
				      </div>
				       <div class="row form-group">
				         <div class="col col-md-3">
				           <label class="form-control-label">Type Switcher</label>
					       </div>
				       <div class="col-12 col-md-9">
				       		<p class="form-control-static">
						         <select class="form-control-sm form-control mt-1" id="productType">
					                <option id="book">Book</option>
					                <option id="dvd">DVD</option>
					                <option id="furniture">Furniture</option>
					            </select>
					        </p>
				       </div>
					     </div>

				       <!-- Used to inject code for dynamic display of specific product properties -->
				       <div id="dynamic_property" class="row form-group"></div>

				    </div>           
			     </form>
				</div>

				<footer>
					<p>Scandidweb Test Assignment</p>
				</footer>
			</div>
		</div>
	</div>

  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/add.js"></script>
</body>
</html>
