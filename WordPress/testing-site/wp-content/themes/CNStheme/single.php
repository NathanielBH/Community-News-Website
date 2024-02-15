<?php get_header(); ?>

<main class="wrap single-post-wrap">
  <section class="content-area content-full-width">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	  
	  <header>
          <div class="post-category-container">
            <h3 class="post-category">
  <?php 
  $category_list = get_the_category(); 
  if (!empty($category_list)) {
    $category_names = array(); // Create an empty array to store category names

    // Loop through each category or up to the first three categories
    $max_categories = 3;
    $counter = 0;
    foreach ($category_list as $category) {
      if ($counter < $max_categories) {
        // Add the category name to the array
         if ($category->name != 'Featured Stories' && $category->name != 'Main Story') {
            // Convert the category name to lowercase and replace spaces with hyphens
            $category_name = strtolower(str_replace(' ', '-', $category->name));
            $category_names[] = '<a href="/category/' . $category_name . '">' . $category->name . '</a>';
            $counter++;
        }
      } else {
        break; // Exit the loop after reaching the maximum number of categories
      }
    }

    // Print the category names separated by commas
    echo implode(', ', $category_names);
  }
  ?>
</h3>
          </div>

          <div class="post-title-container">
            <h1 class = "post-title"><?php the_title(); ?></h1>
          </div>

          <div class="post-description-container">
            <h2 class = "post-description">
				<?php the_excerpt(); ?>
			  </h2>
          </div>

          <div class="bottom-post-header-container">
            <div class="post-byline">
              By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
            </div> 

            <div class="date">
              <?php
				$date_format = 'M j, Y, g:iA';
				$time_zone = new DateTimeZone('America/New_York'); // Adjust this according to your time zone

				$date = get_post_time($date_format, false, null, true);
				$date = date_i18n($date_format, strtotime($date), false, $time_zone->getOffset(new DateTime));

				echo $date;
				?>
            </div> 
			  <div class="post-widgets">
				<a href="<?php echo esc_url( home_url( '/republishing/' ) . '?post_id=' . get_the_ID() . '&post_title=' . urlencode( get_the_title() ) ); ?>" class="my-button">Republish</a>
          </div>
          </div>
        </header>

      <article class="article-full post-article">
			 
		  <div class = "post-content">
			<?php the_content(); ?>
		  </div>
		  
      </article>
	  
	  

    <?php endwhile; else : ?>
      <article>
        <p>Sorry, no post was found!</p>
      </article>
    <?php endif; ?>
  </section>
</main>

<?php get_footer(); ?>
