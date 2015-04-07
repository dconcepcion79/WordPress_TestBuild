<?php
/**
 * neighborly Theme Customizer
 *
 * @package neighborly
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function neighborly_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	// Add Neighborly Copyright Section
	$wp_customize->add_section( 'neighborly_copyright_section' , array(
    'title' => __( 'Neighborly Copyright Options', 'neighborly' ),
    'priority' => 201,
    'description' => __( 'The copyright info in the footer is shown as <strong>Copyright &copy; [start date] - [current year] [copyright owner]</strong>. You can change the start date and copyright owner here.', 'neighborly' ),
	) );
	//Add Neighborly Copyright Settings
	$wp_customize->add_setting( 'neighborly_first_date_setting', array( 
	'default' => '',
	'sanitize_callback' => 'neighborly_sanitize_text', 
	));
	$wp_customize->add_setting( 'neighborly_copyright_owner_setting', array( 
	'default' => '',
	'sanitize_callback' => 'neighborly_sanitize_text', 
	));
	// Add Copyright Controls
	// Add First Date Control
	$wp_customize->add_control( 'neighborly_first_date', array(
    'label'      => __( 'First Date', 'neighborly' ),
    'section'    => 'neighborly_copyright_section',
    'settings'   => 'neighborly_first_date_setting',
    'type'       => 'text',
	) );
	// Add Copyright Owner Control
	$wp_customize->add_control( 'neighborly_copyright_owner', array(
    'label'      => __( 'Copyright Owner', 'neighborly' ),
    'section'    => 'neighborly_copyright_section',
    'settings'   => 'neighborly_copyright_owner_setting',
    'type'       => 'text',
	) );
}
add_action( 'customize_register', 'neighborly_customize_register' );
// Sanitize input
function neighborly_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function neighborly_sanitize_radio( $input ) {
    $valid = array(
        'yes' => 'Yes',
        'no' => 'No',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
function neighborly_sanitize_select( $input ) {
    $valid = array(
        '0' => 'None',
        '1' => 'One',
		'2' => 'Two',
		'3' => 'Three',
		'4' => 'Four',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
function neighborly_sanitize_top_menu( $input ) {
    $valid = array(
        'standard' => 'Standard Menu',
        'social' => 'Social Nav',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
function neighborly_sanitize_primary_menu( $input ) {
    $valid = array(
        'drop' => 'Drop Down Menu',
        'flat' => 'Flat Menu',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
function neighborly_sanitize_url( $input ) {
    return esc_url( $input );
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function neighborly_customize_preview_js() {
	wp_enqueue_script( 'neighborly_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'neighborly_customize_preview_js' );