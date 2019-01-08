<div class="row">
	<div class="col-lg-12">
		<h2 class="text-center">ADMIN ADD PRODUCT</h2>
	</div>
</div>
<!-- /. ROW  -->
<div class="row">
	<div class="col-lg-12">
		<a href="?c=product" title="Product" class="btn btn-primary">View All Product</a>
	</div>
	<br>
	<!-- <?php if(!empty($state)): ?>
	<div class="col-lg-12">
		<?php if($state === 'fail'):?>
		<?php if(isset($_SESSION['errAddPd'])): ?>
		<ul>
			<?php foreach($_SESSION['errAddPd'] as $prod): ?>
			<?php if(!empty($prod)): ?>
			<li style="color: red;"><?php echo $prod; ?></li>
			<?php endif; ?>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
		<?php endif; ?>
		<?php if($state === 'bad'): ?>
		<h3 style="color: red;">Có lỗi, vui lòng thử lại</h3>
		<?php endif; ?>
		<?php if($state === 'err'): ?>
		<h3 style="color: red;">Đã tồn tại product</h3>
		<?php endif; ?>
	</div>
	<?php endif; ?> -->
</div>
<br>
<div class="row">
	<div class="col-lg-12">
		<form action="?c=product&m=handleAdd" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="txtNameProduct">Name Product</label>
				<input type="txtNameProduct" class="form-control" id="txtNameProduct" name="txtNameProduct" placeholder="Name Product">
			</div>
			<div class="form-group">
				<label for="nameFile">Choose Image</label>
				<input type="file" class="form-control" id="nameFile" name="nameFile">
			</div>
			<div class="form-group">
				<label for="slcCat">Choose Category</label>
				<select name="slcCat" id="slcCat" class="form-control">
					<option value="">-- Choose --</option>
					<?php foreach($dataProduct as $key => $parentId): ?>
                        <option value="<?php echo $parentId['id_cat'] ?>"><?php echo $parentId['name_cat'] ?></option>
                    <?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="txtPrice">Price Product</label>
				<input type="text" id="txtPrice" name="txtPrice" class="form-control" placeholder="Price Product">
			</div>
			<div class="form-group">
				<label for="txtStatus">Status</label>
				<select name="slcStatus" id="slcStatus" class="form-control">
					<option value="">-- Choose --</option>
					<option value="0">Deactive</option>
					<option value="1">Active</option>
					
				</select>
			</div>
			
			<button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>