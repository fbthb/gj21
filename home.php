<?php
/*
Template Name: Startseite
*/
?>
<?php
get_header();
			
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
$url = $thumb['0'];
?>

<div id="hero" style="--bgimg: url('<?=$url?>')">
</div>
	
<div id="container">
	
	<h1 class="mainh1"><span><?php the_title(); ?></span></h1>
	
	<section id="intro" class="homesection">
		<div class="textcontent">
			<?php the_content(); ?>
		</div>
	</section>

<?php if('page' !== get_option( 'show_on_front' )) echo '</div>' ?>

<?php
endwhile; // End of the loop.
?>	
		<?php if(true === get_theme_mod('show_machmit')) include('section-machmit.php'); ?>	
		<?php if(true === get_theme_mod('show_news')) include('section-news.php'); ?>	
		<?php if(true === get_theme_mod('show_positionen')) include('section-positionen.php'); ?>
		<?php if(true === get_theme_mod('show_map')) include('section-map.php'); ?>
		<?php if(true === get_theme_mod('show_spenden'))  include('section-spenden.php'); ?>

<?php if('page' == get_option( 'show_on_front' )) echo '</div>' ?>
	
<?php
get_footer();
?>