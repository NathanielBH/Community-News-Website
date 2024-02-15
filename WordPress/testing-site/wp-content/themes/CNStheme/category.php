<?php 

/*
Template Name: Category
*/

get_header(); ?>

<?php
$debug = false;
// Get the current URL
$currentUrl = $_SERVER['REQUEST_URI'];
// Parse the URL
$parsedUrl = parse_url($currentUrl);

// Get the path component of the URL
$path = $parsedUrl['path'];

// Remove the leading and trailing slashes from the path
$path = trim($path, '/');

// Explode the path into an array using the slash as a delimiter
$pathParts = explode('/', $path);

// Get the section that says "news"
$page_category = $pathParts[1];
$latest_category = $pathParts[0];

// Output the result
//echo $latest_category;

if ($latest_category == 'latest') {
    $category = new WP_Query(array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC'
    ));
    $categories = new WP_Query( array('post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1) );
    $page_title = 'The Latest';
}
else {
	$category = new WP_Query(array('category_name' => $page_category, 'posts_per_page' => 1));
	$categories = new WP_Query(array('category_name' => $page_category, 'posts_per_page' => -1));
	$page_title = str_replace('-', '   ', ucfirst($page_category));
}

?>

<main class="wrap">
	<div class = "page-top">
		
	<section class = "main-article main-category-article">
		<h1>
 		 <?php echo $page_title; ?>
		</h1>
		<?php if ($category->have_posts() ) : while ($category->have_posts()) : $category->the_post(); ?>
		<article class="article-loop">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-container">
          <figure class="image-container">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail('featured-image-size', array('class' => 'main-image')); ?>
            </a>
			  <div class="post-content">
            <header>
              <h2 class = "main-story-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				
            </header>
			  <div class = "excerpt">
				  <?php the_excerpt(); ?>
			  </div>
			  <header>
			<div class="main-category-byline">
               By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> 
            </div>
			</header>
			  
          </div>	
          </figure>  
        </div>
      <?php endif; ?>
    </article>
  <?php endwhile; else : ?>
    <article>
      <p>Sorry, no posts were found!</p>
    </article>
  <?php endif; ?>
	</section>
		</div>
	
	<div class = "page-bottom">
    <section class="categories">
  <?php $counter = 0;
		if ($categories->have_posts()) : while ($categories->have_posts()) : $categories->the_post();
		$counter++;
		// Skip the first post
		  if ($counter === 1) {
			continue;
		  }
		?>
    <article class="article-loop categories-box">
      <div class="categories-post-container">
        <?php if (has_post_thumbnail()) : ?>
          <figure class="categories-image-container">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
              <?php the_post_thumbnail('latest-image-size', array('class' => 'latest-image')); ?>
            </a>
          </figure>
        <?php else: ?>
          <!-- No thumbnail image, so do not display the figure element -->
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
			<header>
			<div class="latest-post-byline">
               By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> 
            </div>
			</header>
			</div>
        </div>
      </div>
    </article>
  <?php endwhile; endif;
  wp_reset_postdata(); ?>
</section>

	</div>
</main>

<?php get_footer(); ?>
