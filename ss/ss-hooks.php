<?php
/*
ss-hooks.php
Version:      1.0.0
Author:       Antonio Nardone
Description:  Create hook for templating Woocommerce 
Text Domain:  /ss

*/

//***************** ShopStyler Layout Hooks **********************
//used to create layuout hooks 
//replaces all woocommerce hooks creating a new layout structure
//ss_box : main page container
//ss_content: woocommerce loop container
//ss_sidebar: create shopstyler pseudo sidebar
/****************************************************************/
 
//add ss_header hook in order to add a heade on each page 
function wrapper_ss_head(){
	do_action ( 'ss_header_before' );
	echo '<div class="clear"></div>';
	echo '<div class="ss_header animated zoomIn">';
	do_action ( 'ss_header' );
	echo '</div>';
} 

function ss_wrapper_start(){
	?>
	<!-- ss main wrapper -->
	<div class="ss_wrapper">
	<?php
		do_action ( 'ss_wrapper' );
}

function ss_wrapper_end(){
	?>
	</div>
	<!-- /ss main wrapper-->
	<?php
}

 
//add ss_content hook (used to output the content) 
//add 2 containers (ss_box and ss_content)
//ss_box : used for fullwidth/boxed layout using width css
//ss_content: used for woocommerce loop
function wrapper_ss_content_start(){
	//open ss_box main container
	?>
			<!-- ss_box -->
			<div class="ss_box">
				<?php do_action ( 'ss_before_content' );?>
				<!-- ss_content -->
				<div class="ss_content">
					<?php
					do_action ( 'ss_content' );
}

//add ss_content_after hook (used to add functions after woocommerce loop, i.e. pagination)
//close the ss_content containers
function wrapper_ss_content_end(){
	do_action ( 'ss_content_after' );
	//close ss_content container
	echo '</div><!-- ./ss_content end -->';
}

//create ss_sidebar hook for pseudo shopstyler sidebar
//create a pseudo sidebar hooks
//used to add compoents to pseudo sidebar
function wrapper_ss_sidebar_start(){
	//create ss_sidebar pseudo sidebar
	echo '<!--ss_sidebar--><div class="ss_sidebar">';
	do_action ( 'ss_sidebar' );
}

//create ss_sidebar_after hook for pseudo shopstyler sidebar
//close pseudo shopstyler sidebar
//used to add component before closing pseudo sidebar
function wrapper_ss_sidebar_end(){
	do_action ( 'ss_sidebar_after' );
	//close ss_sidebar
	echo '</div><!-- ./ss_sidebar end-->';
	
}

//create ss_footer hook for pseudo shopstyler footer
//used to add component after content and sidebar
function wrapper_ss_footer_start(){
	//close ss_box container
	echo '</div><!-- ./ss_box end-->';
	//start ss_footer
	echo '
	<div class="clear"></div>
	<!--ss_footer-->
	<div class="ss_footer">';
	do_action ( 'ss_footer' );
}

//close ss_footer pseudo footer
function wrapper_ss_footer_end(){
	echo '</div><!-- /. ss_footer end-->';
}

/********************** ./ end of ShopStyler Layout Hooks **************/ 



//********************** Create Loop Hooks **********************************/
//add shopstyler layout hooks (defined above)
//add ss_header hook (used to create fullwidth/boxed layouts)
$settings = get_option ( 'shopstyler' );
$screen = $settings['woo_screen'];
$layout = $settings['woo_layout'];

add_action ( 'woocommerce_before_shop_loop' , 'wrapper_ss_head' , 2 );
add_action ( 'woocommerce_before_shop_loop' , 'ss_wrapper_start' , 3 );
	
//add ss_content hook (woocommerce loop goes here)
add_action ( 'woocommerce_before_shop_loop' , 'wrapper_ss_content_start' , 5);

	

//add ss_sidebar pseudo sidebar
if ( $layout == 'nosidebar' ){
	add_action ( 'ss_before_content' , 'wrapper_ss_sidebar_start' , 20);
	add_action ( 'ss_before_content' , 'wrapper_ss_sidebar_end' , 30);
	//close wrapper_shop_loop (after woocommerce loop goes here)
	add_action ( 'woocommerce_after_shop_loop' , 'wrapper_ss_content_end' , 10 );
} else {
	//close wrapper_shop_loop (after woocommerce loop goes here)
	add_action ( 'woocommerce_after_shop_loop' , 'wrapper_ss_content_end' , 10 );
	add_action ( 'woocommerce_after_shop_loop' , 'wrapper_ss_sidebar_start' , 20);
	add_action ( 'woocommerce_after_shop_loop' , 'wrapper_ss_sidebar_end' , 30);
}

//add ss_footer pseudo footer
add_action ( 'woocommerce_after_shop_loop' , 'wrapper_ss_footer_start' , 100 );
add_action ( 'woocommerce_after_shop_loop' , 'wrapper_ss_footer_end' , 110 );
add_action ( 'woocommerce_after_shop_loop' , 'ss_wrapper_end' , 120 );


/************************ /Create Loop Hooks ********************************/



//*******************************  remove original hooks *******************************
/* general settings : remove sale flash and page per title */   
  //remove sales flash
  add_filter('woocommerce_sale_flash', 'woo_custom_hide_sales_flash');
  function woo_custom_hide_sales_flash(){
      //print_r ( $settings['woo_image_border'] ); 
      return false;
  }

  //remove page title
  add_filter('woocommerce_show_page_title','woo_hide_page_title');
  function woo_hide_page_title(){
     return false;
  }

//remove loop general options
remove_action ( 'woocommerce_before_shop_loop' , 'woocommerce_result_count' , 20 );
remove_action ( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering' , 30 );

// shopstyler recreate woocommerce template loops generating new loop based on settings

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
//******************************  /remove original hooks *******************************



//********************** Create Single Hooks **********************************/
function wrapper_ss_single(){
	echo '<div class="ss_single_summary">';
		echo '<div class="ss_single_left">';
		do_action ( 'ss_single_left' );
		echo '</div>';
	
		echo '<div class="ss_single_thumbs">';
		do_action ( 'ss_single_thumbs' );
		echo '</div>';
	
		echo '<div class="ss_single_right">';
		do_action ( 'ss_single_right' );
		echo '</div>';
		echo '<div class="clear"></div>';
		do_action ( 'ss_single_summary_after' );
	
	echo '</div>';
}

function wrapper_ss_related(){
	echo '<div class="clear"></div>';
	echo '<div class="ss_related">';
		do_action ( 'ss_related' );
	echo '</div>';
}


add_action ( 'woocommerce_before_single_product' , 'wrapper_ss_content_start' , 20 );
add_action ( 'woocommerce_single_product_summary' , 'wrapper_ss_single' , 25 );

add_action ( 'woocommerce_after_single_product' , 'wrapper_ss_content_end' , 10 );

add_action ( 'woocommerce_after_single_product' , 'wrapper_ss_sidebar_start' , 20 );
add_action ( 'woocommerce_after_single_product' , 'wrapper_ss_sidebar_end' , 30 );

add_action ( 'woocommerce_after_single_product' , 'wrapper_ss_related' , 40 );

add_action ( 'woocommerce_after_single_product' , 'wrapper_ss_footer_start' , 50 );
add_action ( 'woocommerce_after_single_product' , 'wrapper_ss_footer_end' , 60 );

	

	
	//add_action ( 'woo_commerce_after_single_product_summary' , 'wrapper_ss_content_end' , 2 );

