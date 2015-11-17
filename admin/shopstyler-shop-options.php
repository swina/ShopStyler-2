<?php
Redux::setSection( $opt_name, array(
        'title'            => __( 'Shop Page', 'shopstyler-plugin' ),
        'id'               => 'shop-page',
        'desc'             => __( 'Shop page settings', 'shopstyler-plugin' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-th'
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Layout', 'shopstyler-plugin' ),
        'id'         => 'layout-settings',
        'desc'       => __( 'Following settings are for shop and product category pages', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'subsection' => true,
        'icon'       => 'el el-screen',
        'fields'     => array(

        
          
           array(
                'id'       => 'woo_screen',
                'type'     => 'button_set',
                'title'    => __( 'Fullwidth / Boxed mode', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'desc'     => __( 'Select mode of your shop', 'shopstyler-plugin' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'full' => 'Fullwidth',
                    'boxed' => 'Boxed'
                ),
                'default'  => 'full'
            ),
            
          array(
                'id'       => 'woo_layout',
                'type'     => 'image_select',
                'title'    => __( 'Select layout for your shop', 'shopstyler-plugin' ),
                'subtitle' => __( 'Enable or Disable sidebars', 'shopstyler-plugin' ),
                'desc'     => __( 'We suggest use a full width layout. Sidebars are disabled for for mobile devices', 'shopstyler-plugin' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    'nosidebar' => array(
                        'alt' => 'nosidebar',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    'sidebar-left' => array(
                        'alt' => '2 Column Left',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    'sidebar-right' => array(
                        'alt' => '2 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    )
                ),
                'default'  => 'nosidebar'
              ),
              
             array(
                'id'       => 'woo_shop_columns_full',
                'type'     => 'image_select',
                'required' => array ( 'woo_screen' , '!=' , 'boxed' ),
                'title'    => __( 'Products per row', 'shopstyler-plugin' ),
                'subtitle' => __( 'Select products per row', 'shopstyler-plugin' ),
                'desc'     => __( 'Could be ignored by mobile devices', 'shopstyler-plugin' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '2cols' => array(
                        'alt' => '2 columns',
                        'img' => ReduxFramework::$_url . 'assets/img/grid2.png'
                    ),
                    '3cols' => array(
                        'alt' => '3 columns',
                        'img' => ReduxFramework::$_url . 'assets/img/grid3.png'
                    ),
                    '4cols' => array(
                        'alt' => '4 columns',
                        'img' => ReduxFramework::$_url . 'assets/img/grid4.png'
                    ),
                    '5cols' => array(
                       
                        'alt' => '5 columns',
                        'img' => ReduxFramework::$_url . 'assets/img/grid5.png'
                    ),
                    '6cols' => array(
                       
                        'alt' => '6 columns',
                        'img' => ReduxFramework::$_url . 'assets/img/grid6.png'
                    )
                ),
                'default'  => '4cols'
            ),
            
            array(
                'id'       => 'woo_shop_columns',
                'type'     => 'image_select',
                'required' => array ( 'woo_screen' , '=' , 'boxed' ),
                'title'    => __( 'Products per row', 'shopstyler-plugin' ),
                'subtitle' => __( 'Select products per row', 'shopstyler-plugin' ),
                'desc'     => __( 'Could be ignored by mobile devices', 'shopstyler-plugin' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '2cols' => array(
                        'alt' => '2 columns',
                        'img' => ReduxFramework::$_url . 'assets/img/grid2.png'
                    ),
                    '3cols' => array(
                        'alt' => '3 columns',
                        'img' => ReduxFramework::$_url . 'assets/img/grid3.png'
                    ),
                    '4cols' => array(
                        'alt' => '4 columns',
                        'img' => ReduxFramework::$_url . 'assets/img/grid4.png'
                    ),
                   
                ),
                'default'  => '4cols'
            ),
            
            
              
            array(
                'id'       => 'woo_shop_product_layout_all',
                'type'     => 'image_select',
                'required' => array (
                      array ( 'woo_shop_columns_full' , '!=' , '5cols' ),
                      array ( 'woo_shop_columns_full' , '!=' , '6cols' ),
                 ),
                'title'    => __( 'Select Shopstyler Box', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'desc'     => __( 'ShopStyler Box is a custom component to present your products', 'shopstyler-plugin' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    'up' => array(
                        'alt' => 'Standard',
                        'img' => ReduxFramework::$_url . 'assets/img/image-center.png'
                    ),
                    'left' => array(
                        'alt' => 'Image left-Content right',
                        'img' => ReduxFramework::$_url . 'assets/img/image-left.png'
                    ),
                    'right' => array(
                        'alt' => 'Content left-Image right',
                        'img' => ReduxFramework::$_url . 'assets/img/image-right.png'
                    ),
                    'image' => array(
                        'alt' => 'Image Only',
                        'img' => ReduxFramework::$_url . 'assets/img/image.png'
                    )
                ),
                'default'  => 'up'
              ),  
           
            array(
                'id'       => 'woo_shop_product_layout_standard',
                'type'     => 'image_select',
                'required' => array ( 'woo_shop_columns_full' , '>' , '4cols' ),
                'title'    => __( 'Select Shopstyler Box', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'desc'     => __( 'ShopStyler Box is a custom component to present your products', 'shopstyler-plugin' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    'up' => array(
                        'alt' => 'Standard',
                        'img' => ReduxFramework::$_url . 'assets/img/image-center.png'
                    ),
                
                    'image' => array(
                        'alt' => 'Image Only',
                        'img' => ReduxFramework::$_url . 'assets/img/image.png'
                    ),
					'landscape' => array(
                        'alt' => 'Landscape',
                        'img' => ReduxFramework::$_url . 'assets/img/image-left.png'
                    ),
                ),
                'default'  => 'up'
              ),
              
            array(
                'id'       => 'woo_shop_product_layout_boxed',
                'type'     => 'image_select',
                'required' => array ( 'woo_screen' , '=' , 'boxed' ),
                'title'    => __( 'Select Shopstyler Box', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'desc'     => __( 'ShopStyler Box is a custom component to present your products.
								<br/><em style="color:red">In landscape mode products per row settings are ignored</em>', 'shopstyler-plugin' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    'up' => array(
                        'alt' => 'Standard',
                        'img' => ReduxFramework::$_url . 'assets/img/image-center.png'
                    ),
                
                    'image' => array(
                        'alt' => 'Image Only',
                        'img' => ReduxFramework::$_url . 'assets/img/image.png'
                    ),
					'landscape' => array(
                        'alt' => 'Landscape',
                        'img' => ReduxFramework::$_url . 'assets/img/image-left.png'
                    ),
                ),
                'default'  => 'up'
              ),  
           
            array(
                'id'            => 'woo_shop_products_per_page',
                'type'          => 'slider',
                'title'         => __( 'Products per page', 'shopstyler-plugin' ),
                'subtitle'      => __( 'Set how many products per page you want to show.', 'shopstyler-plugin' ),
                'desc'          => __( 'Min: 2, max: 50, step: 1, default value: 12', 'shopstyler-plugin' ),
                'default'       => 12,
                'min'           => 2,
                'step'          => 1,
                'max'           => 50,
                'display_value' => 'label'
            ),
            
             array(
                'id'       => 'woo_alignment',
                'type'     => 'image_select',
                'title'    => __( 'Select elements alignment ', 'shopstyler-plugin' ),
                'subtitle' => __( 'Set elements alignment', 'shopstyler-plugin' ),
                'desc'     => __( 'Alignment for all elements like title, description, etc.', 'shopstyler-plugin' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    'left' => array(
                        'alt' => 'left',
                        'img' => ReduxFramework::$_url . 'assets/img/text-left.png'
                    ),
                    'center' => array(
                        'alt' => '2 Column Left',
                        'img' => ReduxFramework::$_url . 'assets/img/text-center.png'
                    ),
                    'right' => array(
                        'alt' => '2 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/text-right.png'
                    )
                ),
                'default'  => 'left'
              ),
              
              array(
                'id'       => 'woo_opt_filters',
                'type'     => 'button_set',
                'title'    => __( 'Shop filters and search box mode', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'desc'     => __( 'Display mode for filters and search box', 'shopstyler-plugin' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'normal' => 'Normal',
                    'float' => 'Dialog'
                ),
                'default'  => 'float'
            ),
              
               array(
                'id'       => 'woo_add_to_cart',
                'type'     => 'switch',
                'title'    => __( 'Enable Add to cart button', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'desc'     => 'Enable/Disable Add to cart button in shop and category pages',
                'default'  => true,
              ),
              
              array(
                'id'       => 'woo_shop_scale',
                'type'     => 'switch',
                'title'    => __( 'Enable Zoom on products', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'desc'     => 'Enable/Disable a zoom effect on products',
                'default'  => false,
              ),
              
                array(
                'id'       => 'woo_breadcrumbs',
                'type'     => 'switch',
                'title'    => __( 'Enable breadcrumbs', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => false,
              ),
              
              array(
                'id'       => 'woo_products_count',
                'type'     => 'switch',
                'title'    => __( 'Enable products count', 'shopstyler-plugin' ),
                'desc'     => 'When enabled it will be also added to sidebar when sidebar layout selected',
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => true,
              ),
              
              array(
                'id'       => 'woo_products_sorting',
                'type'     => 'switch',
                'title'    => __( 'Enable products sorting option', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'desc'     => 'When enabled it will be also added to sidebar when sidebar layout selected',
                'default'  => true,
              ),
              array(
                'id'       => 'woo_price_filter',
                'type'     => 'switch',
                'title'    => __( 'Enable price filter search', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'desc'     => 'When enabled it will be also added to sidebar when sidebar layout selected',
                'default'  => true,
              ),
               array(
                'id'       => 'woo_discount',
                'type'     => 'switch',
                'title'    => __( 'Enable discount values', 'shopstyler-plugin' ),
                'desc' => __( 'This is a custom ShopStyler option for Woocommerce. Replace the sale with a % discount value', 'shopstyler-plugin' ),
                'default'  => true,
              ),
          )
    ));
