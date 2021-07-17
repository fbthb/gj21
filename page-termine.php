<?php
/*
Template Name: Termine-Seite
*/
?>
<?php
get_header();
?>


<?php			
while ( have_posts() ) :
	the_post();
	
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' );
$url = $thumb['0']; 	
/**/
?>

<div id="hero" <?php if ($url!="") echo "style=\"--bgimg: url('$url')\""; else echo "class='nopic'"; ?> >
</div>
	
<div id="container">
	
	<h1 class="mainh1"><span><?php the_title(); ?></span></h1>
	
	<section id="maincontent" class="homesection">

		
		<?php 
			
			the_content(); 

		?>				

	</section>
	
	
<?php
	endwhile; // End of the loop.
?>	
		
	
	
		
	
	<?php if(true === get_theme_mod('show_news_page')) include('section-news.php'); ?>	
	<?php if(true === get_theme_mod('show_positionen_page')) include('section-positionen.php'); ?>	
	<?php if(true === get_theme_mod('show_machmit_page')) include('section-machmit.php'); ?>	
	<?php if(true === get_theme_mod('show_map_page')) include('section-map.php'); ?>		
	<?php if(true === get_theme_mod('show_spenden_page')) include('section-spenden.php'); ?>
  
  
	</div><!--container-->  
	
	<script type="text/javascript">
		
		var grid = document.querySelector('.grid');
		var colc = new Colcade( grid, {
		  columns: '.grid-col',
		  items: '.grid-item'
		});

	</script>

<?php
get_footer();
?>	