<?php

	/* EXTRAS SECTION ****************************************/
	
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Extras', 'shopstyler-plugin' ),
        'id'               => 'components',
        'desc'             => __( 'Woocommerce Extra components', 'shopstyler-plugin' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-magic'
    ) );
	
	
	
    
    Redux::setSection( $opt_name, array(
        'title'      => __( 'ShopStyler Splash', 'shopstyler-plugin' ),
        'id'         => 'modal-splash-settings',
        'desc'       => __( 'Enable splash scrren on shop homepage', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'icon'       => 'el el-screen' ,
        'subsection' => true,
        'fields'     => array(
              array(
                'id'       => 'woo_splash_enable',
                'type'     => 'switch',
                'title'    => __( 'Enable ShopStyler Splash', 'shopstyler-plugin' ),
                'desc' => __( 'When enabled create a splash screen on the main shop page', 'shopstyler-plugin' ),
                'default'  => false,
              ),
              array(
                'id'       => 'woo_splash_image',
                'type'     => 'media',
                'url'      => true,
                'required' => array ( 'woo_splash_enable' , '=' , "1" ),
                'title'    => __( 'Upload Splash Image', 'redux-framework-demo' ),
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload Shop Splash image', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'default'  => '',
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
            /* 
            array(
                'id'            => 'woo_splash_height',
                'type'          => 'slider',
                'required' => array ( 'woo_splash_enable' , '=' , "1" ),
                'title'         => __( 'ShopStyler Splash Height', 'shopstyler-plugin' ),
                'subtitle'      => __( 'Set shop splash screen header height in px (suggested 320px)', 'shopstyler-plugin' ),
                'desc'          => __( 'Min: 100px, max: 600px, default value: 400px', 'shopstyler-plugin' ),
                'default'       => 320,
                'min'           => 100,
                'step'          => 5,
                'max'           => 600,
                'display_value' => 'label'
            ),
            */
            array(
                'id'            => 'woo_splash_title',
                'type'          => 'text',
                'required' => array ( 'woo_splash_enable' , '=' , "1" ),
                'title'         => __( 'ShopStyler Splash Title', 'shopstyler-plugin' ),
                'subtitle'      => __( '', 'shopstyler-plugin' ),
                'desc'          => __( 'You can input a title', 'shopstyler-plugin' ),
                'display_value' => 'label'
            ),
            
            array(
                'id'       => 'woo_splash_title_color',
                'type'     => 'color',
                 'required' => array ( 'woo_splash_enable' , '=' , "1" ),
                'title'    => __( 'ShopStyler Splash Title Color', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#fff',
            ),
            
            array(
                'id'       => 'woo_splash_title_bg',
                'type'     => 'color',
                 'required' => array ( 'woo_splash_enable' , '=' , "1" ),
                'title'    => __( 'ShopStyler Splash Title Background', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#999',
            ),
            
            array(
                'id'            => 'woo_splash_subtitle',
                'type'          => 'text',
                'required' => array ( 'woo_splash_enable' , '=' , "1" ),
                'title'         => __( 'ShopStyler Splash SubTitle', 'shopstyler-plugin' ),
                'subtitle'      => __( '', 'shopstyler-plugin' ),
                'desc'          => __( 'Add a subtitle. To separate lines add <br>', 'shopstyler-plugin' ),
                'display_value' => 'label'
            ),
            
            array(
                'id'       => 'woo_splash_subtitle_color',
                'type'     => 'color',
                 'required' => array ( 'woo_splash_enable' , '=' , "1" ),
                'title'    => __( 'ShopStyler Splash SubTitle Color', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#fff',
            ),
            
            array(
                'id'       => 'woo_splash_subtitle_bg',
                'type'     => 'color',
                 'required' => array ( 'woo_splash_enable' , '=' , "1" ),
                'title'    => __( 'ShopStyler Splash SubTitle Background', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#999',
            ),
            
            array(
                'id'       => 'woo_splash_button',
                'type'     => 'text',
                 'required' => array ( 'woo_splash_enable' , '=' , "1" ),
                'title'    => __( 'ShopStyler Splash Button Text', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => 'GO',
            ),
            
            array(
                'id'            => 'woo_splash_link',
                'type'          => 'text',
                'required' => array ( 'woo_splash_enable' , '=' , "1" ),
                'title'         => __( 'ShopStyler Splash Link', 'shopstyler-plugin' ),
                'subtitle'      => __( 'Set ShopStyler Splash link', 'shopstyler-plugin' ),
                'desc'          => __( 'http://', 'shopstyler-plugin' ),
                'display_value' => 'label'
            ),
                
          )
      ));
    
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'ShopStyler Sticky', 'shopstyler-plugin' ),
        'id'         => 'sticky-settings',
        'desc'       => __( 'Enable sticky callout on top of shop', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'icon'       => 'el el-circle-arrow-up' ,
        'subsection' => true,
        'fields'     => array(
              array(
                'id'       => 'woo_sticky_enable',
                'type'     => 'switch',
                'title'    => __( 'Enable ShopStyler Sticky', 'shopstyler-plugin' ),
                'desc' => __( 'When enabled create a sticky callout on top of page', 'shopstyler-plugin' ),
                'default'  => false,
              ),
			  /*
			  array(
                'id'       => 'woo_sticky_mode',
                'type'     => 'button_set',
                'required' => array ( 'woo_sticky_enable' , '=' , '1' ),
				'title'    => __( 'ShopStyler Sticky Mode', 'shopstyler-plugin' ),
                'desc' => __( 'Floating/Normal', 'shopstyler-plugin' ),
                'default'  => 'normal',
				 'options'  => array(
                    'floating' => 'Floating',
                    'normal' => 'Normal'
                ),
              ),
			  */
              array(
                'id'       => 'woo_sticky_background',
                'type'     => 'color',
                'url'      => true,
                'required' => array ( 'woo_sticky_enable' , '=' , "1" ),
                'title'    => __( 'Sticky Background Color', 'shopstyler-plugin' ),
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( '', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '',
            ),
            array(
                'id'            => 'woo_sticky_height',
                'type'          => 'slider',
                'required' => array ( 'woo_sticky_enable' , '=' , "1" ),
                'title'         => __( 'ShopStyler Sticky Height', 'shopstyler-plugin' ),
                'subtitle'      => __( 'Set shop splash screen header height in px (suggested 320px)', 'shopstyler-plugin' ),
                'desc'          => __( 'Min: 20px, max: 100px, default value: 60px', 'shopstyler-plugin' ),
                'default'       => 60,
                'min'           => 20,
                'step'          => 2,
                'max'           => 100,
                'display_value' => 'label'
            ),
            
            array(
                'id'            => 'woo_sticky_text',
                'type'          => 'editor',
                'required' => array ( 'woo_sticky_enable' , '=' , "1" ),
                'title'         => __( 'ShopStyler Sticky Text', 'shopstyler-plugin' ),
                'subtitle'      => __( '', 'shopstyler-plugin' ),
                'desc'          => __( 'You can input a text (HTML accepted)', 'shopstyler-plugin' ),
                'display_value' => 'label'
            ),
            
            array(
                'id'       => 'woo_sticky_text_color',
                'type'     => 'color',
                'required' => array ( 'woo_sticky_enable' , '=' , "1" ),
                'title'    => __( 'ShopStyler Sticky Text Color', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#fff',
            ),
            
            
            array(
                'id'       => 'woo_sticky_button',
                'type'     => 'text',
                 'required' => array ( 'woo_sticky_enable' , '=' , "1" ),
                'title'    => __( 'ShopStyler Sticky Button Text', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => 'GO',
            ),
            
            array(
                'id'            => 'woo_sticky_link',
                'type'          => 'text',
                'required' => array ( 'woo_sticky_enable' , '=' , "1" ),
                'title'         => __( 'ShopStyler Splash Link', 'shopstyler-plugin' ),
                'subtitle'      => __( 'Set ShopStyler Splash link', 'shopstyler-plugin' ),
                'desc'          => __( 'http://', 'shopstyler-plugin' ),
                'display_value' => 'label'
            ),
                
          )
      ));
	  
	
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'ShopStyler Header', 'shopstyler-plugin' ),
        'id'         => 'shop-header-settings',
        'desc'       => __( 'Enable ShopStyler Header', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'icon'       => 'el el-picture' ,
        'subsection' => true,
        'fields'     => array(
              array(
                'id'       => 'woo_shopheader_enable',
                'type'     => 'switch',
                'title'    => __( 'Enable ShopStyler Header', 'shopstyler-plugin' ),
                'desc' => __( 'When enabled create header in the shop pages', 'shopstyler-plugin' ),
                'default'  => false,
              ),
              array(
                'id'       => 'woo_shopheader_background',
                'type'     => 'background',
                'url'      => true,
                'required' => array ( 'woo_shopheader_enable' , '=' , "1" ),
                'title'    => __( 'ShopStyler Header Background', 'shopstyler-plugin' ),
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'This is the default header background. In category pages, category\'s image will be used', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '',
            ),
            array(
                'id'            => 'woo_shopheader_height',
                'type'          => 'slider',
                'required' => array ( 'woo_shopheader_enable' , '=' , "1" ),
                'title'         => __( 'ShopStyler Header Height', 'shopstyler-plugin' ),
                'desc'          => __( 'Min: 50, max: 600, default value: 300', 'shopstyler-plugin' ),
                'default'       => 300,
                'min'           => 50,
                'step'          => 5,
                'max'           => 600,
                'display_value' => 'label'
            ),
            
            array(
                'id'            => 'woo_shopheader_text',
                'type'          => 'editor',
                'required' => array ( 'woo_shopheader_enable' , '=' , "1" ),
                'title'         => __( 'ShopStyler Header Text', 'shopstyler-plugin' ),
                'subtitle'      => __( '', 'shopstyler-plugin' ),
                'desc'          => __( 'Text for the main shop page. In category pages, category description will be used.', 'shopstyler-plugin' ),
                'display_value' => 'label',
            ),
            
            array(
                'id'       => 'woo_shopheader_text_color',
                'type'     => 'color',
                'required' => array ( 'woo_shopheader_enable' , '=' , "1" ),
                'title'    => __( 'ShopStyler Header Text Color', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#fff',
            ),
            
            
            array(
                'id'       => 'woo_shopheader_button',
                'type'     => 'text',
                 'required' => array ( 'woo_shopheader_enable' , '=' , "1" ),
                'title'    => __( 'ShopStyler Header Button Text', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
				'desc'	   => __( 'Button will not be added in category pages' , 'shopstyler-plugin' ),
                'default'  => 'GO',
            ),
            
            array(
                'id'            => 'woo_shopheader_link',
                'type'          => 'text',
                'required' => array ( 'woo_shopheader_enable' , '=' , "1" ),
                'title'         => __( 'ShopStyler Header Link', 'shopstyler-plugin' ),
                'subtitle'      => __( 'Set ShopStyler ShopHeader link', 'shopstyler-plugin' ),
                'desc'          => __( 'Link will not be added in categories pages. (<em>add a complete http:// url</em>)', 'shopstyler-plugin' ),
                'display_value' => 'label'
            ),
                
          )
      ));
    
	/*
    Redux::setSection( $opt_name, array(
        'title'      => __( 'ShopStyler Header', 'shopstyler-plugin' ),
        'id'         => 'header-image-settings',
        'desc'       => __( 'Enable extra elements', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'icon'       => 'el el-picture' ,
        'subsection' => true,
        'fields'     => array(
              array(
                'id'       => 'woo_header_image_enable',
                'type'     => 'switch',
                'title'    => __( 'Enable ShopStyler Header', 'shopstyler-plugin' ),
                'desc' => __( 'When enabled sets an header image in the shop/product category pages. If category has an image set header will use it.', 'shopstyler-plugin' ),
                'default'  => false,
              ),
			  
              array(
                'id'       => 'woo_header_image',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Upload Header Image', 'redux-framework-demo' ),
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload Shop header image. This is the main shop page header image. It is used also if category doesn\'t have image associated.', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'default'  => '',
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
            
            array(
                'id'            => 'woo_header_height',
                'type'          => 'slider',
                'title'         => __( 'ShopStyler Header Height', 'shopstyler-plugin' ),
                'subtitle'      => __( 'Set shop header height in px', 'shopstyler-plugin' ),
                'desc'          => __( 'Min: 100px, max: 600px, default value: 400px', 'shopstyler-plugin' ),
                'default'       => 400,
                'min'           => 100,
                'step'          => 5,
                'max'           => 600,
                'display_value' => 'label'
            ),
            array(
                'id'            => 'woo_header_title',
                'type'          => 'text',
                'title'         => __( 'ShopStyler Header Title', 'shopstyler-plugin' ),
                'subtitle'      => __( '', 'shopstyler-plugin' ),
                'desc'          => __( 'You can input a title', 'shopstyler-plugin' ),
                'display_value' => 'label'
            ),
          )
      ));
      */
	  
      Redux::setSection( $opt_name, array(
        'title'      => __( 'ShopStyler Social', 'shopstyler-plugin' ),
        'id'         => 'social-footer-settings',
        'desc'       => __( 'ShopStyler Social is a custom component that add a social bar to pages', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'icon'       => 'el el-share',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'woo_social_footer',
                'type'     => 'switch',
                'title'    => __( 'Enable social footer on pages', 'shopstyler-plugin' ),
                'subtitle' => 'Set a social sharing footer on pages', 
                'desc' => __( '', 'shopstyler-plugin' ),
                'default'  => false,
              ),
              
            array(
                'id'       => 'woo_social_icons',
                'type'     => 'checkbox',
                'title'    => __( 'Enable social channels', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'desc'     => __( '', 'redux-framework-demo' ),
                //Must provide key => value pairs for multi checkbox options
                'options'  => array(
                    'facebook'  => 'Facebook',
                    'twitter'   => 'Twitter',
                    'google'    => 'Google',
                    'pinterest' => 'Pinterest',
                    'envelope'  => 'Email'
                ),
                //See how std has changed? you also don't need to specify opts that are 0.
                'default'  => array(
                    'facebook'  => '1',
                    'twitter'   => '1',
                    'google'    => '1',
                    'pinterest' => '1',
                    'envelope'  => '1'
                )
            ),
        )
    ));
	
   
    
	
	Redux::setSection( $opt_name, array(
        'title'      => __( 'ShopStyler Call To Action', 'shopstyler-plugin' ),
        'id'         => 'calltoaction-settings',
        'desc'       => __( 'Enable Call To Action (footer)', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'icon'       => 'el el-bullhorn' ,
        'subsection' => true,
        'fields'     => array(
              array(
                'id'       => 'woo_calltoaction_enable',
                'type'     => 'switch',
                'title'    => __( 'Enable ShopStyler Call To Action', 'shopstyler-plugin' ),
                'desc' => __( 'When enabled create a Call To Action in the footer', 'shopstyler-plugin' ),
                'default'  => false,
              ),
              array(
                'id'       => 'woo_calltoaction_background',
                'type'     => 'background',
                'url'      => true,
                'required' => array ( 'woo_calltoaction_enable' , '=' , "1" ),
                'title'    => __( 'Call to Action Background', 'shopstyler-plugin' ),
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( '', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '',
            ),
            array(
                'id'            => 'woo_calltoaction_height',
                'type'          => 'slider',
                'required' => array ( 'woo_calltoaction_enable' , '=' , "1" ),
                'title'         => __( 'Call To Action Height', 'shopstyler-plugin' ),
                'desc'          => __( 'Min: 50, max: 500, default value: 300', 'shopstyler-plugin' ),
                'default'       => 300,
                'min'           => 50,
                'step'          => 5,
                'max'           => 500,
                'display_value' => 'label'
            ),
            
            array(
                'id'            => 'woo_calltoaction_text',
                'type'          => 'editor',
                'required' => array ( 'woo_calltoaction_enable' , '=' , "1" ),
                'title'         => __( 'Call To Action Text', 'shopstyler-plugin' ),
                'subtitle'      => __( '', 'shopstyler-plugin' ),
                'desc'          => __( 'You can input a text (HTML accepted)', 'shopstyler-plugin' ),
                'display_value' => 'label'
            ),
            
            array(
                'id'       => 'woo_calltoaction_text_color',
                'type'     => 'color',
                'required' => array ( 'woo_calltoaction_enable' , '=' , "1" ),
                'title'    => __( 'Call To Action Text Color', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#fff',
            ),
            
            
            array(
                'id'       => 'woo_calltoaction_button',
                'type'     => 'text',
                 'required' => array ( 'woo_calltoaction_enable' , '=' , "1" ),
                'title'    => __( 'Call To Action Button Text', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => 'GO',
            ),
            
            array(
                'id'            => 'woo_calltoaction_link',
                'type'          => 'text',
                'required' => array ( 'woo_calltoaction_enable' , '=' , "1" ),
                'title'         => __( 'Call To Action Link', 'shopstyler-plugin' ),
                'subtitle'      => __( 'Set ShopStyler Call To Action link', 'shopstyler-plugin' ),
                'desc'          => __( 'http://', 'shopstyler-plugin' ),
                'display_value' => 'label'
            ),
                
          )
      ));
	  
	  
	  
	  	Redux::setSection( $opt_name, array(
        'title'      => __( 'ShopStyler Footer', 'shopstyler-plugin' ),
        'id'         => 'footer-settings',
        'desc'       => __( 'Footer settings', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'icon'       => 'el el-circle-arrow-down' ,
        'subsection' => true,
        'fields'     => array(
              array(
                'id'       => 'woo_footer_enable',
                'type'     => 'switch',
                'title'    => __( 'Enable ShopStyler Footer', 'shopstyler-plugin' ),
                'desc' => __( 'When enabled create a pseudo Footer at the bottom of the pages', 'shopstyler-plugin' ),
                'default'  => false,
              ),
              array(
                'id'       => 'woo_footer_background',
                'type'     => 'background',
                'url'      => true,
                'required' => array ( 'woo_footer_enable' , '=' , "1" ),
                'title'    => __( 'Footer Background', 'shopstyler-plugin' ),
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( '', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '',
            ),
            array(
                'id'            => 'woo_footer_height',
                'type'          => 'slider',
                'required' => array ( 'woo_footer_enable' , '=' , "1" ),
                'title'         => __( 'Footer Height', 'shopstyler-plugin' ),
                'desc'          => __( 'Min: 50, max: 500, default value: 300', 'shopstyler-plugin' ),
                'default'       => 300,
                'min'           => 50,
                'step'          => 5,
                'max'           => 500,
                'display_value' => 'label'
            ),
            
            array(
                'id'            => 'woo_footer_text',
                'type'          => 'editor',
                'required' => array ( 'woo_footer_enable' , '=' , "1" ),
                'title'         => __( 'Footer Text', 'shopstyler-plugin' ),
                'subtitle'      => __( '', 'shopstyler-plugin' ),
                'desc'          => __( 'You can input a text (HTML accepted)', 'shopstyler-plugin' ),
                'display_value' => 'label'
            ),
            
            array(
                'id'       => 'woo_footer_text_color',
                'type'     => 'color',
                'required' => array ( 'woo_footer_enable' , '=' , "1" ),
                'title'    => __( 'Footer Text Color', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'default'  => '#fff',
            ),
            
            array(
                'id'            => 'woo_footer_link',
                'type'          => 'text',
                'required' => array ( 'woo_footer_enable' , '=' , "1" ),
                'title'         => __( 'Footer Link', 'shopstyler-plugin' ),
                'subtitle'      => __( 'Set Footer link', 'shopstyler-plugin' ),
                'desc'          => __( 'http://', 'shopstyler-plugin' ),
                'display_value' => 'label'
            ),
                
          )
      ));
	  
	   
	  /* 
	   
	  Redux::setSection( $opt_name, array(
        'title'      => __( 'ShopStyler Footer', 'shopstyler-plugin' ),
        'id'         => 'callout-footer-settings',
        'desc'       => __( 'ShopStyler Footer is a custom component that add a banner to pages', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'icon'       => 'el el-bullhorn',
        'subsection' => true,
        'fields'     => array(
    
            array(
                'id'       => 'woo_callout_enable',
                'type'     => 'switch',
                'title'    => __( 'ShopStyler Footer', 'shopstyler-plugin' ),
                'subtitle' => 'ShopStyler Footer component that add a callout element at the bottom of the pages',
                'desc' => __( 'When enabled enables Footer a ShopStyler component added at the bottom of the pages', 'shopstyler-plugin' ),
                'default'  => false,
              ),
			  
              array(
                'id'       => 'woo_callout_image',
                'type'     => 'background',
                'url'      => true,
                'title'    => __( 'ShopStyler Footer Background image ', 'redux-framework-demo' ),
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Upload Footer background image.', 'redux-framework-demo' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'default'  => '',
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
              ),
              
			  array(
                'id'       => 'woo_callout_bg',
                'type'     => 'color_gradient',
                'title'    => __( 'Footer Background Color', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'desc'     => __( 'Assign a background color (also gradient). Used when no image background loaded', 'redux-framework-demo' ),
                'default'  => array(
                    'from' => '#eaeaea',
                    'to'   => '#999999'
                	),
			  ),
			  
              array(
                'id'            => 'woo_callout_height',
                'type'          => 'slider',
                'title'         => __( 'ShopStyler Footer Height', 'shopstyler-plugin' ),
                'subtitle'      => __( 'Set ShopStyler Footer height in px', 'shopstyler-plugin' ),
                'desc'          => __( 'Min: 50px, max: 600px, default value: 150px', 'shopstyler-plugin' ),
                'default'       => 150,
                'min'           => 50,
                'max'           => 600,
                'display_value' => 'label'
                ),
              
                array(
                'id'            => 'woo_callout_link',
                'type'          => 'text',
                'title'         => __( 'ShopStyler Footer Link', 'shopstyler-plugin' ),
                'subtitle'      => __( 'Set ShopStyler Footer link', 'shopstyler-plugin' ),
                'desc'          => __( 'http://', 'shopstyler-plugin' ),
                'display_value' => 'label'
                ),
                
               
               array(
                'id'      => 'woo_callout_text',
                'type'    => 'editor',
                'title'   => __( 'Footer text', 'shopstyler-plugin' ),
                'default' => 'ShopStyler Callout Sample',
                'args'    => array(
                    'wpautop'       => true,
                    'media_buttons' => true,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => true,
                    //'tinymce' => array(),
                    'quicktags'     => true,
                 ),
               )
              
               array(
                'id'       => 'woo_callout_color',
                'type'     => 'color',
                'title'    => __( 'Footer Text Color', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'redux-framework-demo' ),
                'desc'     => __( 'Assign a color to ShopStyler Callout text', 'shopstyler-plugin' ),
                'default'  => '#000000'
              ),
        		)
		)      
    ));
	
	*/
	/* END OF EXTRAS SECTION **********************************/
