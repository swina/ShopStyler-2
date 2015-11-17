<?php
/***********************************************
 * shopstyler-functions.php
 * 
 * Author: Antonio Nardone
 * 
 * Functions and methods used by plugin
 * 
 **********************************************/
function test(){
	echo '<h1>TEST</h1>';
}

function ss_shopheader(){
	$var = get_option ( 'shopstyler' );
	?>
	<div class="ss-shopheader-wrapper animated zoomIn">
		<div class="ss-shopheader-content"><?php echo $var['woo_shopheader_text'];?>
		<div><a href="<?php echo $var['woo_shopheader_link'];?>">
			<button class="button btn-shopheader">
				<?php echo $var['woo_shopheader_button'];?>
			</button>
			</a>
		</div>
		</div>
		
	</div>
	<?php
}

function ss_shopheader_category(){
	$var = get_option ( 'shopstyler' );
	global $wp_query;
	$cat = $wp_query->get_queried_object();
    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
	$title = strip_tags(term_description( $cat->term_id , 'product_cat'));
    $image = wp_get_attachment_url( $thumbnail_id );
	$bg = $var['woo_shopheader_background'];
	$bg_css = 'background:url('.$image.') '
			.$bg['background-repeat']. ' ' 
			.$bg['background-attachment']. ' '
			.$bg['background-position'];
	?>
	<div class="ss-shopheader-wrapper animated zoomIn" style="<?php echo $bg_css;?>">
		<div class="ss-shopheader-content"><h1><?php echo $title;?></h1></div>
	</div>
	<?php
}

function ss_sticky(){
	$var = get_option ( 'shopstyler' );
	?>
	<div class="ss-sticky-wrapper" style="display:none">
		<div class="ss-sticky-content">
		<p><?php echo $var['woo_sticky_text'];?> <a href="<?php echo $var['woo_sticky_link'];?>"><button class="button btn-sticky"><?php echo $var['woo_sticky_button'];?></button></a></p>
		</div>
	</div>
	<?php
}
 
 function woo_shop_header_home(){
 	
	$var = get_option ( 'shopstyler' );
	$title = $var['woo_custom_homepage_header_title'];
    $height = $var['woo_custom_homepage_header_height'];
	$img = $var['woo_custom_homepage_header_image'];
    $img = $img['url'];
    echo '<div class="shop-homepage-header-image" style="background: url('. $img .') no-repeat center center!important; background-size:cover!important; height:' .$height.'px!important;">';
    if (  $title != '' ){
      echo '<div class="shop-header-claim"><div class="claim-title">'. $title .'</div></div>';
    }
    echo '</div>';
	//woo_shop_header(1);
}
 
//add to cart button
function woo_add_to_cart_button($opts){
    $opts = get_option ( 'shopstyler' );
    $btnaddtocart = "Add to cart";
   if ( $opts['woo_add_to_cart'] ){
    global $wp;
    global $product;
    $current_url = home_url(add_query_arg(array(),$wp->request)); 
    $type = '';
    if ( $product->is_type('simple') ) {
      $type = 'simple';
    }
    if ( $product->is_type('variable') ) {
      $type = 'variable';
    }
    if ( $opts['woo_screen'] == 'boxed' && $opts['woo_shop_columns'] > '3cols' ){
      $btndetail = '';
      $btnaddtocart = '<span class="fa fa-shopping-cart"></span>';
    }
    echo '<a href="'.$current_url.'/?add_to_cart='.get_the_ID().'" 
          rel="nofollow" 
          data-product_id="'.get_the_ID().
          'data-product_sku="'.$product->get_sku().'"
           data-quantity="1"
           class="button add_to_cart_button product_type_'.$type.'">'.$btnaddtocart.'</a>';
  }
} 

function ss_add_to_car_icon(){
    $opts = get_option ( 'shopstyler' );
    $btnaddtocart = "Add to cart";
   if ( $opts['woo_add_to_cart'] ){
    global $wp;
    global $product;
    $current_url = home_url(add_query_arg(array(),$wp->request)); 
    $type = '';
    if ( $product->is_type('simple') ) {
      $type = 'simple';
    }
    if ( $product->is_type('variable') ) {
      $type = 'variable';
    }
    if ( $opts['woo_screen'] == 'boxed' && $opts['woo_shop_columns'] > '3cols' ){
      $btndetail = '';
      $btnaddtocart = '<span class="fa fa-shopping-cart"></span>';
    }
    echo '<a href="'.$current_url.'/?add_to_cart='.get_the_ID().'" 
          rel="nofollow" 
          data-product_id="'.get_the_ID().
          'data-product_sku="'.$product->get_sku().'"
           data-quantity="1"
           class="add_to_cart_button product_type_'.$type.'"><span class="fa fa-shopping-cart"></span></a>';
  }

}

