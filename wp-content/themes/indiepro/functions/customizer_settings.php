<?php
/**
 * Customizer - Add Custom Styling
 */
function indiepro_customizer_style()
{
	wp_enqueue_style('indiepro-customizer', get_template_directory_uri() . '/functions/css/customizer.css');
}
add_action('customize_controls_print_styles', 'indiepro_customizer_style');

/**
 * Customizer - Live Preview
 */
function indiepro_customizer_live_preview() {
	wp_enqueue_script( 
		'indiepro_customizer', 
		get_template_directory_uri() . '/js/theme-customizer.js', 
		array( 'customize-preview' ), 
		rand(),  
		true 
	);
}
add_action( 'customize_preview_init', 'indiepro_customizer_live_preview' );


/**
 * Customizer - Panels, Sections, Settings & Controls
 */
function indiepro_register_theme_customizer( $wp_customize ) {
	
	//  List Arrays
	$list_social_channels = array( // 1
		'rss'				=> __( 'RSS url', 'indiepro' ),
		'twitter'			=> __( 'Twitter url', 'indiepro' ),
		'facebook'			=> __( 'Facebook url', 'indiepro' ),
		'googleplus'		=> __( 'Google + url', 'indiepro' ),
		'linkedin'			=> __( 'LinkedIn url', 'indiepro' ),
		'flickr'			=> __( 'Flickr url', 'indiepro' ),
		'pinterest'			=> __( 'Pinterest url', 'indiepro' ),
		'youtube'			=> __( 'YouTube url', 'indiepro' ),
		'vimeo'				=> __( 'Vimeo url', 'indiepro' ),
		'tumblr'			=> __( 'Tumblr url', 'indiepro' ),
		'dribble'			=> __( 'Dribbble url', 'indiepro' ),
		'github'			=> __( 'Github url', 'indiepro' ),
		'instagram'			=> __( 'Instagram url', 'indiepro' ),
	);
	
	$list_hide_homepage_elements = array( // 1
		'categories'		=> __( 'Hide Categories', 'indiepro'),
		'date'				=> __( 'Hide Date', 'indiepro'),
		'comment_count'		=> __( 'Hide Comment Count', 'indiepro'),
		'author'			=> __( 'Hide Author', 'indiepro'),
		'featured'			=> __( 'Hide Featured Pin', 'indiepro'),
	);
	
	$list_enable_sidebar	= array(//1
		'posts'				=> __( 'Show Sidebar on Single Post Pages', 'indiepro' ),
		'page'				=> __( 'Show Sidebar on Pages', 'indiepro' ),
		'archive'			=> __( 'Show Sidebar on Archives/Tags/Categories', 'indiepro' ),
		'author'			=> __( 'Show Sidebar on Author Pages', 'indiepro'),
		'search'			=> __( 'Show Sidebar on Search Page', 'indiepro' ),
	);

	$array_main_content_color_controls = array(
		array('main_body_bg', __('Background Color', 'indiepro'), '', true),
		array('main_body_txt', __('Main Text Color', 'indiepro'), '#4C585C', true),
		array('main_article_bg', __('Article Background Color', 'indiepro'), '#fff', true),
		array('main_quote_bg', __('Quote Header Background Color', 'indiepro'), '#2b2b2b', true),
		array('main_article_title', __('Article Title Color', 'indiepro'), '#2b2b2b', true),
		array('main_article_link', __('Highlight Color', 'indiepro'), '#db971a', true),
		array('main_article_link_hover', __('Link Hover Color', 'indiepro'), '#E0B549', false),
	);
   
   	$array_header_color_controls = array(
		array('header_bg', __('Background Color', 'indiepro'), '#FFF', true),
		array('header_title_color', __('Title Color', 'indiepro'), '#2b2b2b', true),
		array('header_tagline_color', __('Tagline Color', 'indiepro'), '#2b2b2b', true),
		array('header_title_hover_color', __('Title & Tagline Hover Color', 'indiepro'), '#E0B549', false),
	);
	
	$array_footer_color_controls = array(
		array('widget_bg', __('Widget Area Background Color', 'indiepro'), '#FFF', true),
		array('widget_txt', __('Widget Area Text Color', 'indiepro'), '#2b2b2b', true),
		array('widget_txt_highlight', __('Widget Area Highlight Color', 'indiepro'), '#E0B549', true),
		array('widget_txt_highlight_hover', __('Widget Area Highlight Hover Color', 'indiepro'), '#E0B549', false),
		array('copyright_bg', __('Copyright Bar Background Color', 'indiepro'), '#2b2b2b', true),
		array('copyright_txt', __('Copyright Bar Text Color', 'indiepro'), '#fff', true),
		array('copyright_txt_highlight', __('Copyright Area Highlight Color', 'indiepro'), '#E0B549', true),
		array('copyright_txt_highlight_hover', __('Copyright Area Highlight Hover Color', 'indiepro'), '#E0B549', false),
	);
	
	$list_footer_hide_elements	= array(
		'widget_area'			=> __( 'Hide Widget Area', 'indiepro' ),
		'copyright_area'		=> __( 'Hide Copyright Bar', 'indiepro' ),
	);
	
	
	// ======== Google Font Setup
	
	$list_fonts        		= array(); // 1
	$list_font_weights 		= array(); // 2
	$webfonts_array    		= file(get_template_directory() . '/inc/fonts.json');
	$webfonts          		= implode( '', $webfonts_array );
	$list_fonts_decode 		= json_decode( $webfonts, true );
	$defaultFont			= 'Open Sans';
	foreach ( $list_fonts_decode['items'] as $key => $value ) {
		$item_family                     = $list_fonts_decode['items'][$key]['family'];
		$list_fonts[$item_family]        = $item_family; 
		$list_font_weights[$item_family] = $list_fonts_decode['items'][$key]['variants'];
	}

	$list_all_font_weights = array( // 3
		'100'       => __( 'Thin', 'indiepro' ),
		'300'       => __( 'Light', 'indiepro' ),
		'400'  	=> __( 'Regular', 'indiepro' ),
		'600'       => __( 'Semi-Bold', 'indiepro' ),
		'700'       => __( 'Bold', 'indiepro' ),
		'800'       => __( 'Extra Bold', 'indiepro' ),
	);
	$list_font_sizes = array( // 3
		'10'	=> __('Extra Small', 'indiepro'),
		'12'    => __( 'Small', 'indiepro' ),
		'16' 	=> __( 'Medium', 'indiepro' ),
		'28'    => __( 'Large', 'indiepro' ),
		'48' 	=> __( 'Extra Large', 'indiepro' ),
		'70'	=> __('XX Large', 'indiepro'),
	);
	$array_font_sections = array(
		array('font_site_nav', __('Site Navigation', 'indiepro'), 'Open Sans', '400', '12', false),
		array('font_site_title', __('Site Title', 'indiepro'), 'Open Sans', '400', '48', false),
		array('font_site_tagline', __('Site Tagline', 'indiepro'), 'Open Sans', '400', '28', false),
		array('font_body', __('Body Text', 'indiepro'), 'Open Sans', '400', '16', false),
		array('font_headers', __('Headers', 'indiepro'), 'Open Sans', '400', '12', false),
	);

	$priority = 0;
	

	// ====== END font setup

			
	// Add Panels
	
	if(method_exists('WP_Customize_Manager', 'add_panel')):
		$wp_customize->add_panel('indiepro_header_panel', array(
			'title'	=> __('Header Settings', 'indiepro'),
			'priority'	=> 10,
		));
		$wp_customize->add_panel('indiepro_global_panel', array(
			'title'	=> __('Global Settings', 'indiepro'),
			'priority'	=> 11,
		));
		$wp_customize->add_panel('indiepro_homepage_panel', array(
			'title'	=> __('Homepage Settings', 'indiepro'),
			'priority'	=> 12,
		));
		$wp_customize->add_panel('indiepro_footer_panel', array(
			'title'	=> __('Footer Settings', 'indiepro'),
			'priority'	=> 13,
		));
		
		$wp_customize->add_panel('indiepro_post_page_panel', array(
			'title'	=> __('Post &amp; Page Settings', 'indiepro'),
			'priority'	=> 13,
		));
		
		$wp_customize->add_panel('indiepro_colors_panel', array(
			'title'	=> __('Color Settings', 'indiepro'),
			'priority'	=> 14,
		));
		
		$wp_customize->add_panel('indiepro_font_panel', array(
			'title'	=> __('Font Settings', 'indiepro'),
			'priority'	=> 15,
		));
		
	
	
	endif;

	
	// Add Sections
	
	$wp_customize->add_section( 'indiepro_site_title_fonts', array(
		'title'    		=> __( 'Site Title', 'indiepro' ),
		'description'   => __( '<strong>Note.</strong><br />Please enable tags section checkbox for activate and use Google Web Fonts on selected tags.', 'indiepro' ),
		'panel'			=> __('indiepro_font_panel', 'indiepro'),
	));	
	$wp_customize->add_section( 'indiepro_site_tagline_fonts', array(
		'title'    		=> __( 'Site Title', 'indiepro' ),
		'description'   => __( '<strong>Note.</strong><br />Please enable tags section checkbox for activate and use Google Web Fonts on selected tags.', 'indiepro' ),
		'panel'			=> __('indiepro_font_panel', 'indiepro'),
	));
	$wp_customize->add_section( 'indiepro_body_fonts', array(
		'title'    		=> __( 'Body Fonts', 'indiepro' ),
		'description'   => __( '<strong>Note.</strong><br />Please enable tags section checkbox for activate and use Google Web Fonts on selected tags.', 'indiepro' ),
		'panel'			=> __('indiepro_font_panel', 'indiepro'),
	));
	$wp_customize->add_section( 'indiepro_body_fonts', array(
		'title'    		=> __( 'Body Fonts', 'indiepro' ),
		'description'   => __( '<strong>Note.</strong><br />Please enable tags section checkbox for activate and use Google Web Fonts on selected tags.', 'indiepro' ),
		'panel'			=> __('indiepro_font_panel', 'indiepro'),
	));
	$priority = 0;


	$wp_customize->add_section('indiepro_footer_colors_section', array(
		'title'		=> __('Footer Area Colors', 'indiepro'),
		'panel'		=> 'indiepro_footer_panel',
		'priority'	=> $priority++,
	));
	$wp_customize->add_section( 'indiepro_global_icons' , array(
		'title'      => __('Site Icons', 'indiepro'),
		'panel'		 => 'indiepro_global_panel',
		'priority'   => 2,
	) );

	$wp_customize->add_section( 'indiepro_global_layout' , array(
		'title'      => __('Site Layout', 'indiepro'),
		'panel'		 => 'indiepro_global_panel',
		'priority'   => 2,
	) );
	$wp_customize->add_section('indiepro_main_colors_section', array(
		'title'		=> __('Main Body Colors', 'indiepro'),
		'panel'		=> 'indiepro_global_panel',
		'priority'	=> 3,
	));
	$wp_customize->add_section( 'indiepro_custom_css' , array(
   		'title'      => __('Custom CSS', 'indiepro'),
   		'description'=> 'Add your custom CSS which will overwrite the theme CSS',
		'panel'		 => 'indiepro_global_panel',
   		'priority'   => 4,
	) );
	$wp_customize->add_section('indiepro_homepage_layout', array(
		'title'		=> __('Homepage Layout', 'indiepro'),
		'panel'		=> 'indiepro_homepage_panel',
		'priority'	=> 1,
	));
	$wp_customize->add_section( 'indiepro_homepage_hide_section' , array(
		'title'      => __('Hide Elements', 'indiepro'),
		'panel'		 => 'indiepro_homepage_panel',
		'priority'   => 2,
	) );
	$wp_customize->add_section( 'indiepro_featured_section' , array(
		'title'      => __('Featured Carousel', 'indiepro'),
		'panel'		 => 'indiepro_homepage_panel',
		'priority'   => 3,
	) );


	$priority = 2;
	$wp_customize->add_section( 'indiepro_logo_header' , array(
   		'title'      	=> __('Logo &amp; Header Settings', 'indiepro'),
		'panel'			=> 'indiepro_header_panel',
   		'priority'   	=> $priority++,
	) );
	
	$wp_customize->add_section( 'indiepro_social_section', array(
		'title'			=> __('Social Media Accounts', 'indiepro'),
		'panel'			=> 'indiepro_header_panel',
		'priority'		=> $priority++,
	));
	
	$wp_customize->add_section( 'indiepro_toggle_top_bar_section', array(
		'title'			=> __('Top Bar Settings', 'indiepro'),
		'panel'			=> 'indiepro_header_panel',
		'priority'		=> $priority++,
	));
	$wp_customize->add_section('indiepro_header_colors_section', array(
		'title'		=> __('Header Area Colors', 'indiepro'),
		'panel'		=> 'indiepro_header_panel',
		'priority'	=> $priority++,
	));
	
	$wp_customize->add_section( 'indiepro_post_settings_section', array(
		'title'			=> __('Single Post Settings', 'indiepro'),
		'panel'			=> 'indiepro_post_page_panel',
		'priority'		=> 2,
	));
	$wp_customize->add_section( 'indiepro_hide_show_page_section', array(
		'title'			=> __('Page Settings', 'indiepro'),
		'panel'			=> 'indiepro_post_page_panel',
		'priority'		=> 3,
	));	
	// Font Sections
	$arraycount = count($array_font_sections);
	for ($row = 0; $row <  $arraycount; $row++) {
		$wp_customize->add_section($array_font_sections[$row][0], array(
			'title'		=> $array_font_sections[$row][1],
			'panel'		=> 'indiepro_font_panel',
			'priority'	=> $priority++,
		));	
	}
	
	// Footer Sections
	$wp_customize->add_section( 'indiepro_footer_copyright', array(
		'title'			=> __('Copyright Settings', 'indiepro'),
		'panel'			=> 'indiepro_footer_panel',
		'priority'		=> 1,
	));	
	
    $wp_customize->add_section( 'indiepro_hide_footer_elements', array(
	 	'title'			=> __('Hide Footer Sections', 'indiepro'),
	 	'panel'			=> 'indiepro_footer_panel',   
    ));
    
    //widgets section
    $wp_customize->add_section( 'indiepro_footer_widgets', array(
        'title'         => __('Display Widget Settings', 'indiepro'),
        'panel'         => 'widgets',
    ));
    

	
	
// Add Setting
// ------------------------------------------------------------------------------------------
       
	//Title/tagline Uppercase
	$wp_customize->add_setting('indiepro_title_uppercase', array(
		'default'			=> true,
		'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
	));
	$wp_customize->add_setting('indiepro_tagline_uppercase', array(
		'default'			=> true,
		'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
	));
    $wp_customize->add_setting('hide_site_title', array(
		'default'		=> false,
		'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
	));
	$wp_customize->add_setting('hide_tagline', array(
		'default'		=> false,
		'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
	));

	$arraycount = count($array_main_content_color_controls);
	for ($row = 0; $row <  $arraycount; $row++) {
		
		// check what transport method is needed
		if($array_main_content_color_controls[$row][3] == true){
			$transportMethod = 'postMessage';
		}else{
			$transportMethod = 'refresh';
		}
		
		$wp_customize->add_setting(
			$array_main_content_color_controls[$row][0],
			array(
				'default'    		=> $array_main_content_color_controls[$row][2],
				'sanitize_callback'	=> 'indiepro_sanitize_color',
				'transport'			=> $transportMethod,
			)
		);	
	}
	
	$arraycount = count($array_header_color_controls);
	for ($row = 0; $row <  $arraycount; $row++) {
		
		// check what transport method is needed
		if($array_header_color_controls[$row][3] == true){
			$transportMethod = 'postMessage';
		}else{
			$transportMethod = 'refresh';
		}
		
		$wp_customize->add_setting(
			$array_header_color_controls[$row][0],
			array(
				'default'     		=> $array_header_color_controls[$row][2],
				'sanitize_callback'	=> 'indiepro_sanitize_color',
				'transport'			=> $transportMethod,
			)
		);	
	}
	
	
	$arraycount = count($array_footer_color_controls);
	for ($row = 0; $row <  $arraycount; $row++) {
				
		// check what transport method is needed
		if($array_footer_color_controls[$row][3] == true){
			$transportMethod = 'postMessage';
		}else{
			$transportMethod = 'refresh';
		}
		
		$wp_customize->add_setting(
			$array_footer_color_controls[$row][0],
			array(
				'default'     => $array_footer_color_controls[$row][2],
				'sanitize_callback'	=> 'indiepro_sanitize_color',
				'transport'			=> $transportMethod,
			)
		);	
	}
	$wp_customize->add_setting('global_color_scheme_override', array(
		'default' => false,
		'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
	));
	$wp_customize->add_setting('global_color_scheme', array(
		'default' => 'blue',
		'sanitize_callback'	=> 'indiepro_sanitize_text',
	));


	// Global Icons
	$wp_customize->add_setting('indiepro_global_favicon', array(
		'sanitize_callback'	=> 'indiepro_sanitize_upload',
	));
	$wp_customize->add_setting('indiepro_global_apple_icon', array(
		'sanitize_callback'	=> 'indiepro_sanitize_upload',
	));
	
	// Global Layout
	foreach($list_enable_sidebar as $key => $value){
		$wp_customize->add_setting( 'indiepro_global_sidebar_'.$key, array(
        	'default'     => false,
			'sanitize_callback'	=> 'indiepro_sanitize_checkbox',  
        ));
	}
	$wp_customize->add_setting('indiepro_global_css', array(
		'sanitize_callback'	=> 'indiepro_sanitize_textarea',
	));
	$wp_customize->add_setting('upload_site_background_image', array(
		'sanitize_callback'	=> 'indiepro_sanitize_upload',
	));
	$wp_customize->add_setting('upload_site_background_image_repeat', array(
		'default' 			=> 'repeat',
		'sanitize_callback'	=> 'indiepro_sanitize_text',
	));
	$wp_customize->add_setting('indiepro_sidebar_position', array(
		'default'	=> 'right',
		'sanitize_callback'	=> 'indiepro_sanitize_text',
	));

	
	// Featured Slider
	$wp_customize->add_setting(
        'indiepro_featured_slider',
        array(
            'default'     => false,
			'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
        )
    );
	$wp_customize->add_setting( 'indiepro_featured_cat', array(
		'sanitize_callback'	=> 'indiepro_sanitize_text',
	));
	$wp_customize->add_setting(
        'indiepro_featured_cat_hide',
        array(
            'default'     => false,
			'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
        )
    );
	$wp_customize->add_setting(
        'indiepro_featured_slider_slides',
        array(
            'default'     => '6',
			'sanitize_callback'	=> 'indiepro_sanitize_integer',
        )
    ); 
	
	// Homepage Hide Elements
	foreach($list_hide_homepage_elements as $key => $value){
		$wp_customize->add_setting(
			'indiepro_homepage_hide_'.$key, array(
				'default'	=> false,
				'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
			)
		);
	}
	// Homepage Sidebar
	$wp_customize->add_setting('indiepro_homepage_hide_sidebar', array(
		'default'		=> false,
		'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
	));
	// Homepage Columns
	$wp_customize->add_setting(
		'indiepro_homepage_column', array(
			'default'			=> 'one-col',
			'sanitize_callback'	=> 'indiepro_sanitize_text',
		)
	);
    $wp_customize->add_setting(
		'indiepro_grid_title', array(
			'default'			=> __('Latest Posts', 'indiepro'),
			'transport'			=> 'postMessage',
			'sanitize_callback'	=> 'indiepro_sanitize_text',
		)
	);
    $wp_customize->add_setting(
		'indiepro_grid_sub_title', array(
			'default'			=> __('Here is a list of latest posts', 'indiepro'),
			'transport'			=> 'postMessage',
			'sanitize_callback'	=> 'indiepro_sanitize_text',
		)
	);
    $wp_customize->add_setting(
		'indiepro_grid_show_title', array(
			'default'			=> false,
			'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
		)
	);
    
    

	// Background Image
	$wp_customize->add_setting('indiepro_background_header_repeat', array(
		'default' 			=> 'no-repeat',
		'sanitize_callback'	=> 'indiepro_sanitize_text',
		'transport'			=> 'postMessage',
	));
	
	// Header and logo
	$wp_customize->add_setting('indiepro_logo', array(
		'sanitize_callback'	=> 'indiepro_sanitize_upload',
	));
	$wp_customize->add_setting('indiepro_logo_retina', array(
		'sanitize_callback'		=> 'indiepro_sanitize_upload',
	));
	$wp_customize->add_setting(
        'indiepro_header_padding',
        array(
            'default'     => '40',
			'sanitize_callback'	=> 'indiepro_sanitize_integer',
        )
    );
	$wp_customize->add_setting(
        'indiepro_header_side_padding',
        array(
            'default'     => '20',
			'sanitize_callback'	=> 'indiepro_sanitize_integer',
        )
    );
	$wp_customize->add_setting(
        'indiepro_logo_position',
        array(
            'default'     => 'center',
			'sanitize_callback'	=> 'indiepro_sanitize_text',
        )
    );
	$wp_customize->add_setting('hide_header_border', array(
		'default'		=> false,
		'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
	));
    
	// Social Media Acocunts
	foreach ($list_social_channels as $key => $value) {
		$wp_customize->add_setting( $key, array(
			'sanitize_callback' => 'indiepro_sanitize_upload',
		));
	}
	
	// Top Bar sections
	$wp_customize->add_setting('indiepro_topbar_social_check', array(
            'default'     => false,
			'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
    ));
	$wp_customize->add_setting('indiepro_topbar_search_check', array(
            'default'     => false,
			'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
    ));
	$wp_customize->add_setting('indiepro_topbar_check',array(
            'default'     => false,
			'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
    ));
	
	// Font Settings
	$arraycount = count($array_font_sections);
	for ($row = 0; $row <  $arraycount; $row++) {
		$wp_customize->add_setting(
			$array_font_sections[$row][0],
			array(
				'default'     => $array_font_sections[$row][2],
				'sanitize_callback'	=> 'indiepro_sanitize_text',
			)
		);
		$wp_customize->add_setting(
			$array_font_sections[$row][0].'_weight',
			array(
				'default'     => $array_font_sections[$row][3],
				'sanitize_callback'	=> 'indiepro_sanitize_text',
			)
		);
		$wp_customize->add_setting(
			$array_font_sections[$row][0].'_size',
			array(
				'default'     => $array_font_sections[$row][4],
				'sanitize_callback'	=> 'indiepro_sanitize_text',
			)
		);	
		$wp_customize->add_setting(
			$array_font_sections[$row][0].'_display',
			array(
				'default'     => $array_font_sections[$row][5],
				'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
			)
		);			
	}
	
	// Footer Settings
	$wp_customize->add_setting('footer_copyright_strapline', array(
		'transport'			=> 'postMessage',
		'sanitize_callback'	=> 'indiepro_sanitize_text',
	));	
    $wp_customize->add_setting('indiepro_hide_footer_widget_area', array(
		'default'			=> false,
		'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
	));
	$wp_customize->add_setting('indiepro_hide_copyright_bar', array(
		'default'			=> false,
		'sanitize_callback'	=> 'indiepro_sanitize_checkbox',
	));
		
// Add Control
        
	//Title/tagline Uppercase

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'indiepro_title_uppercase',
			array(
				'label'      	=> __('Display Title in Uppercase', 'indiepro'),
				'section'    	=> 'title_tagline',
				'settings'   	=> 'indiepro_title_uppercase',
				'type'		 	=> 'checkbox',
                
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'indiepro_tagline_uppercase',
			array(
				'label'      	=> __('Display Tagline in Uppercase', 'indiepro'),
				'section'    	=> 'title_tagline',
				'settings'   	=> 'indiepro_tagline_uppercase',
				'type'		 	=> 'checkbox',
			)
		)
	);
    $wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'hide_site_title_control',
			array(
				'label'      => __('Hide Site Title', 'indiepro'),
				'section'    => 'title_tagline',
				'settings'   => 'hide_site_title',
				'type'		 => 'checkbox',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'hide_tagline_control',
			array(
				'label'      => __('Hide Tagline', 'indiepro'),
				'section'    => 'title_tagline',
				'settings'   => 'hide_tagline',
				'type'		 => 'checkbox',
			)
		)
	);
	


	//Color Controls	
	$priority = 0;
	
	$arraycount = count($array_main_content_color_controls);
	for ($row = 0; $row <  $arraycount; $row++) {
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$array_main_content_color_controls[$row][0],
				array(
					'label'      	=>  $array_main_content_color_controls[$row][1],
					'section'    	=> 'indiepro_main_colors_section',
					'settings'   	=> $array_main_content_color_controls[$row][0],
					'priority'		=> $priority++,
				)
			)
		);
	}
	
	$arraycount = count($array_header_color_controls);
	for ($row = 0; $row <  $arraycount; $row++) {
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$array_header_color_controls[$row][0],
				array(
					'label'      =>  $array_header_color_controls[$row][1],
					'section'    => 'indiepro_header_colors_section',
					'settings'   => $array_header_color_controls[$row][0],
					'priority'	 => $priority++,
				)
			)
		);
	}	
	$arraycount = count($array_footer_color_controls);
	for ($row = 0; $row <  $arraycount; $row++) {
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$array_footer_color_controls[$row][0],
				array(
					'label'      =>  $array_footer_color_controls[$row][1],
					'section'    => 'indiepro_footer_colors_section',
					'settings'   => $array_footer_color_controls[$row][0],
					'priority'	 => $priority++,
				)
			)
		);
	}
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'global_color_scheme_override_control',
			array(
				'label'      	=> __('Override custom colors with pre-defined color scheme below', 'indiepro'),
				'section'    	=> 'indiepro_global_colors_section',
				'settings'   	=> 'global_color_scheme_override',
				'priority'	 	=> $priority++,
				'type'		 	=> 'checkbox',
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'global_color_scheme_control',
			array(
				'label'          => __('Choose Color Scheme', 'indiepro'),
				'section'        => 'indiepro_global_colors_section',
				'settings'       => 'global_color_scheme',
				'type'           => 'radio',
				'priority'	 => $priority++,
				'choices'        => array(
					'blue'   		=> __('Beau Blue', 'indiepro'),
					'red'  			=> __('Firebrick Red', 'indiepro'),
					'orange'		=> __('Mango Tango', 'indiepro'),
					'green'			=> __('Celadon green', 'indiepro'),
				)
			)
		)
	);	
	
	//Post & Page Show/Hide Elements
	$priority =0;
