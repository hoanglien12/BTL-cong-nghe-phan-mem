<div class="row">
  <?php foreach($dataProducts as $key => $item): ?>
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <a href="?c=product&m=detail&id=<?php echo $item['id_pro'];?>"><img class="card-img-top" src="<?php echo PATH_IMG_UPLOAD . $item['img_prod']; ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
              <a href="?c=product&m=detail&id=<?php echo $item['id_prod'];?>"></span><?php echo $item['name_prod'];?></a>
              </h4>
              <h5><?php echo number_format($item['price']) ; ?></h5>
              <p class="card-text"><?php echo $item['des_prod'];?></p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              <a title="add cart" href="?c=cart&m=addCart&id=<?php echo $item['id_pro'];?>" class="pull-right"><i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
  <?php endforeach; ?>
</div>
