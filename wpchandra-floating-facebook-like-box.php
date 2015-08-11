<?php  
/*
Plugin Name: Floating Facebook Like Box 
Plugin URI: http://www.wpchandra.com/
Description: Floating Facebook like box for wordpress is plugin that allow you to customize facebook like box with animation easily.
Version: 1.1 
Author: Chandrakesh Kumar 
Author URI: http://www.wpchandra.com/
License: GPL2    
*/ 

function wpchandra_floating_facebook_like_box_admin_menu() { 
	add_menu_page('WPChandra Facebook Like Box Settings', 'WP FB Like Box', 'administrator', __FILE__, 'wpchandra_floating_facebook_like_box_settings',plugins_url('/images/facebook.png', __FILE__));
	add_action( 'admin_init', 'wpchandra_facebook_like_box_register_settings' );
}

function wpchandra_facebook_like_box_register_settings() { //register settings
	register_setting( 'wpchandra-floating-fb-like-box-settings-main', 'wp_facebook_like_box_title');
	register_setting( 'wpchandra-floating-fb-like-box-settings-main', 'wp_facebook_like_box_appid' );
	register_setting( 'wpchandra-floating-fb-like-box-settings-main', 'wp_facebook_like_box_border_color' );
	register_setting( 'wpchandra-floating-fb-like-box-settings-main', 'wp_facebook_like_box_settings_show' );
	register_setting( 'wpchandra-floating-fb-like-box-settings-main', 'wp_facebook_like_box_position' );
	register_setting( 'wpchandra-floating-fb-like-box-settings-main', 'wp_facebook_like_box_margin_top' );
	register_setting( 'wpchandra-floating-fb-like-box-settings-device', 'wp_facebook_like_box_settings_mobile' );	
}

function wpchandra_floating_facebook_like_box_activate() { //add default setting values on activation
	add_option( 'wp_facebook_like_box_title', 'FacebookDevelopers', '', 'yes' );
	add_option( 'wp_facebook_like_box_appid', '', '', '' );
	add_option( 'wp_facebook_like_box_border_color', '#5478b0', '', 'yes' );
	add_option( 'wp_facebook_like_box_settings_show', 'show', '', 'yes' );
	add_option( 'wp_facebook_like_box_position', 'left', '', 'yes' );
	add_option( 'wp_facebook_like_box_settings_mobile', 'show', '', 'show' );
	add_option( 'wp_facebook_like_box_margin_top', '30%', '', 'yes' );
}

function wpchandra_floating_facebook_like_box_deactivate() { //delete setting and values on deactivation
	delete_option( 'wp_facebook_like_box_title');
	delete_option( 'wp_facebook_like_box_settings_show' );
	delete_option( 'wp_facebook_like_box_settings_mobile');
	delete_option( 'wp_facebook_like_box_appid');
	delete_option( 'wp_facebook_like_box_position' );
	delete_option( 'wp_facebook_like_box_margin_top' );
	delete_option( 'wp_facebook_like_box_border_color' );
}

