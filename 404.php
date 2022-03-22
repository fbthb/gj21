<?php
get_header();
?>

<div id="hero" class='nopic' >
</div>
	
<div id="container">
	
	<h1 class="mainh1"><span>Ooops</span></h1>
	
	<section id="maincontent" class="homesection">
		<div class="textcontent">
		<h2>Seite leider nicht gefunden ...</h2>
		<?php 
			//this interferes with the search form in the navigation
			//get_search_form(); 

		?>
		<form action="<?php echo home_url( '/' ); ?>" method="get">
    		<label for="search">Suche</label>
   			<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
    		<input type="submit" value="Suchen"/>
		</form>
		</div>
	</section>


<?php if(true === get_theme_mod('show_news_page')) include('section-news.php'); ?>	
<?php if(true === get_theme_mod('show_positionen_page')) include('section-positionen.php'); ?>	
<?php if(true === get_theme_mod('show_machmit_page')) include('section-machmit.php'); ?>	
<?php if(true === get_theme_mod('show_map_page')) include('section-map.php'); ?>		
<?php if(true === get_theme_mod('show_spenden_page')) include('section-spenden.php'); ?>		
 
  
	</div><!--container-->  
	

<?php
get_footer();
?>	