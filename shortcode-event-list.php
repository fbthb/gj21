<?php
/**
 * Event List Widget: Standard List
 *
 * The template is used for displaying the [eo_event] shortcode *unless* it is wrapped around a placeholder: e.g. [eo_event] {placeholder} [/eo_event].
 *
 * You can use this to edit how the output of the eo_event shortcode. See http://docs.wp-event-organiser.com/shortcodes/events-list
 * For the event list widget see widget-event-list.php
 *
 * For a list of available functions (outputting dates, venue details etc) see http://codex.wp-event-organiser.com/
 *
 *
 * @package Event Organiser (plug-in)
 * @since 1.7
 */
global $eo_event_loop,$eo_event_loop_args;

//The list ID / classes
$id = ( $eo_event_loop_args['id'] ? 'id="' . $eo_event_loop_args['id'] . '"' : '' );
$classes = $eo_event_loop_args['class'];

?>
	<section <?php echo $id; ?> class="<?php echo esc_attr( $classes );?> grid" > 
		  
		  <div class="grid-col grid-col--1"></div>
		  <div class="grid-col grid-col--2"></div>
		  <div class="grid-col grid-col--3"></div>
  
<?php if ( $eo_event_loop->have_posts() ) :  ?>

		<?php while ( $eo_event_loop->have_posts() ) :  $eo_event_loop->the_post(); ?>

			<?php
				//Generate HTML classes for this event
				$eo_event_classes = eo_get_event_classes();

				//For non-all-day events, include time format
				$format = eo_get_event_datetime_format();
			?>

			<article class="grid-item <?php echo esc_attr( implode( ' ',$eo_event_classes ) ); ?>" >
				<a href="<?php echo eo_get_permalink(); ?>">
				<?php the_post_thumbnail( 'large' ); ?>
				<header>
					<span class="date"><i class="far fa-calendar"></i> <?php echo eo_get_the_start( $format = 'd.m.Y', ); ?></span>
					<?php if ( eo_get_the_start( $format = 'G:i', ) != "0:00" ) { ?>
					<span class="time"><i class="far fa-clock"></i> <?php echo eo_get_the_start( $format = 'G:i', ); ?></span>				
					<?php } ?>
					<?php if ( eo_get_venue_name() != "" ) { ?>
					<span class="venue"><i class="fas fa-map-marker-alt"></i> <?php echo eo_get_venue_name(); ?></span>
					<?php } ?>
				</header>
								
				<h2><?php the_title(); ?></h2>
				
				<span class="excerpt">
					<?php the_excerpt(); ?>
				</span>
				
				</a> 
				<a href="<?php echo eo_get_permalink(); ?>" class="more">Weiterlesen →</a>
			</article>

		<?php endwhile; ?>


<?php elseif ( ! empty( $eo_event_loop_args['no_events'] ) ) :  ?>
		<article class="eo-no-events" > <?php echo $eo_event_loop_args['no_events']; ?> </article>
<?php endif; ?>

	</section>