function wpchandra_floating_facebook_like_box_settings() { //facebook like box settings page
?>

<div class="wrap">
	<h2>WPChandra Floating Facebook Like Box Settings</h2>

	<?php $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'main'; ?>

	<h2 class="nav-tab-wrapper"><a href="?page=wpchandra-floating-facebook-like-box/wpchandra-floating-facebook-like-box.php&tab=main" class="nav-tab <?php echo $active_tab == 'main' ? 'nav-tab-active' : ''; ?>">Main Settings</a><a href="?page=wpchandra-floating-facebook-like-box/wpchandra-floating-facebook-like-box.php&tab=device" class="nav-tab <?php echo $active_tab == 'device' ? 'nav-tab-active' : ''; ?>">Device Settings</a><a href="?page=wpchandra-floating-facebook-like-box/wpchandra-floating-facebook-like-box.php&tab=other" class="nav-tab <?php echo $active_tab == 'other' ? 'nav-tab-active' : ''; ?>">Get Premium Version</a></h2>

	<form method="post" action="options.php">
		<?php settings_errors(); ?>
		<?php if( $active_tab == 'main' ) {
		?>

		<?php settings_fields('wpchandra-floating-fb-like-box-settings-main'); ?>
		<?php do_settings_sections('wpchandra-floating-fb-like-box-settings-main'); ?>

		<h3>Main Settings</h3>
		<table class="form-table">
		<tr valign="top">
		<th scope="row">Show</th>
		<td><fieldset><label title="Show"><input type="radio" name="wp_facebook_like_box_settings_show" value="show" <?php
		if ('show' == get_option('wp_facebook_like_box_settings_show'))
			echo 'checked="checked"';
		?>>Show</label><br /><label title="Hide"><input type="radio" name="wp_facebook_like_box_settings_show" value="hide" <?php
		if ('hide' == get_option('wp_facebook_like_box_settings_show'))
			echo 'checked="checked"';
		?>>Hide</label><br /></fieldset></td>
		</tr>
		<tr valign="top">
		<th scope="row">Facebook Page Title</th>
		<td>http://facebook.com/<input type="text" name="wp_facebook_like_box_title" value="<?php echo get_option('wp_facebook_like_box_title'); ?>" />/</td></tr>
		<tr valign="top">
		<th scope="row">Appid</th>
		<td><input type="text" name="wp_facebook_like_box_appid" value="<?php echo get_option('wp_facebook_like_box_appid'); ?>" /></td>
		</tr>
		<tr valign="top">
		<th scope="row">Border Color</th>
		<td><input type="text" name="wp_facebook_like_box_border_color" value="<?php echo get_option('wp_facebook_like_box_border_color'); ?>" /></td>
		</tr>
		<tr valign="top">
		<th scope="row">Box Position</th>
		<td><select name="wp_facebook_like_box_position"><option value="left" <?php
		if ('left' == get_option('wp_facebook_like_box_position'))
			echo 'selected';
		?>>Left</option><option value="right" <?php
		if ('right' == get_option('wp_facebook_like_box_position'))
			echo 'selected';
		?>>Right</option></select></td>
		</tr>
		<tr valign="top">
		<th scope="row">Margin Top</th>
		<td><input type="text" name="wp_facebook_like_box_margin_top" style="width: 90px;" value="<?php echo get_option('wp_facebook_like_box_margin_top'); ?>" /> px or %</td>
		</tr>

		</table>

		<?php } else if( $active_tab == 'device' ) { ?>

		<?php settings_fields('wpchandra-floating-fb-like-box-settings-device'); ?>
		<?php do_settings_sections('wpchandra-floating-fb-like-box-settings-device'); ?>

		<h3>Device Settings</h3>
		<table class="form-table">
			<tr valign="top">
				<th scope="row">On mobile</th>
				<td>
				<fieldset>
					<label title="Show">
						<input type="radio" name="wp_facebook_like_box_settings_mobile" value="show" <?php
						if ('show' == get_option('wp_facebook_like_box_settings_mobile'))
							echo 'checked="checked"';
						?>>
						Show</label>
					<br />
					<label title="Hide">
						<input type="radio" name="wp_facebook_like_box_settings_mobile" value="hide" <?php
						if ('hide' == get_option('wp_facebook_like_box_settings_mobile'))
							echo 'checked="checked"';
						?>>
						Hide</label>
					<br />
				</fieldset></td>
			</tr>
		</table>
		<?php } else if( $active_tab == 'other' ) { ?>

		<h3>Get Premium Version</h3>
		<p>
			Comming soon...
			<br />
			More Inforrmation visit now <a href="http://wwww.wpchandra.com/wp-plugins" target="_blank">WPChandra.com</a>
		</p>

		<?php } ?>

		<?php
		if ($active_tab !== 'other') { submit_button();
		}
		?>
	</form>
</div>

<?php

if (!current_user_can('manage_options')) {
	wp_die(__('You do not have permissions to access this page.'));
}

}

function wpchandra_floating_facebook_like_box_scripts() {
wp_enqueue_script('jquery');
wp_register_script( 'script', plugins_url('js/scripts.js', __FILE__) );
wp_enqueue_script( 'script', array('jquery') );
wp_enqueue_script( 'wp-color-picker' );
}

function wpchandra_floating_facebook_like_box_script(){
if(get_option("wp_facebook_like_box_position")=="left"){
?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		jQuery("#wpchandra_floating_fb_like_box").hover(function() {
			jQuery("#wpchandra_floating_fb_like_box").stop().animate({
				left : '0px'
			}, "slow");
		}, function() {
			jQuery("#wpchandra_floating_fb_like_box").stop().animate({
				left : '-315px'
			}, "slow");
		});
	}); 
</script>

<?php
}else{
?>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		jQuery("#wpchandra_floating_fb_like_box").hover(function() {
			jQuery("#wpchandra_floating_fb_like_box").stop().animate({
				right : '0px'
			}, "slow");
		}, function() {
			jQuery("#wpchandra_floating_fb_like_box").stop().animate({
				right : '-315px'
			}, "slow");
		});
	}); 
</script>

<?php
}
}

function wpchandra_floating_facebook_like_box_styles() {
if(get_option("wp_facebook_like_box_position")=="left"){
?>
<style>
#wpchandra_floating_fb_like_box{
position: fixed;
left: -315px;
top: <?php echo get_option("wp_facebook_like_box_margin_top"); ?>;
background: #FFF;
border: 4px solid <?php echo get_option("wp_facebook_like_box_border_color"); ?>;
  z-index: 99999;
}
#wpchandra_floating_fb_like_box .fb_animate_btn{
position: absolute;
right: -121px; color: #FFF;
display: block;
cursor:pointer;
z-index: 99999;
transform: rotate(90deg);
-webkit-transform: rotate(90deg);
-moz-transform: rotate(90deg);
-o-transform: rotate(90deg);
filter: progid:DXImageTransform.Microsoft.Basic;
top: 44%%;
background: #FFF url('<?php echo plugins_url('images/fb.png', __FILE__); ?>
	') no-repeat;
	width: 164px;
	height: 55px;
	background-size: 163px;
	right: -134px;
	border-radius: 4px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border: 2px solid #013E9D;
	}
