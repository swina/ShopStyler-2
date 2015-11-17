<?php

 Redux::setSection( $opt_name, array(
        'title'            => __( 'Custom CSS', 'shopstyler-plugin' ),
        'id'               => 'css-page',
        'desc'             => __( '', 'shopstyler-plugin' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-file'
    ) );
     
     Redux::setSection( $opt_name, array(
        'title'      => __( 'Custom CSS', 'shopstyler-plugin' ),
        'id'         => 'custom-css-page',
        'desc'       => __( 'Add custom CSS', 'shopstyler-plugin' ) . ' <a href="//shopstyler.moodgiver.com" target="_blank">Documentation</a>',
        'icon'       => 'el el-edit',
        'subsection' => true,
        'fields'     => array(
			 array(
                'id'       => 'woo_custom_css',
                'type'     => 'ace_editor',
                'title'    => __( 'Custom CSS', 'shopstyler-plugin' ),
                'subtitle' => __( 'Enter your custom CSS', 'shopstyler-plugin' ),
                'desc'     => __( 'Add custom css. See documentation for css selectors styling', 'shopstyler-plugin' ),
                
            ),
		)
	));
