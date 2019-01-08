<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">ADMIN EDIT PRODUCT</h2>
    </div>
</div>
<!-- /. ROW  -->
<div class="row">
     <div class="col-lg-12">
        <a href="?c=product" title="Product" class="btn btn-primary">View Add Product</a>
    </div>
    <br> <br>
 
</div>
<br><br>
<div class="row">
	<div class="col-lg-12">
		<form action="?c=product&m=handleEdit&id= <?php echo $idPro;?>" method="POST" enctype="multipart/form-data">
			  <div class="form-group">
			  	<label for="txtNameProduct">Name Product</label>
			    <input type="text" class="form-control" id="txtNameProduct" name="txtNameProduct" placeholder="Name Product" value="<?php echo $infoPd['name_pro'];?>">
		    	<input type="hidden" id="hddNameProduct" name="hddNameProduct" value="<?php echo $infoPd['name_prod']; ?>">
			  </div>

			  <div class="form-group">
			    <label for="nameFile">Choose Image</label>
			    <input type="file" class="form-control" id="nameFile" name="nameFile">
			    <br>
			    <img src="<?php echo 'publics\img\\' . $infoPd['img_pro'];?>" alt="image product" width = "120" height = "120">
			    <input type="hidden" name="hddImage" id="hddImage" value="<?php echo $infoPd['img_pro'];?>">
			  </div>

			  <div class="form-group">
			    <label for="slcCat">Choose Category</label>
			    <select name="slcCat" id="slcCat" class="form-control">
			    	<option value="">-- Choose --</option>
			    	<?php foreach($dataCat as $key => $cat): ?>
			    		<option <?= ($infoPd['id_cat'] == $cat['id_cat']) ? 'selected' : '' ?> value="<?= $cat['id_cat']?>"><?= $cat['id_cat']?></option>
			    	<?php endforeach; ?>
			    </select>
			  </div>

			  <div class="form-group">
				    <label for="txtPrice">Price Product</label>
					<input type="text" id="txtPrice" name="txtPrice" class="form-control" placeholder="Price Product" value="<?php echo number_format($infoPd['price']);?>">
			  </div>

			  <div class="from-group">
			  		<label for="slcStatus">Status</label>
					<select  id="slcStatus" name="slcStatus" class="form-control">
						<option value="0" <?php echo ($infoPd['status'] == 0)? 'selected="selected"' : '';?>>Deactive</option>
						<option value="1" <?php echo ($infoPd['status'] == 1)? 'selected="selected"' : '';?>>Active</option>
					</select>
			  </div>

			  <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>