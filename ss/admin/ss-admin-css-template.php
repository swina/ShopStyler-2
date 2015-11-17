<?php
/*
ss-admin-css-template.php
Version		: 1.0.0
Author		: Antonio Nardone
Description : Set template using settings saved 
Depends		: shopstyler.php (admin status)
Text Domain : shopstyler/ss/admin
*/

//***************** ShopStyler Template Engine **********************
//based on settings generate new template 
/****************************************************************/

	
  
  /*******************************************  
  *
  *     CREATE TEMPLATE LAYOUT STYLE (custom css) 
  *
  ********************************************/
function ss_template_css($settings){

//get layout
$screen = $settings['woo_screen']; //fullwidth or boxed
$layout = $settings['woo_layout']; //nosidebar , left sidebar , right sidebar

$template_css = $screen . '-' .$layout;
$col_type = '';		
$box_css = '';
$settings = get_option ( 'shopstyler' );	
  
  

	//fullwidth - boxed css settings
  	if ( $screen == 'full' ){
 		
		/*FULLWIDTH */ 
		$screen_width = '100%'; 
		$cols = $settings['woo_shop_columns_full'];
		$box_css = 'padding: 0 2% 0 2%!important;';
		
		
		if ( $cols > '4cols' ){
			//IF MORE 4 COLS PER ROW
			$col_type = $settings['woo_shop_product_layout_standard'];
		} else {
			//IF < 4 COLS PER ROW
			$col_type = $settings['woo_shop_product_layout_all'];
		}
		
		$template_css .= '-' . $cols . '.css';
	
  	} else {
		//BOXED
		$screen_width = '1170px';
  		$cols = $settings['woo_shop_columns'];
		$col_type = $settings['woo_shop_product_layout_boxed'];
  	}
	
	//not really used anymore
	$template_css .= '-' . $cols . '.css';
	
	
	//no sidebar layout css
	if ( $layout == 'nosidebar' ){
		$content_css = '.ss_content { width: 100%!important; margin:auto!important; }';
		$sidebar_css = '.ss_sidebar {
		    width: 22%!important;
		    display: none;
		    position: absolute;
		    background: #fff;
		    z-index: 99;
		    padding-top: 2%;
		    padding-right: 2%;
		    padding-left: 1%;
		    margin-top: 1em!important;
		    border: 2px solid #eaeaea;
			}';
	}
	
	//left sidebar layout
	if ( $layout == 'sidebar-left' ){
		$content_css = '.ss_content { float:right; width: 78%!important; }';
		$sidebar_css = '.ss_sidebar { float:left; width: 22%!important; box-shadow:none!important; }';
	} 
	
	//right sidebar layout
	if ( $layout == 'sidebar-right' ){
		$content_css = '.ss_content { float:left; width: 78%!important; }';
		$sidebar_css = '.ss_sidebar { float:left; width: 22%!important; box-shadow:none!important; }';
	}
	

	//add a custom option to be used to get the current loop layout
  	if ( !get_option ( 'ss_loop_layout' ) ){
  		add_option ( 'ss_loop_layout' , $col_type );
  	} else {
  		update_option ( 'ss_loop_layout' , $col_type );
 	}
    
	
  	$col_width = '';
  
    //set product cols width and product title size
	//according to current screen mode
  	switch ( $cols ){
  		case '2cols':
			$col_width = "45%";
			$h2_size = '1.4vw!important';
			if ( $screen_width != '100%' ){		
				$h2_size = '1.1vw!important';
			}
			break;
		case '3cols':
			$col_width = "28%";
			$h2_size = '1.3vw!important';
			if ( $screen_width != '100%' ){		
				$h2_size = '1vw!important';
			}
			break;
		case '4cols':
			$col_width = "20%";
			$h2_size = '1.3vw!important';
			if ( $screen_width != '100%' ){		
				$h2_size = '.9vw!important';
			}
			break;
		case '5cols':
			$col_width = "16%";	
			$h2_size = '1.2vw!important';
			if ( $screen_width != '100%' ){		
				$h2_size = '.8vw!important';
			}
			break;
		case '6cols':
			$col_width = "12%";
			$h2_size = '1vw!important';
			if ( $screen_width != '100%' ){		
				$h2_size = '.7vw!important';
			}
			break;
		default :
			$col_width = "28%";
			$h2_size = '.6vw!important';
  	}
  
    
  	$custom_css = '';
	
	//ss_wrapper css
	$wrapper_bg = $settings['woo_background'];
	if ( $wrapper_bg['background-image'] == '' ){
		$wrapper_css = 'background: '.$wrapper_bg['background-color'].';';
		
	} else {
		$wrapper_css = 'background: url('.$wrapper_bg['background-image'].') '
		.$wrapper_bg['background-repeat'].' '
		.$wrapper_bg['background-attachment'].' '
		.$wrapper_bg['background-position'].';';
		$wrapper_css .= 'background-size: '.$wrapper_bg['background-size'].';';
	}
	$custom_css .= '.ss_wrapper { '. $wrapper_css .' }';
	$custom_css .= 'body { background: ' .$wrapper_bg['background-color']. ';}';
	
	$custom_css .= 'div.ss_wrapper p , .excerpt { color: '.$settings['woo_product_desc_color']. '!important; }';
	
	
	//ss_box css (setting to fullwidth or boxed 1160px)
	$custom_css .= '.ss_box { width: ' . $screen_width .'!important; 
			margin:auto!important; '.$box_css.' 
			}';
	
	//content and sidebar width css
	//ss_content and ss_sidebar css
	$custom_css .= $content_css . $sidebar_css;		
	
	//products loop container css
	$custom_css .= 'ul.products { margin: 0 0 0 1%!important; padding-top:2%!important; }';

	//item css
	$selector = 'ul.products li.product ';
  	$custom_css .= 'ul.products li.product  { width: ' .$col_width . '!important; margin: 0 2% 2%  1.8%!important; }';
	$custom_css .= 'ul.products li.product img { width:100%!important; }';
	$link = $settings['woo_link_color'];

    //shop product image layout (flipped) css
	if ( $col_type == 'image' ){
		$custom_css .= '.product-standard:hover { border:4px solid '.$link['regular'].'!important; 
					background: ' .$wrapper_bg['background-color'].'!important;
					height:97%;
		}';
		if ( $settings['woo_images_style'] == 'circle' ) {
			$custom_css .= '.product-standard:hover { border-radius:50%!important; }';
		}
	}
	
	//shop product standard layout css
	if ( $col_type == 'up' ){
		$custom_css .= '.product-standard { 
			background:transparent!important; 
			position: relative!important; 
			opacity:1!important;
			top:0;
			-moz-transform: scale(1);
    		-o-transform: scale(1);
    		-webkit-transform: scale(1);
			transform: scale(1);
			border:0;
			}';
		$custom_css .= '.product-data { position:relative!important; }';	
	}
	
	//shop product landscape layout css
	if ( $col_type == 'landscape' || $col_type == 'left' || $col_type == 'right' ){
		if ( $col_width < '28%' ){
			$col_width = '28%';
		}
		$custom_css .= '
			.product-standard {  
			background:transparent!important; 
			position: relative!important; 
			opacity:1!important;
			top:0;
			-moz-transform: scale(1);
    		-o-transform: scale(1);
    		-webkit-transform: scale(1);
			transform: scale(1);
			}
			ul.products li.product { width:'.$col_width.'!important; }
			.discount { left:0!important; transform: rotate(270deg)!important; }
			.discount span { left:0!important; transform: rotate(90deg)!important; text-align:left!important; }
			.product-image { width:45%!important; float:left!important; padding-right:5%; border-right:1px solid #eaeaea; }
			.product-standard div.product-data { width: 52%!important; position:relative!important; float:left!important; margin-left:2%; }
			';
		
	}
	
	
	//product item selectors sizes
	//title
	$custom_css .= $selector . ' h2 { font-size: '.$h2_size.'}';
	$custom_css .= '.ss-name-promote { font-size: .8vw!important; line-height:1vw!important; ; }';
	
	//price
	$custom_css .= $selector . '.price { font-size: 1.2vw!important; margin-top: 0vw!important; }';
	
	//rating
	$custom_css .= $selector . '.shopstyler-rating { font-size: 1vw!important; margin-top: 0vw!important; }';

	//buttons
	//rating
	$custom_css .= $selector . ' .button { font-size: .8vw!important; line-height:1!important; margin-top: 0vw!important; padding:3% 6% 3% 6%!important; margin-right:5px!important; }';

	//image styling
	if ( $settings['woo_images_style'] == 'on' ){
		$custom_css .= $selector . ' img { border-radius:10px!important; }';
	}
	if ( $settings['woo_images_style'] == 'circle' ){
		$custom_css .= $selector . ' img { border-radius:50%!important; }';
	}
	if ( $settings['woo_images_style'] == 'top' ){
		$custom_css .= $selector . ' img { border-top-left-radius:10px!important; }';
		$custom_css .= $selector . ' img { border-top-right-radius:10px!important; }';
	}
	if ( $settings['woo_images_style'] == 'bottom' ){
		$custom_css .= $selector . ' img { border-bottom-left-radius:10px!important; }';
		$custom_css .= $selector . ' img { border-bottom-right-radius:10px!important; }';
	}
	
	if ( $settings['woo_collateral_style'] == 'fullwidth' ){
		$custom_css .= '.ss-collateral-title { margin-left: 5%!important; }';
		$custom_css .= 'div.ss-collateral-wrapper li.ss-collateral-product { width:20%!important; }';
	}
	$custom_css .= '.ss-collateral-wrapper { background: '.$settings['woo_collateral_background'].'!important;}';

	//modal
	$custom_css .= '.md-modal { background: '.$wrapper_bg['background-color'].'!important; }';

	//call to action selectors	
	//ss_wrapper css
	$wrapper_css = ss_generic_background_wrapper_css ( $settings['woo_calltoaction_background'] );
	$cta_color = $settings['woo_calltoaction_text_color'];
	$cta_height = $settings['woo_calltoaction_height'];
	$custom_css .= '.ss-calltoaction-wrapper { '. $wrapper_css . '}';
	$custom_css .= '.ss-calltoaction-wrapper { height: ' . $cta_height . 'px!important; }';
	$custom_css .= '.ss-calltoaction-content { color: ' . $cta_color . '!important; }';
	
	//user custom CSS import 	
	$custom_css .=  $settings['woo_custom_css'];
		
	
  return $custom_css;
}

