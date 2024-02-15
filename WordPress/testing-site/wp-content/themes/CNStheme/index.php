<?php get_header(); ?>
<?php $featured_query = new WP_Query( array( 'category_name' => 'featured', 'posts_per_page' => 2 ) ); ?>
<?php $main_query = new WP_Query( array( 'category_name' => 'main', 'posts_per_page' => 1 ) ); ?>
<?php
// Get the IDs of posts in the main story and featured queries
$main_query_ids = wp_list_pluck($main_query->posts, 'ID');
$featured_query_ids = wp_list_pluck($featured_query->posts, 'ID');

// Merge the two arrays of excluded post IDs
$excluded_ids = array_merge($main_query_ids, $featured_query_ids);

// Create the latest query and exclude the specified post IDs
$latest_query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in' => $excluded_ids, // Exclude posts from main and featured queries
));
// Combine all excluded IDs from main, featured, and latest queries
$all_excluded_ids = array_merge($excluded_ids, wp_list_pluck($latest_query->posts, 'ID'));

// Legislature Query with excluded IDs
$legislature_query = new WP_Query(array(
    'category_name' => 'legislature',
    'posts_per_page' => 1,
    'post__not_in' => $all_excluded_ids,
));

// Environment Query with excluded IDs
$environment_query = new WP_Query(array(
    'category_name' => 'environment',
    'posts_per_page' => 1,
    'post__not_in' => $all_excluded_ids,
));

// Art Query with excluded IDs
$art_query = new WP_Query(array(
    'category_name' => 'arts',
    'posts_per_page' => 1,
    'post__not_in' => $all_excluded_ids,
));

// Environment Query with excluded IDs
$air_query = new WP_Query(array(
    'post_type' => 'post',
    'category_name' => 'air',
    'posts_per_page' => 4,
    'post__not_in' => $all_excluded_ids,
));

// Legislature Query with excluded IDs
$legislatures_query = new WP_Query(array(
    'category_name' => 'legislature',
    'posts_per_page' => 2,
    'post__not_in' => $all_excluded_ids,
));

// Environment Query with excluded IDs
$environments_query = new WP_Query(array(
    'category_name' => 'environment',
    'posts_per_page' => 2,
    'post__not_in' => $all_excluded_ids,
));

// Art Query with excluded IDs
$arts_query = new WP_Query(array(
    'category_name' => 'arts',
    'posts_per_page' => 2,
    'post__not_in' => $all_excluded_ids,
));
?>

<main class="wrap">
	
	
	
	<div class="page-top">
		
<section class="main-article grid-item">
  <?php if ( $main_query-> have_posts() ) : while ( $main_query-> have_posts() ) : $main_query->the_post(); ?>
    <article class="article-loop">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-container">
			
          <figure class="front-image-container">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail('featured-image-size', array('class' => 'main-image')); ?>
            </a>
			 
          </figure>
			
			<div class="post-content">
            <header>
              <h2 class = "main-story-title headline"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				
            </header>
			  <div class = "excerpt">
				  <?php the_excerpt(); ?>
			  </div>
				  <header>
			          <div class="by-line">By
        <?php
        if (function_exists('coauthors')) {
            $coauthors = get_coauthors();
            $author_links = array();

            foreach ($coauthors as $coauthor) {
                $author_links[] = '<a href="' . get_author_posts_url($coauthor->ID) . '">' . esc_html($coauthor->display_name) . '</a>';
            }

            echo implode(', ', $author_links);
        } else {
            the_author_posts_link();
        }
        ?>
    </div>
		</header>
			  
          </div>	
          
        </div>
		
		
      <?php endif; ?>
    </article>
  <?php endwhile; else : ?>
    <article>
      <p>Sorry, no posts were found!</p>
    </article>
  <?php endif; ?>
</section>
	

<section class="featured-posts grid-item">
  <?php if ( $featured_query->have_posts() ) : while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
    <article class="article-loop">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-post-container">
          <figure class="featured-image-container">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail( 'latest-image-size', array( 'class' => 'featured-image' ) ); ?>
            </a>
			  
          </figure>
			<header class="featured-post-header headline">
            <h3>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
              </a>
            </h3>
           <div class="featured-posts-by-line">By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></div>
          </header>
          
        </div>
      <?php endif; ?>
    </article>
  <?php endwhile; endif; wp_reset_postdata(); ?>
</section>
	</div>
	
	<div class = "page-bottom">
		
		
  <section class="the-latest-section">
	  <h3 class = "the-latest-title">
		  <a href = '/latest' >The Latest</a>
	  </h3>
	  <div class = "latest-posts column-posts">
    <?php if ( $latest_query->have_posts() ) : while ( $latest_query->have_posts() ) : $latest_query->the_post(); ?>
    <article class="article-loop just-latest-box">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="latest-post-container latest-posts-column-container">
          <figure class="latest-image-container">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail( 'latest-image-size', array( 'class' => 'latest-image' ) ); ?>
            </a>
          </figure>
			
			<div class = "true-latest-post-text-container">
				
			
			<header class="latest-post-header headline">
            <h4>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
              </a>
            </h4>
				<div class="latest-post-byline">
               By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
            </div>
          </header>
			
			</div>
			
        </div>
		
      <?php endif; ?>
    </article>
  <?php endwhile; endif; wp_reset_postdata(); ?>
		  </div>
