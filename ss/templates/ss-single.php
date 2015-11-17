<?php



add_action( 'wp', 'init_single' );

function init_single() {
	
	
  if ( is_product() ) {
  	include ( dirname ( __FILE__ ) . '/ss-single-functions.php' );
	global $product;
	global $settings;
	$settings = get_option('shopstyler');
	
	//remove woocommerce hooks
	single_remove_hooks();
	//add ss hooks
	single_add_hooks();
	
	//remove page title
	remove_shop_title();
	
	//breadcrumbs
	ss_breadcrumbs($settings);
	
	$idp = get_the_ID();
	
	//start product summary
	add_action ( 'ss_content' , 'ss_product_summary' );
	
	//add product data tabs
	

	//add_action ( 'ss_single_summary_after' , 'social_footer_product' );
	add_action ( 'ss_single_summary_after' , 'woocommerce_output_product_data_tabs' , 10 );
	
	
	
	//add upsell products
    if ( $settings['woo_product_upsell'] == "1" ){
		if ( $settings['woo_collateral_style'] == 'boxed' ){
			add_action( 'ss_single_summary_after', 'ss_upsells_display' , 20 );
	  	} else {
			add_action( 'ss_footer', 'ss_upsells_display' , 5 );
		}
    }
    
	//add related
    if ( $settings['woo_product_related'] == "1" ){	
	  	if ( $settings['woo_collateral_style'] == 'boxed' ){
	      	add_action( 'ss_single_summary_after', 'ss_related_display' , 20 );
		} else {
		  	add_action( 'ss_footer', 'ss_related_display' , 10 );	
		}
    }
	
	//add call to action
	if ( $settings['woo_calltoaction_enable'] == "1" ){
		add_action ( 'ss_footer' , 'ss_calltoaction' , 30 );
	}
	
	
	//pseudo footer	
	if ( $settings['woo_footer_enable'] == "1" ){
		add_action ( 'ss_footer' , 'ss_footer' , 40 );
	}		

	
	//categories tree
	if ( $settings['woo_categories'] == "1" ){
		add_action ( 'ss_sidebar' , 'woo_categories_tree' );
	}
	//product promote      
	if ( $settings['woo_promote'] != "" ){
		//return;
  		add_action ( 'ss_sidebar' , 'ss_promote_product' );
	}
	
  }

}

function single_add_hooks(){
add_action ( 'woocommerce_before_single_product' , 'ss_wrapper_start' , 10 );
add_action ( 'woocommerce_before_single_product' , 'wrapper_ss_content_start' , 20 );
add_action ( 'woocommerce_single_product_summary' , 'wrapper_ss_single' , 25 );

add_action ( 'woocommerce_after_single_product' , 'wrapper_ss_content_end' , 10 );

add_action ( 'woocommerce_after_single_product' , 'wrapper_ss_sidebar_start' , 20 );
add_action ( 'woocommerce_after_single_product' , 'wrapper_ss_sidebar_end' , 30 );

add_action ( 'woocommerce_after_single_product' , 'wrapper_ss_related' , 55 );

add_action ( 'woocommerce_after_single_product' , 'wrapper_ss_footer_start' , 50 );
add_action ( 'woocommerce_after_single_product' , 'wrapper_ss_footer_end' , 60 );

add_action ( 'woocommerce_after_single_product' , 'ss_wrapper_end' , 70 );

}

function single_remove_hooks(){
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
	remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
	
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );	
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
}

function remove_shop_title(){
	remove_action ( 'ss_content' , 'ss_shop_title' );
}

function ss_breadcrumbs($settings){
//$settings = get_option ( 'shopstyler' );
if ( $settings['woo_breadcrumbs'] == "1" ){
	add_action ( 'ss_content' , 'woocommerce_breadcrumb' );
} else {
	remove_action ( 'woocommerce_before_shop_loop' , 'woocommerce_breadcrumb' , 10 );
}
}

function ss_product_summary(){
	$settings = get_option ( 'shopstyler' );
    $single_layout = $settings [ 'woo_single_product_layout'];
	$left = 'ss_single_left';
	$right = 'ss_single_right';
	if ( $single_layout == 'right' ){
		$left = 'ss_single_right';
		$right= 'ss_single_left';
	}
	    add_action ( $left , 'ss_single_product_images' ); 
		add_action ( $left , 'social_footer_product' );
		add_action ( 'ss_single_thumbs' , 'ss_single_product_thumnails' );
		add_action ( $right , 'ss_single_rating' );
		add_action ( $right , 'ss_single_title' );
		add_action ( $right , 'woocommerce_template_single_meta' );
		add_action ( $right , 'woocommerce_template_single_price' );
		add_action ( $right , 'woocommerce_template_single_add_to_cart' );

		add_action ( $right , 'woocommerce_template_single_excerpt' );
}

function ss_single_title($product){
	echo '<h2>' . get_the_title(get_the_ID()). '</h2>';
}

function ss_single_rating(){
	echo woo_star_rating('-float');
}

function ss_single_product_images ($product){
        
        echo '<div class="single-product-image">';
        $image_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
        $image = '<a href="' . $image_url .'" itemprop="image" class="woocommerce-main-image zoom first" title data-rel="prettyPhoto[product-gallery]"><img src="'.$image_url.'"></a>';
        echo $image;
       
        echo '</div>';
        
}

function ss_single_product_thumnails($product){
        echo '<div class="single-product-thumbnail">';
        $thumbnails = get_thumbnails($product);
        echo '</div>';
}

   //get thumbnails
function get_thumbnails($product){
  global $product;
  $attachment_ids = $product->get_gallery_attachment_ids();

    foreach( $attachment_ids as $attachment_id ) 
    {
        $title = get_the_title( $attachment_id );
        //echo get_post_field( 'post_excerpt', $attachment_id );
        $image_link = wp_get_attachment_url( $attachment_id );
        echo '<a href="'.$image_link.'" class="zoom" title data-rel="prettyPhoto[product-gallery]"><img src="'.$image_link.'" class="gallery-thumb" width="100 alt="'.$title.'"></a>';
    }  
}

function woo_reviews_count (){
    
        echo woo_star_rating('-float');
        
        
        if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
	       return;
        }
        //$reviews_count = $product->get_review_count();
        //echo '<div style="float:left">' .woo_star_rating().'</div>';
        
        //if ( intval($reviews_count) > 0 ){    
        //    echo '<a href="#tab-reviews"><span class="rating">'.$reviews_count.' (reviews)</span></a>';
        //}
        
    }
//add_action ( 'ss_content' , 'woocommerce_show_product_images' );