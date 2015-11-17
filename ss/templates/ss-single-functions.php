<?php


function ss_upsells_display( $product ){
 $settings = get_option ( 'shopstyler' );
 $product = new WC_Product( get_the_ID() );	
 $upsells = $product->get_upsells();
 if (!$upsells)
        return;

	$meta_query = WC()->query->get_meta_query();

    $args = array(
        'post_type' => 'product',
        'ignore_sticky_posts' => 1,
        'no_found_rows' => $settings['woo_upsell_limit'],
        'posts_per_page' => $posts_per_page,
        'orderby' => $orderby,
        'post__in' => $upsells,
        'post__not_in' => array($product->id),
        'meta_query' => $meta_query
    );

    $wp_query = new WP_Query($args);
	if ( $wp_query->have_posts() ){
		ss_render_query ( $wp_query , $settings['woo_upsell_label'] );
	}
}


function ss_related_display($product){
	$settings = get_option ( 'shopstyler' );
	$related = get_related_custom ( get_the_ID() );
	wp_reset_query();
  	$args = array(  'post_type' => 'product', 
                'stock' => 1, 
                'post__in' => $related
               );

  $wp_query = new WP_Query( $args );
 
  	//render output
  	if ( $wp_query->have_posts() ){
	  ss_render_query($wp_query, $settings['woo_product_related_label'] );
	}
}

//New "Related Products" function for WooCommerce
function get_related_custom( $id, $limit = 3 ) {
    global $woocommerce;
	$settings = get_option ( 'shopstyler' );
	$limit = $settings['woo_product_related_limit'];
    // Related products are found from category and tag
    $tags_array = array(0);
    $cats_array = array(0);

    // Get tags
    $terms = wp_get_post_terms($id, 'product_tag');
    foreach ( $terms as $term ) $tags_array[] = $term->term_id;

    // Get categories (removed by NerdyMind)


    $terms = wp_get_post_terms($id, 'product_cat');
    foreach ( $terms as $term ) $cats_array[] = $term->term_id;


    // Don't bother if none are set
    if ( sizeof($cats_array)==1 && sizeof($tags_array)==1 ) return array();

    // Meta query
    $meta_query = array();
    $meta_query[] = $woocommerce->query->visibility_meta_query();
    $meta_query[] = $woocommerce->query->stock_status_meta_query();

    // Get the posts
    $related_posts = get_posts( apply_filters('woocommerce_product_related_posts', array(
        'orderby'        => 'rand',
        'posts_per_page' => $limit,
        'post_type'      => 'product',
        'fields'         => 'ids',
        'meta_query'     => $meta_query,
        'tax_query'      => array(
            'relation'      => 'OR',
            array(
                'taxonomy'     => 'product_cat',
                'field'        => 'id',
                'terms'        => $cats_array
            ),
            array(
                'taxonomy'     => 'product_tag',
                'field'        => 'id',
                'terms'        => $tags_array
            )
        )
    ) ) ); 
    $related_posts = array_diff( $related_posts, array( $id ));
	//woo_render_sidebar_product ( $related_posts );
    return $related_posts;
}

function ss_render_query($wp_query,$title){
echo '<div class="cat-title ss-collateral-title">'.$title.'</div>';
echo '<div class="ss-collateral-wrapper">';
echo '<ul class="products">';
    if ( $sale != '' ){
      $discount = product_discount($price,$sale);
      echo '<div class="discount"><span>-'. $discount.'%</span></div>';
    }
while ( $wp_query->have_posts() ) : $wp_query->the_post();
    $image = woocommerce_get_product_thumbnail('shop_catalog');
	$image_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
    $link = get_permalink ( get_the_ID() );
    $title = get_the_title( get_the_ID());
    $url =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    $price = get_post_meta( get_the_ID(), '_regular_price' , true);
    $sale = get_post_meta( get_the_ID(), '_sale_price', true);
      
    
    echo '<li class="product ss-collateral-product">';
      echo '<div class="product-container" style="display:block;">';
    
      //product image
      echo '<div class="product-image lbimg-'.get_the_ID().'">';
	  echo '<a href="'.$image_url.'" data-lightbox="lbimage-'.get_the_ID().'" data-title="'.get_the_title().'" class="lbimg-'.get_the_ID().'">';
      echo $image;
  	  echo '</a>';
	  
      //echo '<div class="product-caption">';
      //echo '<div style="float:right;width:100%;height:100%;padding:10% 20%;text-align:center!important;">';
      //echo '<a href="' . $link . '"><h2 style="font-size:1.5em!important">' .$title. '</h2>';
	echo '</div><div style="float:left;padding-left:2%;">';
      echo '<a href="' . $link . '"><span class="title"><h2>'.$title.'</h2></span>';
      echo '<span class="price">';
      if ( $sale != '' ){
        echo '<span class="amount amount-'.get_the_ID().'">' . wc_price($sale) . '</span>';
      } else {
        echo '<span class="amount amount-'.get_the_ID().'">' . wc_price($price) . '</span>';
      }
      echo'</span>';
  
      //echo woo_star_rating();
     
   	  ss_loop_rating();
	  echo '</a><div style="position:absolute;top:0;right:0">';
      ss_loop_quickview();
	  echo '</div>';
      //echo '<button class="button btn-modal" 
        //name="'.get_the_ID().'|'.$link.'|'.$title.'" style="text-transform:none!important;"><span class="fa fa-search"></span></button>';      
      //echo '&nbsp;<a href="' . $link . '">';
      //echo '<button class="button">More</button>';   
      //echo '</a>';
      
  
      
      echo '<div style="display:none" class="excerpt-'.get_the_ID().'">'.get_the_excerpt().'</div>';
     
      echo '</div>';
	  
	  echo '</div>';
	  
  echo '</li>';
endwhile;
echo '</ul></div>';
}