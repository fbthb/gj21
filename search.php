<?php
/*
Template Name: Suchergebnis-Seite
*/
?>
<?php
get_header();
?>

<div id="hero" class='nopic'>
</div>
	
<div id="container">
	
	<h1 class="mainh1"><span>Suche</span></h1>

			
	<section id="maincontent" class="homesection">
		<div class="textcontent">

	
			<div class="search-result-meta">
				<strong>		
				<?php
					
				$search_term = "&bdquo;".esc_html( get_search_query() )."&ldquo;";
				
				printf(
					esc_html(
						/* translators: %d: The number of search results. */
						_n(
							'%d Ergebnis für deine Suche nach '.$search_term.' gefunden.',
							'%d Ergebnisse für deine Suche nach '.$search_term.' gefunden.',
							(int) $wp_query->found_posts,
							'gj21'
						)
					),
					(int) $wp_query->found_posts
				);	
				?>
				</strong>
			</div><!-- .search-result-meta -->	
			
	<?php
		while ( have_posts() ) {
			the_post();
	?>
			<article>
				<a href="<?=esc_url( get_permalink() )?>" title="Weiterlesen →">
					
				<h2><?php the_title(); ?></h2>

				<?php the_post_thumbnail( 'large' ); ?>
				
				<span class="excerpt">
				<?php the_excerpt(); ?>
				</span>

				</a>
				<a href="<?=esc_url( get_permalink() )?>" title="Weiterlesen →" class="more">Weiterlesen →</a>
			</article>
	<?php
		} 
	
		// Previous/next page navigation.
		//twenty_twenty_one_the_posts_navigation();
		?>				
		</div>
	</section>

	


	
<?php include('section-machmit.php'); ?>	
<?php include('section-spenden.php'); ?>		
 
  
	</div><!--container-->  
	

<?php
get_footer();
?>	