/*
	foreach($list_post_elements as $key => $value){
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'indiepro_'.$key,
				array(
					'label'      	=> $value,
					'section'    	=> 'indiepro_post_settings_section',
					'settings'   	=> 'indiepro_hide_'.$key,
					'type'		 	=> 'checkbox',
					'priority'		=> $priority++,
				)
			)
		);
	}
	$priority = 0;
	foreach($list_hide_page_elements as $key => $value){
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'indiepro_'.$key.'_posts',
				array(
					'label'     	=> $value,
					'section'    	=> 'indiepro_hide_show_page_section',
					'settings'   	=> 'indiepro_hide_'.$key.'_page',
					'type'		 	=> 'checkbox',
					'priority'		=> $priority++,
				)
			)
		);
	}
*/
	
	
	// Global Icons
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'indiepro_global_favicon',
			array(
				'label'      => __('Upload Favicon', 'indiepro'),
				'section'    => 'indiepro_global_icons',
				'settings'   => 'indiepro_global_favicon',
				'priority'	 => 1
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'indiepro_global_apple_icon',
			array(
				'label'      => __('Upload Apple App Icon', 'indiepro'),
				'section'    => 'indiepro_global_icons',
				'settings'   => 'indiepro_global_apple_icon',
				'priority'	 => 1
			)
		)
	);
	
	// Global Layout
	$priority = 0;
	foreach($list_enable_sidebar as $key => $value){
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'indiepro_sidebar_'.$key,
				array(
					'label'      => $value,
					'section'    => 'indiepro_global_layout',
					'settings'   => 'indiepro_global_sidebar_'.$key,
					'type'		 => 'checkbox',
					'priority'	=> $priority++,
				)
			)
		);
	}
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'indiepro_sidebar_position',
			array(
				'label'          => __('Sidebar Position', 'indiepro'),
				'section'        => 'indiepro_global_layout',
				'settings'       => 'indiepro_sidebar_position',
				'type'           => 'radio',
				'priority'	 => $priority++,
				'choices'        => array(
					'left'   	=> __('Left Sidebar', 'indiepro'),
					'right'  	=> __('Right Sidebar', 'indiepro'),
				)
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upload_site_background_image',
			array(
				'label'      => __('Upload Background Image or Texture', 'indiepro'),
				'section'    => 'indiepro_global_layout',
				'settings'   => 'upload_site_background_image',
				'priority'	 => $priority++,
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'upload_site_background_image_repeat',
			array(
				'label'          => __('Background Repeat Image', 'indiepro'),
				'section'        => 'indiepro_global_layout',
				'settings'       => 'upload_site_background_image_repeat',
				'type'           => 'radio',
				'priority'	 => $priority++,
				'choices'        => array(
					'no-repeat'  	=> __('No Repeat', 'indiepro'),
					'repeat'		=> __('Tile', 'indiepro'),
					'repeat-x'   	=> __('Repeat Horizontally', 'indiepro'),
					'repeat-y'		=> __('Repeat Vertically', 'indiepro'),
				)
			)
		)
	);
	
	// Custom CSS
	$wp_customize->add_control(
		new Customize_CustomCss_Control(
			$wp_customize,
			'custom_css',
			array(
				'label'      => __('Custom CSS', 'indiepro'),
				'section'    => 'indiepro_custom_css',
				'settings'   => 'indiepro_global_css',
				'type'		 => 'custom_css',
				'priority'	 => 1
			)
		)
	);
		
	// Featured area
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'featured_slider',
			array(
				'label'      => __('Enable Featured Slider', 'indiepro'),
				'section'    => 'indiepro_featured_section',
				'settings'   => 'indiepro_featured_slider',
				'type'		 => 'checkbox',
				'priority'	 => 2
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Category_Control(
			$wp_customize,
			'featured_cat',
			array(
				'label'    => __('Select Featured Category', 'indiepro'),
				'section'  => 'indiepro_featured_section',
				'settings' => 'indiepro_featured_cat',
				'priority'	 => 3
			)
		)
	);	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'featured_cat_hide',
			array(
				'label'      => __('Hide Featured Category', 'indiepro'),
				'section'    => 'indiepro_featured_section',
				'settings'   => 'indiepro_featured_cat_hide',
				'type'		 => 'checkbox',
				'priority'	 => 4
			)
		)
	);
	$wp_customize->add_control(
		new Customize_Number_Control(
			$wp_customize,
			'featured_slider_slides',
			array(
				'label'      => __('Amount of Slides', 'indiepro'),
				'section'    => 'indiepro_featured_section',
				'settings'   => 'indiepro_featured_slider_slides',
				'type'		 => 'number',
				'priority'	 => 5
			)
		)
	);
	
	$priority = 0;
	// Homepage Sidebar
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'indiepro_homepage_hide_sidebar',
			array(
				'label'      => __('Show Sidebar on homepage', 'indiepro'),
				'section'    => 'indiepro_homepage_layout',
				'settings'   => 'indiepro_homepage_hide_sidebar',
				'type'		 => 'checkbox',
				'priority'	 => $priority++,
			)
		)
	);	
	// Homepage Hide Elements
	foreach($list_hide_homepage_elements as $key => $value){
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'homepage_hide_'.$key,
				array(
					'label'      => $value,
					'section'    => 'indiepro_homepage_hide_section',
					'settings'   => 'indiepro_homepage_hide_'.$key,
					'type'		 => 'checkbox',
					'priority'	 => $priority++,
				)
			)
		);
	}

    // Homepage Column Number
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'indiepro_homepage_column_number',
			array(
				'label'          => __('Number of columns', 'indiepro'),
				'section'        => 'indiepro_homepage_layout',
				'settings'       => 'indiepro_homepage_column',
				'type'           => 'radio',
				'priority'	 => $priority++,
				'choices'        => array(
                    'one-col'       => __('One Column', 'indiepro'),
					'two-col'  		=> __('Two Column', 'indiepro'),
					'three-col'		=> __('Three Column', 'indiepro'),
					'four-col'		=> __('Four Column', 'indiepro'),
				)
			)
		)
	);
    //Homepage Grid Title
    $wp_customize->add_control( 'indiepro_grid_title', array(
		'label'    	=> __( 'Homepage Title', 'indiepro' ),
		'settings'	=> 'indiepro_grid_title',
		'section'  	=> 'indiepro_homepage_layout',
        'priority'	 => $priority++,
	));	
    $wp_customize->add_control( 'indiepro_grid_sub_title', array(
		'label'    	=> __( 'Sub Title', 'indiepro' ),
		'settings'	=> 'indiepro_grid_sub_title',
		'section'  	=> 'indiepro_homepage_layout',
        'priority'	 => $priority++,
	));	
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'indiepro_grid_show_title',
            array(
                'label'      => __('Show Homepage Titles', 'indiepro'),
                'section'    => 'indiepro_homepage_layout',
                'settings'   => 'indiepro_grid_show_title',
                'type'		 => 'checkbox',
                'priority'	 => $priority++,
            )
        )
    );	
	
	// Background Image
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'indiepro_background_header_repeat',
			array(
				'label'          => __('Background Repeat Image', 'indiepro'),
				'section'        => 'header_image',
				'settings'       => 'indiepro_background_header_repeat',
				'type'           => 'radio',
				'priority'	 => 12,
				'choices'        => array(
					'no-repeat'  	=> __('No Repeat', 'indiepro'),
					'repeat'		=> __('Tile', 'indiepro'),
					'repeat-x'   	=> __('Repeat Horizontally', 'indiepro'),
					'repeat-y'		=> __('Repeat Vertically', 'indiepro'),
				)
			)
		)
	);

	// Header and Logo
	$priority = 0;
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upload_logo',
			array(
				'label'      => __('Upload Logo', 'indiepro'),
				'section'    => 'indiepro_logo_header',
				'settings'   => 'indiepro_logo',
				'priority'	 => $priority++,
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'upload_logo_retina',
			array(
				'label'      => __('Upload Logo (Retina Version)', 'indiepro'),
				'section'    => 'indiepro_logo_header',
				'settings'   => 'indiepro_logo_retina',
				'priority'	 => $priority++,
			)
		)
	);
	
	$wp_customize->add_control(
		new Customize_Number_Control(
			$wp_customize,
			'header_padding',
			array(
				'label'      => __('Top & Bottom Logo Padding', 'indiepro'),
				'section'    => 'indiepro_logo_header',
				'settings'   => 'indiepro_header_padding',
				'type'		 => 'number',
				'priority'	 => $priority++,
			)
		)
	);
	
	$wp_customize->add_control(
		new Customize_Number_Control(
			$wp_customize,
			'header_side_padding',
			array(
				'label'      => __('Left & Right Logo Padding', 'indiepro'),
				'section'    => 'indiepro_logo_header',
				'settings'   => 'indiepro_header_side_padding',
				'type'		 => 'number',
				'priority'	 => $priority++,
			)
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'home_layout',
			array(
				'label'          => __('Logo Position', 'indiepro'),
				'section'        => 'indiepro_logo_header',
				'settings'       => 'indiepro_logo_position',
				'type'           => 'radio',
				'priority'	 => $priority++,
				'choices'        => array(
					'left'   	=> __('Left', 'indiepro'),
					'center'  	=> __('Center', 'indiepro'),
					'right'		=> __('Right', 'indiepro'),
				)
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'hide_header_border_control',
			array(
				'label'      => __('Hide Header Bottom Border', 'indiepro'),
				'section'    => 'indiepro_logo_header',
				'settings'   => 'hide_header_border',
				'type'		 => 'checkbox',
				'priority'	 => $priority++,
			)
		)
	);	
    
	// Social Media Acocunts
	foreach ($list_social_channels as $key => $value) {
		$wp_customize->add_control( $key, array(
			'label'   => $value,
			'section' => 'indiepro_social_section',
			'type'    => 'url',
		) );
	}
	
	// Top Bar sections
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'topbar_social_check',
			array(
				'label'      => __('Disable Top Bar Social Icons', 'indiepro'),
				'section'    => 'indiepro_toggle_top_bar_section',
				'settings'   => 'indiepro_topbar_social_check',
				'type'		 => 'checkbox',
				'priority'	 => 3
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'topbar_search_check',
			array(
				'label'      => __('Disable Top Bar Search', 'indiepro'),
				'section'    => 'indiepro_toggle_top_bar_section',
				'settings'   => 'indiepro_topbar_search_check',
				'type'		 => 'checkbox',
				'priority'	 => 4
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'topbar_check',
			array(
				'label'      => __('Disable Top Bar', 'indiepro'),
				'section'    => 'indiepro_toggle_top_bar_section',
				'settings'   => 'indiepro_topbar_check',
				'type'		 => 'checkbox',
				'priority'	 => 5
			)
		)
	);
	
	// Font Controls
	$arraycount = count($array_font_sections);
	for ($row = 0; $row <  $arraycount; $row++) {
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				$array_font_sections[$row][0].'_display',
				array(
					'label'      	=> __('Enable these settings', 'indiepro'),
					'section'    	=> $array_font_sections[$row][0],
					'settings'   	=> $array_font_sections[$row][0].'_display',
					'type'		 	=> 'checkbox',
					'priority'		=> $priority++,
				)
			)
		);
		$wp_customize->add_control( $array_font_sections[$row][0], array(
			'type'     => 'select',
			'label'    => __( 'Font Family', 'indiepro' ),
			'section'  => $array_font_sections[$row][0],
			'priority' =>$priority++,
			'choices'  => $list_fonts
		));
		$wp_customize->add_control( $array_font_sections[$row][0].'_weight', array(
			'type'     => 'select',
			'label'    => __( 'Font Weight', 'indiepro' ),
			'section'  => $array_font_sections[$row][0],
			'priority' =>$priority++,
			'choices'  => $list_all_font_weights
		));
		$wp_customize->add_control( $array_font_sections[$row][0].'_size', array(
			'type'     => 'select',
			'label'    => __( 'Font Size', 'indiepro' ),
			'section'  => $array_font_sections[$row][0],
			'priority' => $priority++,
			'choices'  => $list_font_sizes
		));
		
	}
	
	// Footer Controls
	$wp_customize->add_control( 'footer_copyright_strapline', array(
		'label'    	=> __( 'Copyright Strapline', 'indiepro' ),
		'settings'	=> 'footer_copyright_strapline',
		'section'  	=> 'indiepro_footer_copyright',
	));	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'indiepro_hide_footer_widget_area',
			array(
				'label'      	=> __('Hide Footer Widget Area', 'indiepro'),
				'section'    	=> 'indiepro_hide_footer_elements',
				'settings'   	=> 'indiepro_hide_footer_widget_area',
				'type'		 	=> 'checkbox',
                
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'indiepro_hide_copyright_bar',
			array(
				'label'      	=> __('Hide Copyright Bar', 'indiepro'),
				'section'    	=> 'indiepro_hide_footer_elements',
				'settings'   	=> 'indiepro_hide_copyright_bar',
				'type'		 	=> 'checkbox',
                
			)
		)
	);
    
    
		
	// Remove Sections
	
	$wp_customize->get_section( 'title_tagline' )->panel = 'indiepro_header_panel';
	$wp_customize->get_section( 'title_tagline' )->priority = 1;
	$wp_customize->get_section( 'header_image' )->panel = 'indiepro_header_panel';
	$wp_customize->get_section( 'header_image' )->priority = 3;
	$wp_customize->get_section( 'header_image' )->title = __('Background Image', 'indiepro');
    $wp_customize->get_control( 'blogname' )->priority = 1;
	$wp_customize->remove_control( 'display_header_text' );
	$wp_customize->remove_control('font_site_nav_weight');
	$wp_customize->remove_control('font_site_nav_size');
	$wp_customize->remove_control('font_headers_size');
	$wp_customize->remove_control('font_body_weight');
	$wp_customize->remove_control('font_body_size');
	$wp_customize->remove_section( 'nav');
	$wp_customize->remove_section( 'static_front_page');
	$wp_customize->remove_section( 'colors');
	
	// Change defaults for live preview
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
}
add_action( 'customize_register', 'indiepro_register_theme_customizer' );


// SANITIZATION
// ==============================

// Sanitize Text
function indiepro_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
// Sanitize Textarea
function indiepro_sanitize_textarea($input) {
	global $allowedposttags;
	$output = wp_kses( $input, $allowedposttags);
	return $output;
}
// Sanitize Checkbox
function indiepro_sanitize_checkbox( $input ) {
	if( $input ):
		$output = '1';
	else:
		$output = false;
	endif;
	return $output;
}
// Sanitize Numbers
function indiepro_sanitize_integer( $input ) {
	$value = (int) $input; // Force the value into integer type.
    return ( 0 < $input ) ? $input : null;
}
function indiepro_sanitize_float( $input ) {
	return floatval( $input );
}

// Sanitize Uploads
function indiepro_sanitize_upload($input){
	return esc_url_raw($input);	
}

// Sanitize Colors
function indiepro_sanitize_color($input){
	return maybe_hash_hex_color($input);
}