<?php
/******************************************
 *
 * shopstyler custom css selectors functions
 * 
 ******************************************/

//render shopstyler header
function css_render_shopstyler_header(){
  $css = '';
  $var = get_option ( 'shopstyler');
  
  $bg = ss_generic_background_wrapper_css ( $var['woo_shopheader_background'] );
  
  $max_height = $var['woo_shopheader_height'];
  $color = $var['woo_shopheader_text_color'];
  $css .= '.ss-shopheader-wrapper { ' .$bg. ' height: '. $max_height .'px!important; }';
  $css .= '.ss-shopheader-content { color: ' .$color. '!important; }';
  return $css;		
} 
 

//render shop header
/**********************************************/
function css_render_shop_header(){
  $css = '';
  $var = get_option ( 'shopstyler');
  $max_height = $var['woo_header_height'];
  $image = $var['woo_header_image'];
  $header_img = $image ['url'];
  if ( $header_img != '' ) {
    $css .= '.shop-category-header-image { background: url('. $header_img .') no-repeat center center  ; 
    background-size:cover; height: '. $max_height .'px!important; }';
  }  
  return $css;
}
/**********************************************/

//render shop header when sidebar enabled
/**********************************************/
function css_render_shop_header_sidebar(){
  $css = '';
  $var = get_option ( 'shopstyler');
  $max_height = $var['woo_header_height'];
  $image = $var['woo_header_image'];
  $header_img = $image ['url'];
  if ( $header_img != '' ) {
    $css .= '#header { background: url('. $header_img .') no-repeat top center  ; 
    background-size:cover; height: '. $max_height .'px!important; }';
  }
  return $css;
}
/**********************************************/


//render image style 
/**********************************************/
function css_render_images_style ( $selector , $status ){
  $css = '';
  if ( $status == 'on' ){
    $css .= $selector . ' { border-radius:10%!important; }';
  }
  if ( $status == 'circle' ){
    $css .= $selector . ' { border-radius:50%!important; }';           
  }
  if ( $status == 'top' ){
    $css .= $selector . ' { border-top-left-radius:10%!important; border-top-right-radius:10%!important; }';
  }
  if ( $status == 'bottom' ){
    $css .= $selector . ' { border-bottom-left-radius:10%!important; border-bottom-right-radius:10%!important; }'; 
  }
  return $css;    
}
/**********************************************/

//render image border 
/**********************************************/
function css_render_images_border ( $selector , $border ){
  $css = '';
  if ( $border['border-top'] != '' ){ 
    $css .= $selector . ' { border-top: ' .$border['border-top']. ' '. $border['border-style'] .' '. $border['border-color'] .'; }';
  }
  if ( $border['border-right'] != '' ){
    $css .= $selector . ' { border-right: ' .$border['border-right']. ' '. $border['border-style'] .' '. $border['border-color'] .'; }';
  }
  if ( $border['border-bottom'] != '' ){
    $css .= $selector . ' { border-bottom: ' .$border['border-bottom']. ' '. $border['border-style'] .' '. $border['border-color'] .'; }';
  }
  if ( $border['border-left'] != '' ){
    $css .= $selector . ' { border-left: ' .$border['border-left']. ' '. $border['border-style'] .' '. $border['border-color'] .'; }';
  }
  return $css;    
}
/**********************************************/


//render scale effect css
/**********************************************/
function css_render_scale(){
  $css = '';
  $css .= '
        ul.products li.product:hover {
        vertical-align:middle;
        z-index:100;
        background:#fff;
        margin-left:10px;
        padding:10px;
        -webkit-transform:scale(2);
        -moz-transform:scale(2);
        transform:scale(2);
        border-radius:20px;
        opacity:.9;
        }';
   return $css;
}
/**********************************************/


//render callout css
/**********************************************/
function css_render_callout ( $mode ){
  $vals = shopstyler_callout_css(0);
  $css .= '.callout {
    width:100%!important;
    height: '.$vals[0].'px;
    max-height: '.$vals[0].'px;  
    min-height: '.$vals[0].'px; 
    color: '.$vals[1].'; 
    '.$vals[2].'
    }';
  return $css;   
}

