<div class="container">
    <div class="row myContent">
    <div class="col-lg-5 item-photo">
            <img id="productImg" style="width: 100%; height: 100%;" src="<?php echo PATH_IMG_UPLOAD . $infoPd['img_prod'] ?>" />
        </div>
        <div class="col-lg-7" style="border:0px solid gray; margin-top: 2%;">
            <!-- Datos del vendedor y titulo del producto -->
            <h3><?php echo $infoPd['name_prod'] ?></h3>
            <!-- Precios -->
            <h3 style="margin-top:0px;"><?php echo number_format($infoPd['price']) ?>VND</h3>
            <!-- Detalles especificos del producto -->
            
            <div class="section" style="padding-bottom:5px;">
                <h6 class="title-attr"><small>Danh Muc</small></h6>
                <h6><?php echo $infoPd['name_cat'] ?></h6>
            </div>
            <form action="?c=cart&m=addCart&id=<?php echo $infoPd['id_prod'] ?>" method="post">
                <div class="section" style="padding-bottom:20px;">
                    <h6 class="title-attr"><small>Mua hang</small></h6>
                    <div>
                        <div class="btn-minus"><i class="fa fa-minus" aria-hidden="true"></i></div>
                        <input value="1" name="qtyPd">
                        <div class="btn-plus"><i class="fa fa-plus" aria-hidden="true"></i></div>
                    </div>
                </div>

                <!-- Botones de compra -->
                <div class="section" style="padding-bottom:20px;">
                    <a href="#">
                        <button class="btn btn-success" type="submit"><span style="margin-right:20px" class="fa fa-cart-plus" aria-hidden="true"></span> Mua ngay</button>
                    </a>
                </div>
            </form>
            <div class="row">
                <img id="productImg" style="width: 150px; height: 200px;" src="http://owen.com.vn/image.php?width=237&image=http://owen.com.vn/images/product/39B0QRBD4_AR6273D_386K_100P_RL.JPG" />
                <img id="productImg" style="width: 150px; height: 200px;" src="http://owen.com.vn/image.php?width=237&image=http://owen.com.vn/images/product/AH3932E5_AR6279D_386K_100P_RL.JPG" />
                <img id="productImg" style="width: 150px; height: 200px;" src="http://owen.com.vn/image.php?width=237&image=http://owen.com.vn/images/product/AH3937MC_AR6308D_386K_100P_RL.JPG" />
                <img id="productImg" style="width: 150px; height: 200px;" src="http://owen.com.vn/image.php?width=237&image=http://owen.com.vn/images/product/AGUA6B3O_AR6302D_386k_100poly_RL.JPG" />
            </div>
        </div>

        <div class="col-lg-12">
            <ul class="menu-items">
                <li class="active">Chi Tiet San pham</li>
            </ul>
            <div style="width:100%;border-top:1px solid silver">
                <p style="padding:15px;">
                    <small>
                    Stay connected either on the phone or the Web with the Galaxy S4 I337 from Samsung. With 16 GB of memory and a 4G connection, this phone stores precious photos and video and lets you upload them to a cloud or social network at blinding-fast speed. With a 17-hour operating life from one charge, this phone allows you keep in touch even on the go.
                    </small>
                </p>
                <small>
                    <ul>
                        <li>Super AMOLED capacitive touchscreen display with 16M colors</li>
                        <li>Available on GSM, AT T, T-Mobile and other carriers</li>
                    </ul>
                </small>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div width="100%" class="fb-comments" data-numposts="5"></div>
    </div>
</div>