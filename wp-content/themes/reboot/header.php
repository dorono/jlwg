<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

  <head>

  	<title>
  		<?php
		/*
		 Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
		wp_title( '-', true, 'right' );
		// Add the blog name.
		//bloginfo( 'name' );
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' - ' . sprintf( __('Page %s', 'reboot'), max( $paged, $page ) );
		?>
	</title>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- Favicons and touch icons (for use on Apple devices) -->
    <link rel="shortcut icon" href="<?php global $data; echo $data['custom_favicon']; ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php get_template_directory_uri(); ?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php get_template_directory_uri(); ?>/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php get_template_directory_uri(); ?>/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php get_template_directory_uri(); ?>/ico/apple-touch-icon-57-precomposed.png">

	<link rel="image_src" type="image/jpeg" href="<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full', false, ''); echo $src[0]; ?>
"/>
    <?php wp_head(); ?>

<?php if(is_page(374)) { ?>
<script>
// Disable GA tracking for any visits to Thank You page after the first visit
var gaProperty = 'UA-8542965-10';

// Disable tracking if the opt-out cookie exists.
var disableStr = 'ga-disable-' + gaProperty;
if (document.cookie.indexOf(disableStr + '=true') > -1) {
    window[disableStr] = true;
    console.log('tracking is disabled');
} else { // if it doesn't exist, create the cookie
    document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
}
</script>
<? } ?>


<!-- start GA tracking code for non-logged-in users -->
<?php if (!is_user_logged_in()) { ?>
	<script type="text/javascript">
		var gaJsHost=(("https:"==document.location.protocol)?"https://ssl.":"http://www.");
		document.write(unescape("%3Cscript src='"+gaJsHost+
		  "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
	<script type="text/javascript">
		var ejGATracker = _gat._getTracker("UA-8542965-10");
		ejGATracker._setDomainName("none");
		ejGATracker._setAllowLinker(true);
		ejGATracker._trackPageview();
    </script>
<?php } ?>
<!-- end GA tracking code -->

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '909075279152522');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=909075279152522&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<script type="text/javascript">
jQuery( document ).ready(function() {
	jQuery(".sample").appendTo(".audio_master_class_interviews");
	jQuery(".sample").show();
	jQuery(".sample p:first,.sample p:last").remove();
});



</script>

<!-- Start Visual Website Optimizer Asynchronous Code -->
<script type='text/javascript'>
var _vwo_code=(function(){
var account_id=47309,
settings_tolerance=2000,
library_tolerance=2500,
use_existing_jquery=false,
// DO NOT EDIT BELOW THIS LINE
f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
</script>
<!-- End Visual Website Optimizer Asynchronous Code -->

  </head>

  <body <?php body_class(); ?> >

	<div class="container">

       	<header class="header row">

            <div class="header-wrap span12">

                <div class="row">

                	<div id="logo" class="span12">
                    <?php if ($data["text_logo"]) { ?>
                      <h1 id="logo-default"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">JAZZ LESSONS <span>WITH GIANTS</span><?php //bloginfo('name'); ?></a></h1>
                    <?php } elseif ($data["custom_logo"]) { ?>
                      <h1 id="logo"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo $data['custom_logo']; ?>" /></a></h1>
                    <?php } ?>
                      <p id="strapline"><?php bloginfo('description'); ?></p>
                    </div><!-- end #logo -->

                </div><!-- end .row -->

            </div><!-- end .header-wrap -->

        </header><!-- end .header -->

        <hr class="double" />
