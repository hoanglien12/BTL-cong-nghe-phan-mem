<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">ADMIN ADD CATEGORIES</h2>
    </div>
</div>
<!-- /. ROW  -->
<div class="row">
     <div class="col-lg-12">
        <a href="?c=category" title="Add Categories" class="btn btn-primary">Categories</a>
    </div>
    <br><br>
    <div class="col-md-12">
    	<form action="?c=category&m=handle" method="POST">
            
			<!-- <div class="form-group">
			    <label for="slcParentCat">Choose Parent Categories</label>
			    <select class="form-control" name="slcParentCat" id="slcParentCat">
			    	<option value="0">-- ROOT --</option>
				    <?php foreach($dataCate as $key => $parentId): ?>
                        <option value="<?php echo $parentId['parent_id'] ?>"><?php echo $parentId['parent_id'] ?></option>
                    <?php endforeach; ?>
				</select>
			</div> -->
			<div class="form-group">
                <label for="txtNameCat">Name Category</label>
                <input type="text" class="form-control" id="txtNameCat" placeholder="Name Category" name="txtNameCat">
            </div>
			<button type="submit" name="btnSubmit" class="btn btn-default">Submit</button>
		</form>
    </div>
</div>