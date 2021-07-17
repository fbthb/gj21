<?php get_header(); ?>
<!-- single -->

	
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
<div id="hero">
</div>
	
<div id="container">
	
	
	
	<section id="maincontent" class="homesection">
		<div class="textcontent">
			
		<span class="thedate"><?php the_date(); ?></span><br>		
		<h1><?php the_title(); ?></h1>
		
		<?php the_post_thumbnail(); ?>
		<br><br>	
		<?php the_content(); ?>
		
		
		<br><br><a href="javascript:history.back()">← zurück</a>
		</div>
	</section>
	
	<?php endwhile; ?>	
	
</div><!--container-->  

<?php get_footer(); ?>