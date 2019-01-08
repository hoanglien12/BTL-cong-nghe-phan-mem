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
            <input type="text" name="txtSearch" id="txtSearch" class="pull-right"  value="<?php echo (!empty($keyword)) ? $keyword : '';?>">
        </div>
    </div>
    <br><br>
    <div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Create Time</th>
                    <th colspan="2" width="80">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($dataProduct as $key => $product): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $product['name_pro'] ?></td>
                    <td><img style="width:100px;height: 100px;" src="<?= 'publics\img\\'.$product['img_pro']?>"></td>
                    <td><?= $product['price']?></td>
                    <td><?= ($product['status'] == 0) ? 'Deactive' : 'Active' ?></td>
                    <td><?= $product['create_time']?></td>
                    <td class="text-center"><a href="?c=product&m=edit&id=<?=$product['id_pro']?>" class="btn btn-primary">Edit</a></td>
                    <td  class="text-center"><a href="?c=product&m=delete&id=<?=$product['id_pro']?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <!-- <?php echo $phantrang['html']; ?> -->
        </div>
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