</style>
<?php } else{ ?>

<style>
#wpchandra_floating_fb_like_box{
position: fixed;
right: -315px;
top: <?php echo get_option("wp_facebook_like_box_margin_top"); ?>;
background: #FFF;
border: 4px solid <?php echo get_option("wp_facebook_like_box_border_color"); ?>;
  z-index: 99999;
}
#wpchandra_floating_fb_like_box .fb_animate_btn{
position: absolute;
left: -121px; color: #FFF;
display: block;
  z-index: 99999;
  cursor:pointer;
transform: rotate(-90deg);
-webkit-transform: rotate(-90deg);
-moz-transform: rotate(-90deg);
-o-transform: rotate(-90deg);
filter: progid:DXImageTransform.Microsoft.Basic;
top: 44%%;
background: #FFF url('<?php echo plugins_url('images/fb.png', __FILE__); ?>') no-repeat;width: 164px;height: 55px;background-size: 163px;right: -134px;border-radius: 4px;-webkit-border-radius: 4px;-moz-border-radius: 4px;border: 2px solid #013E9D;
	}
</style>

<?php } ?>

<?php
}

function facebook_like_box_show() { // Facebook like box show

if (get_option('wp_facebook_like_box_settings_show') == 'show') {
if (get_option('wp_facebook_like_box_appid') !=NULL) {
if ( !wp_is_mobile() ) {
?>
<div id="wpchandra_floating_fb_like_box">
	<div class="fb_animate_btn"></div>
	<div class="wp_fb_like_box">
		<iframe name="f1c056eb38" frameborder="0" allowtransparency="true" scrolling="no" title="fb:like_box Facebook Social Plugin" src="http://www.facebook.com/v2.0/plugins/like_box.php?app_id=<?php echo get_option('wp_facebook_like_box_appid'); ?>&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F6Dg4oLkBbYq.js%3Fversion%3D41%23cb%3Df2a5f9b40%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A7777%252Ff17aa3346c%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=250&amp;header=false&amp;href=https://www.facebook.com/<?php echo get_option('wp_facebook_like_box_title'); ?>&amp;locale=en_US&amp;sdk=joey&amp;show_border=false&amp;show_faces=true&amp;stream=false" style="border: none; visibility: visible; width: 300px; height:270px" class=""></iframe>
	</div>
</div>

<?php } elseif ( wp_is_mobile() ) {
	if (get_option('wp_facebook_like_box_settings_mobile') == 'show') {
?>
<div id="wpchandra_floating_fb_like_box">
	<div class="fb_animate_btn"></div>
	<div class="wp_fb_like_box">
		<iframe name="f1c056eb38" frameborder="0" allowtransparency="true" scrolling="no" title="fb:like_box Facebook Social Plugin" src="http://www.facebook.com/v2.0/plugins/like_box.php?app_id=<?php echo get_option('wp_facebook_like_box_appid'); ?>&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F6Dg4oLkBbYq.js%3Fversion%3D41%23cb%3Df2a5f9b40%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A7777%252Ff17aa3346c%26relation%3Dparent.parent&amp;color_scheme=light&amp;container_width=250&amp;header=false&amp;href=https://www.facebook.com/<?php echo get_option('wp_facebook_like_box_title'); ?>&amp;locale=en_US&amp;sdk=joey&amp;show_border=false&amp;show_faces=true&amp;stream=false" style="border: none; visibility: visible; width: 300px; height:270px" class=""></iframe>
	</div>
</div>

<?php
}
} }else{ echo "<script> alert('facebook appid is required!'); </script>"; } }

}
register_activation_hook( __FILE__, 'wpchandra_floating_facebook_like_box_activate' ); //register activation hook
register_deactivation_hook( __FILE__, 'wpchandra_floating_facebook_like_box_deactivate' ); //register deactivation hook
add_action('admin_menu', 'wpchandra_floating_facebook_like_box_admin_menu'); //add facebook like box admin menu
add_action('wp_enqueue_scripts', 'wpchandra_floating_facebook_like_box_scripts'); //add facebook like box scripts
add_action('wp_head', 'wpchandra_floating_facebook_like_box_styles'); //add facebook like box styles to head
add_action('wp_head', 'wpchandra_floating_facebook_like_box_script'); //add facebook like box styles to head
add_action( 'get_footer', 'facebook_like_box_show'); //add facebook like box to footer
?>