function get_desc(){
  echo substr(get_the_excerpt(),0,100);
}
 
function woo_shop_header_css() {
   $var = get_option ( 'shopstyler');
   $image = $var['woo_header_image'];
   $header_img = $image ['url'];
   return $header_img;
}

//shopstyler header image
function woo_shop_header($mode=0,$img='') {
  $var = get_option ( 'shopstyler');
  if ( $mode == 0 ){
    
    if (is_product_category()) {
        global $wp_query;
        $cat = $wp_query->get_queried_object();
       
        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
        $title = strip_tags(term_description( $cat->term_id , 'product_cat'));
        $image = wp_get_attachment_url( $thumbnail_id );

        if ( $image != '' ){
               
          $height = $var['woo_header_height'];
          $style = 'shopstyler-css-custom';
          $css = '.shop-category-header-image { background: url('. $image .') no-repeat top center!important; background-size:cover!important; }';
          //echo $css; 
          echo '<div class="shop-category-header-image" style="background: url('. $image .') no-repeat center center!important; background-size:cover!important; height: ' .$var['woo_header_height'].'px!important;">';
          if (  $title != '' ){
              echo '<div class="shop-header-claim"><div class="claim-title">'. $title .'</div></div>';
          }
          echo '</div>';
          //wp_add_inline_style ( $style , $css );  
        } else {
          echo '<div class="shop-category-header-image">';
          if (  $title == '' ){
              echo '<div class="shop-header-claim"><div class="claim-title">'. $var['woo_header_title'] .'</div></div>';
          }
          echo '</div>';
        }
        
        
    } else {
      echo '<div class="shop-category-header-image">';
      if (  $var['woo_header_title'] != '' ){
              echo '<div class="shop-header-claim"><div class="claim-title">'. $var['woo_header_title'] .'</div></div>';
      }
      echo '</div>';
    }     
  } else {
    $title = $var['woo_custom_homepage_header_title'];
    $height = $var['woo_custom_homepage_header_height'];
	$img = $var['woo_custom_homepage_header_image'];
    $img = $img['url'];
    echo '<div class="shop-homepage-header-image" style="background: url('. $img .') no-repeat center center!important; background-size:cover!important; height:' .$height.'px!important;">';
    if (  $title != '' ){
      echo '<div class="shop-header-claim"><div class="claim-title">'. $title .'</div></div>';
    }
    echo '</div>';
  } 
  /*
    if ( $mode == 0 ){
      echo '<div class="shop-header">';
      if (is_product_category()) {
        echo '<span class="cat-title">'.$cat->name.'<span class="fa fa-chevron-down view-filter"></span></span></div>';
      } else {
        echo '<span class="cat-title">Shop <span class="fa fa-chevron-down view-filter"></span></span></div>';
      }
    }
  */
}

/*function woo_shop_title(){
	$title = "Shop";
	if (is_product_category()) {
    	global $wp_query;
        $cat = $wp_query->get_queried_object();
		$title = term_description( $cat->term_id , 'product_cat');
	}	
	echo '<span class="cat-title">'.$title.'<span class="fa fa-chevron-down view-filter"></span></span></div>';
}
*/

function woo_shop_header_with_sidebar() {
    $var = get_option ( 'shopstyler');
    $css = '';
    if (is_product_category()) {
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $thumbnail_id );

        if ( $image != '' ){
          $height = $var['woo_header_height'];
          $style = 'shopstyler-css-custom';
          $css = '#header { background: url('. $image .') no-repeat center center!important; background-size:cover!important; }';
        } 
    } else {
       if ( is_shop() ){
        $css = '#header { background: url('. woo_shop_header_css() .') no-repeat center center!important; background-size:cover!important; }';
       }
    } 
    return $css;    
}

function ss_shop_title(){
  $settings = get_option ( 'shopstyler' );
  $screen = $settings['woo_screen'];
  $layout = $settings['woo_layout'];
  $menu_sidebar = '';
  
  if ( $layout == 'nosidebar' ){ 		
	  $menu_sidebar = '<span class="fa fa-bars ss-float-sidebar" style="margin-left:10px;cursor:pointer;"></span>';
  } 
  echo '<div class="shop-header">';
  
  if (is_product_category()) {
    global $wp_query;
    $cat = $wp_query->get_queried_object();
    $title = term_description( $cat->term_id , 'product_cat');
	
    echo '<span class="cat-title">'.$cat->name.$menu_sidebar.'</span></div>';
  } else {
    echo '<span class="cat-title">Shop '.$menu_sidebar.'</span></div>';
  }
}