function shopstyler_callout_css($mode=1){
  $opts = get_option ( 'shopstyler' );
  
  $callout_height = $opts['woo_callout_height'];
  $callout_text = $opts ['woo_callout_text'];
  $callout_text_color = $opts ['woo_callout_color'];
  $callout_image = $opts['woo_callout_image'];
  $callout_bg = $opts['woo_callout_bg'];
  $background = '';
  if ( $callout_image != '' ){
      //$repeat = $callout_bg['repeat'];
      //$position = $callout_bg['position'];
      //$attachment = $callout_bg['attachment'];
      $background = 'background: url('. $callout_image['url'] . ') no-repeat top center';
  } else {
      if ( $callout_bg['from'] == $callout_bg['to'] ){
        $background = '#'.$callout_bg['from'];
      } else {
        $background = '
            background: -webkit-linear-gradient('. $callout_bg['from'] .','.$callout_bg['to'] .');
            background: -o-linear-gradient('. $callout_bg['from'] .','.$callout_bg['to'] .');
            background: -moz-linear-gradient('. $callout_bg['from'] .','.$callout_bg['to'] .');
            background: linear-gradient('. $callout_bg['from'] .','.$callout_bg['to'] .');
        ';
      }
  }
  if ( $mode == 0 ) {
    return array ( $callout_height , $callout_text_color , $background );
  } else {
    return '<div class="callout"><h5>'.$callout_text.'</h5></div>'; 
  }
}

/**********************************************/


//render current palette css (if enabled)
/**********************************************/
function css_render_palette ( $palette ){ 
  $dir = dirname ( __FILE__ ) . '/assets/css/';
  $string = file_get_contents( $dir . 'palette.dat');
  $p = explode ( '|' , $string );
  $css = '';
  foreach ( $p as $pal ){
    $p_string = explode(':' , $pal);
    $colors = explode(',' , $p_string[1]);
    $p_palette = $p_string[0];
    if ( $p_palette == $palette ) {
      //shop selectors
      $css .= ' ul.products li.product h2 { color: '.$colors[0].'!important; }
ul.products li.product .price .amount { color: '.$colors[1].'!important; }
ul.products li.product .button { color: '.$colors[2].'; background: '.$colors[3].'!important; font-size: .7vw; }
ul.products li.product .button:hover { color: '.$colors[4].'; background: '.$colors[1].'!important; }
ul.products li.product .ss-star-on { color: '.$colors[5].'!important; } 
.button { color: '.$colors[2].'!important; background: '.$colors[3].'!important; font-size: .7vw!important; }
.button:hover { color: '.$colors[4].'!important; background: '.$colors[1].'!important; }
.woocommerce table.shop_table thead tr th { color: '.$colors[2].'; background: '.$colors[3].'!important; font-size: .7vw; }'; 
      //single product selectors
      $css .= ' .woocommerce .summary h2 { color: '.$colors[0].'!important; }
.woocommerce div.product .price .amount { color: '.$colors[1].'!important; }
.woocommerce div.product .button { color: '.$colors[2].'; background: '.$colors[3].'!important; font-size: .7vw; }
.woocommerce div.product .button:hover { color: '.$colors[4].'; background: '.$colors[1].'!important; }
.woocommerce div.product .ss-star-on { color: '.$colors[5].'!important; }
.woocommerce .summary .posted_in a { color: '.$colors[5].'!important;}
.woocommerce .summary .posted_in a:hover { color: '.$colors[0].'!important;}';
      
	  //discount
	  $css .= '.discount { color: '. $colors[2] .'!important; border-color: transparent '.$colors[3].' transparent transparent!important; }';
      
	  
	  //modal selectors 
      $css .= '.modal .product-title { color: '.$colors[0].'!important; }
.modal .product-title { color: '.$colors[1].'!important; }
.modal .product-rating .ss-star-on { color: '.$colors[5].'!important; }'; 
      //custom homepage selectors
      $css .= 'ul.custom-home-page-products li.product .price-home { color: '.$colors[1].'!important; }
      ul.custom-home-page-products li.product .title { color: ' .$colors[2].'!important; background: '.$colors[3].'!important; }';

		
    }
  }
  return $css;
}
/**********************************************/

