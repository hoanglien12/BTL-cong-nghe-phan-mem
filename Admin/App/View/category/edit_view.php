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
    
    <div class="col-lg-12">
    	<form action="?c=category&m=handleEdit" method="POST">
			  <div class="form-group">
				    <label for="txtNameCat">Name Category</label>
				    <input type="text" class="form-control" id="txtNameCat" placeholder="Name Category" name="txtNameCat" value="<?php echo $infoCat['name_cat']; ?>">
                    <input type="hidden" readonly="readonly" name="hiddenNameCat" value="<?php echo $infoCat['name_cat']; ?>">
                    <input readonly="readonly" type="hidden" name="hddIdCat" value="<?php echo $infoCat['id_cat']; ?>">
			  </div>
              <div class="form-group">
                    <label for="slcStatusCat">Status Category</label>
                    <select name="slcStatusCat" class="form-control">
                        <option value="">-- Status --</option>
                        <option <?php echo ($infoCat['status'] == 1) ?'selected="selected"': '';?> value="1">Active</option>
                        <option <?php echo ($infoCat['status'] == 0) ?'selected="selected"': '';?> value="0">Deactive</option>
                    </select>
              </div>
			  <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
		</form>
    </div>
</div>