<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">ADMIN PRODUCT</h2>
    </div>
</div>
<!-- /. ROW  -->
<div class="row">
     <div class="col-lg-12">
     	<div class="col-lg-4">
        	<a href="?c=product&m=add" title="Add Product" class="btn btn-primary">Add Product</a>
        	<a href="?c=product" title="View Product" class="btn btn-primary">View All</a>

        </div>
        <div class="col-lg-8">
        	<button type="button" id="btnSearch" class="pull-right btn btn-primary">Search</button>
        	<input type="text" name="txtSearch" id="txtSearch" class="pull-right"  value="">
        </div>
    </div>
    <br><br>
	<div class="col-lg-12">
    	<table class="table table-striped table-bordered table-hover table-condensed">
    		<thead>
    			<tr>
    				<!-- <th>STT</th> -->
    				<th>ID</th>
    				<th>UserName</th>
    				<th>PassWord</th>
    				<th colspan="2" width="80">Action</th>
    			</tr>
    		</thead>
			<tbody>
			<?php foreach($dataAllProduct as $key => $pd): ?>
				<tr>
					<td><?php echo  $pd['id']?></td>
					<td><?php echo $pd['username']?></td>
					<td><?= $pd['password'] ?></td>
					<td width="80" class="text-center"><a class="btn btn-primary" href="" title="Edit">Edit</a></td>
					<td width="80" class="text-center"><a href="#" title="Delete">Delete</a></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
    	</table>
    	<!-- <div class="text-center">
    		<?php echo $phantrang['html']; ?>
    	</div> -->
    </div>
</div>
<script type = "text/javascript">
	$(function(){
		$('#btnSearch').click(function(){
			var keyword = $.trim($('#txtSearch').val());
			window.location.href = "?c=product&m=index&s="+keyword;
		})
	});
</script>