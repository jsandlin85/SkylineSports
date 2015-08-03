<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package indiepro
 */

get_header(); ?>

	<section id="primary" class="content-area <?php if(get_theme_mod( 'indiepro_global_sidebar_archive' )) : ?>indiepro-sidebar<?php endif; ?>">
		<main id="main" class="site-main" role="main">
			<div class="inner">
				<?php if ( have_posts() ) : ?>
				
					<header class="page-header">
						<h1 class="page-title">
							<?php
								if ( is_category() ) :
									single_cat_title();
				
								elseif ( is_tag() ) :
									single_tag_title();
				
								elseif ( is_author() ) :
									printf( __( 'Author: %s', 'indiepro' ), '<span class="vcard">' . get_the_author() . '</span>' );
				
								elseif ( is_day() ) :
									printf( __( 'Day: %s', 'indiepro' ), '<span>' . get_the_date() . '</span>' );
				
								elseif ( is_month() ) :
									printf( __( 'Month: %s', 'indiepro' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'indiepro' ) ) . '</span>' );
				
								elseif ( is_year() ) :
									printf( __( 'Year: %s', 'indiepro' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'indiepro' ) ) . '</span>' );
				
								elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
									_e( 'Asides', 'indiepro' );
				
								elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
									_e( 'Galleries', 'indiepro' );
				
								elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
									_e( 'Images', 'indiepro' );
				
								elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
									_e( 'Videos', 'indiepro' );
				
								elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
									_e( 'Quotes', 'indiepro' );
				
								elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
									_e( 'Links', 'indiepro' );
				
								elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
									_e( 'Statuses', 'indiepro' );
				
								elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
									_e( 'Audios', 'indiepro' );
				
								elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
									_e( 'Chats', 'indiepro' );
				
								else :
									_e( 'Archives', 'indiepro' );
				
								endif;
							?>
						</h1>
					</header><!-- .page-header -->
					
					<?php if(is_author()): ?>
						<?php get_template_part('inc/templates/about_author'); ?>
					<?php endif; ?>
				
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
				
						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
						?>
				
					<?php endwhile; ?>
				
					<?php indiepro_paging_nav(); ?>
				
				<?php else : ?>
				
					<?php get_template_part( 'content', 'none' ); ?>
				
				<?php endif; ?>
			</div><!-- .inner -->
		</main><!-- #main -->
	</section><!-- #primary -->

	<?php 
		if(	
			(is_author() && get_theme_mod('indiepro_global_sidebar_author')) ||
			(is_archive() && !is_author() && get_theme_mod('indiepro_global_sidebar_archive'))
		) :
			get_sidebar(); 
		endif;

	?>
<?php get_footer(); ?>
