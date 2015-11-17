<?php
/*
Plugin Name:  ShopStyler WooCommerce Customizer
Plugin URI:   http://www.moodgiver.com
Version:      2.1.0
Author:       Antonio Nardone
Description:  Customize your shop.
			  Create your personal woocommerce template 
			  Customize one of the 37 layouts available (21 fullwidth / 14 boxed)
			  Add unique components (custom header, social sharing, footer banner , best sellers, hot products, quick view, etc.)
			  Use embedded palette system or assign specific styles (colors&background)
			  Add images styling (boxed, rounded, circle) and borders
              Add custom sidebars
			  Optimized for Themify Flow framework. 
              Options panel and settings use embedded Redux Framework
              No conflict with theme using Redux Framework for theme customization
Text Domain:  shopstyler
Domain Path:  /languages
*/

//if admin mode load Redux Framework and option panel
if ( is_admin() ){

  //init redux framework
  include ( dirname ( __FILE__ ) . '/admin/admin-init.php' );
  
  //shopstyler custom css selectors functions
  include ( dirname ( __FILE__ ) . '/ss/admin/ss-admin-css-compiler.php' );
  
  //init plugin functions (initiated after)
  //custom css compiler
  add_action ( 'redux/options/shopstyler/saved' , 'shopstyler_render_custom_css' , 100);
  
  
  //custom css compiler
  function shopstyler_render_custom_css(){
    global $shopstyler;
    $css = '';
    
    
    //shop as homepage or set homepage
    if ( $shopstyler['woo_homepage'] == "1" ){
      $shop = get_page_by_title( 'Shop' );
      
      if ( $shopstyler['woo_homepage_home_standard'] == "1"){
        update_option( 'page_on_front', $shop->ID );
        update_option( 'show_on_front', 'page' );
      } else {
        if (get_page_by_title('Shop Landing Page') == NULL) {
            global $user_ID;
            $page['post_type']    = 'page';
            $page['post_content'] = '[shopstyler-categories-page]';
            $page['post_parent']  = 0;
            $page['post_author']  = $user_ID;
            $page['post_status']  = 'publish';
            $page['post_title']   = 'Shop Landing Page';
            $page = apply_filters('shopstyler_add_custom_home_page', $page, '');
            $pageid = wp_insert_post ($page);
            if ($pageid == 0) { /* Add Page Failed */ }
          }
          $home = get_page_by_title( 'Shop Landing Page' );
          update_option( 'page_on_front', $home->ID );
          update_option( 'show_on_front', 'page' );
      }
      
    } else {
        if ( $shopstyler['woo_homepage_select_post'] == "1" ){
          update_option( 'page_on_front', 2366 );
          update_option( 'show_on_front', 'posts' );
        } else {
          update_option( 'page_on_front', $shopstyler['woo_homepage_select_page'] );
          update_option( 'show_on_front', 'page' );
        }
    }
    
    //shop header
    if ( $shopstyler['woo_header_image_enable'] == "1" ){
      //$css .= css_render_shop_header ();
    }
	
	if ( $shopstyler['woo_shopheader_enable'] == "1" ){
      $css .= css_render_shopstyler_header ();
    }
    
	//products per page
  	$post_per_page = get_option ( 'posts_per_page' );
  	update_option ( 'posts_per_page' , $shopstyler['woo_shop_products_per_page'] , 'yes' );
  
    //button radius    
    if ( $shopstyler['woo_button_radius'] == "1" ){
      $css .= '.button { border-radius:3px!important; }';
    }
     
    //shop product box alignment
    $css .= 'ul.products { text-align: '.$shopstyler['woo_alignment'] .'!important; }';
    
    //images selectors to be set (shop/single product)
    $selector = 'ul.products li.product a img , .woocommerce-page div.single-product-wrapper img , .single-product-image img , .ss_footer ul.products li.product img , .gallery-thumb , .product-image-promote img ';
    
    //images style (square/rounded/circle/rounded top/rounded bottom)
    $status = $shopstyler['woo_images_style']; 
    $css .= css_render_images_style ( $selector , $status );
    
    //images borders
    $border = $shopstyler['woo_image_border'];
    $css .= css_render_images_border ( $selector , $border );

    //css scale effect
    if ( $shopstyler['woo_shop_scale'] ){
      $css .= css_render_scale();  
    }
      
    //css callout  
    if ( $shopstyler ['woo_callout_enable'] == "1" ){
      	$css .= css_render_callout(0); 
    }
	
	//css footer
	if ( $shopstyler ['woo_footer_enable'] == "1" ){
		$css .= css_render_footer();
	}
        
    //using palette mode
    if ( $shopstyler['woo_use_palette'] == "1" ){
        $palette = $shopstyler['woo_opt_palette_color'];
        $css .= css_render_palette($palette);    
    } else {
        $css .= css_render_product_selectors($shopstyler);
    }
   
    //single product layout
    $single_layout = $shopstyler [ 'woo_single_product_layout'];
    $css .= css_render_single_product_layout ( $single_layout );
    
    //splash enabled
    if ( $shopstyler ['woo_splash_enable'] == "1" ){
      $css .= css_render_splash();
    }
    
	$css .= css_render_slider_sidebar();
	
    //write to custom.css
    //$dir = ABSPATH . 'wp-content/plugins/ss2/assets/css/';
	$dir = dirname ( __FILE__ ) . '/assets/css/';
    
	//Create Template custom CSS
	include ( dirname ( __FILE__ ) . '/ss/admin/ss-admin-css-template.php' );

	$custom_css = ss_template_css($shopstyler);
    file_put_contents ( $dir . 'ss-custom.css' , $css.$custom_css ); 
	
  }
  

} else {

  // frontend mode
    
    /******************************** LOAD SHOPSTYLER ENGINE *********************************/ 
    /* !IMPORTANT           => after plugins are loaded load engine <=                       */
    /*****************************************************************************************/
    
	add_action( 'plugins_loaded', 'ss_loop_template' ); 
    
	//custom home shortcode 
	add_shortcode( 'shopstyler-categories-page', 'ss_create_categories_page' );
    
	function ss_create_categories_page(){
		include ( dirname ( __FILE__ ) . '/ss/templates/ss-categories.php' );
	}
    	
	function ss_loop_template(){
		
		//include hooks, parts and functions	
		include ( dirname ( __FILE__ ) . '/ss/ss-hooks.php' );
		include ( dirname ( __FILE__ ) . '/ss/templates/ss-parts.php' );
		include ( dirname ( __FILE__ ) . '/ss/templates/ss-functions.php' );
       
		
		//create template for loop pages		
		include ( dirname ( __FILE__ ) . '/ss/ss-loop.php' );
		
		//create template for single product page
		include ( dirname ( __FILE__ ) . '/ss/templates/ss-single.php' );
		
		
    }  
	
    function shopstyler_load_base_css(){
        $opt = get_option ( 'shopstyler' );
       
        //load layout css style
        $css_url = plugins_url ( 'ss2') . '/assets/css/' ;
        
        wp_enqueue_style( 'shopstyler-css-shop', $css_url . 'shop.css' , array());
        
        if ( is_product() ){
          wp_enqueue_style( 'shopstyler-css-product', $css_url . 'single-product.css' , array());
        }
        
        //wp_enqueue_style( 'shopstyler-css-custom', $css_url . 'custom.css' , array());
		
		wp_enqueue_style( 'shopstyler-template-css', $css_url . 'ss-custom.css' , array());
		
		

		wp_enqueue_style( 'shopstyler-animate-css', $css_url . 'animate.min.css' , array());
		
		
		wp_enqueue_style( 'shopstyler-css-media-queries', $css_url . 'shopstyler-media-queries.css' , array());
	
		// enqueue js scripts
    	wp_enqueue_script ( 'shopstyler-js' , plugins_url ( 'shopstyler') . '/assets/js/shopstyler.js' , array() , '1.0.0' , true );
   
   		

		//create quick view modal
		add_action ( 'wp_footer' , 'woo_create_dialog' );

		if ( $opt['woo_splash_enable'] == "1" ){
			add_action ( 'wp_footer' , 'woo_create_splash' );
			wp_enqueue_script ( 'shopstyler-splash-js' , plugins_url ( 'shopstyler') . '/assets/js/shopstyler-splash.js' , array() , '1.0.0' , true );
   	
		}
	            
    }
   
   wp_enqueue_script ( 'lightbox-js' , plugins_url ( 'shopstyler') . '/assets/js/lightbox/js/lightbox.min.js' , array() , '1.0.0' , true );
	
	wp_enqueue_style( 'shopstyler-lightbox-css', plugins_url ( 'shopstyler') . '/assets/js/lightbox/css/lightbox.css' , array());
 
}

