<?php get_header(); ?>
<!-- single -->

	
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
<div id="hero">
</div>
	
<div id="container">
	
	
	
	<section id="maincontent" class="homesection">
		<div class="textcontent">
			
			<h1><?php the_title(); ?></h1>
			
			<!-- Get event information, see template: event-meta-event-single.php -->
			<?php eo_get_template_part( 'event-meta', 'event-single' ); ?>
					
			<?php the_post_thumbnail( 'large' ); ?>
		
			<?php the_content(); ?>
	
			<br><br><a href="javascript:history.back()">← zurück</a>
		</div>
		
		
		
		</div>
	</section>
	
	<?php endwhile; ?>	
	
</div><!--container-->  

<?php get_footer(); ?>