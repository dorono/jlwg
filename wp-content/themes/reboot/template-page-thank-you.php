<?php
/**
 *
 * Template Name: Thank You
 * Description: JLWG page post-purchase.
 *
 */

get_header(); ?>

      <section class="middle">

        <div class="row"> 

          <header id="page-title" class="span12">
            <div class="ribbon">
              <h1><span><?php the_title();?></span></h1>
          	</div><!-- end .ribbon -->
          </header>

        </div><!-- end .row -->

        <div class="row">

          <section class="span8">   
			<div id="content_container">
			  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>              
              <?php the_content(); ?>
              <?php endwhile;  ?> 
              <?php endif; ?>
              <?php
echo '<iframe src="https://www.e-junkie.com/ecom/rp.php?noredirect=true&client_id=CID&txn_id=' . htmlspecialchars($_GET["txn_id"]) . '" style="width:100%;border:0;height:500px;"></iframe>';
?> 
            </div>
          </section>

<?php //get_sidebar() ?>

        </div><!-- end .row -->
         
      </section><!-- end .middle -->
    
    </div><!-- end .container -->

<?php get_footer() ?>