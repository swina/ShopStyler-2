<?php
//create layout with hooks 
	function ss_loop_standard_layout(){
		
		?>
		
		<div class="product-container">
		<?php do_action('ss_loop_before_product_data'); ?>
			
			<div class="product-standard">
				<div class="product-data">
				<?php do_action ( 'ss_loop_product_data' ); ?>
				</div>
			</div>
			
		</div>
		
		<?php
	}


//loop page product image
function ss_loop_image (){
	$image_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
	?>
	<div class="product-image img-<?php echo get_the_ID(); ?>  animated zoomIn" style="text-align:center">
		<a href="<?php echo $image_url;?>" data-lightbox="lbimage-<?php echo get_the_ID();?>" data-title="<?php echo get_the_title();?>" class="lbimg-<?php echo get_the_ID();?>"><?php echo woocommerce_get_product_thumbnail('shop_catalog');; ?></a>
		
		<?php do_action ( 'ss_loop_after_product_image' );?>
		
	</div>
	<?php
}

//product title
function ss_loop_title (){
	?>
		<a href="<?php echo get_permalink ( get_the_ID() );?>"><h2><?php echo get_the_title();?></h2></a>
	
	<?php
}

function ss_loop_price (){
	$price = get_post_meta( get_the_ID(), '_regular_price' , true);
  	$sale = get_post_meta( get_the_ID(), '_sale_price', true);
	?>
	<a href="<?php echo get_permalink ( get_the_ID() );?>"><span class="price">
	<?php
		$pr = $price;
        if ( $sale != '' ){
			$pr = $sale;
		}
		?>
		<span class="amount-<?php echo get_the_ID();?>"><?php echo wc_price($pr);?></span>
    </span></a>
	<?php
}


//product discount
function ss_loop_discount(){
	$price = get_post_meta( get_the_ID(), '_regular_price' , true);
  	$sale = get_post_meta( get_the_ID(), '_sale_price', true);
	if ( $sale != '' ){
  		$discount = intval((intval($sale)/intval($price))*10);
		?>
		<div class="discount">
			<span>-<?php echo $discount; ?>%</span>
		</div>
	<?php
	}
}

function ss_loop_rating($float=''){
   global $woocommerce, $product;
   $stars = $product->get_average_rating();
   ?>
   <div class="ss-rating rating-<?php echo get_the_ID();?> shopstyler-rating<?php echo $float;?>">
   <?php	
   for ( $i=0 ; $i<5 ; $i++ ){
      if ( $stars > $i ) {
	  	$s = "fa-star";
	  } else {
	  	$s = "fa-star-o";
	  }
        ?>
		<span class="ss-star-on"><span class="fa <?php echo $s;?>"></span>
		<?php
   	}?>
   	</div>
	<?php
}


function ss_loop_excerpt($mode='none'){
	$url =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    //hidden excerpt used for quick view
	$display = 'none';
	if ( get_option ( 'ss_loop_layout' ) == 'landscape' ){
		$excerpt_show = substr(get_the_excerpt(),0,70);
		?>
		<div class="excerpt"><?php echo $excerpt_show;?></div>
		<?php
	}
	?>
	<div style="display:<?php echo $display;?>" class="excerpt-<?php echo get_the_ID();?>"><?php echo get_the_excerpt();?></div>
	<?php
}

function ss_loop_quickview(){
	global $product;
	$link = get_permalink ( get_the_ID() );
    $title = get_the_title( get_the_ID());
	$type = 'simple';
	if ( $product->is_type('variable') ) {
    	$type = 'variable';
    }
	?>
	<span class="fa fa-search btn-modal" name="<?php echo get_the_ID().'|'.$link.'|'.$title.'|'.$type;?>"></span>
	<?php
}

function ss_loop_add_to_cart(){
	$opts = get_option ( 'shopstyler' );
    $btnaddtocart = "Add to cart";
   	if ( $opts['woo_add_to_cart'] ){
    	global $wp;
    	global $product;
    	$current_url = home_url(add_query_arg(array(),$wp->request)); 
    	$type = '';
    	if ( $product->is_type('simple') ) {
      		$type = 'simple';
    	}
    	if ( $product->is_type('variable') ) {
      		$type = 'variable';
    	}
		?>
		<a href="<?php echo $current_url;?>/?add_to_cart=<?php echo get_the_ID();?>" 
        	rel="nofollow" 
          	data-product_id="<?php echo get_the_ID();?>"
          	data-product_sku="<?php echo $product->get_sku();?>"
           	data-quantity="1"
           	class="add_to_cart_button product_type_<?php echo $type;?>">
			<span class="fa fa-shopping-cart"></span>
		</a>
	<?php	
  }
}