//render product selectors (when palette is disabled)
/**********************************************/
function css_render_product_selectors ($opts){
    $css= '';
    $colors = array();
    $title = array ( $opts['woo_product_title_color'] , $opts['woo_product_title_bg'] );
    $price = array ( $opts['woo_product_price_color'] , $opts['woo_product_price_bg'] );
    $description = array ( $opts['woo_product_desc_color'] , $opts['woo_product_desc_bg'] );
     
    $btn = $opts['woo_button_bg'];
    $btn_text = $opts['woo_button_color'];
    $link = $opts['woo_link_color'];
    
    array_push ( $colors , $opts['woo_product_title_color'] ); //position 0 
    array_push ( $colors , $opts['woo_product_price_color'] ); //position 1
    array_push ( $colors , $btn_text['regular'] );
    array_push ( $colors , $btn['regular'] );
    array_push ( $colors , $btn_text['hover'] );
    array_push ( $colors , $btn['hover']);
    array_push ( $colors , $opts['woo_secondary_color']);
	
	//general
	
	//sticky 
	$css .= '.ss-sticky-wrapper { 
		background: ' . $opts['woo_sticky_background'] .'!important;
		min-height: ' . $opts['woo_sticky_height'] .'px!important;
		height: ' . $opts['woo_sticky_height'] .'px!important;
		display: block!important;}';
	$css .= '.ss-sticky-content p { color: ' . $opts['woo_sticky_text_color'] . '!important; }';
			
	//breadcrumb
	$css .= '.woocommerce .woocommerce-breadcrumb { color: '.$title[0].'!important; }';
	$css .= '.woocommerce .woocommerce-breadcrumb a { color: '.$link['regular'] .'!important; }';
	$css .= '.woocommerce .woocommerce-breadcrumb a:hover { color: '.$link['hover'] .'!important; }';
	
	//shop page title 
	
	$css .= '.cat-title { color: '.$btn_text['regular'].'!important; background: '.$btn['regular'].'!important; }';
	$css .= '.cat-title { border: 2px solid '.$link['regular'].'!important; }';
	
    //shop products
	$css .= ' ul.products li.product h2 { color: '.$title[0].'!important; background: '.$title[1].'!important; }
ul.products li.product .price .amount { color: '.$price[0].'!important; background: '.$price[1] .'!important; padding-left:3%; padding-right:3%; }
ul.products li.product .button { color: '.$colors[2].'; background: '.$colors[3].'!important; font-size: .7vw; }
ul.products li.product .button:hover { color: '.$colors[4].'; background: '.$colors[5].'!important; }
ul.products li.product .ss-star-on { color: '.$colors[6].'!important; } 
.button { color: '.$colors[2].'!important; background: '.$colors[3].'!important; font-size: .7vw!important; }
.button:hover { color: '.$colors[4].'!important; background: '.$colors[5].'!important; }
.woocommerce table.shop_table thead tr th { color: '.$colors[2].'; background: '.$colors[3].'!important; font-size: .7vw; }';

	  //pagination css
	  $css .= '.page-numbers li a { color: '.$link['regular'].'!important; 
	  			border-bottom-color: '.$link['regular'].'!important; }';
				
	  $css .= '.page-numbers li a:hover { color: '.$link['hover'].'!important; 
	  			border-bottom-color: '.$link['hover'] .'!important; }';
	
	  $css .= '.page-numbers li .current { color: '.$link['hover'].'!important; 
	  			border-bottom-color: '.$link['hover'] .'!important; }';

				
      //single product selectors
      $css .= ' .woocommerce .summary h2 { color: '.$title[0].'!important; background: '.$title[1].'!important; }
