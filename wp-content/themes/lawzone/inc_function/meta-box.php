<?php 
/*
* LawZone all Metas
*/

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function slider_add_meta_box() {

	//$metascreens = array( 'slider' );
		add_meta_box(
			'sliderContent',
			__( 'Slider Content', 'lawzone' ),
			'slidercontentcallback',
			'slider'
		);

		add_meta_box(
			'courtMeta',
			__( 'Meta', 'lawzone' ),
			'courtcontentcallback',
			'court'
		);

		add_meta_box(
			'practiceMeta',
			__( 'Meta', 'lawzone' ),
			'practicecontentcallback',
			'practice'
		);

		add_meta_box(
			'attorneyMeta',
			__( 'Meta', 'lawzone' ),
			'attorneycallback',
			'attorney'
		);

		add_meta_box(
			'widgetMeta',
			__( 'Widget Details', 'lawzone' ),
			'widgetcallback',
			'widget'
		);

		add_meta_box(
			'pageMeta',
			__( 'Metas', 'lawzone' ),
			'pagewidgetcallback',
			'page', 'side', 'default'
		);

		add_meta_box(
			'projectMeta',
			__( 'Metas', 'lawzone' ),
			'projectcallback',
			'project'
		);

		

}
add_action( 'add_meta_boxes', 'slider_add_meta_box' );



