<?php get_header(); ?>
<?php $featured_query = new WP_Query( array( 'category_name' => 'featured', 'posts_per_page' => 2 ) ); ?>
<?php $main_query = new WP_Query( array( 'category_name' => 'main', 'posts_per_page' => 1 ) ); ?>
<?php $latest_query = new WP_Query( array('post_type' => 'post','posts_per_page' => 6,'orderby' => 'date', 'order' => 'DESC',) );?>

<main class="wrap">
	
<section class="main-article">
  <?php if ( $main_query-> have_posts() ) : while ( $main_query-> have_posts() ) : $main_query->the_post(); ?>
    <article class="article-loop">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-container">
          <figure class="image-container">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail('featured-image-size', array('class' => 'main-image')); ?>
            </a>
          </figure>
          <div class="post-content">
            <header>
              <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
              By <?php the_author(); ?>
            </header>
            <?php the_excerpt(); ?>
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
	

<section class="latest-posts">
  <?php if ( $featured_query->have_posts() ) : while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
    <article class="article-loop">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="latest-post-container">
          <figure class="latest-image-container">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail( 'latest-image-size', array( 'class' => 'latest-image' ) ); ?>
            </a>
          </figure>
          <header class="latest-post-header">
            <h4>
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
              </a>
            </h4>
           <div class="latest-post-byline">
               By <?php the_author(); ?> 
            </div>
          </header>
        </div>
      <?php endif; ?>
    </article>
  <?php endwhile; endif; wp_reset_postdata(); ?>
</section>

  <section class="content-area">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="article-loop">
        <?php if ( has_post_thumbnail() ) : ?>
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('my-thumbnail-size'); ?>
          </a>
        <?php endif; ?>
        <header>
          <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          By: <?php the_author(); ?>
        </header>
        <?php the_excerpt(); ?>
      </article>
    <?php endwhile; else : ?>
      <article>
        <p>Sorry, no posts were found!</p>
      </article>
    <?php endif; ?>
  </section>
	
	<!--<section class = "sidebar">
	<?php get_sidebar();?>
	</section> -->
</main>

<?php get_footer(); ?>