.woocommerce div.product .price .amount { color: '.$price[0].'!important; background: '.$price[1] .'!important; padding-left:3%; padding-right:3%; }
.woocommerce div.product .button { color: '.$colors[2].'; background: '.$colors[3].'!important; font-size: 1.2vw!important; }
.woocommerce div.product .button:hover { color: '.$colors[4].'; background: '.$colors[5].'!important; }
.woocommerce div.product .ss-star-on { color: '.$colors[6].'!important; }
.woocommerce .summary .posted_in { color: '.$title[0].'!important; }
.woocommerce .summary .posted_in a { color: '.$link['regular'].'!important;}
.woocommerce .summary .posted_in a:hover { color: '.$link['hover'].'!important;}';

      $css.= '.shop-left-desc { color: '.$description[0]. '!important; background: '.$description[1].'!important; }';
 
 	  //single product tabs 
	  $css .= 'ul.tabs li a { color: ' .$link['regular'].'!important; }';
	  $css .= 'ul.tabs li a:hover { color: ' .$link['hover'].'!important; }';
	  $css .= 'ul.tabs li.active:hover { color: ' .$link['regular'].'!important; }';
      $css .= 'ul.tabs li.active { color: ' .$link['hover'].'!important; border-bottom: 4px solid '.$link['hover'].'!important; }';
	  $css .= '.woocommerce div.product .woocommerce-tabs .panel { border-left: 1px solid '.$link['regular'].'!important; }';
	  $css .= '.woocommerce div.product .woocommerce-tabs .panel h2 { color: '.$title[0].'!important; }';
	  
	  $css .= '.discount { color: '. $colors[2] .'!important; border-color: transparent '.$colors[3].' transparent transparent!important; }';

	

	  //icons
	  $css .= '.social-footer a .fa , .btn-modal , .fa-shopping-cart , { color: '. $link['regular'].'!important; font-size:1.1vw!important; }';
	  $css .= '.social-footer a .fa:hover , .btn-modal:hover  , .fa-shopping-cart:hover { color: '. $link['hover'].'!important; }';
      
	  
	  
	  //sidebar
	  //categories tree
	  $css .= '.ss_sidebar div.categories-container { border: 0px solid '.$link['hover'].'; border-bottom:0!important; }';
	  $css .= '.ss_sidebar div.categories-container .woo-category 
	  		, .ss_sidebar div.categories-container .woo-sub-category 
			{ border-bottom: 0px solid '.$link['hover'].';}';
	  $css .= '.ss_sidebar div.categories-container a { color: '.$link['regular'].'!important; }';
	  $css .= '.ss_sidebar div.categories-container .fa { color: '.$link['regular'].'!important; }';
	  $css .= '.ss_sidebar div.categories-container div a:hover { color: '.$link['hover'].'!important; }';
	  $css .= '.ss_sidebar div.categories-container div:hover { color: '.$colors[4].'!important; background:'.$colors[5].'!important; }';
	  $css .= '.ss_sidebar div.categories-container div:hover a ,
	  		  .ss_sidebar div.categories-container div:hover .fa { color: '.$colors[4].'!important; }'; 
	  
	  //price slider
	  $css .= '.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .widget_price_filter .ui-slider .ui-slider-handle { background: '.$link['hover'].'!important; }';
	  
	  //sidebar promote products
	  $css .= '.ss-promote-title { color: '.$title[0].'!important; }';
	  $css .= '.ss-name-promote { color: '.$link['regular'].'!important; }';
	  
	  $css .= '.ss-name-promote:hover { color: '.$link['hover'].'!important; }';
	  
	  //modal selectors 
      $css .= '.modal .product-title { color: '.$title[0].'!important; }
      .modal .product-price { color: '.$price[0].'!important; background: '.$price[1] .'!important; }
      .modal .product-desc { color: '.$description[0]. '!important; background: '.$description[1].'!important; }
      .modal .product-rating .ss-star-on { color: '.$colors[6].'!important; }';
      $css .= '.md-modal { border:3px solid '.$link['regular'].'!important; }';
	  $css .= 'div.md-modal .modal-add-to-cart-button , div.md-modal .fa-shopping-cart , .btn-close-modal { font-size:1.1vw!important }';
	  
      //custom homepage selectors
      $bgtitle = $title[1];
      if ( $bgtitle == 'transparent' ){
        $bgtitle = '#fff';
      }
      $bgprice = $price[1];
      if ( $bgprice == 'transparent' ){
        $bgprice = '#fff';
      }
      $css .= 'ul.custom-home-page-products li.product .price-home { color: '.$title[0].'!important; background: '.$bgtitle.'!important; }
      ul.custom-home-page-products li.product .title { color: ' .$price[0].'!important; background: '.$bgtitle.'!important; }';

	  
      return $css;
}
/**********************************************/



