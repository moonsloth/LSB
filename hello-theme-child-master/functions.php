<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */

 // Post Gravity form #1 (Apply Online) to Gragg
add_action( 'gform_after_submission_1', 'post_to_third_party', 10, 2 );
function post_to_third_party( $entry, $form ) {

    $endpoint_url = 'http://services.graggadv.com/lead-gateway/';
    $body = array(
        'glue_id' => rgar( $entry, '22' ),
        'campus' => rgar( $entry, '5' ),
        'message' => rgar( $entry, '20' ),
		'program' => rgar( $entry, '6' ),
		'gradyear' => rgar( $entry, '12' ),
		'zip' => rgar( $entry, '8.5' ),
		'state' => rgar( $entry, '8.4' ),
		'city' => rgar( $entry, '8.3' ),
		'address2' => rgar( $entry, '8.2' ),
		'address1' => rgar( $entry, '8.1' ),
		'phone_day' => rgar( $entry, '3' ),
		'email' => rgar( $entry, '2' ),
		'lname' => rgar( $entry, '23' ),
		'fname' => rgar( $entry, '24' ),
		'text_opt' => rgar( $entry, '4' ),
		'text_opt' => rgar( $entry, '4' ),
        );

	// Debug Log post
    GFCommon::log_debug( 'gform_after_submission: body => ' . print_r( $body, true ) );

	// Performs an HTTP request using the POST method and returns its response.
    $response = wp_remote_post( $endpoint_url, array( 'body' => $body ) );

	// Debug Log post response
    GFCommon::log_debug( 'gform_after_submission: response => ' . print_r( $response, true ) );
}

function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );
add_action('wp_head','chat_script');

function chat_script()



{ // break out of php ?>

<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('a08318c2', e); });
</script>


<script type="text/javascript">
(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
'https://jimbray.ladesk.com/scripts/track.js',
function(e){ LiveAgent.createButton('709421fe', e); });
</script>

<?php } // break back into php