</section>
		
		<section class="the-latest-section legislature">
	  <h3 class = "the-latest-title legislature-title">
		  <a href ="category/legislature">Legislature</a>
	  </h3>
	  <div class = "latest-posts legistlature-posts">
    <?php if ( $legislature_query->have_posts() ) : while ( $legislature_query->have_posts() ) : $legislature_query->the_post(); ?>
    <article class="article-loop latest-box">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="latest-post-container legislature-posts-container">
          <figure class="latest-image-container legislature-image-container">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail( 'latest-image-size', array( 'class' => 'latest-image' ) ); ?>
            </a>
          </figure>
			
			<div class = "latest-post-text-container">
				
			
			<header class="latest-post-header headline">
            <h4>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
              </a>
            </h4>
          </header>
			<div class = "byline-and-excerpt">
			<div class = "excerpt">
				 <?php the_excerpt(); ?>
			</div>
			<header class="latest-post-byline">
               By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
            </header>
			</div>
			</div>
			
        </div>
      <?php endif; ?>
    </article>
  <?php endwhile; endif; wp_reset_postdata(); ?>
		  </div>
		</section>
			
			<section class="the-latest-section environment-section">
	  <h3 class = "the-latest-title">
		  <a href="category/environment">Environment</a>
	  </h3>
	  <div class = "latest-posts environment-posts">
    <?php if ( $environment_query->have_posts() ) : while ( $environment_query->have_posts() ) : $environment_query->the_post(); ?>
    <article class="article-loop latest-box">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="latest-post-container environment-posts-container">
          <figure class="latest-image-container">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail( 'latest-image-size', array( 'class' => 'latest-image' ) ); ?>
            </a>
          </figure>
			
			<div class = "latest-post-text-container">
				
			
			<header class="latest-post-header headline">
            <h4>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
              </a>
            </h4>
          </header>
				
			<div class = "byline-and-excerpt">
			<div class = "excerpt">
				 <?php the_excerpt(); ?>
			</div>
			<header class="latest-post-byline">
               By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
            </header>
			</div>
			</div>
			
        </div>
      <?php endif; ?>
    </article>
  <?php endwhile; endif; wp_reset_postdata(); ?>
		  </div>
</section>
		
		<section class="the-latest-section arts">
	  <h3 class = "the-latest-title">
		  <a href = "category/arts">Arts</a>
	  </h3>
	  <div class = "latest-posts arts-posts">
    <?php if ( $art_query->have_posts() ) : while ( $art_query->have_posts() ) : $art_query->the_post(); ?>
    <article class="article-loop latest-box arts box">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="latest-post-container arts-post-container">
          <figure class="latest-image-container">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail( 'latest-image-size', array( 'class' => 'latest-image' ) ); ?>
            </a>
          </figure>
			
			<div class = "latest-post-text-container">
				
			
			<header class="latest-post-header headline">
            <h4>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
              </a>
            </h4>
          </header>
				<div class = "byline-and-excerpt">
			<div class = "excerpt">
				 <?php the_excerpt(); ?>
			</div>
			<header class="latest-post-byline">
               By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> 
            </header>
			</div>
			</div>
			
        </div>
      <?php endif; ?>
    </article>
  <?php endwhile; endif; wp_reset_postdata(); ?>
		  </div>
</section>
			
		</div>
	
	<div class = "page-sub-bottom">
		
				<section class="sub-section legislature">
	  <h3 class = "the-latest-title legislature-title">
		  <a href ="category/legislature">Legislature</a>
	  </h3>
	  <div class = "sub-posts legistlature-posts">
    <?php if ( $legislatures_query->have_posts() ) : while ( $legislatures_query->have_posts() ) : $legislatures_query->the_post(); ?>
    <article class="article-loop latest-box">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="vertical-post-container latest-post-container legislature-posts-container">
          <figure class="latest-image-container vertical-image-container legislature-image-container">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail( 'latest-image-size', array( 'class' => 'latest-image' ) ); ?>
            </a>
          </figure>
			
			<div class = "vertical-text-container latest-post-text-container">
				
			
			<header class="vertical-header latest-post-header headline">
            <h4>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
              </a>
            </h4>
          </header>
			<div class = "byline-and-excerpt">
			<div class = "excerpt">
				 <?php the_excerpt(); ?>
			</div>
			<header class="latest-post-byline">
               By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
            </header>
			</div>
			</div>
			
        </div>
      <?php endif; ?>
    </article>
  <?php endwhile; endif; wp_reset_postdata(); ?>
		  </div>
		</section>
		
						<section class="sub-section-right legislature">
	  <h3 class = "the-latest-title legislature-title">
		  <a href ="category/legislature">Legislature</a>
	  </h3>
	  <div class = "sub-posts-right legistlature-posts">
    <?php if ( $legislatures_query->have_posts() ) : while ( $legislatures_query->have_posts() ) : $legislatures_query->the_post(); ?>
    <article class="article-loop latest-box">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="vertical-post-container latest-post-container legislature-posts-container">
          <figure class="vertical-image-container latest-image-container legislature-image-container">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail( 'latest-image-size', array( 'class' => 'latest-image' ) ); ?>
            </a>
          </figure>
			
			<div class = "vertical-text-container latest-post-text-container">
				
			
			<header class="vertical-header latest-post-header headline">
            <h4>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
              </a>
            </h4>
          </header>
			<div class = "byline-and-excerpt">
			<div class = "excerpt">
				 <?php the_excerpt(); ?>
			</div>
			<header class="latest-post-byline">
               By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
            </header>
			</div>
			</div>
			
        </div>
      <?php endif; ?>
    </article>
  <?php endwhile; endif; wp_reset_postdata(); ?>
		  </div>
		</section>
		
	</div>
	
	
</main>


<?php get_footer(); ?>
