<!DOCTYPE html>
<html <?php language_attributes(); ?>
 <head>
   <title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
   <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
   <style>
     .site-header {
       position: fixed;
       top: 0;
       width: 100%;
     }

     body {
       padding-top: 100px;
     }
   </style>
 </head>
 <body <?php body_class(); ?>>
	 
<div class = "container">
   <header class="site-header">
   
	   <div class = "top-header">
		   <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h1>
		  <!-- <nav class ="site-nav">
  			<?php
    		$args = array(
			'theme_location' => 'header-menu',
			);
    		wp_nav_menu($args);
  			?>
			</nav> -->
	   </div>
	   
 		<div class = "main-nav">
		
			<nav class ="site-nav">
  			<?php
    		$args = array(
			'theme_location' => 'header-menu',
			);
    		wp_nav_menu($args);
  			?>
		</nav>
		</div>
	   
	</header>
</div>