function product_discount($price,$sale){
  return intval((intval($sale)/intval($price))*10);
}

//load shop styler star rating (woocommerce star rating is disabled) 
function woo_star_rating($float=''){
   global $woocommerce, $product;
   $stars = $product->get_average_rating();
   echo '<div class="rating-'.get_the_ID().' shopstyler-rating'.$float.'">';
  
   for ( $i=0 ; $i<5 ; $i++ ){
      if ( $stars > $i ) {
        echo '<span class="ss-star-on"><span class="fa fa-star"></span>';
      } else {
        echo '<span class="ss-star-on"><span class="fa fa-star-o"></span>';
      }
   }
   
   echo '</div>';
}


 //add social footer at bottom of woocommerce pages
function social_footer($page=''){
    if ( is_shop() || is_product_category() ){
    //$bloginfo = get_bloginfo ();
    $title = get_bloginfo ('name');
    $url = get_bloginfo ('url');
    $summary = str_replace(' ','+',get_bloginfo ('description'));
    $image = '';
    }
    if ( is_product() ){
      global $product;
      $title = get_bloginfo ('name') .'-'.get_the_title ( get_the_ID() );
      $url = get_permalink ( get_the_ID() );
      $summary = substr(get_the_excerpt(get_the_ID()),0,100);
      $image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
      //$image = '';
    }
    $urls = array (
        'facebook' => 'https://www.facebook.com/sharer.php?s=100&p[title]='.$title.'&p[url]='.$url.'&p[summary]='.$summary.'&p[images]='.$image,
        'twitter' => 'https://twitter.com/share?url='.$url.'&text='.$summary,
        'google' => 'https://plus.google.com/share?url='.$url.'&title='.$title,
        'pinterest' => 'http://pinterest.com/pin/create/button/?url='.$url.'&description='.$title.'&media='.$image,
        'envelope' => 'mailto:?subject='.$title.'&body='.get_bloginfo('description').'&title='.get_bloginfo('description') 
    );
    //$social = of_get_option ( 'moody-woo-sharing-icons');
    $opts = get_option ( 'shopstyler' );
    $social = $opts['woo_social_icons'];
    $title ="Share this";
    echo '<div class="social-footer'.$page.'">';
    foreach ( $social as $key=>$icon ){
        
        if ( $icon == '1'){
            echo '<a href="'. $urls[$key].'" target="_blank"><span class="fa fa-'. $key . '"></span></a>';
        }
    }
    echo '</div>';
}

function social_footer_product(){
	global $product;
      $title = get_bloginfo ('name') .'-'.get_the_title ( get_the_ID() );
      $url = get_permalink ( get_the_ID() );
      $summary = substr(get_the_excerpt(get_the_ID()),0,100);
      $image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
	$urls = array (
        'facebook' => 'https://www.facebook.com/sharer.php?s=100&p[title]='.$title.'&p[url]='.$url.'&p[summary]='.$summary.'&p[images]='.$image,
        'twitter' => 'https://twitter.com/share?url='.$url.'&text='.$summary,
        'google' => 'https://plus.google.com/share?url='.$url.'&title='.$title,
        'pinterest' => 'http://pinterest.com/pin/create/button/?url='.$url.'&description='.$title.'&media='.$image,
        'envelope' => 'mailto:?subject='.$title.'&body='.get_bloginfo('description').'&title='.get_bloginfo('description') 
    );
    //$social = of_get_option ( 'moody-woo-sharing-icons');
    $opts = get_option ( 'shopstyler' );
    $social = $opts['woo_social_icons'];
    $title ="Share this";
    echo '<div class="social-footer'.$page.'">';
    foreach ( $social as $key=>$icon ){
        
        if ( $icon == '1'){
            echo '<a href="'. $urls[$key].'" target="_blank"><span class="fa fa-'. $key . '"></span></a>';
        }
    }
    echo '</div>';  
}

 
 //show callout
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
  //print_r($callout_bg);
  //echo '<div class="call-out" style="color:' .$callout_text. '; background:'.$background.';"><h5>'.$callout.'</h5></div>';
}
function shopstyler_callout(){
  $opts = get_option ( 'shopstyler' );
  $callout_text = $opts ['woo_callout_text'];
  $callout_image = $opts['woo_callout_image'];
  $callout_link = $opts['woo_callout_link'];
  echo '<a href="'.$callout_link.'"><div class="callout"></div></a>';
}



