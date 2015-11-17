jQuery(function ($){ 
  var woocat_toggle = 'off';
  /*$('ul.products').addClass('mask');
  
  $(document).ready ( function(){
  	$('ul.products').removeClass('mask');
  });
  */
  $(document).ready ( function(){
  
  	  $('ul.products').show();
  	  $('.ss-sticky-wrapper').show();
	  $('.ss-sticky-content').addClass('animated rubberBand');
  
  	$('.tile-cat').mouseover(function(){
  		$(this).addClass ( 'animated zoomIn' );
  	});
  
  });
  
  
  $(".ss-float-sidebar").click(function(){
  	if ( $(".ss_sidebar").css("display") == "none" ){
		$('.ss_sidebar')
		.css('opacity', 0)
  		.slideDown('slow')
  		.animate(
    		{ opacity: 1 },
    		{ queue: false, duration: 'slow' }
  		);
	} else {
		$('.ss_sidebar')
  		.slideUp('slow')
  		.animate(
    		{ opacity: 0 },
    		{ queue: false, duration: 'slow' }
  		);
	}
 	/* 
  	$('.ss_sidebar').addClass ( 'animated slideInLeft' );
    if ( $(".ss_sidebar").css("display") == "none" ){
      $(".ss_sidebar").show();
    } else {
      $(".ss_sidebar").hide('slideOutLeft');
    }
	*/
  });
  
  
  $(".woocategory-view").click(function(){
  	 $arg = $(this).attr("name");
     	
	 if ( $(this).attr ( 'data-toggle' ) == 'off' ){	
	 	$(".woocategory-view").removeClass ( 'fa-minus' );
		$(".woocategory-view").addClass ( 'fa-plus' );	
		$(".woocategory-view").attr ( 'data-toggle' , 'off' );	
	  	$(this).removeClass ( 'fa-plus' );
		$(this).addClass ( 'fa-minus' );
		$(this).attr ( 'data-toggle' , 'on' );
		$(".woo-sub-category").hide("fade");
     	$(".sub-cat-" + $arg).show("fade");
		woocat_toggle = 'on';
	 } else {
	 	$(".sub-cat-" + $arg).hide("fade");
		$(".woocategory-view").removeClass ( 'fa-minus' );
		$(".woocategory-view").addClass ( 'fa-plus' );
		$(this).attr ( 'data-toggle' , 'off' );
	 }
     
  });
  
  $(".btn-modal").click(function(){
     $(".modal").hide().fadeIn(800); //.show ("fade");
      $(".added-to-cart").text ( "");

     var aContent = $(this).attr("name").split ( "|" );
     var id = aContent[0];
     var image = $(".lbimg-" + id ).children("img");
     var price = $(".amount-" + id ).children("span");
     var title = aContent[2];
     var url = aContent[1];
	 var type = aContent[3];
     var blog = $(".blog-info").val();

     $(".product-img").attr ( 'src' , image.attr("src") );
     
     $(".product-title").text ( aContent[2] );
     $(".product-price").text ( price.html() );
     $(".product-desc").text ( $(".excerpt-" + id).html() );
     $(".product-rating").html ( $(".rating-" +id ).html() );
     $(".modal-add-to-cart-value").val ( id );
	 $(".product-type").val( type ); 
	 if ( type != 'simple' ){
	 	$(".modal-add-to-cart-button").text ( 'More' );
	 } else {
	 	$(".modal-add-to-cart-button").html ( '<span class="fa fa-shopping-cart"></span>' );
	 }
	 $(".product-url").val( url );
	 
     linktitle = blog + "-" + title;
     var socials = new Array ();
     socials['facebook'] = { link: "https://www.facebook.com/sharer.php?s=100&p[title]=" + linktitle + "&p[url]=" + url + "&p[summary]=" + title + "&p[images]=" + image.attr("src") } ;
     socials['twitter'] = { link:'https://twitter.com/share?url='+url+'&text='+ linktitle };
     socials['google'] = { link: 'https://plus.google.com/share?url='+ url + '&title=' + linktitle };
     socials['pinterest'] = { link: 'http://pinterest.com/pin/create/button/?url=' + url + '&description=' + linktitle + '&media=' + image.attr("src")};
     socials['envelope'] = { link: 'mailto:?subject='+linktitle+'&body='+linktitle+'&title='+blog }; 
   
    var social_content ='';
    for ( var key in socials ){
        social_content += '<a href="' + socials[key].link + '" target="_blank"><span class="fa fa-' + key + '"></span></a>';
    } 
    //console.log ( social_content );
    $(".social-footer").html ( social_content );
	
  });
  
  $(".modal-add-to-cart-button").click(function(){
  	if ( $('.product-type').val() == 'simple' ){
	    $(this).html ( "<span class=\'fa fa-check\'></span> " + $(this).text() );
    	$(".cart-modal-form").submit();
	} else {
		$(".modal").fadeOut(800);
		window.location.assign ( $('.product-url').val() );
	}
    
  });
  
  $(".btn-close-modal").click(function(){
     $(".modal").fadeOut(800);
     
  });
  
   $(".btn-modal-trigger").click(function(){
       $(".md-modal").css ("visibility","visible");
   });
   
   $("#slider").click(function(){
		console.log ( $("ul#slider").css("width") );
       	if ( parseInt($("ul#slider figure").css("left")) == $("ul#slider").css("width") ){
	   		$("ul#slider").css("left","0");
	   	} else {
   			$("ul#slider").css("left","-100%");
		}
   });
});