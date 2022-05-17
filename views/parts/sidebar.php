<!-- сайдбар з категоріями -->
<div class="left-sidebar">
    <h2>Catalog</h2>
    <div class="panel-group category-products">

       <?php if(!empty($categories)): ?>

            <?php foreach ($categories as $category): ?>
            
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="/category/<?php echo $category['cat_id']; ?>">
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