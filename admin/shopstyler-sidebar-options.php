<?php

	Redux::setSection( $opt_name, array(
        'title'            => __( 'Sidebar', 'shopstyler-plugin' ),
        'id'               => 'sidebar',
        'desc'             => __( 'Sidebar', 'shopstyler-plugin' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-indent-left',
        'required'         => array ( 'woo_layout' , '!=' , 'nosidebar' ),
         ) );
         
        Redux::setSection( $opt_name, array(
        'title'      => __( 'ShopStyler Sidebar', 'shopstyler-plugin' ),
        'id'         => 'sidebar-settings',
        'desc'       => __( 'Add components to sidebar', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'icon'       => 'el el-picture' ,
        
        'subsection' => true,
        'fields'     => array(
              array(
                'id'       => 'woo_categories',
                'type'     => 'switch',
                'title'    => __( 'Enable Shop Categories menu', 'shopstyler-plugin' ),
                'desc' => __( 'Enable/Disable Categories menu', 'shopstyler-plugin' ),
                'default'  => false,
              ),
              
			  
              array(
                'id'       => 'woo_promote',
                'type'     => 'text',
                'title'    => __( 'Add products preview', 'shopstyler-plugin' ),
                'desc'     => __( 'Input product id to preview in the sidebar', 'shopstyler-plugin' ),
                'default'  => '',
              ),
			  
  			  array(
                'id'       => 'woo_promote_title',
                'type'     => 'text',
                'title'    => __( 'Products preview title', 'shopstyler-plugin' ),
                'desc'     => __( 'Add a title for products preview in the sidebar', 'shopstyler-plugin' ),
                'default'  => '',
              ),

            )
        ));