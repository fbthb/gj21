<?php
/*
Template Name: Positionen-Seite
*/
?>
<?php
get_header();
?>


<?php			
$posts_kat = '';

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
			}*/
		?>				
		</div>
	</section>
	
	
<?php
	endwhile; // End of the loop.
?>	
	
	
<?php	
$lastposts = get_posts( array(
    'posts_per_page' => 99,
    'category_name' => $posts_kat
));

 
if ( $lastposts ) {
?>
<h2>Beiträge zum Thema</h2>
<section id="posts" class="grid">

			<div class="grid-col grid-col--1"></div>
			<div class="grid-col grid-col--2"></div>
		  	<div class="grid-col grid-col--3"></div>
		  	
		<?php
			foreach ( $lastposts as $post ) :
			setup_postdata( $post ); 
        ?>
        
				<article class="grid-item">
					<a href="<?php the_permalink(); ?>">
						
						<?php the_post_thumbnail('news'); ?>
						
						<div class="content">
							<span class="thedate"><?php echo get_the_date(); ?></span>
							
							<h3><?php the_title(); ?></h3>
							
							<?php the_excerpt(); ?>
						</div><!-- content -->
					</a>
					
					<a href="<?php the_permalink(); ?>" class="more">Weiterlesen →</a>
				</article>
				
		<?php
		    endforeach; 
		    wp_reset_postdata();
		?>
	
	</section>

<?php } ?>		

	
	
	
<?php
	$positionenstartseite = 1;
	include('section-positionen.php'); 
?>	


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