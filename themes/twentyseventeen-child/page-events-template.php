<?php 
	
/*
	Template Name: Event Template
*/
	
get_header(); ?>

	<?php 
		
	$args = array('post_type' => 'events', 'posts_per_page' => 3 );
	$loop = new WP_Query( $args );
	
	if( $loop->have_posts() ):
		
		while( $loop->have_posts() ): $loop->the_post(); ?>
			
			<?php get_template_part('content', 'archive'); ?>
		
		<?php endwhile;
		
	endif;
			
	?>

<?php get_footer();