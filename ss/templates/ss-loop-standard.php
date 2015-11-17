<?php
/******************************************************************************************
* ss-loop-standard.php
* 
* Description: render loop (shop/product category/product lists) with a standard layout
*
* Author: Antonio Nardone
* Copyright: Antonio Nardone
* Domain /ss/templates
* ****************************************************************************************
/** if product layout is standard*/

	//!!!!!!!! IMPORTANT !!!!!!!
	//remove_woocommerce_hooks();
	
	
	

	//*******************************  render new outpout *********************************
	// render output using new hooks and functions
	// functions refers to ss-parts.php
	// order can be changed or new actions can be added too
	// 2 hooks: ss_before_product_data / ss_product_data
	//*********************************************************************************
	
	//create layout with new hooks
    add_action( 'woocommerce_before_shop_loop_item', 'ss_loop_standard_layout' , 3);

	//add discount before since is position absolute
	add_action ( 'ss_loop_before_product_data' , 'ss_loop_discount' , 10 );

	//image
	add_action ( 'ss_loop_before_product_data' , 'ss_loop_image' , 20 );
	
	//title
	add_action ( 'ss_loop_product_data' , 'ss_loop_title' , 10 );
	//price
	add_action ( 'ss_loop_product_data' , 'ss_loop_price' , 20 );
	
	$settings = get_option ( 'shopstyler' );
	
	
	
	//rating
	add_action ( 'ss_loop_product_data' , 'ss_loop_rating' , 22 );

	if ( get_option ( 'ss_loop_layout' ) != 'landscape' ){
		//excerpt
		add_action ( 'ss_loop_product_data' , 'ss_loop_excerpt' , 25 );
	} else {
		if ( $settings['woo_shop_columns'] < '3cols' ){
			//excerpt
			add_action ( 'ss_loop_product_data' , 'ss_loop_excerpt' , 25 );
		}
	}

		//quickview
		add_action ( 'ss_loop_product_data' , 'ss_loop_quickview' , 40 );
		//add to cart icon
		add_action ( 'ss_loop_product_data' , 'ss_loop_add_to_cart' , 50 );
	/*} else {
		//rating
		add_action ( 'ss_loop_product_data' , 'ss_loop_rating' , 30 );
		//quickview
		add_action ( 'ss_loop_after_product_image' , 'ss_loop_quickview' , 40 );
		//add to cart icon
		add_action ( 'ss_loop_after_product_image' , 'ss_loop_add_to_cart' , 50 );
	}*/
	
/*
function remove_woocommerce_hooks(){
    //remove product image
    remove_action ( 'woocommerce_before_shop_loop_item_title' , 'woocommerce_template_loop_product_thumbnail' , 10 );
    //remove product title
    remove_action ( 'woocommerce_shop_loop_item_title' , 'woocommerce_template_loop_product_title' , 10 );
    //remove product price
    remove_action ( 'woocommerce_after_shop_loop_item_title' , 'woocommerce_template_loop_price' , 10 );
    //remove add to cart button
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); 
    //remove woocommerce rating
    remove_action ( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	
}
*/

