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
		bloginfo( 'name' );
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

    <?php wp_head(); ?>
  
  </head>
  
  <body <?php body_class(); ?> >
  
  	<div id="nav-wrapper">
  	
  		<div class="container">
  	
	  		<div class="row">
		  		
		  		<nav id="header-nav" role="navigation" class="span12">
		  			
		  			<?php
		  			    $header_menu_args = array(
		  			        'menu' => 'Header',
		  			        'theme_location' => 'Header',
		  			        'container_class' => 'nav-menu'
		  			    );
		  			    
		  			    $dropdown_menu_args = array (
		  			    
		  			    	'menu' => 'Header',
		  			    	'theme_location' => 'Header',
		  			    
		  			    // You can alter the blanking text eg. "- Menu Name -" using the following
		  			        'dropdown_title' => 'Navigate to...',
		  			    
		  			        // indent_string is a string that gets output before the title of a
		  			        // sub-menu item. It is repeated twice for sub-sub-menu items and so on
		  			        'indent_string' => '- ',
		  			    
		  			        // indent_after is an optional string to output after the indent_string
		  			        // if the item is a sub-menu item
		  			        'indent_after' => ''
		  			    );
		  			
		  			    wp_nav_menu( $header_menu_args );
		  			
		  			    dropdown_menu( $dropdown_menu_args );
		  			?>
		  			
			  		<div id="social-icons-small">
			  			<ul>
			  			<?php global $data; if($data["text_twitter_user"]){ ?>
			  				<li><a href="http://twitter.com/#!/<?php echo $data['text_twitter_user']; ?>" class="twitter-link" title="Follow on Twitter"><span>Twitter</span></a></li>
			  			<?php } ?>
			  			<?php if($data["text_facebook_id"]){ ?>
			  			    <li><a href="http://www.facebook.com/<?php echo $data['text_facebook_id']; ?>" class="facebook-link" title="Follow on Facebook"><span>Facebook</span></a></li>
			  			<?php } ?>
			  			<?php if($data["text_dribble_user"]){ ?>
			  			    <li><a href="http://www.dribbble.com/<?php echo $data['text_dribble_user']; ?>" class="dribbble-link" title="Follow on Dribbble"><span>Dribbble</span></a></li>
			  			<?php } ?>
			  			<?php if($data["text_vimeo_user"]){ ?>
			  			    <li><a href="http://vimeo.com/<?php echo $data['text_vimeo_user']; ?>" class="vimeo-link" title="Follow on Vimeo"><span>Vimeo</span></a></li>
			  			<?php } ?>
			  			<?php if($data["text_flickr_id"]){ ?>
			  			    <li><a href="http://www.flickr.com/photos/<?php echo $data['text_flickr_id']; ?>" class="flickr-link" title="Follow on Flickr"><span>Flickr</span></a></li>
			  			<?php } ?>
			  			<?php if($data["text_rss_feed"]){ ?>
			  			    <li><a href="<?php echo $data['text_rss_feed']; ?>" class="rss-link" title="Follow the RSS feed"><span>RSS</span></a></li>
			  			<?php } ?>
			  			<?php if($data["text_linkedin_user"]){ ?>
			  			    <li><a href="http://www.linkedin.com/in/<?php echo $data['text_linkedin_user']; ?>" class="linkedin-link" title="Follow on Linkedin"><span>Linkedin</span></a></li>
			  			<?php } ?>
			  			<?php if($data["text_google_id"]){ ?>
			  			    <li><a href="https://plus.google.com/u/0/<?php echo $data['text_google_id']; ?>" class="google-link" title="Follow on Google Plus"><span>Google Plus</span></a></li>
			  			<?php } ?>
			  			</ul>
			  		</div><!-- end #social-icons-small -->
		  				
		  		</nav><!-- end #header-nav -->
		  			  		
	  		</div><!-- end .row -->
  		
  		</div><!-- end .container -->
  		
  	</div><!-- end #nav-wrapper -->

	<div class="container">
  
       	<header class="header row">
    
            <div class="header-wrap span12">
      
                <div class="row">

                	<div id="logo" class="span12">
                    <?php if ($data["text_logo"]) { ?>
                      <p><i class="icon-cog icon-large"></i></p>
                      <h1 id="logo-default"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
                    <?php } elseif ($data["custom_logo"]) { ?>
                      <h1 id="logo"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo $data['custom_logo']; ?>" /></a></h1>
                    <?php } ?>
                      <p id="strapline"><?php bloginfo('description'); ?></p>
                    </div><!-- end #logo -->
                                        
                </div><!-- end .row -->
        
            </div><!-- end .header-wrap -->
      
        </header><!-- end .header -->

        <hr class="double" />