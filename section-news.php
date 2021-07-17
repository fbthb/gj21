<?php
$cat = get_category(get_theme_mod('news_cat'));
$news_title = get_theme_mod('news_title');
?>
	<section id="news" class="homesection">
		<h2><?php if($news_title!="") echo $news_title; else echo "News"?></h2>
	<br><br>
		<div class="articlecontainer">
	
	<?php
	$lastposts = get_posts( array(
	    'posts_per_page' => 3,
	    'category' => $cat->term_id
	));
	
	 
	if ( $lastposts ) {
	    foreach ( $lastposts as $post ) :
	        setup_postdata( $post ); ?>
	        <article>
		        <a href="<?php the_permalink(); ?>">
			    <?php the_post_thumbnail('news'); ?>
			    <div class="content">
						<span class="thedate"><?php the_date(); ?></span>
						   
	        <h3><?php the_title(); ?></h3>
	        <?php the_excerpt(''); ?>
			    </div><!-- content -->
	        </a>
	        <a href="<?php the_permalink(); ?>" class="more">Weiterlesen →</a>
	        </article>
	        
	    <?php
	    endforeach; 
	    wp_reset_postdata();
	}
	?> 
		</div>
		
		<a href="<?=get_category_link($cat->term_id)?>" class="more">Mehr →</a>
	</section>