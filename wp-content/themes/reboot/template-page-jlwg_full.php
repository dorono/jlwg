<?php
/**
 *
 * Template Name: JLWG Sales Page
 * Description: Template for JLWG.
 *
 */

get_header(); ?>

      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("welcome-banner") ) : ?>
      <?php endif; ?>

      <section class="middle">

        <div class="row">

          <header id="page-title" class="span12">
            <div class="ribbon">
              <h1><span><?php the_title();?></span></h1>
          	</div><!-- end .ribbon -->
          </header>

        </div><!-- end .row -->

        <div class="row">

          <section class="span8<?php if(!is_page(array('5','496', '539'))) {
		  	echo " internal_page";
		  } ?>">
			<div id="content_container">
			  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?php the_content(); ?>
              <?php endwhile;  ?>
              <?php endif; ?>
            </div>
          </section>

<?php //get_sidebar() ?>

        </div><!-- end .row -->

      </section><!-- end .middle -->

    </div><!-- end .container -->

<?php get_footer() ?>
