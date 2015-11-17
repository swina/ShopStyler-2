<?php


function ss_cat_output($title,$image,$link,$mode,$parent,$start){
	
	if ( $mode == 0 ){
		if  ( $start != 'first' ) {
			?>
			</div>
		<?php	
		}
	?>
		<div style="float:left;background:url(<?php echo $image;?>) no-repeat center center;background-size:cover;width:33%;float:left;max-height:30%;height:250px;" id="c-<?php echo $n;?>">
			<div style="width:100%;top:75%;position:relative;">
			<span class="cate-title"><?php echo $title; ?></span>
			</div>
		</div>
		<?php
	} else {
		if ( $start == 0 ){
		?>
		
		<div style="float:left;background:url(<?php echo $image;?>) no-repeat center center;background-size:cover;width:18%;" id="c-<?php echo $n;?>">
		<?php 
		}
		?>
		<div style="background:url(<?php echo $image;?>) no-repeat center center;background-size:cover;width:100%;max-height:125px;height:125px;" id="c-<?php echo $n;?>">
			<div style="width:100%;top:65%;position:relative;">
			<span class="button cate-title"><?php echo $title; ?></span>
			</div>
		</div>
		
		<?php
	}
		
}

function ss_cat_output2 ($title,$image,$link,$mode,$parent,$start){
	
	?>
	
	<a href="<?php echo $link;?>">
		<div style="width:33.333333%;float:left;background:url(<?php echo $image;?>) no-repeat center center #999;background-size:cover;max-height:250px;height:250px;" class="cate-container">
		<div style="width:100%;height:100%;position:relative;" class="cate-flipper">
			<span class="button cate-title"><?php echo $title; ?></span>
		</div>
	</div></a>
	<?php 	
	
}

function ss_home_banners ( $title = 'BANNER' , $image = '' , $link = '' ){
	
	?>
	<div style="float:left;width:50%;margin:0;padding:0">
		<?php
			for ( $x=0 ; $x < 3 ; $x++ ){
		?>
	
		<a href="<?php echo $link;?>">
			<div style="width:100%;float:left;background:#c0c0c0;max-height:250px;height:250px;" class="cate-container">
				<div style="width:100%;height:100%;position:relative;" class="cate-flipper">
					<span class="button cate-title"><?php echo $title; ?></span>
				</div>	
			</div>
		</a>
	<?php 	
	}
	?>
	</div>
	<div class="clear"></div>
	<?php
}

function ss_close_categories ( $n ){
	$c = 3 - ( $n % 3 );
	$w = 33.333333*$c;
	$settings = get_option('shopstyler');
	$bgimage = $settings['woo_shopstyler_categories_background_image'];
	$bgimage = $bgimage	['url'];
	//;background:url(<?php echo $bgimage) no-repeat center center;
	//for ( $i=0; $i < $c ; $i++ ){
	?>
		<div style="width:<?php echo $w;?>%;float:leftmax-height:250px;height:250px;">
		<div style="width:100%;top:25%;text-align:center;position:relative;">
			<!--- <h2>Categories</h2> --->
		</div>
	</div><!-- /home-categories-container-->
	</div><!-- /home-categories-wrapper -->
	<?php
	//}
}

$settings = get_option ( 'shopstyler' );


if ( $settings['woo_custom_homepage_header_image_enable'] == "1" ){
	echo ss_shop_header_home();
}

	

if ( $settings['woo_shopstyler_home_custom_categories'] == "1" ){
	echo ss_home_categories();
}

//echo ss_home_banners();

if ( $settings['woo_shopstyler_home_custom_new_products'] == "1" ){
	echo ss_last_products();
}

if ( $settings['woo_shopstyler_home_custom_top_rated_products'] == "1" ){
	echo ss_top_rated_products();
}

if ( $settings['woo_shopstyler_home_custom_sale_products'] == "1" ){
	echo ss_onsale_products();
}



