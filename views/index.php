<?php require_once ROOT . '/views/parts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">

               <?php require_once ROOT . '/views/parts/sidebar.php'; ?>

            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Latest products</h2>

                    <?php if(!empty($products)): ?>

                        <?php foreach($products as $product): ?>

                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/frontend/images/product/<?php echo $product['prod_img']; ?>" alt="" />
                                            <h2>$<?php echo $product['price']; ?></h2>
                                            <a href="/product/<?php echo $product['prod_id']; ?>">
                                                <p><?php echo $product['prod_name']; ?></p>
                                            </a>
                                            <a href="/cart/add/<?php echo $product['prod_id']; ?>" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Add to Cart
                                            </a>
                                        </div>

                                        <?php if($product['prod_condition'] == 'New'): ?>
                                        <img src="/frontend/images/new.png" class="new" alt="" />
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    <?php else: ?>
                        <p>No products</p>
                        
                    <?php endif; ?>

                </div><!--features_items-->

                <?php if(!empty($recomm_prods)): ?>

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">Recommended products</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                                <?php for($i=0; $i < count($recomm_prods); $i++): ?>

                                    <div class="item <?php echo $i == 0 ? 'active' : ''; ?>">	
                                        <div class="">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/frontend/images/product/<?php echo $recomm_prods[$i]['prod_img']; ?>" alt="" />
                                                        <h2>$<?php echo $recomm_prods[$i]['price']; ?></h2>
                                                        <a href="/product/<?php echo $recomm_prods[$i]['prod_id']; ?>">
                                                            <p><?php echo $recomm_prods[$i]['prod_name']; ?></p>
                                                        </a>
                                                        <a href="/cart/<?php echo $recomm_prods[$i]['prod_id']; ?>" class="btn btn-default add-to-cart">
                                                            <i class="fa fa-shopping-cart"></i>Add to Cart
                                                        </a>
                                                    </div>

                                                    <?php if($recomm_prods[$i]['prod_condition'] == 'New'): ?>
                                                        <img src="/frontend/images/new.png" class="new" alt="" />
                                                    <?php endif; ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endfor; ?>

                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>			
                        </div>
                    </div><!--/recommended_items-->

                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<?php require_once ROOT . '/views/parts/footer.php'; ?>