function woo_categories_tree(){
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
  echo '<div class="categories-container">';
  foreach ($all_categories as $cat) {
      if($cat->category_parent == 0) {
          $category_id = $cat->term_id;
                 
          //echo '<div class="woo-category"><a href="'. get_term_link($cat->slug, 'product_cat') .'"><span>'. $cat->name .'</span></a><span class="woocategory-view fa fa-plus cat-link" name="'.$cat->name.'" data-toggle="off"></span></div>';   //</a>

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
		  $link = get_term_link($cat->slug, 'product_cat');
		  echo '<div class="woo-category"><a href="'. $link .'" title="Shop -> '.$cat->name.'"><span>'. $cat->name .'</span></a>';

			
          $sub_cats = get_categories( $args2 );
          
		  if($sub_cats) {
		  	echo '<span class="woocategory-view fa fa-plus cat-link" name="'.$cat->name.'" data-toggle="off"></span></div>';
            //echo '<ul class="woo-sub-categories cat-'. $cat->name .'">';
            foreach($sub_cats as $sub_category) {
                echo  '<div class="woo-sub-category sub-cat-'.$cat->name.'"><a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'.$sub_category->name.'</a></div>' ;
            }   
			
            //echo '</ul>';
          } else {
		  	echo '</div>';
		  }
       
      } 
    }      
  echo '</div>';  
}

function ss_promote_product(){
  wp_reset_query();
  $opts = get_option ( 'shopstyler' );
  $ID = $opts['woo_promote'];
  $ids = explode ( ',' , $ID );	
  $args = array(  'post_type' => 'product', 
                'stock' => 1, 
                'post__in' => $ids
               );

  $wp_query = new WP_Query( $args );
 
  //render output
  ss_render_sidebar_product($wp_query);
}

function ss_render_sidebar_product($wp_query){
$settings = get_option ( 'shopstyler' );
echo '<h4 class="ss-promote-title">'.$settings['woo_promote_title'].'</h4>';
echo '<ul class="products">';
    if ( $sale != '' ){
      $discount = product_discount($price,$sale);
      echo '<div class="discount"><span>-'. $discount.'%</span></div>';
    }
	
while ( $wp_query->have_posts() ) : $wp_query->the_post();
    $image = woocommerce_get_product_thumbnail('shop_catalog');
    $link = get_permalink ( get_the_ID() );
    $title = get_the_title( get_the_ID());
    $url =  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    $price = get_post_meta( get_the_ID(), '_regular_price' , true);
    $sale = get_post_meta( get_the_ID(), '_sale_price', true);
      
    
    echo '<a href="' . $link . '">
			<figure>
				<li class="product-promote">';
      			echo '<div class="product-container" style="display:block;">';
    
      				//product image
      				echo '<div class="product-image-promote img-'.get_the_ID().'">';
      				echo $image;
  	  				echo '</div>';
					echo '<span class="title"><h2 class="ss-name-promote">'.$title.'</h2></span><br/>';
				echo '</div>';	
      			echo '<div class="product-caption">';
      			//echo '<div style="float:right;width:100%;height:100%;padding:10% 20%;text-align:center!important;">';
      			//echo '<a href="' . $link . '"><h2 style="font-size:1.5em!important">' .$title. '</h2>';
  
      				
      
      				echo '<span class="price">';
      				if ( $sale != '' ){
        				echo '<span class="amount amount-'.get_the_ID().'">' . wc_price($sale) . '</span>';
      				} else {
        				echo '<span class="amount amount-'.get_the_ID().'">' . wc_price($price) . '</span>';
      				}
      				echo'</span><br/>';
  
          			echo '<div style="display:none" class="excerpt-'.get_the_ID().'">'.get_the_excerpt().'</div>';
     
      			echo '</div>';
      			//echo '</div>';
  				echo '</li>
			</figure>
		</a>';
endwhile;
echo '</ul>';
wp_reset_query();
}

function ss_calltoaction(){
	$settings = get_option ( 'shopstyler' );
	
	$cta = [];
	$cta['text'] = $settings['woo_calltoaction_text'];
	$cta['color'] = $settings['woo_calltoaction_text_color'];
	$cta['bg'] = $settings['woo_calltoaction_background'];
	$cta['height'] = $settings['woo_calltoaction_height'];
	$cta['button'] = $settings['woo_calltoaction_button'];
	$cta['link'] = $settings['woo_calltoaction_link'];
	 
	
	?>
	<div class="ss-calltoaction-wrapper">
		<div class="ss-calltoaction-content"><?php echo $cta['text'];?></div>
		<div class="ss-calltoaction-button"><a href="<?php echo $cta['link'];?>">
			<button class="button btn-cta">
				<?php echo $cta['button'];?>
			</button>
			</a>
		</div>
	</div>
	
	<?php
}

