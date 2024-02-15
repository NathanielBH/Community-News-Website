<?php 
/*
Template Name: Author
*/

get_header();

$author_id = get_query_var('author'); // Get the author ID from the URL parameter.
        $author_name = get_the_author_meta('display_name', $author_id); // Get the author's display name.
// Retrieve the author's biography
$author_biography = get_the_author_meta('description', $author_id);

        $args = array(
            'author'         => $author_id,
            'post_type'      => 'post',
            'posts_per_page' => -1,
        );

        $author_posts = new WP_Query($args);
?>
<main class = "wrap" >
	<h1 class = "author-title" >All Posts by <?php echo $author_name ?></h1>
	<section class="categories">
		    <!-- Display Author's Biography -->
    <?php if (!empty($author_biography)) : ?>
        <div class="author-biography">
            <h2>About <?php echo $author_name ?></h2>
            <p><?php echo $author_biography; ?></p>
        </div>
    <?php endif; ?>
  <?php
  if ($author_posts->have_posts()) :
    while ($author_posts->have_posts()) :
      $author_posts->the_post();
  ?>
      <article class="article-loop categories-box">
        <div class="categories-post-container">
          <?php if (has_post_thumbnail()) : ?>
            <figure class="categories-image-container">
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('latest-image-size', array('class' => 'latest-image')); ?>
              </a>
            </figure>
          <?php endif; ?>
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
			<div class="latest-post-byline">
               By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> 
            </div>
			</div>
			</div>
        </div>
      </article>
  <?php
    endwhile;
    wp_reset_postdata();
  else :
    echo '<p>No posts found by ' . $author_name . '.</p>';
  endif;
  ?>
</section>
</main>


<?php get_footer(); ?>