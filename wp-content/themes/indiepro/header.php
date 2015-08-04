<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package indiepro
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if(get_theme_mod('indiepro_global_favicon')) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('indiepro_global_favicon')); ?>" />
<?php endif; ?>

<?php if(get_theme_mod('indiepro_global_apple_icon')) : ?>
	<link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('indiepro_global_apple_icon')); ?>">
<?php endif; ?>
	
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
	<div class="site-wrapper">
		<div id="page" class="hfeed site">
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'indiepro' ); ?></a>
			
			
			<header id="masthead" class="site-header <?php if( get_header_image() ): ?>bg-image<?php endif; ?> <?php echo esc_attr(get_theme_mod('indiepro_logo_position')); ?>" role="banner" <?php if(get_theme_mod('header_image')): ?> style="background-image: url(<?php echo esc_url(get_theme_mod('header_image')); ?>);<?php endif; ?>">
               <?php if(!get_theme_mod('indiepro_topbar_check')):?>
                    <div class="top-bar">
                        <nav id="site-navigation" class="main-navigation" role="navigation">
                            <a class="menu-toggle toggle-link"><i class="fa fa-bars" aria-hidden="true"></i><span class="screen-reader-text"><?php _e('Menu', 'indiepro'); ?></span></a>
                            <div class="nav-menu">
                            <?php wp_loginout(); ?>
                            <?php wp_nav_menu( array( 
                                    'theme_location' => 'primary', 
                                     ) 
                                  ); 
                            ?>
                            </div>
                        </nav><!-- #site-navigation -->
                        <?php if(!get_theme_mod('indiepro_topbar_search_check')):?>
                            <div class="search-container">
                                <a title="site search" class="search-toggle toggle-link"><i class="fa fa-search" aria-hidden="true"></i><span class="screen-reader-text"><?php _e('Search', 'indiepro'); ?></span></a>
                                <div class="search-box">
                                    <div class="inner">
                                        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                                            <label>
                                                <span class="screen-reader-text"><?php echo __('Search for then press enter', 'indiepro'); ?></span>
                                                <input type="search" class="search-field" placeholder="<?php echo __('type and hit enter', 'indiepro'); ?>" value="" name="s" title="Search for:">
                                                <span class="search-help"><?php echo _e('Type your search keyword, and press enter to search', 'indiepro'); ?></span>
                                            </label>
                                        </form>
                                    </div><!-- .inner -->
                                </div><!-- .search-box -->
                            </div><!-- .search-container -->
                        <?php endif; ?>

                        <?php if(!get_theme_mod('indiepro_topbar_social_check')):?>
                            <div class="social-container">
                            <a title="social network accounts"class="social-toggle toggle-link"><i class="fa fa-share-alt" aria-hidden="true"></i><span class="screen-reader-text"><?php _e('Social', 'indiepro'); ?></span></a>
                                <div class="social-panel">
                                    <div class="inner">
                                        <?php
                                            if(!get_theme_mod('indiepro_topbar_social_check')) :
                                                get_template_part( 'inc/social-media' );
                                            endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div><!-- .topbar -->
                <?php endif; ?>
                <div class="title-wrap">
                    <?php if(is_front_page()) : ?>
                        <h1 class="site-title">
                            <a href="<?php echo home_url(); ?>">
                                <?php if(get_theme_mod('indiepro_logo')) : ?>
                                    <img src="<?php echo esc_url(get_theme_mod('indiepro_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                                <?php endif; ?>
                                <?php if(!get_theme_mod('hide_site_title')): ?>
                                    <span class="title"><?php bloginfo( 'name' ); ?></span>
                                <?php endif; ?>
                                <?php if(!get_theme_mod('hide_tagline')): ?>
                                    <span class="tagline"><?php bloginfo( 'description' ); ?></span>
                                <?php endif; ?>
                            </a>
                        </h1>
                    <?php else : ?>
                        <h2 class="site-title">
                            <a href="<?php echo home_url(); ?>">
                                <?php if(get_theme_mod('indiepro_logo')) : ?>
                                    <img src="<?php echo esc_url(get_theme_mod('indiepro_logo')); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                                <?php endif; ?>
                                <?php if(!get_theme_mod('hide_site_title')): ?>
                                    <span class="title"><?php bloginfo( 'name' ); ?></span>
                                <?php endif; ?>
                                <?php if(!get_theme_mod('hide_tagline')): ?>
                                    <span class="tagline"><?php bloginfo( 'description' ); ?></span>
                                <?php endif; ?>
                            </a>
                        </h2>
                    <?php endif; ?>
                </div>
		      </header><!-- #masthead -->
	
		<div id="content" class="site-content <?php 
		if(	(is_front_page() && get_theme_mod( 'indiepro_homepage_hide_sidebar' ))|| 
			(is_author() && get_theme_mod('indiepro_global_sidebar_author')) ||
			(is_archive() && !is_author() && get_theme_mod('indiepro_global_sidebar_archive'))	||
			(is_page() && get_theme_mod('indiepro_global_sidebar_page')) ||
			(is_single() && get_theme_mod('indiepro_global_sidebar_posts')) ||
			(is_search() && get_theme_mod('indiepro_global_sidebar_search'))
		) : 
				echo('has-sidebar'. ' '); 
		endif;
		if(get_theme_mod('indiepro_sidebar_position') == 'left'):
			echo('left'. ' ');
		endif;
		?>">