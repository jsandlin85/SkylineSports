<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package indiepro
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area sidebar <?php 
		if(get_theme_mod('indiepro_sidebar_position') == 'left'): echo('left'. ' '); endif;?>" role="complementary">
	<div class="sidebar-wrap">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</aside><!-- #secondary -->