function ss_footer(){
	$settings = get_option ( 'shopstyler' );
	
	$cta = [];
	$cta['text'] = $settings['woo_footer_text'];
	$cta['link'] = $settings['woo_footer_link'];
	 
	
	?>
	<div class="ss-pseudofooter-wrapper">
		<div class="ss-pseudofooter-content"><?php echo $cta['text'];?></div>
	</div>
	
	<?php
}

function do_console($args){
  echo '<script>alert('.$args.');</script>';
}

function woo_create_dialog(){
echo '<div class="modal">
	     <div class="md-modal">
		      <div class="modal-container animated swing">
            <div class="modal-image"><img class="product-img" "></div>
            <div class="modal-content">
              <h2 class="product-title"></h2>
              <h4 class="product-price"></h4>
              <p class="product-desc"></p>
              <div class="product-rating"></div>
              <form class="cart cart-modal-form" method="post" enctype="multipart/form-data" target="add-to-cart-frame">
	 	           <div class="quantity"><input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4"></div>
               <input type="hidden" class="modal-add-to-cart-value" name="add-to-cart" value="">
	 	           

			</form>
        </div>
    </div>
    <div class="clear"></div>
    <input type="hidden" class="blog-info" name="blog-info-modal" value="'.get_bloginfo ('name').'">
    ';
    //social_footer_by_id();
    echo '
    <div class="clear"></div>
    <div class="social-footer modal-footer"></div>
    <span class="added-to-cart"></span>
    <input type="hidden" class="product-type">
	<input type="hidden" class="product-url">
	<button class="single_add_to_cart_button button alt modal-add-to-cart-button">Add to cart</button>
    <button class="button btn-close-modal"><span class="fa fa-close"></span> Close</button>
    
    </div>
    <iframe name="add-to-cart-frame" style="display:none"></iframe> 
	</div>
</div>';
}

function woo_create_splash(){
$opts = get_option ( 'shopstyler' );
$link = $opts['woo_splash_link'];
echo '<div class="splash">
		
	     <div class="md-splash">
		  <button class="button btn-close-splash" style="position:absolute; top:5px;right:5px">X</button>  
          <div class="splash-container">
            <div class="splash-content">
              <h2>'.$opts['woo_splash_title'].'</h2>
              <h4>'.$opts['woo_splash_subtitle'].'</h4>
            </div>
          </div>
        
        <div class="clear"></div>
        <a href="'.$link.'"><button class="button" style="position:absolute; bottom:10px;right:10px">'.$opts['woo_splash_button'].'</button></a>
	     </div>
      </div>';
}


function woo_create_splash_join(){
echo '
<div class="splash2">
<div class="sp-container">
	<div class="sp-content">
		<div class="sp-wrap sp-left">
			<h2>
				<span class="sp-top">What if you wouldn\'t get</span> 
				<span class="sp-mid">spam</span> 
				<span class="sp-bottom">anymore?</span>
			</h2>
		</div>
		<div class="sp-wrap sp-right">
			<h2>
				<span class="sp-top">Wouldn\'t that be absolutely</span> 
				<span class="sp-mid">great<i>!</i><i>?</i></span> 
				<span class="sp-bottom">Yeah, it would!</span> 
			</h2>
		</div>
	</div>
	<div class="sp-full">
		<h2>A great way to get rid of spam!</h2>
		<a href="index3.html">Sign up now!</a>
	</div>
</div>
</div>';
}

function woo_modal(){
  echo '
  <div class="md-modal md-effect-1" id="modal-1">
	<div class="md-content">
		<h3>Modal Dialog</h3>
		<div>
			<p>This is a modal window. You can do the following things with it:</p>
			<ul>
				<li><strong>Read:</strong> Modal windows will probably tell you something important so don\'t forget to read what it says.</li>
				<li><strong>Look:</strong> modal windows enjoy a certain kind of attention; just look at it and appreciate its presence.</li>
				<li><strong>Close:</strong> click on the button below to close the modal.</li>
			</ul>
			<button class="md-close">Close me!</button>
		</div>
	</div>
</div>
<div class="md-overlay"></div>
  ';
}