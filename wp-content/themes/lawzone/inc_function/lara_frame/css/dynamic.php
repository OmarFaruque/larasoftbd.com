<?php
/*
* Dynamic CSS which load from Admin 
*/
//@import 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300';
function dynamic_css(){
	$get_option = get_option( 'ch_theme_option' );
	$css = '<style type="text/css" media="screen">';
		$css .= '@import "https://fonts.googleapis.com/css?family=ABeeZee|Cabin|Cantarell|Catamaran|Chewy|Comfortaa|Concert+One|Copse|Cormorant|Droid+Sans+Mono|EB+Garamond|Economica|Gudea|Josefin+Sans|Kavoon|Libre+Franklin|Montserrat|Mukta+Vaani|Open+Sans+Condensed:300|PT+Sans+Narrow|Play|Poiret+One|Quicksand|Raleway|Reem+Kufi|Roboto+Condensed|Titillium+Web|Ubuntu|Yanone+Kaffeesatz|Yrsa";';
	if(!empty($get_option['body_font'])){
		switch($get_option['body_font']):
			case 'montserrat':
				$css .= 'body{font-family: "Montserrat", sans-serif !important;}';
			break;
			case 'raleway':
				$css .= 'body{font-family: "Raleway", sans-serif !important;}';
			break;
			case 'roboto condensed':
			 	$css .= 'body{font-family: "Roboto Condensed", sans-serif !important;}';
			break;
			case 'yrsa':
			 	$css .= 'body{font-family: "Yrsa", serif !important;}';
			break;
			case 'open sans condensed':
				$css .= 'body{font-family: "Open Sans Condensed", sans-serif !important;}';
			break;
			case 'ubuntu':
				$css .= 'body{font-family: "Ubuntu", sans-serif !important;}';
			break;
			case 'titillium web': 
				$css .= 'body{font-family: "Titillium Web", sans-serif !important;}';
			break;
			case 'pt sans narrow':
				$css .= 'body{font-family: "PT Sans Narrow", sans-serif !important;}';
			case 'cabin':
				$css .= 'body{font-family: "Cabin", sans-serif !important;}';
			break;
			case 'poiret one':
				$css .= 'body{font-family: "Poiret One", cursive !important;}';
			break;
			case 'josefin sans':
				$css .= 'body{font-family: "Josefin Sans", sans-serif !important;}';
			break;
			case 'catamaran': 
				$css .= 'body{font-family: "Catamaran", sans-serif !important;}';
			break;
			case 'quicksand': 
				$css .= 'body{font-family: "Quicksand", sans-serif !important;}';
			break;
			case 'libre franklin':  
				$css .= 'body{font-family: "Libre Franklin", sans-serif !important;}';
			break; 
			case 'kavoon': 
				$css .= 'body{font-family: "Kavoon", cursive !important;}';
			break; 
			case 'concert one': 
				$css .= 'body{font-family: "Concert One", cursive !important;}';
			break; 
			case 'eb garamond': 
				$css .= 'body{font-family: "EB Garamond", serif !important;}';
			break; 
			case 'chewy': 
				$css .= 'body{font-family: "Chewy", cursive !important;}';
			break; 
			case 'comfortaa': 
				$css .= 'body{font-family: "Comfortaa", cursive !important;}';
			break; 
			case 'copse': 
				$css .= 'body{font-family: "Copse", serif !important;}';
			break;
			case 'cormorant': 
				$css .= 'body{font-family: "Cormorant", serif !important;}';
			break; 
			case 'abeezee': 
				$css .= 'body{font-family: "ABeeZee", sans-serif !important;}';
			break; 
			case 'gudea': 
				$css .= 'body{font-family: "Gudea", sans-serif !important;}';
			break; 
			case 'mukta vaani': 
				$css .= 'body{font-family: "Mukta Vaani", sans-serif !important;}';
			break; 
			case 'cantarell': 
				$css .= 'body{font-family: "Cantarell", sans-serif !important;}';
			break; 
			case 'economica': 
				$css .= 'body{font-family: "Economica", sans-serif !important;}';
			break; 
			case 'droid sans mono':  
				$css .= 'body{font-family: "Droid Sans Mono", monospace !important;}';
			break; 
			case 'reem kufi': 
				$css .= 'body{font-family: "Reem Kufi", sans-serif !important;}';
			break; 
			case 'yanone kaffeesatz': 
				$css .= 'body{font-family: "Yanone Kaffeesatz", sans-serif !important;}';
			break; 
			case 'play': 
					$css .= 'body{font-family: "Play", sans-serif !important;}';
			break; 
			default:
		endswitch;
	}


	// Heading font  
	if(!empty($get_option['heading_font'])){
		switch($get_option['heading_font']):
			case 'montserrat':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Montserrat", sans-serif !important;}';
			break;
			case 'raleway':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Raleway", sans-serif !important;}';
			break;
			case 'roboto condensed':
			 	$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Roboto Condensed", sans-serif !important;}';
			break;
			case 'yrsa':
			 	$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Yrsa", serif !important;}';
			break;
			case 'open sans condensed':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Open Sans Condensed", sans-serif !important;}';
			break;
			case 'ubuntu':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Ubuntu", sans-serif !important;}';
			break;
			case 'titillium web': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Titillium Web", sans-serif !important;}';
			break;
			case 'pt sans narrow':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "PT Sans Narrow", sans-serif !important;}';
			case 'cabin':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Cabin", sans-serif !important;}';
			break;
			case 'poiret one':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Poiret One", cursive !important;}';
			break;
			case 'josefin sans':
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Josefin Sans", sans-serif !important;}';
			break;
			case 'catamaran': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Catamaran", sans-serif !important;}';
			break;
			case 'quicksand': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Quicksand", sans-serif !important;}';
			break;
			case 'libre franklin':  
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Libre Franklin", sans-serif !important;}';
			break; 
			case 'kavoon': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Kavoon", cursive !important;}';
			break; 
			case 'concert one': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Concert One", cursive !important;}';
			break; 
			case 'eb garamond': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "EB Garamond", serif !important;}';
			break; 
			case 'chewy': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Chewy", cursive !important;}';
			break; 
			case 'comfortaa': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Comfortaa", cursive !important;}';
			break; 
			case 'copse': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Copse", serif !important;}';
			break;
			case 'cormorant': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Cormorant", serif !important;}';
			break; 
			case 'abeezee': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "ABeeZee", sans-serif !important;}';
			break; 
			case 'gudea': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Gudea", sans-serif !important;}';
			break; 
			case 'mukta vaani': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Mukta Vaani", sans-serif !important;}';
			break; 
			case 'cantarell': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Cantarell", sans-serif !important;}';
			break; 
			case 'economica': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Economica", sans-serif !important;}';
			break; 
			case 'droid sans mono':  
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Droid Sans Mono", monospace !important;}';
			break; 
			case 'reem kufi': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Reem Kufi", sans-serif !important;}';
			break; 
			case 'yanone kaffeesatz': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Yanone Kaffeesatz", sans-serif !important;}';
			break; 
			case 'play': 
				$css .= 'h1, h2, h3, h4, h5, h6{font-family: "Play", sans-serif !important;}';
			break; 
			default:
		endswitch;
	}


	// Navigation font family
		if(!empty($get_option['navigation_font'])){
		switch($get_option['navigation_font']): 
			case 'montserrat':
				$css .= 'nav ul li a{font-family: "Montserrat", sans-serif !important;}';
			break;
			case 'raleway':
				$css .= 'nav ul li a{font-family: "Raleway", sans-serif !important;}';
			break;
			case 'roboto condensed':
			 	$css .= 'nav ul li a{font-family: "Roboto Condensed", sans-serif !important;}';
			break;
			case 'yrsa':
			 	$css .= 'nav ul li a{font-family: "Yrsa", serif !important;}';
			break;
			case 'open sans condensed':
				$css .= 'nav ul li a{font-family: "Open Sans Condensed", sans-serif !important;}';
			break;
			case 'ubuntu':
				$css .= 'nav ul li a{font-family: "Ubuntu", sans-serif !important;}';
			break;
			case 'titillium web': 
				$css .= 'nav ul li a{font-family: "Titillium Web", sans-serif !important;}';
			break;
			case 'pt sans narrow':
				$css .= 'nav ul li a{font-family: "PT Sans Narrow", sans-serif !important;}';
			case 'cabin':
				$css .= 'nav ul li a{font-family: "Cabin", sans-serif !important;}';
			break;
			case 'poiret one':
				$css .= 'nav ul li a{font-family: "Poiret One", cursive !important;}';
			break;
			case 'josefin sans':
				$css .= 'nav ul li a{font-family: "Josefin Sans", sans-serif !important;}';
			break;
			case 'catamaran': 
				$css .= 'nav ul li a{font-family: "Catamaran", sans-serif !important;}';
			break;
			case 'quicksand': 
				$css .= 'nav ul li a{font-family: "Quicksand", sans-serif !important;}';
			break;
			case 'libre franklin':  
				$css .= 'nav ul li a{font-family: "Libre Franklin", sans-serif !important;}';
			break; 
			case 'kavoon': 
				$css .= 'nav ul li a{font-family: "Kavoon", cursive !important;}';
			break; 
			case 'concert one': 
				$css .= 'nav ul li a{font-family: "Concert One", cursive !important;}';
			break; 
			case 'eb garamond': 
				$css .= 'nav ul li a{font-family: "EB Garamond", serif !important;}';
			break; 
			case 'chewy': 
				$css .= 'nav ul li a{font-family: "Chewy", cursive !important;}';
			break; 
			case 'comfortaa': 
				$css .= 'nav ul li a{font-family: "Comfortaa", cursive !important;}';
			break; 
			case 'copse': 
				$css .= 'nav ul li a{font-family: "Copse", serif !important;}';
			break;
			case 'cormorant': 
				$css .= 'nav ul li a{font-family: "Cormorant", serif !important;}';
			break; 
			case 'abeezee': 
				$css .= 'nav ul li a{font-family: "ABeeZee", sans-serif !important;}';
			break; 
			case 'gudea': 
				$css .= 'nav ul li a{font-family: "Gudea", sans-serif !important;}';
			break; 
			case 'mukta vaani': 
				$css .= 'nav ul li a{font-family: "Mukta Vaani", sans-serif !important;}';
			break; 
			case 'cantarell': 
				$css .= 'nav ul li a{font-family: "Cantarell", sans-serif !important;}';
			break; 
			case 'economica': 
				$css .= 'nav ul li a{font-family: "Economica", sans-serif !important;}';
			break; 
			case 'droid sans mono':  
				$css .= 'nav ul li a{font-family: "Droid Sans Mono", monospace !important;}';
			break; 
			case 'reem kufi': 
				$css .= 'nav ul li a{font-family: "Reem Kufi", sans-serif !important;}';
			break; 
			case 'yanone kaffeesatz': 
				$css .= 'nav ul li a{font-family: "Yanone Kaffeesatz", sans-serif !important;}';
			break; 
			case 'play': 
				$css .= 'nav ul li a{font-family: "Play", sans-serif !important;}';
			break; 
			default:
		endswitch;
	}
	if(!empty($get_option['body_font_size'] ) ) {
		$css .= 'body {font-size: '.$get_option['body_font_size'].'!important;}';
	}
	if(!empty($get_option['body_font_line-height'])){
		$css .= 'body {line-height: '.$get_option['body_font_line-height'].'!important;}';
	}
	if(!empty($get_option['heading_font_weight']) && $get_option['heading_font_weight'] != 'default'){
		$css .= 'h1, h2, h3, h4, h5, h6 {font-weight: '.$get_option['heading_font_weight'].' !important;}';
	}
	if(!empty($get_option['navigation_font_size'])){
		$css .= 'nav ul li a {font-size: '.$get_option['navigation_font_size'].' !important;}';
	}
	if(!empty($get_option['navigation_font_weight']) && $get_option['navigation_font_weight'] != 'default'){
		$css .= 'nav ul li a {font-weight: '.$get_option['navigation_font_weight'].' !important;}';
	}






	$menubg = ($get_option['menu_background'])?$get_option['menu_background']:'#062339';
	$css .= '
	.header-style-one .header-mainbox,
	.theme-green .main-menu .navigation > li > ul,
	.theme-green .main-menu .navigation > li > ul > li > ul
	{
		background-color: '.$menubg. '; 
	}';
	
	if(!empty($get_option['custom_css_code'])){
		$css .= $get_option['custom_css_code']; 
	}

	$headingBG = ($get_option['heading_background'])?$get_option['heading_background']:'#062339';
	$css .= '
	.appointment-head
	{
		background-color:'.$headingBG.';
	}
	';
	$btncolor = ($get_option['button_color'])?$get_option['button_color']:'#333';
		$css .= '.theme-btn {   background-color: '.$btncolor.'; }';
	$overlayer = ($get_option['default_overlayer_background'])?$get_option['default_overlayer_background']:'#0F263A';
	$css .= '.default-overlay::before {   background-color: '.hex2rgba($overlayer, 0.85).'; }';

	$footerBg = ($get_option['footer_background_color'])?$get_option['footer_background_color']:'#3f3a36';
	$css .= '.main-footer {   background-color: '.$footerBg.'; }';

	$bodyBg = ($get_option['body_background'])?$get_option['body_background']:'#fff';
	$css .= 'body {   background-color: '.$bodyBg.'; }';
	
	
	$fcust_color = ($get_option['focus_color'])?hex2rgba($get_option['focus_color'], 1):'#f68a15';
	$fcust_hover = ($get_option['focus_color'])?hex2rgba($get_option['focus_color'], 0.5):'#FFC41B';
	$css .= '.theme-green .main-header .info-nav li a .icon,
		.theme-green .main-header .header-top a:hover,
		h2 span,
		h1 span,
		section.choose div.inner h4 span,
		.text-theme-color,
		.section-title span,
		.footer-3 p span,
		.main-footer .social li a span,
		.main-footer .copyright a,
		.scroll-to-top,
		.med-icon .icon,
		.ca_pagination a,
		.woocommerce-message:before, 
		.woocommerce-info::before,
		.contact-1 h2 span, 
		.contact-2 h2 span,
		.testimonial-item i,
		.testimonial-item .content p,
		.service-item i,
		.service-item:hover i,
		.service-item:hover h5 a,
		.main-slider span,
		.owl-prev,
		.owl-next,
		section.hero .owl-theme .owl-controls .owl-nav [class*=owl-],
		.hero .slide .title span,
		.woocommerce ins, p.cs-price ins,
		.cs-product-area .cs-product-content p span
		{
			color:'.$fcust_color.';
		}';
		$css .='.main-header .info-nav a.appoinment:hover,
		.scroll-to-top:hover,
		.small-line-2::after,
		.btn-send, .btn-success.disabled,
		.ca_pagination .pnlink a,
		.ca_pagination span.current,
		.btn-cart,
		.woocommerce #respond input#submit, 
		.woocommerce a.button, 
		.woocommerce button.button, 
		.woocommerce input.button, 
		.cs-my-btn,
		#add_payment_method #payment div.payment_box, 
		.woocommerce-cart #payment div.payment_box, 
		.woocommerce-checkout #payment div.payment_box,
		section.testimonial .carousel-col-2 .owl-dots .active span, 
		section.testimonial .owl-theme .owl-dots .owl-dot:hover span,
		.portfolio-filter li a:hover, 
		.portfolio-filter li.active a,
		.theme-btn:hover,
		.small-line::after,
		.small-line-center::after,
		.hero .hero-slider .owl-dots .active span,
		.cs-tab-area .cs-nav-tabs>li.active>a,
		.cs-tab-area .cs-nav-tabs>li>a:hover,
		.kc-wp-sidebar .search-box .form-group button, 
		.sidebar .search-box .form-group button
		{
			background-color:'.$fcust_color.';
		}';

		$css .= 'section.hero .owl-prev:hover, 
		section.hero .owl-next:hover
		{
			background-color:'.$fcust_color.' !important;
		}';
		$css .= '.main-header .appoinment,
		.scroll-to-top,
		.btn-send, 
		.btn-success.disabled,
		.btn-send:hover,
		.ca_pagination .pnlink a,
		.ca_pagination span.current,
		.woocommerce-message, 
		.woocommerce-info,
		.testimonial-item .content img,
		.service-item.effect-border:hover i,
		.inner,
		.owl-prev:hover,
		.owl-next:hover,
		.owl-prev,
		.owl-next,
		.choose-item:hover .icon-holder  

		{
			border-color:'.$fcust_color.';
		}';

		$css .= '.btn-cart:hover,
		.woocommerce #respond input#submit:hover, 
		.woocommerce a.button:hover, 
		.woocommerce button.button:hover, 
		.woocommerce input.button:hover, 
		.cs-my-btn:hover
		{
			background-color:'.$fcust_hover.';
		}';

		$css .= '#add_payment_method #payment div.payment_box::before, 
		.woocommerce-cart #payment div.payment_box::before, 
		.woocommerce-checkout #payment div.payment_box::before
		{
			border-bottom-color:'.$fcust_color.';
		}';

		$css .= '.portfolio-hover{
			border-color:'.$fcust_hover.';
		}';

	//Widget Title Background
	$css .= '</style>';
	echo $css;
}
add_action( 'wp_head', 'dynamic_css');


 
/* Convert hexdec color string to rgb(a) string */
 
function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}
