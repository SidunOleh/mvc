<?php require_once ROOT . '/views/parts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Catalog</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                          <?php require_once ROOT . '/views/parts/sidebar.php'; ?>

                    </div><!--/category-products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->

                <?php if(isset($product)): ?>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="/frontend/images/product/<?php echo $product['prod_img']; ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <?php if($product['prod_condition'] == 'New'): ?>
                                <img src="/frontend/images/new.jpg" class="newarrival" alt="" />
                                <?php endif; ?>
                                <h2><?php echo $product['prod_name']; ?></h2>
                                <p>Product code: <?php echo $product['prod_code']; ?></p>
                                <span>
	                                <form action="/cart/add/<?php echo $product['prod_id']; ?>" method="POST">
	                                    <span>US $<?php echo $product['price']; ?></span>
	                                    <label>Count:</label>
	                                    <input name="count" type="text" value="1" />
	                                    <button name="submit" type="submit" class="btn btn-fefault cart">
	                                        <i class="fa fa-shopping-cart"></i> Add to Cart
	                                    </button>
	                                </form>
                                </span>
                                <p><b>Exist:</b> <?php echo $product['prod_exist'] ? 'Yes' : 'No'; ?></p>
                                <p><b>Condition:</b> <?php echo $product['prod_condition']; ?></p>
                                <p><b>Maker:</b> <?php echo $product['prod_maker']; ?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">                                
                        <div class="col-sm-12">
                            <h4>Product Description</h4>
                            <?php echo $product['prod_desc']; ?>
                        </div>
                    </div>

                 <?php else: ?>
                    <p>Product dosent exist</p>

                <?php endif; ?>
                
                </div><!--/product-details-->
            </div>
        </div>
    </div>
</section>

<?php require_once ROOT . '/views/parts/footer.php'; ?>
