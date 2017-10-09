 <?php
/*
* Admin Theme Function
*/
ob_start();
require_once('save_option.php');
require_once('css/dynamic.php');
$path = (is_child_theme())?get_template_directory_uri():get_stylesheet_directory_uri();


/*
* data get function 
*/
function ch_get_option($rdata){
	$ch_data = new ch_option;
	return $ch_data->ch_get_opt($rdata);
} 

/*
* Add menu item in admin 
*/
function addThemeMenuItem() {
	//add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
	add_submenu_page('themes.php', "Theme Option", "Theme Option", "manage_options", "theme-panel", "themeSettingsPage");
}



/*
* Add Script Logo Uplode
*/

function wpGearManagerAdminScripts() {
	global $path;
	// function for upload script
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery');
	//wp_enqueue_style( 'wp-color-picker' ); 
/*	if (isset($_GET['page'])) {
		if ($_GET['page'] == 'theme-panel' || $_GET['page'] == 'theme-panel-settings') {*/
			//wp_enqueue_media();
			wp_enqueue_script('codeHouseThemeOptionsjs', $path . '/inc_function/lara_frame/js/code_house_adminPanel.js', array('wp-color-picker'), '10102017', true);
			wp_enqueue_media();
			
		/*}
	}*/
}




/*
* Add custom Style for admin 
*/
function wpGearManagerAdminStyles() {
	global $path;
	//  function for upload style
	wp_enqueue_style('thickbox');
	wp_enqueue_style('parent-customThemeStyle', $path . '/inc_function/lara_frame/css/admin-function.css');
	wp_enqueue_style('wp-color-picker');
}
add_action('admin_print_scripts', 'wpGearManagerAdminScripts');
add_action('admin_print_styles', 'wpGearManagerAdminStyles');
add_action("admin_menu", "addThemeMenuItem");



