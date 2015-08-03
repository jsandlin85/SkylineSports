<?php
/**
 * The template for displaying search results pages.
 *
 * @package indiepro
 */

get_header(); ?>

	<div id="primary" class="content-area <?php if(get_theme_mod( 'indiepro_global_sidebar_search' )) : ?>indiepro-sidebar <?php endif; 
	if(get_theme_mod('indiepro_sidebar_position') == 'left'): echo('left'. ' '); endif;?>">
		<main id="main" class="site-main" role="main">
			<div class="inner">
				<?php if ( have_posts() ) : ?>
		
					<header class="page-header">
						<h1 class="page-title"><?php  _e('Search Results for', 'indiepro'); ?></h1>
                        <?php get_search_form(); ?>
					</header><!-- .page-header -->
					<div class="page-results">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
			
							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'content', 'search' );
							?>
			
						<?php endwhile; ?>
			
						<?php indiepro_paging_nav(); ?>
					</div><!-- .search-results -->
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
			</div><!-- .innner -->
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php 
		if(get_theme_mod('indiepro_global_sidebar_search')):
			get_sidebar(); 
		endif;
	?>
<?php get_footer(); ?>
