<?php
/*
Template Name: Archiv
*/
?>
<?php
get_header();
?>
<!-- archive -->

<?php	
	
$cat = get_category( get_query_var( 'cat' ) );
$cat_slug = $cat->slug;	
$cat_id = $cat->term_id;
$cat_name = $cat->name;
$cat_desc = $cat->description;

//print_r($cat);

$url = get_attachment_url_by_slug('kategorie_'.$cat_slug);
?>

<div id="hero" <?php if ($url!="") echo "style=\"--bgimg: url('$url')\""; else echo "class='nopic'"; ?> >
</div>
	
<div id="container">
	
	<h1 class="mainh1"><span><?=$cat_name?></span></h1>

	<section id="intro" class="homesection">
		<div class="textcontent">
			<?=$cat_desc?>
		</div>
	</section>
		
	<section id="maincontent" class="grid">

			<div class="grid-col grid-col--1"></div>
			<div class="grid-col grid-col--2"></div>
		  	<div class="grid-col grid-col--3"></div>
		  	
		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
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
			endwhile;

		else :

			

		endif;
		?>
	
	</section>
	<?php
	the_posts_navigation();
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