function ss_shop_header_home(){
 	
	$var = get_option ( 'shopstyler' );
	$title = $var['woo_custom_homepage_header_title'];
    $height = $var['woo_custom_homepage_header_height'];
	$img = $var['woo_custom_homepage_header_image'];
    $img = $img['url'];
    echo '<div class="shop-homepage-header-image animated zoomIn" style="background: url('. $img .') no-repeat center center!important; background-size:cover!important; height:' .$height.'px!important;">';
    if (  $title != '' ){
      echo '<div class="shop-header-claim"><div class="claim-title">'. $title .'</div></div>';
    }
    echo '</div>';
	//woo_shop_header(1);
}

function ss_home_categories(){


	$settings = get_option('shopstyler');
	$bgimage = $settings['woo_shopstyler_categories_background_image'];
	$bgimage = $bgimage	['url'];
	
	$first = 'first';
	
	$taxonomy     = 'product_cat';
	$orderby      = 'name';  
	$show_count   = 0;      // 1 for yes, 0 for no
	$pad_counts   = 0;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no  
	$title        = '';  
	$empty        = 0;

	$args = array(
     'taxonomy'     => $taxonomy,
     'orderby'      => $orderby,
     'show_count'   => $show_count,
     'pad_counts'   => $pad_counts,
     'hierarchical' => $hierarchical,
     'title_li'     => $title,
     'hide_empty'   => $empty
	);
	$all_categories = get_categories( $args );
	?>
	<!-- categories -->
	<div class="home-categories-wrapper" style="width:100%;margin:0;padding:0;float:left;">
	<div class="home-categories animated slideInLeft" style="background:url(<?php echo $bgimage;?>) no-repeat center center #999;background-size:cover;">
	<?php
	foreach ($all_categories as $cat) {
		if($cat->category_parent == 0) {
      		$category_id = $cat->term_id;
             
      		$args2 = array(
            'taxonomy'     => $taxonomy,
            'child_of'     => 0,
            'parent'       => $category_id,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
      		);
			
			
			$title = $cat->name;
			$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
      		$image = wp_get_attachment_url( $thumbnail_id );
			$link = get_term_link($cat->slug, 'product_cat');
			
			ss_cat_output2( $title , $image , $link , 0 , $cat->category_parent , $first );
			
			$first = 'nofirst';
			$n++;
			/*echo $title.'<br/>';
			echo $image.'<br/>';
			echo $link.'<br/>';
  			*/
			$sub_cats = get_categories( $args2 );
			
			if ( $sub_cats ){
				$start = 0;
				foreach ( $sub_cats as $sub_cat ){
					$title = $sub_cat->name;
					$thumbnail_id = get_woocommerce_term_meta( $sub_cat->term_id, 'thumbnail_id', true );
      				$image = wp_get_attachment_url( $thumbnail_id );
					$link = get_term_link($sub_cat->slug, 'product_cat');
					ss_cat_output2( $title , $image , $link , 1 , $sub_cat->category_parent , $start );
					/*echo $title.'<br/>';
					echo $image.'<br/>';
					echo $link.'<br/>';
					*/
					$start++;
					$n++;
				}
			} 
		} 
	}
	ss_close_categories ( $n );
	echo '</div>';

}


//woocommerce query last products
function ss_last_products(){
  $args = array(  'post_type' => 'product', 
                'stock' => 1, 
                'posts_per_page' => 5, 
                'orderby' =>'date',
                'order' => 'DESC' );

  $wp_query = new WP_Query( $args );
  echo '<div class="custom-home-title"><span>New Products</span></div>';
  //render output
  ss_render_home_section($wp_query);
}

