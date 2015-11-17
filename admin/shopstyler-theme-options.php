<?php
Redux::setSection( $opt_name, array(
        'title'            => __( 'Themes', 'shopstyler-plugin' ),
        'id'               => 'themes-page',
        'desc'             => __( 'Shop page settings', 'shopstyler-plugin' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-website'
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Theme', 'shopstyler-plugin' ),
        'id'         => 'theme-settings',
        'desc'       => __( 'ShopStyler comes with some preset themes. Just select and save to import new theme', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'subsection' => true,
        'icon'       => 'el el-website',
        'fields'     => array(

        
          array(
                'id'       => 'woo_ss_theme',
                'type'     => 'image_select',
                'title'    => __( 'Select a theme', 'shopstyler-plugin' ),
                'subtitle' => __( '', 'shopstyler-plugin' ),
                'desc'     => __( '', 'shopstyler-plugin' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    'cream' => array(
                        'alt' => 'cream',
                        'img' => plugins_url ( 'ss2' ) . '/assets/themes/cream-ss-screenshot.jpg'
                    ),
                   'greyred' => array(
                        'alt' => 'greyred',
                        'img' => plugins_url ( 'ss2' ) . '/assets/themes/greyred-ss-screenshot.jpg'
                    ),
                   'lightgreen' => array(
                        'alt' => 'lightgreen',
                        'img' => plugins_url ( 'ss2' ) . '/assets/themes/lightgreen-ss-screenshot.jpg'
                    ),
				   'lilla' => array(
                        'alt' => 'lilla',
                        'img' => plugins_url ( 'ss2' ) . '/assets/themes/lilla-ss-screenshot.jpg'
                    ),
					'marine' => array(
                        'alt' => 'cream',
                        'img' => plugins_url ( 'ss2' ) . '/assets/themes/marine-ss-screenshot.jpg'
                    ),
					'sky' => array(
                        'alt' => 'sky',
                        'img' => plugins_url ( 'ss2' ) . '/assets/themes/sky-ss-screenshot.jpg'
                    ),
                ),
                'default'  => ''
              ),
              
            
          )
    ));
