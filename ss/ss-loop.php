<?php

add_action( 'wp', 'init' );

function init() {
	
	global $settings;
	$settings = get_option ( 'shopstyler' );
	$is_shop_homepage = $settings['woo_homepage'];
	
	
	
	if ( $is_shop_homepage == "1" ){
		
			
		if ( is_front_page() ){
			//css folder path
        	$css_url = plugins_url ( 'shopstyler') . '/assets/css/' ;
			// enqueue styles and custom styles
    		add_action( 'wp_head', 'shopstyler_load_base_css');
			wp_enqueue_style( 'shopstyler-categories-page-css', $css_url . 'shop-custom-home-full.css' , array());
		}
	}
	if ( is_shop() || 
		is_product_category() || 
		is_product() || 
		is_cart() || 
		is_checkout() 
		){

		// enqueue styles and custom styles
    	add_action( 'wp_head', 'shopstyler_load_base_css');
		
		
 	}
	
	
	if (   is_shop() || is_product_category()  ) {

				
		//get current loop layout saved in a reserved option
		$loop_type = get_option ( 'ss_loop_layout' );
		
		
		//HEADER IMAGE HOOK (ss_header)
		//header image hook
		if ( $settings['woo_header_image_enable'] == "1" ){
			//add_action ( 'ss_header' , 'woo_shop_header' );
			
		}
		
		if ( $settings['woo_shopheader_enable'] == "1" ){
			if ( is_shop() ){
				add_action ( 'ss_header' , 'ss_shopheader' );
			} 
			if ( is_product_category() ){
				add_action ( 'ss_header' , 'ss_shopheader_category' );
			}
		}
		
		//sticky option
		if ( $settings['woo_sticky_enable'] == "1" ){
			add_action ( 'ss_header_before' , 'ss_sticky' , 20 );
		}
		
		//BEFORE LOOP HOOKS (ss_content)
		//breadcrumbs
		if ( $settings['woo_breadcrumbs'] == "1" ){
			add_action ( 'ss_before_content' , 'woocommerce_breadcrumb' );
		} else {
			remove_action ( 'woocommerce_before_shop_loop' , 'woocommerce_breadcrumb' , 10 );
		}
		
		//loop mode
		if ( !is_product() ){
		
			
			if ( !is_front_page() ){

				//page title
				add_action ( 'ss_content' , 'ss_shop_title' );
			
				//loop content
				switch ( $loop_type ){
					case 'up':
						include ( dirname ( __FILE__ ) . '/templates/ss-loop-standard.php' );
						
						break;
					case 'left':
						//include ( dirname ( __FILE__ ) . '/templates/ss-loop-landscape.php' );
						include ( dirname ( __FILE__ ) . '/templates/ss-loop-standard.php' );
						break;
					case 'right':
						//include ( dirname ( __FILE__ ) . '/templates/ss-loop-landscape.php' );
						include ( dirname ( __FILE__ ) . '/templates/ss-loop-standard.php' );
						break;
					case 'image':	
						//include ( dirname ( __FILE__ ) . '/templates/ss-loop-image.php' );
						include ( dirname ( __FILE__ ) . '/templates/ss-loop-standard.php' );
						break;
					default :
						include ( dirname ( __FILE__ ) . '/templates/ss-loop-standard.php' );
				}
			
			}
		}
			
		
		//SIDEBAR HOOKS
		include ( dirname ( __FILE__ ) . '/templates/ss-sidebar.php' );
		
		/********************* FOOTER HOOKS ***********************************/
		include ( dirname ( __FILE__ ) . '/templates/ss-footer.php' );

	}
	
	if ( is_cart() ){
		include ( dirname ( __FILE__ ) . '/templates/ss-cart.php' );
	}
	
}

