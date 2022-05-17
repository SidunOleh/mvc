<?php include_once ROOT . '/views/parts/header.php'; ?>

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
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    <?php else: ?>
                        <p>No products</p>
                        
                    <?php endif; ?>

                </div><!--features_items-->
                
                <?php echo $pagination->get(); ?>

            </div>
        </div>
    </div>
</section>

<?php include_once ROOT . '/views/parts/footer.php'; ?>