<?php require_once ROOT . '/views/parts/header.php'; ?>

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="/">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
		<form action="/cart/upgrade/" method="POST">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description"></td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>

				<?php $total = 0; // загальна сума ?>

				<?php if(!empty($products)): ?>

					<?php foreach($products as $product): ?>
							
						<?php if(1): ?>
						
							<tr>
								<td class="cart_product">
									<a href="/product/<?php echo $product['prod_id']; ?>"><img style="width: 100px;" src="/frontend/images/product/<?php echo $product['prod_img'];?>" alt=""></a>
								</td>
								<td style="text-align: center;" class="cart_description">
									<h4><a href="/product/<?php echo $product['prod_id']; ?>"><?php echo $product['prod_name']; ?></a></h4>
									<p>Product Code: <?php echo $product['prod_code']; ?></p>
								</td>
								<td class="cart_price">
									<p>$<?php echo $product['price']; ?></p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href=""> + </a>
										<input class="cart_quantity_input" type="text" name="<?php echo $product['prod_id']; ?>" value="<?php echo $product['count']; ?>" autocomplete="off" size="2">
										<a class="cart_quantity_down" href=""> - </a>
									</div>
								</td>
								<td class="cart_total">

									<?php $prod_total = $product['price'] * $product['count'];
										  $total     += $prod_total; ?>

									<p class="cart_total_price">$<?php echo $prod_total; ?></p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="/cart/remove/<?php echo $product['prod_id']; ?>"><i class="fa fa-times"></i></a>
								</td>
							</tr>

						<?php endif; ?>

					<?php endforeach; ?>

				<?php else: ?>
					<tr><td><h3>Cart is empty</h3></td></tr>

				<?php endif; ?>

				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Total <span>$<?php echo $total; ?></span></li>
					</ul>
						<input name="submit" type="submit" class="btn btn-default update" value="Upgrade">
						<a class="btn btn-default check_out" href="/checkout/">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->

</form>

<?php require_once ROOT . '/views/parts/footer.php'; ?>

<script>
	$('.cart_quantity_up').bind('click', function() {
		event.preventDefault();
		
		let val = $(this).next().val();
		$(this).next().val(Number(val) + 1);
	});

	$('.cart_quantity_down').bind('click', function() {
		event.preventDefault();
		
		let val = $(this).prev().val();

		if(val > 0)
			$(this).prev().val(Number(val) - 1);
	});
</script>