//woocommerce query top rated products
function ss_top_rated_products(){
  $posts_per_page = 10;

  $meta_query = WC()->query->get_meta_query();

  $atts = array(
	 'orderby' => 'title',
	 'order'   => 'asc');

  $args = array(
	 'post_type'           => 'product',
	 'post_status'         => 'publish',
   'posts_per_page'      => 5, 
	 'ignore_sticky_posts' => 1,
	 'orderby'             => $atts['orderby'],
	 'order'               => $atts['order'],
	 'meta_query'          => $meta_query
  );

  add_filter('posts_clauses', array( 'WC_Shortcodes', 'order_by_rating_post_clauses'));
  $products = new WP_Query(apply_filters('woocommerce_shortcode_products_query', $args, $atts));
  remove_filter( 'posts_clauses', array( 'WC_Shortcodes', 'order_by_rating_post_clauses' ) );
    
  echo '<div class="custom-home-title"><span>Top Rated</span></div>';
  //render output
  ss_render_home_section ($products);

}

//woocommerce query on sale products
function ss_onsale_products(){
  $args = array(
    'post_type'      => 'product',
    'posts_per_page' => 5, 
    'meta_query'     => array(
        'relation' => 'OR',
        array( // Simple products type
            'key'           => '_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        ),
        array( // Variable products type
            'key'           => '_min_variation_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        )
    )
  );
  $wp_query = new WP_Query( $args );
  echo '<div class="custom-home-title"><span>On sale</span></div>';
  //render output
  ss_render_home_section($wp_query);
}

//render woocommerce query results
function ss_render_home_section($wp_query){
  echo '<ul class="custom-home-page-products animated slideInRight" style="animation-delay:3s">';
  while ( $wp_query->have_posts() ) : $wp_query->the_post();
    $image = woocommerce_get_product_thumbnail('shop_catalog');
    $link = get_permalink ( get_the_ID() );
    $title = get_the_title( get_the_ID());
    $url =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    echo '<li class="product-home">';
      echo '<div class="product-container" style="display:block;">';
    
      //product image
      echo '<div class="product-image lbimg-'.get_the_ID().'">';
      echo $image;
  
      //echo '<div class="product-caption">';
      //echo '<div style="float:right;width:100%;height:100%;padding:10% 20%;text-align:center!important;">';
      //echo '<a href="' . $link . '"><h2 style="font-size:1.5em!important">' .$title. '</h2>';
  	  echo '<div class="product-caption">';
      $price = get_post_meta( get_the_ID(), '_regular_price' , true);
      $sale = get_post_meta( get_the_ID(), '_sale_price', true);
      echo '<span class="price-home">';
      if ( $sale != '' ){
        echo '<span class="original">' . wc_price($price) . '</span> &nbsp; <span class="amount-'.get_the_ID().'">' . wc_price($sale) . '</span>';
      } else {
        echo '<span class="amount-'.get_the_ID().'">' . wc_price($price) . '</span>';
      }
      echo'</span>';
  
      //echo woo_star_rating();
      echo '<span class="title">'.$title.'</span>';
   
      
      echo '<button class="button btn-modal" 
        name="'.get_the_ID().'|'.$link.'|'.$title.'" style="text-transform:none!important;"><span class="fa fa-search"></span></button>';      
      echo '&nbsp;<a href="' . $link . '">';
      echo '<button class="button">More</button>';   
      echo '</a>';
      echo '</div>';
  
      //<a href="http:'.$escaped_url.'#openModal"></a>;
      echo '<div style="display:none" class="excerpt-'.get_the_ID().'">'.get_the_excerpt().'</div>';
      /*echo '<button class="button btn-modal" 
        name="'.get_the_ID().'|'.$link.'|'.$title.'" style="text-transform:none!important;padding-left:2em;padding-right:2em;"><span class="fa fa-search"></span> Detail</button>';
  
      $opts = get_option('shopstyler');
      $add_to_cart = $opts['woo_add_to_cart'];
  
      if ( $add_to_cart != "0") {
        woo_add_to_cart_button($opts);
      } 
      */  
      //echo '</div>';
      //echo '</div>';
      echo '</div>';
      echo '</div>';
  echo '</li>';
endwhile;
echo '</ul><div class="clear"></div>';
}

