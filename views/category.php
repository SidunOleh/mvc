<?php include_once ROOT . '/views/parts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Catalog</h2>
                    <div class="panel-group category-products">

                       <?php if(!empty($categories)): ?>

                            <?php foreach ($categories as $category): ?>
                            
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="/category/<?php echo $category['cat_id']; ?>" style="<?php echo $category['cat_id'] == $cat_id ? 'color: orange;' : ''; ?>">
                                                <?php echo $category['cat_name']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                            <?php endforeach; ?>

                        <?php else: ?>
                            <p>No categories</p>

                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Latest products</h2>

                    <?php if(!empty($cat_prods)): ?>

                        <?php foreach($cat_prods as $cat_prod): ?>

                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/frontend/images/product/<?php echo $cat_prod['prod_img']; ?>" alt="" />
                                            <h2>$<?php echo $cat_prod['price']; ?></h2>
                                            <a href="/product/<?php echo $cat_prod['prod_id']; ?>">
                                                <p><?php echo $cat_prod['prod_name']; ?></p>
                                            </a>
                                            <a href="/cart/add/<?php echo $cat_prod['prod_id']; ?>" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>Add to Cart
                                            </a>
                                        </div>

                                        <?php if($cat_prod['prod_condition'] == 'New'): ?>
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

                <?php echo $pagination->get(); ?>

            </div>
        </div>
    </div>
</section>

<?php include_once ROOT . '/views/parts/footer.php'; ?>