/*
* Main Theme Settings Page 
*/
function themeSettingsPage() {
	$ch_data = new ch_option;
	if(isset($_POST['submit'])){
		$ch_data->data_save($_POST);
	}
?>
<div class="wrap">

	<form method="post" action="">
		<?php
		global $path;

		settings_fields("section");
		do_settings_sections("theme-options");
		$itemArray = array(
		'general' => array(
			'infos' => array(
				array(
					'title' => 'logo',
					'note' => 'Add a Custom Logo from your Media Library',
					'type' => 'upload'
				),
				array(
					'title' => 'Favicon',
					'note' => 'Add a 16px x 16px Png/Gif image that will represent your website\'s favicon.',
					'type' => 'upload'
				),
				array(
					'title' => 'Custom Login Logo',
					'note' => 'Add a custom logo for the Wordpress login screen.',
					'type' => 'upload'
				),
				array(
					'title' => 'Email',
					'note' => 'Add a site email for user.',
					'type' => 'email'
				),
				array(
					'title' => 'Tel',
					'note' => 'Add a site telephone & mobile.',
					'type' => 'text'
				),

				array(
					'title'	=> 	'Opening Hours', 
					'note'	=> 	'Opening hours (use "&lt;br/&gt;" for line break)',
					'type'	=>	'text'
				)
			),
			'footer' => array(
				array(
					'title' => 'Back to Top',
					'note' => 'Display the back to top button.',
					'type' => 'checkbox',
					'checkbox_value' => array('yes', 'no')
				),
				array(
					'title' => 'Footer (Copyright)',
					'note' => 'Write your Copyright infos.',
					'type' => 'text'
				),
				array(
					'title' => 'Google Analytics Tracking ID',
					'note' => 'Paste your Google analytics (or other) ID here.',
					'type' => 'text'
				)
			)
		),
		'Styling' => array(
			'Color Settings' => array(
				
				array(
					'title' => 'Focus Color',
					'note' => 'Please make sure that you use a correct color code.',
					'type' => 'color_picker'
				),
				array(
					'title'	=> 	'Menu Background',
					'note'	=>	'Top Menu Background',
					'type'	=> 	'color_picker'
				),
				
				array(
					'title'	=> 	'Heading Background',
					'note'	=>	'All Heading Default Background',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Button Color',
					'note'	=>	'All Button Default Color',
					'type'	=> 	'color_picker'
				),
				array(
					'title'	=> 	'Default Overlayer Background',
					'note'	=>	'Default Overlayer Background Color',
					'type'	=> 	'color_picker'
				),
				array(
					'title' => 'Footer Background Color',
					'note' 	=> 'Choose your footer background color.',
					'type' 	=> 'color_picker'	
				),
				array(
					'title' => 'Body Background',
					'note' 	=> 'Choose your Body background color.',
					'type' 	=> 'color_picker'	
				)

			)
		),
		'Typography' => array(
			'Body' => array(
					array(
					'title'	=> 'Body Font',
					'note'	=> 	'select body font family',
					'type'	=> 	'dropdown',
					'dropdown_value' => array(
						'default' => 'default', 
						'Montserrat' => 'Montserrat', 
						'Raleway' => 'Raleway', 
						'Roboto Condensed' => 'Roboto Condensed', 
						'Yrsa' => 'Yrsa', 
						'Open Sans Condensed' => 'Open Sans Condensed', 
						'Ubuntu' => 'Ubuntu', 
						'Titillium Web' => 'Titillium Web', 
						'PT Sans Narrow' => 'PT Sans Narrow', 
						'Cabin' => 'Cabin', 
						'Poiret One' => 'Poiret One', 
						'Josefin Sans' => 'Josefin Sans', 
						'Catamaran' => 'Catamaran', 
						'Quicksand' => 'Quicksand', 
						'Libre Franklin' => 'Libre Franklin', 
						'Kavoon' => 'Kavoon', 
						'Concert One' => 'Concert One', 
						'EB Garamond' => 'EB Garamond', 
						'Chewy' => 'Chewy', 
						'Comfortaa' => 'Comfortaa', 
						'Copse' => 'Copse', 
						'Cormorant' => 'Cormorant', 
						'ABeeZee' => 'ABeeZee', 
						'Gudea' => 'Gudea', 
						'Mukta Vaani' => 'Mukta Vaani', 
						'Cantarell' => 'Cantarell', 
						'Economica' => 'Economica', 
						'Droid Sans Mono' => 'Droid Sans Mono', 
						'Reem Kufi' => 'Reem Kufi', 
						'Yanone Kaffeesatz' => 'Yanone Kaffeesatz', 
						'Play' => 'Play'
						)
					),
					array(
					'title'	=> 	'Body Font Size',
					'note'	=> 	'Chooce the body font size',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array(
						'10px' => '10px', 
						'12px' => '12px', 
						'14px' => '14px', 
						'16px' => '16px', 
						'18px' => '18px', 
						'20px' => '20px', 
						'22px' => '22px', 
						'24px' => '24px', 
						'26px' => '26px', 
						'28px' => '28px', 
						'30px' => '30px'
						)
					), 

					array(
					'title'	=> 	'Body Font Line-Height',
					'note'	=> 	'Chooce the body font line height',
					'type'	=>	'dropdown',
					'dropdown_value'=> array(
						'10px' => '10px', 
						'12px' => '12px', 
						'14px' => '14px', 
						'16px' => '16px', 
						'18px' => '18px', 
						'20px' => '20px', 
						'22px' => '22px', 
						'24px' => '24px', 
						'26px' => '26px', 
						'28px' => '28px', 
						'30px' => '30px'
						)
					)
				),
			'Headings' => array(
					array(
					'title'	=> 'Heading Font',
					'note'	=> 	'select heading font family',
					'type'	=> 	'dropdown',
					'dropdown_value' => array(
						'default' => 'default', 
						'Montserrat' => 'Montserrat', 
						'Raleway' => 'Raleway', 
						'Roboto Condensed' => 'Roboto Condensed', 
						'Yrsa' => 'Yrsa', 
						'Open Sans Condensed' => 'Open Sans Condensed', 
						'Ubuntu' => 'Ubuntu', 
						'Titillium Web' => 'Titillium Web', 
						'PT Sans Narrow' => 'PT Sans Narrow', 
						'Cabin' => 'Cabin', 
						'Poiret One' => 'Poiret One', 
						'Josefin Sans' => 'Josefin Sans', 
						'Catamaran' => 'Catamaran', 
						'Quicksand' => 'Quicksand', 
						'Libre Franklin' => 'Libre Franklin', 
						'Kavoon' => 'Kavoon', 
						'Concert One' => 'Concert One', 
						'EB Garamond' => 'EB Garamond', 
						'Chewy' => 'Chewy', 
						'Comfortaa' => 'Comfortaa', 
						'Copse' => 'Copse', 
						'Cormorant' => 'Cormorant', 
						'ABeeZee' => 'ABeeZee', 
						'Gudea' => 'Gudea', 
						'Mukta Vaani' => 'Mukta Vaani', 
						'Cantarell' => 'Cantarell', 
						'Economica' => 'Economica', 
						'Droid Sans Mono' => 'Droid Sans Mono', 
						'Reem Kufi' => 'Reem Kufi', 
						'Yanone Kaffeesatz' => 'Yanone Kaffeesatz', 
						'Play' => 'Play'
						)
					),
					array(
					'title'	=> 	'Heading Font Weight',
					'note'	=> 	'Chooce heading font weight',
					'type'	=>	'dropdown',
					'dropdown_value'=> array('default' => 'Default', 'normal' => 'Normal', 'bold' => 'Bold')
					)
				),
			'Navigation' => array(
					array(
					'title'	=> 'Navigation Font',
					'note'	=> 	'select navigation font family',
					'type'	=> 	'dropdown',
					'dropdown_value' => array(
						'default' => 'default', 
						'Montserrat' => 'Montserrat', 
						'Raleway' => 'Raleway', 
						'Roboto Condensed' => 'Roboto Condensed', 
						'Yrsa' => 'Yrsa', 
						'Open Sans Condensed' => 'Open Sans Condensed', 
						'Ubuntu' => 'Ubuntu', 
						'Titillium Web' => 'Titillium Web', 
						'PT Sans Narrow' => 'PT Sans Narrow', 
						'Cabin' => 'Cabin', 
						'Poiret One' => 'Poiret One', 
						'Josefin Sans' => 'Josefin Sans', 
						'Catamaran' => 'Catamaran', 
						'Quicksand' => 'Quicksand', 
						'Libre Franklin' => 'Libre Franklin', 
						'Kavoon' => 'Kavoon', 
						'Concert One' => 'Concert One', 
						'EB Garamond' => 'EB Garamond', 
						'Chewy' => 'Chewy', 
						'Comfortaa' => 'Comfortaa', 
						'Copse' => 'Copse', 
						'Cormorant' => 'Cormorant', 
						'ABeeZee' => 'ABeeZee', 
						'Gudea' => 'Gudea', 
						'Mukta Vaani' => 'Mukta Vaani', 
						'Cantarell' => 'Cantarell', 
						'Economica' => 'Economica', 
						'Droid Sans Mono' => 'Droid Sans Mono', 
						'Reem Kufi' => 'Reem Kufi', 
						'Yanone Kaffeesatz' => 'Yanone Kaffeesatz', 
						'Play' => 'Play'
						)
					),
					array(
					'title'	=> 	'Navigation Font Size',
					'note'	=> 	'Chooce the body font size',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array(
						'10px' => '10px', 
						'12px' => '12px', 
						'14px' => '14px', 
						'16px' => '16px', 
						'18px' => '18px', 
						'20px' => '20px', 
						'22px' => '22px', 
						'24px' => '24px', 
						'26px' => '26px', 
						'28px' => '28px', 
						'30px' => '30px'
						)
					), 

					array(
					'title'	=> 	'Navigation Font Weight',
					'note'	=> 	'Chooce navigation font weight',
					'type'	=>	'dropdown',
					'dropdown_value'=> array(
						'default' => 'Default', 
						'normal' => 'normal', 
						'Bold' => 'Bold'
						)
					)
				)
		),
		'Social' => array(
			'Social Icons' => array(
				array(
					'title' => 'Social(1)',
					'note' => 'Use FontAwasome Icon class in img field & set url.',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image')
				),
				array(
					'title' => 'Social(2)',
					'note' => 'Use FontAwasome Icon class in img field & set url.',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image')
				),
				array(
					'title' => 'Social(3)',
					'note' => 'Use FontAwasome Icon class in img field & set url.',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image')
				),
				array(
					'title' => 'Social(4)',
					'note' => 'Use FontAwasome Icon class in img field & set url.',
					'type'	=> 	'list',
					'item'	=>	array('title', 'url', 'image')
				)
			)
		),
		'Practice' => array(
			'Single Practice Settings' => array(
				array(
					'title' => 'Practice Header Background',
					'note' 	=> 'Single Practice Header Background image.',
					'type' 	=> 'upload'
				),
				array(
					'title' => 'Practice Header Overlayer',
					'note' => 'Select Overlayer for Single Practice Header Overlayer.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array(
						'overlayer-black' => 'overlayer-black', 
						'default-overlay' => 'default-overlay'
						)
				),
				array(
					'title' => 'Practice Sidebar',
					'note' => 'Select Sidebar.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> lawzone_all_posts('widget')
				),
				array(
					'title' => 'Practice Layout Style',
					'note' => 'Choose your Practice template style',
					'type' => 'radio',
					'nature' => 'layout_style',
					'radio_value' => array('left', 'right', 'no'),
					'extra_input' => 'widget-list',
					'value' => 'no'
				)
			)
		),
		'Attorney' => array(
			'Single Attorney Settings' => array(
				array(
					'title' => 'Attorney Header Background',
					'note' 	=> 'Single Attorney Header Background image.',
					'type' 	=> 'upload'
				),
				array(
					'title' => 'Attorney Header Overlayer',
					'note' => 'Select Overlayer for Single Attorney Header Overlayer.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array(
						'overlayer-black' => 'overlayer-black', 
						'default-overlay' => 'default-overlay'
						)
				),
				array(
					'title' => 'Active Attorney Query',
					'note' => 'Active Query from Attorney Details Page.',
					'type' => 'checkbox',
					'value' => 'yes',
					'checkbox_value' => array('yes', 'no')
				),
				array(
					'title' => 'Select Query Form',
					'note' => 'Select Contact Form 7.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> lawzone_all_posts('wpcf7_contact_form')
				),
				array(
					'title' => 'Attorney Form Background',
					'note' 	=> 'Single Attorney Form Background image.',
					'type' 	=> 'upload'
				),
				array(
					'title' => 'Attorney Form Overlayer',
					'note' => 'Select Overlayer for Single Attorney Form Overlayer.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array(
						'overlayer-black' => 'overlayer-black', 
						'default-overlay' => 'default-overlay'
						)
				)
			)
		),
		'Portfolio' => array(
			'Single Portfolio Settings' => array(
				array(
					'title' => 'Portfolio Header Background',
					'note' 	=> 'Single Portfolio Header Background image.',
					'type' 	=> 'upload'
				),
				array(
					'title' => 'Portfolio Header Overlayer',
					'note' => 'Select Overlayer for Single Portfolio Header Overlayer.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array(
						'overlayer-black' => 'overlayer-black', 
						'default-overlay' => 'default-overlay'
					)
				),
				array(
					'title' => 'Show Portfolio Slider',
					'note' => 'Select yes for show other portfolio item as a slider.',
					'type'	=> 	'checkbox',
					'checkbox_value' => array('yes', 'no')
				),
				array(
					'title' => 'Portfolio Slider Visiable Item',
					'note' => 'Select Portfolio Slider items visiable item on each section.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array(
						5 => 'Five',
						4 => 'Four',
						3 => 'Three'
						)
				),
			)
		),

		'Blog' => array(
			'Blog Settings' => array(
				array(
					'title' => 'Blog Header Background',
					'note' 	=> 'Single Blog Header Background image.',
					'type' 	=> 'upload'
				),
				array(
					'title' => 'Blog Header Overlayer',
					'note' => 'Select Overlayer for Single Blog Header Overlayer.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array(
						'overlayer-black' => 'overlayer-black', 
						'default-overlay' => 'default-overlay'
					), 
					'value' => 'overlayer-black'
				),

				array(
					'title' => 'Blog Sidebar',
					'note' => 'Select Sidebar.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> lawzone_all_posts('widget')
				),
				array(
					'title' => 'Blog Page Layout Style',
					'note' => 'Choose your Blog layout style',
					'type' => 'radio',
					'nature' => 'layout_style',
					'radio_value' => array('left', 'right', 'no'),
					'extra_input' => 'widget-list',
					'value' => 'right'
				)

			),
			'Blog Details Settings' => array(
				array(
					'title' => 'Blog Details Header Background',
					'note' 	=> 'Single Blog Header Background image.',
					'type' 	=> 'upload'
				),
				array(
					'title' => 'Blog Details Header Overlayer',
					'note' => 'Select Overlayer for Single Blog Header Overlayer.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array(
						'overlayer-black' => 'overlayer-black', 
						'default-overlay' => 'default-overlay'
					)
				),
				array(
					'title' => 'Active Comments',
					'note' 	=> 'Active Comments below post content.',
					'type' 	=> 'checkbox',
					'checkbox_value' => array('yes', 'no'),
					'value' => 'yes'
				),
				array(
					'title' => 'Blog Details Sidebar',
					'note' => 'Select Sidebar.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> lawzone_all_posts('widget')
				),
				array(
					'title' => 'Blog Layout Style',
					'note' => 'Choose your Blog layout style',
					'type' => 'radio',
					'nature' => 'layout_style',
					'radio_value' => array('left', 'right', 'no'),
					'extra_input' => 'widget-list',
					'value' => 'right'
				)

			),
			'Archive Settings' => array(
				array(
					'title' => 'Archive Header Background',
					'note' 	=> 'Single Blog Header Background image.',
					'type' 	=> 'upload'
				),
				array(
					'title' => 'Archive Header Overlayer',
					'note' => 'Select Overlayer for Single Blog Header Overlayer.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array(
						'overlayer-black' => 'overlayer-black', 
						'default-overlay' => 'default-overlay'
					)
				),
				array(
					'title' => 'Archive Sidebar',
					'note' => 'Select Sidebar.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> lawzone_all_posts('widget')
				),
				array(
					'title' => 'Archive Layout Style',
					'note' => 'Choose your Blog layout style',
					'type' => 'radio',
					'nature' => 'layout_style',
					'radio_value' => array('left', 'right', 'no'),
					'extra_input' => 'widget-list',
					'value' => 'right'
				)

			)
		),

		'Shop' => array(
			'Shop Settings' => array(
				array(
					'title' => 'Product Item per page',
					'note' 	=> 'Product Item per page on Shop.',
					'type' 	=> 'number'
				),
				array(
					'title' => 'Shop Layout Style',
					'note' => 'Choose your shop layout style',
					'type' => 'radio',
					'nature' => 'layout_style',
					'radio_value' => array('left', 'right', 'no'),
					'extra_input' => 'widget-list'
				)
			)
		),
		'Product' => array(
			'Single Product Settings' => array(
				array(
					'title' => 'Product Header Background',
					'note' 	=> 'Single product Header Background image.',
					'type' 	=> 'upload'
				),
				array(
					'title' => 'Product Header Overlayer',
					'note' => 'Select Overlayer for Single Product Header Overlayer.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array(
						'overlayer-black' => 'overlayer-black', 
						'default-overlay' => 'default-overlay'
					)
				)
			)
		),
		'Under Construction' => array(
			'Under Construction Setting' => array(
				array(
					'title' => 'Under Construction',
					'note' 	=> 'Active Under Construction.',
					'type' 	=> 'checkbox',
					'checkbox_value' => array('yes', 'no')
				),
				array(
					'title' => 'Under Construction Page',
					'note' 	=> 'Select Under Construction page.',
					'type' 	=> 'dropdown',
					'dropdown_value' => lawzone_all_posts('page')
				)
			)
		),
		'404' => array(
			'404 Page Setting' => array(
				array(
					'title' => '404 title',
					'note' 	=> '404 Title',
					'type' 	=> 'text',
					'value' => '404'
				),
				array(
					'title' => '404 subtitle',
					'note' 	=> '404 Sub Title.',
					'type' 	=> 'text',
					'value' => 'Oops! Page Not Found'
				),
				array(
					'title' => '404 content',
					'note' 	=> '404 Message for visitor.',
					'type' 	=> 'textarea',
					'value' => 'Sorry.... The page you were looking for could not be found....'
				),
				array(
					'title' => '404 Background',
					'note' => '404 page Background',
					'type' => 'upload'
				),
				array(
					'title' => '404 Overlayer',
					'note' => 'Select Overlayer for 404 page.',
					'type'	=> 	'dropdown',
					'dropdown_value'=> array(
						'default-overlay' => 'default-overlay',
						'overlayer-black' => 'overlayer-black', 
					)
				)
			)
		),

		'Custom' => array(
			'Custom CSS'=> array(
				array(
					'title'	=>	'Custom CSS Code',
					'note'	=> 	'Custom CSS',
					'type'	=> 	'textarea'
				)
			)
		)
		//'styling', 'blog', 'portfolio', 'layout', 'colors', 'fonts', 'social'
		);
		?>
		<?php
		/*
		echo '<pre>';
			print_r($itemArray);
		echo '</pre>';*/
		;?>
		<div class="themeOption">
			<div class="leftManu">
				<div class="topbar logotop">
					<div class="icon">
						<img src="<?= $path; ?>/inc_function/lara_frame/img/1462632628_Settings.png" alt="setting icon"/>
					</div>
					<div class="Logotitle">
						<h3><span style="color:red;">Theme</span><span>Options</span></h3>
						<span class="themeoption_powerBy">Powered by <a target="_blank" href="http://www.larasoftbd.com">LaraSoft</a></span>
					</div>
				</div>
				<div class="ThOleftMenuItem">
					<ul>
						<?php foreach ($itemArray as $key => $tab): ?>
						<li><a href="#<?= str_replace(' ', '_', $key );?>"><?=ucfirst($key);?></a></li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
			<div class="themeOptionBody">
				<div class="topbar bodytop">
					<h3><span class="topTitle">General</span></h3>
					<?php submit_button();?>
				</div>
				<?php foreach ($itemArray as $key => $mainBody): ?>
				<div class="ThOMainBody" id="<?= str_replace(' ', '_', $key);?>">
					<?php foreach ($mainBody as $mainKey => $singBody): ?>
					<div class="section">
						<div class="sectionhead">
							<h3><?=$mainKey;?></h3>
						</div>
						<div class="sectionbody">
							<?php for ($i = 0; $i < count($singBody); $i += 1): ?>
							<div class="sectionPart">
								<div class="part_left">
								<label for="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"><h4><?=$singBody[$i]['title'];?></h4></label>	
								</div>
								
								<?php
								switch ($singBody[$i]['type']):
								case 'upload':
								?>
								<div class="partRight">
									<input type="hidden" value="<?= $ch_data->ch_get_opt($singBody[$i]['title'] . '_id'); ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']) . '_id';?>"/>
									<input type="text" value="<?= wp_get_attachment_url($ch_data->ch_get_opt($singBody[$i]['title'] . '_id')); ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"/>
									<button class="button button-submit add-image">Add Image</button>
								</div>
								<?php
								break;
								case 'checkbox':
								?>
								<div class="partRight">
									<?php $vl = ($ch_data->ch_get_opt($singBody[$i]['title']))?$ch_data->ch_get_opt($singBody[$i]['title']):''; 
									?>
									<input type="checkbox" style="display: none;" value="<?= $vl ?>" <?= ($vl == 'yes')?'checked':''; ?> name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"/>
									<a href="#"  class="checkbox-status <?= ($vl == 'yes')?'active':''; ?>">Checkbox</a>
								</div>
								
								<?php
								break;
								case 'text':
								?>
								<div class="partRight">
									<input type="text" style="width:99%;" 
									value="<?= ($ch_data->ch_get_opt($singBody[$i]['title']) )?format_to_edit(str_replace('\"', '"', $ch_data->ch_get_opt($singBody[$i]['title']))):''; ?>" 
									name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"/>
								</div>
								<?php
								break;

								case 'number':
								?>
								<div class="partRight">
									<input type="number" style="width:99%;" value="<?= ($ch_data->ch_get_opt($singBody[$i]['title']) )?str_replace("\'", "'", $ch_data->ch_get_opt($singBody[$i]['title'])):''; ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"/>
								</div>
								<?php
								break;

								case 'visual_editor':
								define(OPTION_ID, 'my-editor');
								$meta_box_id = OPTION_ID;
						        $editor_id 	 = $ch_data->ch_stringReplace($singBody[$i]['title']);
						        $exvalue 	 = $ch_data->ch_get_opt($singBody[$i]['title']);
						        $label   	 = 'label[for="id-'.$editor_id.'"]';
						        $iframe_id 	 = $editor_id . '_ifr';
						        $editor_id_fullscreen = '';
						

						        //Add CSS & jQuery goodness to make this work like the original WYSIWYG
						        echo "
						                <style type='text/css'>
						                        #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
						                        #$editor_id{width:100%; height:150px;}
						                        #$meta_box_id #editorcontainer{background:#fff !important;}
						                        #$meta_box_id #$editor_id_fullscreen{display:none;}
						                		iframe#$iframe_id{min-height:200px;}
						                </style>           
						                <script type='text/javascript'>
						                        jQuery(function($){
						                        	    $('$label').parent('.part_left').css({'width':'100%', 'margin-bottom':'10px' });
						                                $('#$meta_box_id #editor-toolbar > a').click(function(){
						                                        $('#$meta_box_id #editor-toolbar > a').removeClass('active');
						                                        $(this).addClass('active');
						                                });                               
						                                if($('#$meta_box_id #edButtonPreview').hasClass('active')){
						                                        $('#$meta_box_id #ed_toolbar').hide();
						                                }
						                                
						                                $('#$meta_box_id #edButtonPreview').click(function(){
						                                        $('#$meta_box_id #ed_toolbar').hide();
						                                });
						                                
						                                $('#$meta_box_id #edButtonHTML').click(function(){
						                                        $('#$meta_box_id #ed_toolbar').show();
						                                });

										//Tell the uploader to insert content into the correct features editor
										$('#media-buttons a').bind('click', function(){
											var customEditor = $(this).parents('#$meta_box_id');
											if(customEditor.length > 0){
												edCanvas = document.getElementById('$editor_id');
											}
											else{
												edCanvas = document.getElementById('$editor_id');
											}
										});

						                });
						                </script>
						        ";
						          the_editor(str_replace('\"', '"', $exvalue), $editor_id);
						                  //Clear The Room!
        						  echo "<div style='clear:both; display:block;'></div>";
								break;
								
								case 'email':
								?>
								<div class="partRight">
									<input type="email" style="width:99%;" value="<?= $ch_data->ch_get_opt($singBody[$i]['title']); ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"/>
								</div>
								<?php
								break;

								case 'textarea':
								?>
								<div class="partRight">
									<textarea name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>"><?= ($ch_data->ch_get_opt($singBody[$i]['title']))?$ch_data->ch_get_opt($singBody[$i]['title']):''; ?></textarea>
								</div>
								<?php
								break;
								
								case 'dropdown':
								?>
								<div class="partRight">
										
									<select name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>">
										<option value="">Select <?=$singBody[$i]['title'];?> </option>
										<?php foreach ($singBody[$i]['dropdown_value'] as $dk => $singleDropdown): ?>
										<option <?= ($ch_data->ch_get_opt($singBody[$i]['title']) == strtolower($dk) ?'selected':''); ?> value="<?=strtolower($dk);?>"><?=ucfirst($singleDropdown);?></option>
										<?php endforeach;?>
									</select>
								</div>
								<?php
								break;
								case 'color_picker':
								?>
								<div class="partRight">
									<input type="text" class="codeHouseColorPicker" value="<?= $ch_data->ch_get_opt($singBody[$i]['title']); ?>" name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" id="id-<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>">
								</div>
								<?php
								break;
								case 'radio':
								?>
								<div class="partRight animationDiv">
									<?php foreach ($singBody[$i]['radio_value'] as $radioVal): 
									$vlr = ($ch_data->ch_get_opt($singBody[$i]['title']))?$ch_data->ch_get_opt($singBody[$i]['title']):''; 
									?>
									<input style="display:none;" <?= ($vlr == $radioVal)?'checked="checked"':'';  ?> name="<?=$ch_data->ch_stringReplace($singBody[$i]['title']);?>" type="radio" class="" value="<?=$radioVal;?>">
									<a href="javascript:void(0)" class="radio-status <?= ($vlr == $radioVal)?'active':'';  ?> <?php if ($singBody[$i]['nature'] == 'layout_style') {echo 'sidebar';} elseif ($singBody[$i]['nature'] == 'animation') {echo 'animation';}?> <?=$radioVal;?>" title="<?=$radioVal;?>"><?=$radioVal;?></a>
									<?php endforeach;?>
								</div>
								<?php
								break;
								case 'list':
								?>
									<div class=""></div>
									<div class="partRight listStyle">
										<?php 
											foreach($singBody[$i]['item'] as $s_item):
												//echo 'item: ' .$ch_data->ch_stringReplace($singBody[$i]['title']) . '<br/>';
												switch($s_item):
													case 'image':
														echo '<span><b>'.	$s_item.'</b></span>';
														echo '<input type="hidden" value="'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item .'_id').'" name="'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item). '_id' .'"/>';
														echo '<input type="text" value="'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item).'" name="'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item).'"/>';
														echo '<button class="button button-submit add-image">Add Image</button>';
														if($ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item)){
															echo '<div class="imgPreview">';
															$strLen = strlen( $ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item) );
															if( $strLen > 30){
															 echo '<img src="'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item).'"/>';
															} 
															echo '</div>';
														}
													break;

													case 'description':
														echo '<span><b>'.	$s_item.'</b></span>';
														echo '<textarea name="'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item).'" id="id-'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item).'">'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item).'</textarea>';
													break;

													default:
														echo '<span><b>'.$s_item.'</b></span>';
														echo '<input type="text" value="'.$ch_data->ch_get_opt($singBody[$i]['title'].'_'.$s_item).'" name="'.$ch_data->ch_stringReplace($singBody[$i]['title'].'_'.$s_item).'"/>';
												endswitch;
											endforeach;
										?>
									</div>
								<?php break; ?>
								<?php endswitch;?>
								<div class="imgPreview">
									<span><i><?=$singBody[$i]['note'];?></i></span>
									<div class="img">
										<?php 	
										if($singBody[$i]['type'] == 'upload' && $ch_data->ch_get_opt($singBody[$i]['title']) ) {
											echo '<img src="'.wp_get_attachment_url($ch_data->ch_get_opt($singBody[$i]['title'] . '_id')).'" alt="'.$singBody[$i]['title'].'">';
										}
										?>
									</div>
								</div>
							</div>
							<?php endfor;?>
						</div>
					</div>
					<?php endforeach;?>
				</div>
				<?php endforeach;?>
				<div class="ThOMainBody" id="blog">
					<span>Generalddd</span>
				</div>
			</div>
		</div>
		<?php
		submit_button();
		?>
	</form>
</div>
<?php
}
ob_end_clean();
?>