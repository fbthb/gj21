<?php
/*
Template Name: Kreisverbände-Seite
*/
?>
<?php
get_header();
?>


<?php			
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
$url = $thumb['0'];
?>

<div id="hero" <?php if ($url!="") echo "style=\"--bgimg: url('$url')\""; else echo "class='nopic'"; ?> >
</div>
	
<div id="container">
	
	<h1 class="mainh1"><span><?php the_title(); ?></span></h1>
	
	<section id="maincontent" class="homesection">
		<div class="textcontent">
		
		<?php 
			
			the_content(); 


			/* If comments are open or there is at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			*/
		?>				
		</div>
	</section>
	 
	
<?php
	endwhile; // End of the loop.
?>	
	
	
<?php include('section-map.php'); ?>	
<?php if(true === get_theme_mod('show_news_page')) include('section-news.php'); ?>	
<?php if(true === get_theme_mod('show_positionen_page')) include('section-positionen.php'); ?>	
<?php if(true === get_theme_mod('show_machmit_page')) include('section-machmit.php'); ?>	
<?php if(true === get_theme_mod('show_spenden_page')) include('section-spenden.php'); ?>		
 
  
	</div><!--container-->  
	

<?php
get_footer();
?>	