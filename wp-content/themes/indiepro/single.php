<?php
/**
 * The template for displaying all single posts.
 *
 * @package indiepro
 */

get_header(); ?>

	<div id="primary" class="content-area <?php if(get_theme_mod( 'indiepro_global_sidebar_posts' )) : ?>indiepro-sidebar <?php endif; 
	if(get_theme_mod('indiepro_sidebar_position') == 'left'): echo('left'. ' '); endif;?>">
		<main id="main" class="site-main" role="main">
			<div class="inner">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content' ); ?>	
					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					?>
				<?php endwhile; // end of the loop. ?>
			</div>	
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php 
		if(get_theme_mod('indiepro_global_sidebar_posts')):
			get_sidebar(); 
		endif;
	?>
<?php get_footer(); ?>