//render single product layout
/**********************************************/
function css_render_single_product_layout ( $layout ){
  $css = '';
  if ( $layout == 'right' ){
    $css .= '.single-product-image { margin-left:0!important; }';
  } else {
    $css .= '.woocommerce div.product div.summary { float: right!important; width: 100%!important; border-left: 0px solid #eaeaea!important; border-right: 0px; }';
  }
  return $css;
}
/**********************************************/

//render shopstyler splash 
/**********************************************/
function css_render_splash(){
  $css = '';
  $opts = get_option ( 'shopstyler' );
  $image = $opts['woo_splash_image'];
  $bgimage = $image['url'];
  $css .= '.md-splash { 
          background:url('.$bgimage.') no-repeat top left; background-size:cover!important; }';
  $css .= '.splash-container h2 { color: '.$opts['woo_splash_title_color'].'!important; 
          background: '.$opts['woo_splash_title_bg'].'!important; }';
  $css .= '.splash-container h4 { color: '.$opts['woo_splash_subtitle_color'].'!important; 
          background: '.$opts['woo_splash_subtitle_bg'].'!important; }';                     
  return $css;
}
/**********************************************/

function css_render_slider_sidebar(){
	$css = '';
	/*$opts = get_option ( 'shopstyler' );
	$s = $opts['woo_promote'];
	$slides = explode ( ',' , $s );
	$nr = sizeof ( $slides );
	$duration = 5*$nr;
	$slider_width = $nr*100;
	$slide_width = $slider_width/$nr;
	$css .= 'ul#slider figure li.product { width: ' .$slide_width. '%!important; }';
	$css .= 'ul#slider figure { width: ' .$slider_width. '%!important; animation: '.$duration.'s slidy infinite!important; }';
	$css .= '@keyframes slidy {';
	$frames = '';
	$increment = $slide_width/$nr;
	for ( $n = 0 ; $n < $slide_width ; $n+=$increment ){
		$frames .= $n . '% { left: '. -$n .'%; }'; 
	}
	$frames .= '100% { left: -100%; }';
	$css .= $frames . '}';
	*/
	return $css;
}

function css_render_footer(){
	$css = '';
	$settings = get_option ( 'shopstyler' );
	$bg = ss_generic_background_wrapper_css ( $settings['woo_footer_background'] );
	$css .= '.ss-pseudofooter-wrapper { ' . $bg . '}';
	$css .= '.ss-pseudofooter-content { color: ' .$settings['woo_footer_text_color'] .'!important; }';
	$css .= '.ss-pseudofooter-wrapper { height: ' .$settings['woo_footer_height'] .'px!important; }';
	return $css;
}


function ss_generic_background_wrapper_css ( $wrapper_bg ){
	$wrapper_css = '';
	
	if ( $wrapper_bg['background-image'] == '' ){
		$wrapper_css = 'background: '.$wrapper_bg['background-color'].';';
		
	} else {
		$wrapper_css = 'background: url('.$wrapper_bg['background-image'].') '
		.$wrapper_bg['background-repeat'].' '
		.$wrapper_bg['background-attachment'].' '
		.$wrapper_bg['background-position'].'; ';
		$wrapper_css .= 'background-size: '.$wrapper_bg['background-size'].';';
		$wrapper_css .= 'background-color: '.$wrapper_bg['background-color'].';';
	}
	return $wrapper_css;
}

