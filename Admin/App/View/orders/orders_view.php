<div class="col-md-12">
<style type="text/css" media="screen">
  th, td {
    border-bottom: 1px solid #ddd;
}
</style>
  <div class="row">
    <h2 class="text-center">Danh sách đơn hàng !!!</h2>
  </div>
  <div class="row">
    <?php foreach ($orders as $key => $item): {
      # code...
    } ?>
    <div class="col-md-12" style="border-bottom: 2px dotted green ; margin: 20px 0px;background-color: #CCFFFF;">
      <div class="col-md-2">
        <p>
          <img width="100%" height="150px;" src="<?php echo PATH_IMG_UPLOAD . $item['img_prod']; ?>" alt="">
        </p>
        <h3 class="text-center"><?php echo $item['name_prod']; ?></h3>
      </div>
      <div class="col-md-10" style="background-color: white;">
        <div class="table-responsive">
          <table class="table table-bordered" style="margin-top: 10px;">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <!-- <th>Phone</th> -->
                <th>Email</th>
                <th>Address</th>
                <th>Qty</th>
                <th>Money</th>
                <th>Create</th>
                <th>Note</th>
                <th colspan="2" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($item['lstCustomer'] as $k => $customer): ?>
              <tr>
                <td><?php echo $customer['id_product']; ?></td>
                <td><?php echo $customer['name_customer']; ?></td>
                <td><?php echo $customer['email_customer']; ?></td>
               <!--  <td><?php echo $customer['phone']; ?></td> -->
                <td><?php echo $customer['address_customer']; ?></td>
                <td><?php echo $customer['qty_product']; ?></td>
                <td><?php echo $customer['money']; ?> vnd</td>
                <td><?php echo $customer['time_order']; ?></td>
                <td><?php echo $customer['note_customer']; ?></td>
                <td>
                    <button id="confirmOder_<?php echo $customer['id_order']; ?>" onclick="updateOrders('<?php echo $customer['id_order'] ?>',1);" type="button" class="btn btn-small btn-primary">Xác nhận</button>
                </td>
                <td>
                    <button id="cancelOder_<?php echo $customer['id_order']; ?>" onclick="updateOrders('<?php echo $customer['id_order'] ?>',2);" type="button" class="btn btn-small btn-danger"> Hủy</button>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>
<script type="text/javascript">
  function updateOrders(idOrder,status){
    $.ajax({
        url: '?c=orders&m=handle',
        type: 'POST',
        data: {idOrder : idOrder, status : status},
        beforeSend: function(){
            if(status == 1){
                $('#confirmOder_' + idOrder).text('loading...');
            }
            else if(status == 2){
                $('#cancelOder_' + idOrder).text('loading...');
            }
        },
        success : function(result){
            result = $.trim(result);
            if(result === 'error'){
              alert('tham so k hop le');
            }
            else if(result === 'fail'){
              alert('co loi xay ra');
            }
            else{
              alert('xu li thanh cong');
              window.location.reload(true) ;
            }
            return false;
        }
    });
  }
</script>