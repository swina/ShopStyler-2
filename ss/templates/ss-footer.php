<?php
global $settings;
$settings = get_option ( 'shopstyler' );

	//social sharing
	if ( $settings['woo_social_footer'] == "1" ){
		add_action ( 'ss_footer' , 'social_footer' , 10 );
	}

	//add call to action
	if ( $settings['woo_calltoaction_enable'] == "1" ){
		add_action ( 'ss_footer' , 'ss_calltoaction' , 20 );
	}
	
	
	//loop footer
	/*if ( $settings['woo_callout_enable'] == "1" ){
		add_action ( 'ss_footer' , 'shopstyler_callout' , 30 );
	}
	*/
	//pseudo footer	
	if ( $settings['woo_footer_enable'] == "1" ){
		add_action ( 'ss_footer' , 'ss_footer' , 30 );
	}		


