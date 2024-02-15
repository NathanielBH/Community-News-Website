<?php
/*
Template Name: Republish
*/

get_header();

// Retrieve query parameters
$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;
$year = isset($_GET['year']) ? intval($_GET['year']) : 0;
$month = isset($_GET['month']) ? intval($_GET['month']) : 0;
$day = isset($_GET['day']) ? intval($_GET['day']) : 0;
$slug = isset($_GET['slug']) ? sanitize_text_field($_GET['slug']) : '';

// Retrieve post content based on query parameters
$args = array(
    'post_type' => 'post',
    'p' => $post_id,
);
$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();

        // Retrieve necessary post data
        $post_title = get_the_title();
        $post_content = get_the_content();
        $post_date = get_the_date('F j, Y');
        $post_author = get_the_author();
		$trackingPixel = '<script async src="https://www.googletagmanager.com/gtag/js?id=G-MEGDKNKNJ7"></script>';

        // Display the republishing content
        $post_content = preg_replace('/<!--(.|s)*?-->/', '', $post_content);
        ?>
        <main class="wrap">
			
			<header>
			<h2>
					Republishing the Article
				</h2>
				<h1>
					<?php echo $post_title ?>
				</h1></header>
			<div class = "republishing-page-content">
			<section class = "guidelines">
        <h2 style="white-space:pre-wrap;"><strong>Republishing policies for partners</strong></h2>
<p class="" style="white-space:pre-wrap;">We expect our partners to publish the completed, edited stories or multimedia pieces that CNS interns produce as submitted, except for grammatical or style changes or contextual additions.&nbsp;</p>
<ul data-rte-list="default">
<li>
<p class="" style="white-space:pre-wrap;">If the story clearly communicates the subject matter and its focus reflects the student’s reporting, large structural changes should be avoided;</p>
</li>
<li>
<p class="" style="white-space:pre-wrap;">If a story has holes or other needs, the partner editor should communicate with the CNS editor and intern to add the information;</p>
</li>
<li>
<p class="" style="white-space:pre-wrap;">Large-scale rewrites, or changes that render the copy unrecognizable as the student’s, should always be avoided;</p>
</li>
<li>
<p class="" style="white-space:pre-wrap;">For intern work deemed unsatisfactory, the partner editor should communicate with the CNS editor and the intern;</p>
</li>
<li>
<p class="" style="white-space:pre-wrap;">If the work of a CNS intern is to be wrapped into another article, the partner editor should communicate with the CNS editor and intern before doing so. We would expect either a double byline or a reporting credit;</p>
</li>
</ul>
<p class="" style="white-space:pre-wrap;"><strong>General republishing</strong></p>
<p class="" style="white-space:pre-wrap;">Work by CNS students is published on our website and available for republishing by anyone, regardless of partner status:&nbsp;</p>
<ul data-rte-list="default">
<li>
<p class="" style="white-space:pre-wrap;">Make sure the reporter has a byline and make clear the work is from Community News Service. Most news outlets use this format: John Smith | Community News Service;</p>
</li>
<li>
<p class="" style="white-space:pre-wrap;">Please include this note at the top of the story:  "[Student Name] reported this story on assignment from [Outlet Name]. The Community News Service is a program in which University of Vermont students work with professional editors to provide content for local news outlets at no cost." If a story has only the latter sentence in the note, that's the only note needed;&nbsp;</p>
</li>
<li>
<p class="" style="white-space:pre-wrap;">If an outlet republishes an article from the CNS site but was not involved in producing the story, the note should include: “[OUTLET] was not involved in the reporting or editing of this story”;</p>
</li>
<li>
<p class="" style="white-space:pre-wrap;">If an outlet plans to incorporate work from CNS into its own story, it should credit the CNS reporter, either with a double byline or a contributor line, whichever is most appropriate.</p>
</li>
</ul>
			</section>
			
			<section class = "republish">
				<div class="republishing-content">
                <h2>Copy the Following to Repost This Content</h2>
                <p>HTML:</p>

                <?php
                $escaped_title = esc_textarea($post_title);
                $escaped_author = esc_textarea($post_author);
                $escaped_content = esc_textarea($post_content);
				$escaped_pixel = esc_textarea($trackingPixel);

                ?>

                <textarea class="repost-content">
                    <h1><?php echo $escaped_title; ?></h1>
                    <p><?php echo $escaped_author; ?></p>
					<?php echo $escaped_pixel; ?>
                    <?php echo $escaped_content; ?>
                </textarea>

                <p>Plain text:</p>
                <textarea class="plain-text">
                    <?php
	$plain_text_title = strip_tags($escaped_title);
	$plain_text_author = strip_tags($escaped_author);
    $plain_text = strip_tags($post_content); // Remove HTML tags
    $plain_text = htmlspecialchars($plain_text); // Escape special characters
		echo $plain_text_title;
		echo $plain_text_author;
    echo $plain_text;
  ?>
                </textarea>
            </div>
			</section>
			</div>
            
        </main>
        <?php
    }

    wp_reset_postdata();
} else {
    // Display a message if the post is not found
    echo '<p>No post found.</p>';
}

get_footer();
?>
