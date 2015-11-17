<?php

		/* PRODUCT PAGE SECITON ***********************************/
    
     Redux::setSection( $opt_name, array(
        'title'            => __( 'Product Page', 'shopstyler-plugin' ),
        'id'               => 'product-page',
        'desc'             => __( 'Single product page settings', 'shopstyler-plugin' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-bookmark'
    ) );
     
     Redux::setSection( $opt_name, array(
        'title'      => __( 'Layout', 'shopstyler-plugin' ),
        'id'         => 'single-product-settings',
        'desc'       => __( 'Single product page settings', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'icon'       => 'el el-screen',
        'subsection' => true,
        'fields'     => array(
          array(
                'id'       => 'woo_single_product_layout',
                'type'     => 'image_select',
                'title'    => __( 'Select layout of single product page', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'desc'     => __( 'More layouts available in the future pro version', 'shopstyler-plugin' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    'left' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/image-left.png'
                    ),
                    'right' => array(
                        'alt' => '2 Column Left',
                        'img' => ReduxFramework::$_url . 'assets/img/image-right.png'
                    )
                ),
                'default'  => 'left'
              ),
            array(
                'id'       => 'woo_product_upsell',
                'type'     => 'switch',
                'title'    => __( 'Enable Upsell Products', 'shopstyler-plugin' ),
                'subtitle' => '',
                'desc' => __( 'Enable/Disable to show upsell products', 'shopstyler-plugin' ),
                'compiler' => true,
                'default'  => false,
              ),
			  
			   array(
                'id'       => 'woo_upsell_label',
                'type'     => 'text',
				'required' => array ( 'woo_product_upsell' , '=' , '1' ),
                'title'    => __( 'Upsell Products Label', 'shopstyler-plugin' ),
                'subtitle' => 'Input upsell products label',
                'desc' => __( 'You can customize upsell products label (i.e. You should check also ...)', 'shopstyler-plugin' ),
                'default'  => 'Check also ...',
              ),      
			 
			 array(
                'id'       => 'woo_upsell_limit',
                'type'     => 'select',
				'required' => array ( 'woo_product_upsell' , '=' , '1' ),
                'title'    => __( 'Nr.Upsell products', 'shopstyler-plugin' ),
                'subtitle' => '',
                'desc' => __( 'Input how many upsell products you want to show', 'shopstyler-plugin' ),
                'options' => array (
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'default'  => '4',
				
              ),  
              
            array(
                'id'       => 'woo_product_related',
                'type'     => 'switch',
                'title'    => __( 'Enable Related Products', 'shopstyler-plugin' ),
                'subtitle' => '',
                'desc' => __( 'Enable/Disable to show related products', 'shopstyler-plugin' ),
                'default'  => false,
              ),   
			  
			 array(
                'id'       => 'woo_product_related_label',
                'type'     => 'text',
				'required' => array ( 'woo_product_related' , '=' , '1' ),
                'title'    => __( 'Related Products Label', 'shopstyler-plugin' ),
                'subtitle' => 'Input related products label',
                'desc' => __( 'You can customize related products label (i.e. Check also this ...)', 'shopstyler-plugin' ),
                'default'  => 'Related products',
              ),      
			 
			 array(
                'id'       => 'woo_product_related_limit',
                'type'     => 'select',
				'required' => array ( 'woo_product_related' , '=' , '1' ),
                'title'    => __( 'Nr. Related Products', 'shopstyler-plugin' ),
                'subtitle' => '',
                'desc' => __( 'Input how many related products you want to show', 'shopstyler-plugin' ),
                'options' => array (
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',

				),
				'default'  => '4',
				
              ),  
			  
			  array(
                'id'       => 'woo_collateral_style',
                'type'     => 'button_set',
                'title'    => __( 'Upsell/Related layout', 'shopstyler-plugin' ),
                'subtitle' => '',
                'desc' => __( 'You can show Upsell/Related products in fullwidth or boxed style (applied when Upsell or Related products are enabled).', 'shopstyler-plugin' ),
                'default'  => 'fullwidth',
				'options'  => array (
					'fullwidth' => 'fullwidth',
					'boxed'		=> 'boxed'
				),
              ),
			   
			  array(
                'id'       => 'woo_collateral_background',
                'type'     => 'color',
                'title'    => __( 'Upsell/Related background color', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#fff',
             ),  
            
			 array(
                'id'       => 'woo_product_social',
                'type'     => 'switch',
                'title'    => __( 'Enable ShopStyler Social', 'shopstyler-plugin' ),
                'subtitle' => '',
                'desc' => __( 'Enable/Disable ShopStyler Social in the product page', 'shopstyler-plugin' ),
                'default'  => false,
              ), 
              array(
                'id'       => 'woo_product_callout',
                'type'     => 'switch',
                'title'    => __( 'Enable ShopStyler Callout', 'shopstyler-plugin' ),
                'subtitle' => '',
                'desc' => __( 'Enable/Disable ShopStyler Callout in the product page', 'shopstyler-plugin' ),
                'default'  => false,
              ),
              
          )
    ));
