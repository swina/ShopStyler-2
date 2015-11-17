<?php

    // -> START General settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'General settings', 'shopstyler-plugin' ),
        'id'               => 'general',
        'desc'             => __( 'ShopStyler general settings', 'shopstyler-plugin' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-cog'
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Settings', 'shopstyler-plugin' ),
        'id'         => 'general-settings',
        'desc'       => __( 'General ShopStyle settings', 'shopstyler-plugin' ) . 'Please read documentation <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'subsection' => true,
        'icon'       => 'el el-cog',
        'fields'     => array(
         array(
                'id'       => 'ss_enable',
                'type'     => 'switch',
                'title'    => __( 'Enable ShopStyler', 'shopstyler-plugin' ),
                'subtitle' => __( 'Enable / Disable ShopStyler for Woocommerce!', 'shopstyler-plugin' ),
                'default'  => true,
          ),
          
          
         array(
                'id'       => 'woo_homepage',
                'type'     => 'switch',
                'title'    => __( 'Set Shop as homepage', 'shopstyler-plugin' ),
                'subtitle' => __( 'Enable / Disable Shop as homepage', 'shopstyler-plugin' ),
                'default'  => false,
          ),
          
          array(
                'id'       => 'woo_shopstyler_home_standard',
                'type'     => 'switch',
                'required' => array ( 'woo_homepage' , '=' , '1') ,
                'title'    => __( 'Set standard shop page as homepage', 'shopstyler-plugin' ),
                'subtitle' => __( 'Enable / Disable standard Shop page as homepage', 'shopstyler-plugin' ),
                'placeholder' => 'Select a page as homepage',
                'default'  => true
          ),
          
          array(
                'id'       => 'woo_custom_homepage_header_image_enable',
                'type'     => 'switch',
                'required' => array ( 'woo_shopstyler_home_standard' , '=' , '0') ,
                'title'    => __( 'Enable Custom Shop Homepage Header', 'shopstyler-plugin' ),
                'desc' => __( 'When enabled sets an header image when a shop custom homepage is enabled', 'shopstyler-plugin' ),
                'default'  => false,
          ),
              array(
                'id'       => 'woo_custom_homepage_header_image',
                'type'     => 'media',
                'url'      => true,
                'required' => array ( 'woo_custom_homepage_header_image_enable' , '=' , '1') ,
                'title'    => __( 'Upload Header Image', 'redux-framework-demo' ),
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload image', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'default'  => '',
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
            
            array(
                'id'            => 'woo_custom_homepage_header_height',
                'type'          => 'slider',
                'required' => array ( 'woo_custom_homepage_header_image_enable' , '=' , '1') ,
                'title'         => __( 'Shop custom homepage header height', 'shopstyler-plugin' ),
                'subtitle'      => __( 'Set shop header height in px', 'shopstyler-plugin' ),
                'desc'          => __( 'Min: 100px, max: 600px, default value: 400px', 'shopstyler-plugin' ),
                'default'       => 400,
                'min'           => 100,
                'step'          => 5,
                'max'           => 600,
                'display_value' => 'label'
            ),
            array(
                'id'            => 'woo_custom_homepage_header_title',
                'type'          => 'text',
                'required' => array ( 'woo_custom_homepage_header_image_enable' , '=' , '1') ,
                'title'         => __( 'Shop custom homepage header title', 'shopstyler-plugin' ),
                'subtitle'      => __( '', 'shopstyler-plugin' ),
                'desc'          => __( 'You can input a title', 'shopstyler-plugin' ),
                'display_value' => 'label'
            ),
          
		   array(
                'id'       => 'woo_shopstyler_home_custom_categories',
                'type'     => 'switch',
                'required' => array ( 'woo_shopstyler_home_standard' , '=' , '0') ,
                'title'    => __( 'Enable categories tiles in homepage', 'shopstyler-plugin' ),
                'subtitle' => __( 'Enable categories tiles in homepage', 'shopstyler-plugin' ),
                'default'  => true
          ),
		  
		   array(
                'id'       => 'woo_shopstyler_categories_background_image',
                'type'     => 'media',
                'url'      => true,
                'required' => array ( 'woo_shopstyler_home_custom_categories' , '=' , '1') ,
                'title'    => __( 'Upload Categories Background Image', 'redux-framework-demo' ),
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload image', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'default'  => '',
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
		  
          array(
                'id'       => 'woo_shopstyler_home_custom_new_products',
                'type'     => 'switch',
                'required' => array ( 'woo_shopstyler_home_standard' , '=' , '0') ,
                'title'    => __( 'Enable new products in homepage', 'shopstyler-plugin' ),
                'subtitle' => __( 'Enable new products in custom shop homepage', 'shopstyler-plugin' ),
                'default'  => true
          ),
          
           array(
                'id'       => 'woo_shopstyler_home_custom_top_rated_products',
                'type'     => 'switch',
                'required' => array ( 'woo_shopstyler_home_standard' , '=' , '0') ,
                'title'    => __( 'Enable top rated products in homepage', 'shopstyler-plugin' ),
                'subtitle' => __( 'Enable top rated products in custom shop homepage', 'shopstyler-plugin' ),
                'default'  => true
          ),
          
           array(
                'id'       => 'woo_shopstyler_home_custom_sale_products',
                'type'     => 'switch',
                'required' => array ( 'woo_shopstyler_home_standard' , '=' , '0') ,
                'title'    => __( 'Enable products on sale in homepage', 'shopstyler-plugin' ),
                'subtitle' => __( 'Enable products on sale in custom shop homepage', 'shopstyler-plugin' ),
                'default'  => true
          ),
          
          array(
                'id'       => 'woo_homepage_select_post',
                'type'     => 'switch',
                'required' => array ( 'woo_homepage' , '=' , '0') ,
                'title'    => __( 'Set latest post as homepage', 'shopstyler-plugin' ),
                'subtitle' => __( 'Enable / Disable Shop as homepage', 'shopstyler-plugin' ),
                'placeholder' => 'Select a page as homepage',
                'data'     => 'posts',
                'default'  => true
          ),
          
          array(
                'id'       => 'woo_homepage_select_page',
                'type'     => 'select',
                'required' => array ( 'woo_homepage_select_post' , '=' , '0' ),
                'title'    => __( 'Static front page as homepage', 'shopstyler-plugin' ),
                'subtitle' => __( 'Set a static page as homepage', 'shopstyler-plugin' ),
                'placeholder' => 'Select a page as homepage',
                'data'     => 'pages',
                'default'  => get_option('page_on_front')
          ),
          
          
        )
    ));
