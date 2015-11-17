<?php
	global $settings;
	$settings = get_option ( 'shopstyler' );
		//categories tree
		if ( $settings['woo_categories'] == "1" ){
			add_action ( 'ss_sidebar' , 'woo_categories_tree' );
		}
		
		//price filter
		if ( $settings['woo_price_filter'] === "1" ){
		  	add_action ( 'ss_sidebar' , 'woo_set_price_filter');
			function woo_set_price_filter (){
		    	the_widget( 'WC_Widget_Price_Filter');
		  	}
		}
		
		/*variations filter does not works to be investigated*/
		function ss_variations(){
			the_widget ( 'WC_Widget_Layered_Nav' );
		}
		add_action ( 'ss_sidebar' , 'ss_variations' );
		
		//products sorting
		if ( $settings['woo_products_sorting'] === "0" ){
		  	remove_action ( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering' , 30 );
		} else {
		  	remove_action ( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering' , 30 );
			add_action ( 'ss_sidebar' , 'woocommerce_catalog_ordering' );
		}
		
		//products count      
		if ( $settings['woo_products_count'] === "0" ){
		  	remove_action ( 'woocommerce_before_shop_loop' , 'woocommerce_result_count' , 20 );
		} else {
		  	remove_action ( 'woocommerce_before_shop_loop' , 'woocommerce_result_count' , 20 );
		  	add_action ( 'ss_sidebar' , 'woocommerce_result_count' , 40 );
		}
		
		//product promote      
		if ( $settings['woo_promote'] != "" ){
		  	add_action ( 'ss_sidebar' , 'ss_promote_product' , 50 );
		}
		/******************** /SIDEBAR HOOKS **********************************
