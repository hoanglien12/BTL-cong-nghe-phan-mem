<div class="container">
    <?php if(!empty($mess)): ?>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <?php if($mess==='success'): ?>
                <h3 class="text-center">Bạn đã đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!</h3>
            <?php endif; ?>

            <?php if($mess==='fail' OR $mess==='err'): ?>
                <h3 class="text-center">Có lỗi xảy ra vui lòng thử lại!</h3>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <form action="?c=cart&m=update" method="POST">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalMoney = 0; ?>
                        <?php foreach($dataCart as $key=>$cart):?>
                            <?php $totalMoney += ($cart['price']) * ($cart['qty_pd']); ?>
                            <tr>
                                <td class="col-md-6">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="#">

                                            <img class="media-object" src="<?php echo 'Admin\publics\img\\' . $cart['img_prod'];?> " style="width: 72px; height: 72px;">
                                            
                                        </a>
                                        <div class="media-body" style="padding-left: 10px;">
                                            <h4 class="media-heading"><a href="#"><?php echo $cart['name_prod'];?></a></h4>
                                            <h5 class="media-heading"></a></h5>
                                           <!--  <span>Description: </span><span class="text-warning"><strong><?php echo $cart['des_prod']; ?></strong></span> -->
                                        </div>
                                    </div>
                                </td>
                                <td class="col-md-1" style="text-align: center">
                                    <input type="text" class="form-control" id="txtQTY" name="txtQTY[<?php echo $cart['id_prod'];?>]" value="<?php echo $cart['qty_pd'];?>">
                                </td>
                                <td class="col-md-1 text-center"><strong><?php echo number_format($cart['price']); ?></strong></td>
                                <td class="col-md-1 text-center"><strong><?php echo number_format($cart['qty_pd'] * $cart['price']); ?></strong></td>
                                <td class="col-md-1">
                                <a href="?c=cart&m=remove&id=<?php echo $cart['id_prod'];?>" class="btn btn-danger">
                                    <i class="fa fa-times" aria-hidden="true"></i> Remove
                                </a></td>
                            </tr>
                        <?php endforeach;?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><h3>Total</h3></td>
                            <td class="text-right"><h3><strong><?php echo number_format($totalMoney); ?></strong></h3></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12">
                <div class="col-md-3 pull-left">
                    <a href="?c=home&m=index" title="Continute" class="btn btn-primary">Continute Shopping</a>
                </div>
                <div class="col-md-9 pull-left">
                    <div class="col-md-4 pull-right">
                        <a  href="?c=cart&m=delete" title="Continute" class="btn btn-success">Remove All</a>
                    </div>
                    <div class="col-md-4 pull-right">
                        <button name="btnSubmit" type="submit" title="Continute" class="btn btn-success">Update cart</button>
                    </div>
                    
                    <?php if(!empty($dataCart)): ?>
                        <div class="col-md-4 pull-right">
                            <a id="checkBuy" href="#" title="Continute" class="btn btn-success">Check out</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
    <div class="row" style="margin-bottom: 20px; display: none;" id="checkOutCart">
    <div class="col-md-12">
        <form action="?c=cart&m=order" method="POST">
            <div class="row">
                <div class="col-md-6 pull-left">
                    <div class="form-group">
                        <label for="txtFullname" class="text-danger">(*) Full name</label>
                        <input type="text" class="form-control" id="txtFullname" placeholder="Full name" name="txtFullname">
                    </div>
                    <div class="form-group">
                        <label for="txtemail" class="text-danger">(*) Email</label>
                        <input type="email" class="form-control" id="txtemail" placeholder="Email" name="txtemail">
                    </div>
                    <div class="form-group">
                        <label for="txtAddress" class="text-danger">(*) Address (dia chi giao hang)</label>
                        <input type="text" class="form-control" id="txtAddress" placeholder="Address" name="txtemail">
                    </div>
                </div>
                <div class="col-md-6 pull-right">
                    <div class="form-group">
                        <label for="txtPhone" class="text-danger">(*) Phone</label>
                        <input type="text" class="form-control" id="txtPhone" placeholder="Address" name="txtPhone">
                    </div>
                    <div class="form-group">
                        <label for="txtNote">Note</label>
                        <textarea class="form-control" rows="5" name="txtNote" id="txtNote"></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" name="buyNow" class="btn btn-success btn-block">Buy now</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('#checkBuy').click(function(){
            $('#checkOutCart').show();
        })
    });
</script>
</div>