<?php
/**
* Plugin Name: SaLS
* Plugin URI: https://github.com/forhad-h/sals-wp-plugin
* Description: SaLS (Static as Live Streaming) is a wordpress plugin for play static video like live video streaming with 'video Ads'
* Version: 1.0.0
* Author: Forhad Hosain
**/


require_once ("create_table.php");
register_activation_hook( __FILE__, 'sals_db_install' );

if ( is_admin() ){
  add_action( 'admin_menu', 'sals_menu' );
  add_action( 'admin_init', 'register_mysettings' );
} else {
  // non-admin enqueues, actions, and filters
}

function sals_menu() {
	add_menu_page( 'Mange Static Videos', 'SaLS', 'publish_posts', 'manage-static-videos', 'sals_static_video_options', 'dashicons-format-video', 61);
}

/*display options field*/
function sals_static_video_options() {
?>


<div class="wrap">
    <h1>Custom theme options</h1>

    <form method="post" action="options.php">
        <div class="fields_wrapper">
            <h3>Header part</h3>

            <div class="single_option">
                <h4>Header CTA button text</h4>
                <input type="text" name="new_option_name" value="" />
            </div>
        </div>

        <button type="submit">Add Video</button>

    </form>
</div>

<?php } ?>
