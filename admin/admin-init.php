<?php

    // Load the TGM init if it exists
    //if ( file_exists( dirname( __FILE__ ) . '/tgm/tgm-init.php' ) ) {
    //    require_once dirname( __FILE__ ) . '/tgm/tgm-init.php';
    //}

    // Load the embedded Redux Framework
    if ( file_exists( dirname( __FILE__ ).'/redux-framework/framework.php' ) ) {
        require_once dirname(__FILE__).'/redux-framework/framework.php';
    }

    // Load the theme/plugin options
    if ( file_exists( dirname( __FILE__ ) . '/shopstyler-options-config.php' ) ) {
        require_once dirname( __FILE__ ) . '/shopstyler-options-config.php';
    }

    // Load Redux extensions
    if ( file_exists( dirname( __FILE__ ) . '/redux-extensions/extensions-init.php' ) ) {
        require_once dirname( __FILE__ ) . '/redux-extensions/extensions-init.php';
    }

