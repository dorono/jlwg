<?php
/**
 *
 * Template Name: Homepage
 * Description: Page template to display the custom homepage.
 *
 */

get_header(); ?>

	<section class="middle row">

          <?php
          $layout = $data['homepage_blocks']['enabled'];

          if ($layout):

          foreach ($layout as $key=>$value) {

              switch($key) {

              case 'slider_block':
          ?>
        
          <div class="flex-container span12">
	          
	          <div class="flexslider">
	            
	            <ul class="slides">
	            
	               <?php
	               global $data;
	               $args = array('post_type' => 'slider', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => $data['slider_select']);
	               $loop = new WP_Query($args);
	               while ($loop->have_posts()) : $loop->the_post(); ?>
	                           
	               <li><a href="<?php echo get_post_meta($post->ID, 'gt_slide_url', true) ?>"><?php the_post_thumbnail('large-slider-thumb'); ?></a>
                  <h1 class="flex-title"><span><?php the_title(); ?></span></h1>
                  <?php if(get_post_meta($post->ID, "gt_slide_caption", true)): ?>
		           	<p class="flex-caption"><span><?php echo get_post_meta($post->ID, 'gt_slide_caption', true) ?></span></p>
                <?php endif; ?>
	               </li>
	                         
	             <?php endwhile; ?>
	            </ul><!-- end .slides -->
	          
	          </div><!-- end .flexslider -->
     		
     	  </div><!-- end .flex-container -->

          <?php
          break;
          case 'mission_statement_block':
          ?>

          <aside class="mission-statement span12">

            <div class="row">

              <div class="span12"><h3><?php $data; echo (stripslashes($data['textarea_mission'])) ?></h3></div>

            </div>

          </aside><!-- end .mission-statement -->

          <?php
          break;
          case 'latest_work_block':
          ?>

          <section id="latest-work" class="span12">

            <?php global $data; if($data["text_work_title"]){ ?>
          
            <div class="row">
          
              <header class="section-title span12">
              	<div class="ribbon">
                	<h1><span><?php $data; echo (stripslashes($data['text_work_title'])) ?></span></h1>
               	</div><!-- end .ribbon -->
              </header>

            </div><!-- end .row -->

            <?php } ?>

            <div class="row">
              
              <div class="span12">

                <?php if($data["latest_work_filterable"]){ ?>
                      
                        <div id="portfolio-filter">
                      
                        <ul id="filters" class="btn-group ">
                            <li class="filter"><i class="icon-th icon-large"></i></li>
                                <li><a href="#" data-filter="*" class="mybutton"><?php _e('All', 'reboot'); ?></a></li><?php 
                                    $categories = get_categories(array('type' => 'post', 'taxonomy' => 'project-type')); 
                                    foreach($categories as $category) {
                                    $group = $category->slug;
                                      echo "<li><a href='#' data-filter='.$group' class='mybutton' style='margin-right:10px;'>".$category->cat_name."</a></li>";
                                    }
                                    
                                ?>
                            </ul><!-- end #filters -->

                      </div><!-- end #portfolio-filter -->

                <?php } ?>

              </div><!-- end .span1-->

            </div><!-- end .row -->
            
            <div id="portfolio-items" class="row">

                <?php 
                $args = array(
                    'post_type' => 'portfolio',
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'posts_per_page' => $data['latest_select_work']
                );
                $query = new WP_Query( $args );

                while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php $cur_terms = get_the_terms( $post->ID, 'project-type' ); 
                foreach ( (array) $cur_terms as $cur_term ) {  
                }?>

                      <div class="media-box span4 block <?php echo strtolower($cur_term->slug); ?>" data-filter=""> 

                        <div class="view view-first">
                        
                          <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('latest-thumb'); ?></a>
                          
                          <div class="mask">
                            <h2><i class="icon-link"></i><br /><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            <p class="project-cat"><?php the_terms($post->ID, 'project-type', '', ', ', ''); ?></p>
                          </div>

                        </div><!-- end .view view-first -->
                      
                      </div>  
  
                <?php endwhile; ?>
              
            </div><!-- end .row -->

            <hr class="dotted" />
          
          </section><!-- end #latest-work -->  

          <?php
          break;
          case 'services_block':
          ?>

          <section id="services" class="span12">
          
          	<div class="row">
              
			    <?php
      		global $data;
      									
      		$args = array('post_type' => 'services', 'posts_per_page' => '4');
      		$loop = new WP_Query($args);
      		while ($loop->have_posts()) : $loop->the_post(); ?>
      			
      			<div class="span3">
      				
      				<a href="<?php echo get_post_meta($post->ID, 'gt_service_url', true) ?>"><?php the_post_thumbnail('services-thumb'); ?></a>
      				
      				<h2><a href="<?php echo get_post_meta($post->ID, 'gt_service_url', true) ?>"><?php the_title(); ?></a></h2>
      				
   					<?php the_excerpt(); ?>
   					
   				</div>
    	
      		<?php endwhile; ?>
                
          	</div><!-- end row -->

            <hr class="dotted" />
            
          </section><!-- end #services -->

          

          <aside id="homepage-widgets" class="span12">

            <div class="row">
    
              <div class="span3">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("homepage-sidebar-1") ) : ?>
                <?php endif; ?>
              </div>
              
              <div class="span3">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("homepage-sidebar-2") ) : ?>
                <?php endif; ?>
              </div>
              
              <div class="span3">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("homepage-sidebar-3") ) : ?>
                <?php endif; ?>
              </div>
              
              <div class="span3">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("homepage-sidebar-4") ) : ?>
                <?php endif; ?>
              </div>
                
            </div><!-- end .row -->

          </aside><!-- end #homepage-widgets -->

          <?php
          break;
          case 'featured_area_block':
          ?>

          <section id="featured" class="span12">

            <div class="well">
          
              <div class="row-fluid">
                
                <div class="span9"><h3><?php $data; echo (stripslashes($data['textarea_featured'])) ?></h3></div>
                    <?php {
                        
                        $feat_area_but_col = $data['featured_select_button'];
                        
                        if ( $feat_area_but_col == "Grey" ) { $feat_area_but_col_out = "btn-default"; }
                        elseif ( $feat_area_but_col == "Dark Blue" ) { $feat_area_but_col_out = "btn-primary"; }
                        elseif ( $feat_area_but_col == "Light Blue" ) { $feat_area_but_col_out = "btn-info"; }
                        elseif ( $feat_area_but_col == "Green" ) { $feat_area_but_col_out = "btn-success"; }
                        elseif ( $feat_area_but_col == "Orange" ) { $feat_area_but_col_out = "btn-warning"; }
                        elseif ( $feat_area_but_col == "Red" ) { $feat_area_but_col_out = "btn-danger"; }
                        elseif ( $feat_area_but_col == "Black" ) { $feat_area_but_col_out = "btn-inverse"; }
                        
                        if ( $data['url_featured_button'] != "" ) { $feat_area_but_url_out = 'href="' . $data['url_featured_button'] . '"'; }
                    ?>
                        <div class="featured-button span3">
                          <a class="btn btn-large <?php echo $feat_area_but_col_out; ?>" <?php echo $feat_area_but_url_out ?>> <?php $data; echo (stripslashes($data['text_featured_button'])) ?></a> 
                        </div> 
                      <?php
                      }
                    ?>
                  
              </div><!-- end row -->
            
            </div><!-- end .well -->

          </section><!-- end #featured -->

          <?php
          break;
          case 'latest_news_block':
          ?>
          
          <section id="latest-news" class="span12">

            <?php global $data; if($data["text_news_title"]){ ?>
          
          	<div class="row">

              <header class="section-title span12">
              	<div class="ribbon">
                	<h1><span><?php $data; echo (stripslashes($data['text_news_title'])) ?></span></h1>
                </div><!-- end .ribbon -->
              </header>
          
          	</div><!-- end .row -->

            <?php } ?>
          	          	
          	<div class="row">
          	
          		<div id="latest-articles">
          		
      			<?php
      			global $data;
      									
      			$args = array('post_type' => 'post', 'posts_per_page' => $data['latest_select_news']);
      			$loop = new WP_Query($args);
      			while ($loop->have_posts()) : $loop->the_post(); ?>
      	
      				<article class="latest-article span3">

      					<div class="view view-first">
      		
      						<?php the_post_thumbnail('latest-thumb'); ?>
      				         
      				         <div class="mask">
	      				         <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
	      				         	<h2><i class="icon-link"></i><br />Read Article</h2>
	      				         </a>
      				         </div>
      		
      					</div><!-- end .view view-first -->
      									
      					<div class="latest-news-excerpt">
      		
      						<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
      						
      						<div class="latest-news-meta">
      							<p><span class="post-category"><i class="icon-pencil"></i> Posted in <?php the_terms($post->ID, 'category', '', ', ', ''); ?></span></p>
      							<p><span class="date"><i class="icon-calendar"></i> <?php the_time('F jS, Y'); ?></span></p>
      						</div>
      						
      						<?php the_excerpt(); ?>
      									
      					</div>

      				</article><!-- end .latest-article -->
      	
      			<?php endwhile; ?>
      			
      			</div><!-- end #latest-articles -->
          									         		
          	</div><!-- end row -->

            <hr class="dotted" />
          
          </section><!-- end #latest-news -->

          <?php
          break;
              }

          } endif; ?>

      </section><!-- end .middle -->
          
    </div><!-- end .container -->
  
<?php get_footer(); ?>