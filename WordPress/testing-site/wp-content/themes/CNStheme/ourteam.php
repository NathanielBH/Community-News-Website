<?php
/*
Template Name: Our Team
*/

get_header();
?>

<script>
function displayFunction() {
    var elements = document.getElementsByClassName("team-members");

    for (var i = 0; i < elements.length; i++) {
        var x = elements[i];

        if (x.style.display === "" || x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = ""; // Remove the "display" property
        }
    }
}
</script>

<main class="wrap page-team">
	<section>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article class="our-team-article article-full">
        <?php the_content(); ?>
      </article>
<?php endwhile; else : ?>
      <article>
        <p>Sorry, no page was found!</p>
      </article>
<?php endif; ?>
  </section>
  
</main>

<?php get_footer()?>