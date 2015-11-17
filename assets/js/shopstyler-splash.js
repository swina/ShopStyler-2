jQuery(function ($){ 
  $(document).ready(function(){
  	if ( !sessionStorage.shopstyler_splash ){
      	$(".splash").fadeIn('1000');
		sessionStorage.shopstyler_splash = 1;
  	} 
  
  	$('.btn-close-splash').click ( function(){
		$(".splash").fadeOut('1000');
  	});
  });
});
  