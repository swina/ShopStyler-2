<?php

Redux::setSection( $opt_name, array(
        'title'            => __( 'Styling', 'shopstyler-plugin' ),
        'id'               => 'styling-page',
        'desc'             => __( 'ShopStyler Styling', 'shopstyler-plugin' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-brush'
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Styling', 'shopstyler-plugin' ),
        'id'         => 'styling-settings',
        'desc'       => __( 'General styling', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'subsection' => true,
        'icon'       => 'el el-brush',
        'fields'     => array(
            /*array(
                'id'       => 'woo_opt_palette_color',
                'type'     => 'palette',
                'title'    => __( 'ShopStyler Palette', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'desc'     => __( 'Palette is a custom component to assign a palette color combination to your shop', 'shopstyler-plugin' ),
                'default'  => 'siena',
                'palettes' => array(
                
                
                    'siena'  => array(
                        '#938172',
                        '#990000',
                        '#020304',
                        '#CC9E61',
                        '#996633',
                        '#FFCC00',
                    ),
                    'sky' => array(
                        '#3299BB',
                        '#00CCFF',
                        '#E9E9E9',
                        '#BCBCBC',
                        '#FFFFFF',
                        '#FF9900',
                        
                    ),
                    'forest' => array(
                        '#006633',
                        '#00CC66',
                        '#000000',
                        '#99CC33',
                        '#FFFFFF',
                        '#99FF33',
                    ),   
                    'sand' => array(
                        '#996633',
                        '#CE6A27',
                        '#FFFFFF',
                        '#CAB739',
                        '#FFFFFF',
                        '#FF9900',
                    ),     
                    'red' => array(
                        '#990000',
                        '#CC0000',
                        '#FFFFFF',
                        '#FF9900',
                        '#FFFFFF',
                        '#FFCC00',
                    ),     
                )     
            ),
			 
             array(
                'id'       => 'woo_use_palette',
                'type'     => 'switch',
                'title'    => __( 'Use palette color', 'shopstyler-plugin' ),
                'subtitle' => __( 'Enable / Disable ShopStyler to use palette color', 'shopstyler-plugin' ),
                'desc'     => ' <strong>When you enable palette color settings below are not applied.</strong>',
                'default'  => false,
          ),
          */
		  array(
                'id'       => 'woo_background',
                'type'     => 'background',
                'title'    => __( 'Shop pages background', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
				'desc'	   => 'Set shop, product category and single product background color',
                'default'  => '#000000',
          ),
		  
		  
           array(
                'id'       => 'woo_product_title_color',
                'type'     => 'color',
                'title'    => __( 'Product Title Color', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#000000',
            ),
            
             array(
                'id'       => 'woo_product_title_bg',
                'type'     => 'color',
                'title'    => __( 'Product Title Background', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => 'transparent',
            ),
            
            array(
                'id'       => 'woo_product_price_color',
                'type'     => 'color',
                'title'    => __( 'Product Price Color', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#000000',
            ),
            
            array(
                'id'       => 'woo_product_price_bg',
                'type'     => 'color',
                'title'    => __( 'Product Price Background', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => 'transparent',
            ),
            
            array(
                'id'       => 'woo_product_desc_color',
                'type'     => 'color',
                'title'    => __( 'Product Description Color', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#000000',
            ),
            
             array(
                'id'       => 'woo_product_desc_bg',
                'type'     => 'color',
                'title'    => __( 'Product Description Background', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => 'transparent',
            ),
            
         
            
             array(
                'id'       => 'woo_secondary_color',
                'type'     => 'color',
                'title'    => __( 'Product rating color (stars)', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#cacaca',
            ),
            
            
            array(
                'id'       => 'woo_link_color',
                'type'     => 'link_color',
                'title'    => __( 'Link Color', 'redux-framework-demo' ),
                'subtitle' => __( 'Set link color', 'redux-framework-demo' ),
                'desc'     => __( '', 'redux-framework-demo' ),
                'regular'   => true, // Disable Regular Color
                'hover'     => true, // Disable Hover Color
                'active'    => false, // Disable Active Color
                'visited'   => false,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#c8c8c8',
                    'hover'   => '#dadada'
                )
            ),
           
            
            array(
                'id'       => 'woo_button_color',
                'type'     => 'link_color',
                'title'    => __( 'Buttons Text Color', 'shopstyler-plugin' ),
                'subtitle' => __( 'Set buttons text color', 'shopstyler-plugin' ),
                'regular'   => true, // Disable Regular Color
                'hover'     => true, // Disable Hover Color
                'active'    => false, // Disable Active Color
                'visited'   => false,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#eaeaea',
                    'hover'   => '#c8c8c8'
                )
            ),
            
            array(
                'id'       => 'woo_button_bg',
                'type'     => 'link_color',
                'title'    => __( 'Buttons Background', 'redux-framework-demo' ),
                'subtitle' => __( 'Set add to cart, proceed to checkout etc color', 'redux-framework-demo' ),
                'desc'     => __( '', 'redux-framework-demo' ),
                'regular'   => true, // Disable Regular Color
                'hover'     => true, // Disable Hover Color
                'active'    => false, // Disable Active Color
                'visited'   => false,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#eaeaea',
                    'hover'   => '#c8c8c8'
                )
            ),
            
             array(
                'id'       => 'woo_button_border',
                'type'     => 'border',
                'title'    => __( 'Set Buttons Border Options', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'all'      => false,
                // An array of CSS selectors to apply this font style to
                'desc'     => __( '', 'redux-framework-demo' ),
                'default'  => array(
                    'border-color'  => '#c0c0c0',
                    'border-style'  => 'solid',
                    'border-top'    => '1px',
                    'border-right'  => '1px',
                    'border-bottom' => '1px',
                    'border-left'   => '1px'
                )
            ),
            
            array(
                'id'       => 'woo_button_radius',
                'type'     => 'switch',
                'title'    => __( 'Enable buttons radius', 'shopstyler-plugin' ),
                'desc' => __( '', 'shopstyler-plugin' ),
                'default'  => false,
              ),
            
            array(
                'id'       => 'woo_images_style',
                'type'     => 'image_select',
                'title'    => __( 'Product Images Style', 'shopstyler-plugin' ),
                'subtitle' => __( 'You can set a image style', 'shopstyler-plugin' ),
                'desc'     => __( '', 'shopstyler-plugin' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    'off' => array(
                        'alt' => 'Normal image',
                        'img' => ReduxFramework::$_url . 'assets/img/image-radius-off.png'
                    ),
                    'on' => array(
                        'alt' => 'Rounded image',
                        'img' => ReduxFramework::$_url . 'assets/img/image-radius-on.png'
                    ),
                    'circle' => array(
                        'alt' => 'Circle image',
                        'img' => ReduxFramework::$_url . 'assets/img/image-circle.png'
                    ),
                    'top' => array(
                        'alt' => 'Rounded top image',
                        'img' => ReduxFramework::$_url . 'assets/img/image-radius-top.png'
                    ),
                    'bottom' => array(
                        'alt' => 'Rounded bottom image',
                        'img' => ReduxFramework::$_url . 'assets/img/image-radius-bottom.png'
                    )
                ),
                'default'  => 'off'
            ),
            
              array(
                'id'       => 'woo_image_border',
                'type'     => 'border',
                'title'    => __( 'Set Images Border Options', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'all'      => false,
                // An array of CSS selectors to apply this font style to
                'desc'     => __( '', 'redux-framework-demo' ),
                'default'  => array(
                    'border-color'  => '#999',
                    'border-style'  => 'solid',
                    'border-top'    => '0px',
                    'border-right'  => '0px',
                    'border-bottom' => '0px',
                    'border-left'   => '0px'
                )
            ), 
        )
    ));
    
	/* END OF STYLING SECTION ********************************/