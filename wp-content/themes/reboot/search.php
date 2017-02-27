<?php
/**
 *
 * Description: Template for the Search Results page.
 *
 */

get_header(); ?>

      <section class="middle">
                 
        <div class="row">
          
          <header id="page-title" class="span12">
            <div class="ribbon">
              <h1><span><?php _e( 'Search Results', 'reboot' ); ?></span></h1>
          	</div><!-- end .ribbon -->
          </header>

        </div><!-- end .row -->

        <div class="row">

          <div class="span8 content">

            <div class="posts">

    				<?php if ( ! have_posts() ) : ?>
    					<div class="not-found">
    						<h1><?php echo __( 'Nothing Found!', 'reboot' ); ?></h1>
    						<p><?php echo __( 'Sorry, but no results were found. Please try the search again?', 'reboot' ); ?></p>
    					</div>
    				<?php endif; ?>

    				<?php
    					if (have_posts()) :
    						
    						while ( have_posts() ) : the_post();
    				?>
						
							<article class="post row">
							<div class="span8"><?php
              if ( has_post_thumbnail() ) ?>
              <a class="post-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                <?php the_post_thumbnail('post-index');?></a>
              </div>
								
							<div class="span8">
                <h3><a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
                <?php get_template_part( 'includes/post', 'meta' ); ?>
                <?php the_excerpt();?>
           
              </div>

							</article><!-- end article -->

							<hr class="dotted" />
                
            <?php endwhile; endif;
					
              wp_reset_query();
    				?>
               
            </div><!-- end .posts -->

          </div><!-- end .content -->

<?php get_sidebar(); ?>
         
      </section><!-- end .middle -->

    </div><!-- end .container -->

<?php get_footer(); ?>