/*
* Project 
*/
function projectcallback($post){
	/*
	* Practie Post type Formate
	*/
	wp_nonce_field( 'lawzone_meta_box', 'lawzone_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$client = 		get_post_meta( $post->ID, 'client', true );
	$teclg_use = 	get_post_meta( $post->ID, 'teclg_use', true );
	$date = 		date('Y-m-d', strtotime( get_post_meta( $post->ID, 'date', true )));
	$site = 		get_post_meta( $post->ID, 'site', true );

	//Client
	echo '<label style="width:100%;" for="client">';
	_e( 'Client', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="client" name="client" value="' .  $client  . '" />';
	echo '<br/>';

	echo '<label style="width:100%; display:block; margin-top:10px;" for="teclg_use">';
	_e( 'Technology Used', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="teclg_use" name="teclg_use" value="' .  $teclg_use  . '" />';
	echo '<br/>';

	echo '<label style="width:100%; display:block; margin-top:10px;" for="date">';
	_e( 'Date', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="date" id="date" name="date" value="' .  $date  . '" />';
	echo '<br/>';

	echo '<label style="width:100%; display:block; margin-top:10px;" for="site">';
	_e( 'Web Site  <small><i>(Use HTML tag if need)</i></small>', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="site" id="site" name="site" value="' .  $site  . '" />';
	echo '<br/>';


}


/*
* Page Widget Callback
*/

function pagewidgetcallback($post){

	/*
	* Practie Post type Formate
	*/
	wp_nonce_field( 'lawzone_meta_box', 'lawzone_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$page_header 	= get_post_meta( $post->ID, 'page_header', true );
	$layout 		= get_post_meta( $post->ID, 'layout', true );
	$overlayer 		= get_post_meta( $post->ID, 'overlayer', true );
	$hederActive 	= ($page_header && $page_header == 'yes')?'checked':'';
	$active 		= ($page_header && $page_header == 'yes')?'active':'';


	//Text Position
	echo '<div style="margin-bottom: 15px;display: block;float: left; width: 100%; margin-top: 10px;"><label style="display: block;float: left;margin-right: 10px;" for="page_header">';
	_e('Active Header', 'lawzone');
	echo '</label>';
	echo '<input type="checkbox" style="display: none;" value="yes" '.$hederActive.' name="page_header" id="id-show_portfolio_slider">';
	echo '<a href="javascript:void(0)" class="checkbox-status '.$active.'">Checkbox</a></div>';


	echo '<br/><label style="margin-top:10px; display:block;" for="layout">';
	_e('Layout Style', 'lawzone');
	echo '</label>';
	echo '<select style="min-width:100%" name="layout" id="layout">';
	$layoutArray = array(
		'full' 	=> 'Full Screen',
		'box'	=> 'Box Layout'
		);
	foreach($layoutArray as $ke => $sl):
		$setedLayout = ($layout == $ke)?'selected':'';
		echo '<option '.$setedLayout.' value="'.$ke.'">'.$sl.'</option>';
	endforeach;
	echo '</select>';


	echo '<br/><label style="margin-top:10px; display:block;" for="overlayer">';
	_e('Over Layer Style <small><i>Effective on Default page</i></small>', 'lawzone');
	echo '</label>';
	echo '<select style="min-width:100%" name="overlayer" id="overlayer">';
	$overlayers = array(
		'overlayer-black' 	=> 'Overlayer Black',
		'default-overlay'	=> 'Default Overlayer'
		);
	foreach($overlayers as $ke => $sl):
		$setedover = ($overlayer == $ke)?'selected':'';
		echo '<option '.$setedover.' value="'.$ke.'">'.$sl.'</option>';
	endforeach;
	echo '</select>';
	?>
	<script>
		jQuery('a.checkbox-status').live('click', function($){
	  	var checkbox = jQuery(this).prev();
	  	if(checkbox.is(':checked')){
	  		checkbox.prop("checked", false);
            checkbox.attr('value', 'no');
	  		jQuery(this).removeClass('active');
	  	}else{
	  		checkbox.prop("checked", true);
            checkbox.attr('value', 'yes');
	  		jQuery(this).addClass('active');
	  	}
	  	return false;
	  });
	</script>
	<?php
}

function widgetcallback($post){
	/*
	* Practie Post type Formate
	*/
	wp_nonce_field( 'lawzone_meta_box', 'lawzone_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$description 	= get_post_meta( $post->ID, 'description', true );
	$before_widget 	= get_post_meta($post->ID, 'before_widget', true);
	$after_widget 	= get_post_meta($post->ID, 'after_widget', true);
	$before_title 	= get_post_meta($post->ID, 'before_title', true);
	$after_title 	= get_post_meta($post->ID, 'after_title', true);


	//Designation
	echo '<label style="width:100%;" for="description">';
	_e( 'Description', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="description" name="description" value="' .  $description  . '" />';
	echo '<br/><br/>';


	//before_widget
	echo '<label style="width:100%;" for="before_widget">';
	_e( 'Before Widget  <small><i> (Ex: &lt;section id="%1$s" class="widget %2$s"&gt;)</i></small>', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="before_widget" name="before_widget" value="' .  $before_widget  . '" />';
	echo '<br/><br/>';


	//after_widget
	echo '<label style="width:100%;" for="after_widget">';
	_e( 'After Widget', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="after_widget" name="after_widget" value="' .  $after_widget  . '" />';
	echo '<br/><br/>';


	//before_title
	echo '<label style="width:100%;" for="before_title">';
	_e( 'Before Title', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="before_title" name="before_title" value="' .  $before_title  . '" />';
	echo '<br/><br/>';


	//after_title
	echo '<label style="width:100%;" for="after_title">';
	_e( 'After Title', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="after_title" name="after_title" value="' .  $after_title  . '" />';
	echo '<br/>';
  
}


function attorneycallback($post){
	/*
	* Practie Post type Formate
	*/
	wp_nonce_field( 'lawzone_meta_box', 'lawzone_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$designation 	= esc_html(get_post_meta( $post->ID, 'designation', true ));
	$dribbble 		= esc_html(get_post_meta( $post->ID, 'dribbble', true ));
	$twitter 		= esc_html(get_post_meta( $post->ID, 'twitter', true ));
	$skype 			= esc_html(get_post_meta( $post->ID, 'skype', true ));
	$single_img 	= esc_html(get_post_meta( $post->ID, 'single_img', true ));
	$img_class 		= ($single_img)?'nopadding':'';

	
	//Designation
	echo '<label style="width:100%;" for="designation">';
	_e( 'Designation', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="designation" name="designation" value="' .  $designation  . '" />';
	echo '<br/>';
	
	//dribbble
	echo '<label style="width:100%;" for="dribbble">';
	_e( 'Dribbble URL', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="dribbble" name="dribbble" value="' .  $dribbble  . '" />';
	echo '<br/>';

	//Twitter
	echo '<label style="width:100%;" for="twitter">';
	_e( 'Twitter', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="twitter" name="twitter" value="' .  $twitter  . '" />';
	echo '<br/>';

	//skype
	echo '<label style="width:100%;" for="skype">';
	_e( 'Skype', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="skype" name="skype" value="' .  $skype  . '" />';


	//Slider Image
	echo '<br/><br/>';
	echo '<label style="width:100%;" for="single_img">';
	_e( 'Single Page Image', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="hidden" id="single_img" name="single_img" value="' .  $single_img  . '" />';
	
	echo '<div class="sarea">';
	if($single_img):
	echo '<div class="delete"><div alt="f158" class="dashicons dashicons-no" style="display: inline-block;"></div></div>';
	endif;

	echo '<a class="text-center '.$img_class.'" href="javascript:void(0)" id="img_upload-button" >';
	if($single_img):
		echo '<img src="'.wp_get_attachment_image_url( $single_img, 'full', false ).'" alt="slider image"/>';
	else:
		echo '<span>Select Slider Image</span>';
	endif;
	echo '</a>';
	echo ($single_img)?'<div class="suggesion text-center mt5"><span><i><small>Click on image for edit.</small></i></span></div>':'';
	echo '</div>'; ?>

	<script type="text/javascript">
	jQuery(document).ready(function($){
	  var mediaUploader;
	  $('#img_upload-button').click(function(e) {
		e.preventDefault();
		// If the uploader object has already been created, reopen the dialog
		  if (mediaUploader) {
		  mediaUploader.open();
		  return;
		}
		// Extend the wp.media object
		mediaUploader = wp.media.frames.file_frame = wp.media({
		  title: 'Choose Slider Image',
		  button: {
		  text: 'Choose Slider Image'
		}, multiple: false });
	 
		// When a file is selected, grab the URL and set it as the text field's value
		mediaUploader.on('select', function() {
		  attachment = mediaUploader.state().get('selection').first().toJSON();
		  $('.delete, .suggesion').remove();
		  $('#single_img').val(attachment.id);
		  $('#img_upload-button').html('<img src="'+attachment.url+'"/>').addClass('nopadding');
		  $('<div class="suggesion text-center mt5"><span><i><small>Click on image for edit.</small></i></span></div>').insertAfter('#img_upload-button');
		  $('<div class="delete"><div alt="f158" class="dashicons dashicons-no" style="display: inline-block;"></div></div>').insertBefore('#img_upload-button');
		});
		// Open the uploader dialog
		mediaUploader.open();
	  });

	  //Delete Image 
	  $(document.body).on('click', '.sarea .delete', function(){
	  	$('#img_upload-button').html('<span>Select Slider Image</span>').removeClass('nopadding');
	  	$('#slider_img').val('');
	  	$(this).remove();
	  	$('.suggesion').remove();
	  }); // End Delete function
	  }); //End Document Ready
	</script>

<?php
}



function practicecontentcallback($post){
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'lawzone_meta_box', 'lawzone_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$court_icon 	= esc_html(get_post_meta( $post->ID, 'court_icon', true ));
	$title2 		= esc_html(get_post_meta( $post->ID, 'title2', true )); // for thumbnail view
	$banner 		= esc_html(get_post_meta( $post->ID, 'banner', true )); // Banner
	$d_pdf  		= get_post_meta( $post->ID, 'd_pdf', true ); // PDF
	$img_class 		= ($banner)?'nopadding':'';

	
	//icon
	echo '<label style="width:100%;" for="court_icon">';
	_e( 'Widget Icon Class <small><i>- (put only class name)</i></small>', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="court_icon" name="court_icon" value="' .  $court_icon  . '" />';
	echo '<br/><br/>';

	//icon
	echo '<label style="width:100%;" for="title2">';
	_e( 'Title 2 <small><i>- (for thumbnail view)</i></small>', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="title2" name="title2" value="' .  $title2  . '" />';
	echo '<br/><br/>';

	//Slider Image
	echo '<label style="width:100%;" for="banner">';
	_e( 'Banner Image', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="hidden" id="banner" name="banner" value="' .  $banner  . '" />';
	
	echo '<div class="sarea">';
	if($banner):
	echo '<div class="delete"><div alt="f158" class="dashicons dashicons-no" style="display: inline-block;"></div></div>';
	endif;

	echo '<a class="text-center '.$img_class.'" href="javascript:void(0)" id="img_upload-button" >';
	if($banner):
		echo '<img src="'.wp_get_attachment_image_url( $banner, 'full', false ).'" alt="Banner image"/>';
	else:
		echo '<span>Select Banner Image</span>';
	endif;
	echo '</a>';
	echo ($banner)?'<div class="suggesion text-center mt5"><span><i><small>Click on image for edit.</small></i></span></div>':'';
	echo '</div>';


	echo '<br/><br/>';
	//Downloadable PDF
	echo '<label style="width:100%;" for="banner">';
	_e( 'Downloadable PDF', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="hidden" id="d_pdf" name="d_pdf" value="' .  $d_pdf  . '" />';
	echo '<input style="width:100%" type="text" id="d_pdf_link" name="d_pdf_link" value="' .  wp_get_attachment_url( $d_pdf )  . '" />';
	echo '<button id="pdf_download_button" style="margin-top:10px;" class="button button-primary">Upload PDF</buttn>';	
	 ?>
	
	<script type="text/javascript">
	jQuery(document).ready(function($){
	 
	  $('#img_upload-button').click(function(e) {
	  	 var mediaUploader;
		e.preventDefault();
		// If the uploader object has already been created, reopen the dialog
		  if (mediaUploader) {
		  mediaUploader.open();
		  return;
		}
		// Extend the wp.media object
		mediaUploader = wp.media.frames.file_frame = wp.media({
		  title: 'Choose Slider Image',
		  button: {
		  text: 'Choose Slider Image'
		}, multiple: false });
	 
		// When a file is selected, grab the URL and set it as the text field's value
		mediaUploader.on('select', function() {
		  attachment = mediaUploader.state().get('selection').first().toJSON();
		  $('.delete, .suggesion').remove();
		  $('#banner').val(attachment.id);
		  $('#img_upload-button').html('<img src="'+attachment.url+'"/>').addClass('nopadding');
		  $('<div class="suggesion text-center mt5"><span><i><small>Click on image for edit.</small></i></span></div>').insertAfter('#img_upload-button');
		  $('<div class="delete"><div alt="f158" class="dashicons dashicons-no" style="display: inline-block;"></div></div>').insertBefore('#img_upload-button');
		});
		// Open the uploader dialog
		mediaUploader.open();
	  });

	  //Delete Image 
	  $(document.body).on('click', '.sarea .delete', function(){
	  	$('#img_upload-button').html('<span>Select Slider Image</span>').removeClass('nopadding');
	  	$('#banner').val('');
	  	$(this).remove();
	  	$('.suggesion').remove();
	  }); // End Delete function

  	

	jQuery(document.body).on('click', '#pdf_download_button', function(e){
	var mediaUploader; 
		e.preventDefault();
		// If the uploader object has already been created, reopen the dialog
		  if (mediaUploader) {
		  mediaUploader.open();
		  return;
		}
		// Extend the wp.media object
		mediaUploader = wp.media.frames.file_frame = wp.media({
		  title: 'Choose PDF File',
		  button: {
		  text: 'Choose PDF File'
		}, multiple: false });
	 
		// When a file is selected, grab the URL and set it as the text field's value
		mediaUploader.on('select', function() {
		  attachment = mediaUploader.state().get('selection').first().toJSON();
		  $('#d_pdf').val(attachment.id);
		  $('#d_pdf_link').val(attachment.url);
		});
		// Open the uploader dialog
		mediaUploader.open();
	  });
	}); //End Document Ready
	</script>

	<?php

}


function courtcontentcallback($post){
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'lawzone_meta_box', 'lawzone_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$court_icon 	= esc_html(get_post_meta( $post->ID, 'court_icon', true ));

	
	//Slider Image
	echo '<label style="width:100%;" for="court_icon">';
	_e( 'Widget Icon Class <small><i>- (put only class name)</i></small>', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="text" id="court_icon" name="court_icon" value="' .  $court_icon  . '" />';
}

 
function slidercontentcallback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'lawzone_meta_box', 'lawzone_meta_box_nonce' );
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$slider_img 	= esc_html(get_post_meta( $post->ID, 'slider_img', true ));
	$slider_text 	= format_to_edit(get_post_meta( $post->ID, 'slider_text', true ));
	$button_text 	= get_post_meta( $post->ID, 'button_text', true );
	$data_title 	= get_post_meta( $post->ID, 'data_title', true );
	$slider_url 	= get_post_meta($post->ID, 'slider_url', true );
	$text_position 	= get_post_meta($post->ID, 'text_position', true );
	$img_class 		= ($slider_img)?'nopadding':'';
	$positionL 		= ($text_position == 'left')?'selected':'';
	$positionR 		= ($text_position == 'right')?'selected':'';
	$positionC 		= ($text_position == 'center')?'selected':'';
	

	
	//Slider Image
	echo '<label style="width:100%;" for="slider_img">';
	_e( 'Slider Image', 'lawzone' );
	echo '</label> ';
	echo '<input style="width:100%" type="hidden" id="slider_img" name="slider_img" value="' .  $slider_img  . '" />';
	
	echo '<div class="sarea">';
	if($slider_img):
	echo '<div class="delete"><div alt="f158" class="dashicons dashicons-no" style="display: inline-block;"></div></div>';
	endif;

	echo '<a class="text-center '.$img_class.'" href="javascript:void(0)" id="img_upload-button" >';
	if($slider_img):
		echo '<img src="'.wp_get_attachment_image_url( $slider_img, 'full', false ).'" alt="slider image"/>';
	else:
		echo '<span>Select Slider Image</span>';
	endif;
	echo '</a>';
	echo ($slider_img)?'<div class="suggesion text-center mt5"><span><i><small>Click on image for edit.</small></i></span></div>':'';
	echo '</div>';

	//Slider Text
	echo '<br/>';
	echo '<label for="slider_text">';
	echo 'Slider Text &nbsp;<small><i>(use &nbsp; &lt;br/&gt; &nbsp; for line break.)</i></small>';
	echo '</label>';
	echo '<input type="text" name="slider_text" id="slider_text" value="'.$slider_text.'"/>';

	//Slider Button Text
	echo '<br/>';
	echo '<label for="button_text">';
	_e('Button Text', 'lawzone');
	echo '</label>';
	echo '<input type="text" name="button_text" id="button_text" value="'.$button_text.'"/>';


	//Data Title
	echo '<br/>';
	echo '<label for="data_title">';
	_e('Data Title', 'lawzone');
	echo '</label>';
	echo '<input type="text" name="data_title" id="data_title" value="'.$data_title.'"/>';


	//Slider URL
	echo '<br/>';
	echo '<label for="slider_url">';
	_e('URL', 'lawzone');
	echo '</label>';
	echo '<input type="text" name="slider_url" id="slider_url" value="'.$slider_url.'"/>';

	//Text Position
	echo '<br/>';
	echo '<label for="text_position">';
	_e('Text Position', 'lawzone');
	echo '</label>';
	echo '<select style="min-width:200px;" name="text_position" id="text_position">';
	echo '<option value="left" '.$positionL.'>Left</option>';
	echo '<option value="right" '.$positionR.'>Right</option>';
	echo '<option value="center" '.$positionC.'>Center</option>';
	echo '</select>';
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($){
	  var mediaUploader;
	  $('#img_upload-button').click(function(e) {
		e.preventDefault();
		// If the uploader object has already been created, reopen the dialog
		  if (mediaUploader) {
		  mediaUploader.open();
		  return;
		}
		// Extend the wp.media object
		mediaUploader = wp.media.frames.file_frame = wp.media({
		  title: 'Choose Slider Image',
		  button: {
		  text: 'Choose Slider Image'
		}, multiple: false });
	 
		// When a file is selected, grab the URL and set it as the text field's value
		mediaUploader.on('select', function() {
		  attachment = mediaUploader.state().get('selection').first().toJSON();
		  $('.delete, .suggesion').remove();
		  $('#slider_img').val(attachment.id);
		  $('#img_upload-button').html('<img src="'+attachment.url+'"/>').addClass('nopadding');
		  $('<div class="suggesion text-center mt5"><span><i><small>Click on image for edit.</small></i></span></div>').insertAfter('#img_upload-button');
		  $('<div class="delete"><div alt="f158" class="dashicons dashicons-no" style="display: inline-block;"></div></div>').insertBefore('#img_upload-button');
		});
		// Open the uploader dialog
		mediaUploader.open();
	  });

	  //Delete Image 
	  $(document.body).on('click', '.sarea .delete', function(){
	  	$('#img_upload-button').html('<span>Select Slider Image</span>').removeClass('nopadding');
	  	$('#slider_img').val('');
	  	$(this).remove();
	  	$('.suggesion').remove();
	  }); // End Delete function
	  }); //End Document Ready
	</script>
	<?php
}





/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['lawzone_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['lawzone_meta_box_nonce'], 'lawzone_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}


	// for html tag
	global $allowedtags;

        // allow iframe only in this instance
    $iframe = array( 'iframe' => array(
                            'src' => array(),
                            'width' => array(),
                            'height' => array(),
                            'frameborder' => array(),
                            'div' => array(),
                            'span'=> array(),
                            'class' => array(),
                            'br' => array(),
                            'allowFullScreen' => array() // add any other attributes you wish to allow
                             ) );

    $allowed_html = array_merge( $allowedtags, $iframe );
	/* OK, it's safe for us to save the data now. */
	if($_POST['post_type'] != 'page'){
	// Sanitize user input.
	$my_data_slider_img 		= esc_html(sanitize_text_field( $_POST['slider_img'] ));
	$my_data_slider_text 		= format_to_edit( $_POST['slider_text'], $allowed_html );
	$my_data_button_text 		= esc_html(sanitize_text_field( $_POST['button_text'] ));
	$my_data_data_title 		= esc_html(sanitize_text_field( $_POST['data_title'] ));
	$my_data_slider_url 		= esc_html(sanitize_text_field( $_POST['slider_url'] ));
	$my_data_text_position 		= esc_html(sanitize_text_field( $_POST['text_position'] ));
	$my_data_text_court_icon 	= esc_html(sanitize_text_field( $_POST['court_icon'] ));
	$my_data_title2 			= esc_html(sanitize_text_field( $_POST['title2'] ));
	
	//Our Team
	$my_data_text_designation 	= esc_html(sanitize_text_field( $_POST['designation'] ));
	$my_data_text_dribbble 		= esc_html(sanitize_text_field( $_POST['dribbble'] ));
	$my_data_text_twitter 		= esc_html(sanitize_text_field( $_POST['twitter'] ));
	$my_data_text_skype 		= esc_html(sanitize_text_field( $_POST['skype'] ));
	$my_data_single_img 		= esc_html(sanitize_text_field( $_POST['single_img'] ));
	
	// For Widget Post Type
	$my_data_description 		= esc_html(sanitize_text_field( $_POST['description'] ));
	$my_data_before_widget 		= format_to_edit( $_POST['before_widget'] );
	$my_data_after_widget 		= format_to_edit( $_POST['after_widget'] );
	$my_data_before_title 		= format_to_edit( $_POST['before_title'] );
	$my_data_after_title 		= format_to_edit( $_POST['after_title'] );

	//Project
	$my_data_client 			= format_to_edit( $_POST['client'] );
	$my_data_teclg_use 			= format_to_edit( $_POST['teclg_use'] );
	$my_data_date 				= format_to_edit( $_POST['date'] );
	$my_data_site 				= format_to_edit( $_POST['site'] );

	//Practice
	$my_data_banner 			= esc_html(sanitize_text_field( $_POST['banner'] ));
	$my_data_d_pdf 				= esc_html(sanitize_text_field( $_POST['d_pdf'] ));


	
	


	// Update the meta field in the database.
	update_post_meta( $post_id, 'slider_img', $my_data_slider_img );
	update_post_meta( $post_id, 'slider_text', $my_data_slider_text );
	update_post_meta( $post_id, 'button_text', $my_data_button_text );
	update_post_meta( $post_id, 'data_title', $my_data_data_title );
	update_post_meta( $post_id, 'slider_url', $my_data_slider_url );
	update_post_meta( $post_id, 'text_position', $my_data_text_position );
	update_post_meta( $post_id, 'court_icon', $my_data_text_court_icon );
	update_post_meta( $post_id, 'title2', $my_data_title2 );

	// Out team
	update_post_meta( $post_id, 'designation', $my_data_text_designation );
	update_post_meta( $post_id, 'dribbble', $my_data_text_dribbble );
	update_post_meta( $post_id, 'twitter', $my_data_text_twitter );
	update_post_meta( $post_id, 'skype', $my_data_text_skype );
	update_post_meta( $post_id, 'single_img', $my_data_single_img );

	// For Widget Post Type
	update_post_meta( $post_id, 'description', $my_data_description );
	update_post_meta( $post_id, 'before_widget', $my_data_before_widget );
	update_post_meta( $post_id, 'after_widget', $my_data_after_widget );
	update_post_meta( $post_id, 'before_title', $my_data_before_title );
	update_post_meta( $post_id, 'after_title', $my_data_after_title );
	
	//Project
	update_post_meta( $post_id, 'client', $my_data_client );
	update_post_meta( $post_id, 'teclg_use', $my_data_teclg_use );
	update_post_meta( $post_id, 'date', $my_data_date );
	update_post_meta( $post_id, 'site', $my_data_site );

	// Practice
	update_post_meta( $post_id, 'banner', $my_data_banner );
	update_post_meta( $post_id, 'd_pdf', $my_data_d_pdf );
	}
	else
	{

	// Mage Meta
	$my_data_page_header 		= format_to_edit( $_POST['page_header'] );
	$my_data_page_layout 		= format_to_edit( $_POST['layout'] );
	$my_data_page_overlayer 	= format_to_edit( $_POST['overlayer'] );

	//For Page Meta
	update_post_meta( $post_id, 'page_header', $my_data_page_header );
	update_post_meta( $post_id, 'layout', $my_data_page_layout );
	update_post_meta( $post_id, 'overlayer', $my_data_page_overlayer );
	}
}
add_action( 'save_post', 'save_meta_box_data' );







/* Add Media Upload Script */
function my_media_lib_uploader_enqueue() {
    wp_enqueue_media();
    wp_enqueue_style( 'meta-css', PARENT_THEME_DIR . '/css/admin/metabox.css', array(), '5.1.1');
  }
  add_action('admin_enqueue_scripts', 'my_media_lib_uploader_enqueue');

?>



