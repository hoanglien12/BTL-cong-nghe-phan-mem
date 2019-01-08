<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">ADMIN CATEGORIES</h2>
    </div>
</div>
<!-- /. ROW  -->
<div class="row">
     <div class="col-lg-12">
        <a href="?c=category&m=add" title="Add Categories" class="btn btn-primary" >Add Categories</a>
    </div>
    <br><br>
    <div class="col-lg-12">
    	<table class="table table-striped table-bordered table-hover table-condensed">
    		<thead>
    			<tr>
    				<th>STT</th>
    				<th>Name Category</th>
    				<th>status</th>
    				<th colspan="2" class="text-center">Action</th>
    			</tr>
    		</thead>
			<tbody>
                <?php $i = 1; ?>
                <?php foreach($data as $key => $category): ?>
				<tr>
					<td><?= $i ?></td>
                    <td><?= $category['name_cat'] ?></td>
                    <td><?= ($category['status'] == 0) ? 'Deactive' : 'Active' ?></td>
                    <td class="text-center"><a href="?c=category&m=edit&id=<?=$category['id_cat']?>" class="btn btn-primary">Edit</a></td>
                    <td  class="text-center"><a href="?c=category&m=delete&id=<?=$category['id_cat']?>" class="btn btn-danger">Delete</a></td>
				</tr>
                <?php $i++; ?>
                <?php endforeach; ?>
			</tbody>
    	</table>
    </div>
</div>