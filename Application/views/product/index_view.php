<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 pdd-15">
    <div class="right-home">
        <div class="cate-prod">
            <div class="row row-15">
                <div class="col-md-12 pdd-15">
                    <div class="title-right">
                        <a href="/vong-co" style="color: #222222;">Vòng cổ</a>
                    </div>
                </div>
                <?php foreach($dataProduct as $key => $product): ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 col-480 pdd-15">
                    <div class="box-prod">
                        <div class="img-prod">
                            <a  class="h_133" href="/x-163.html" title="<?= $product['name_pro']?>">
                                <img style="height: 270px; width: 100%;" class="w_100" src="<?= 'Admin\publics\img\\'.$product['img_pro']?>" alt="<?= $product['name_pro']?>"/>
                            </a>
                            <div class="button-hover">
                                <a href="?c=cart&m=addCart&id=<?php echo $product['id_pro'];?>" class=" btn btn-add-item">Đặt hàng </a>
                            </div>
                        </div>
                        <div class="dcs-prod">
                            <h3 class="name-prod">
                            <a href="/x-163.html" title="X.163"><?= $product['name_pro']?></a>
                            </h3>
                            <div class="price">Liên hệ</div>
                        </div>
                        <div class="clearfix-15"></div>
                        <div class="text-center"></div>
                    </div>
                </div> 
                <?php endforeach; ?>   
            </div>
        </div>
<!--         <div class="clearfix-35"></div> -->
    </div>
    
            
