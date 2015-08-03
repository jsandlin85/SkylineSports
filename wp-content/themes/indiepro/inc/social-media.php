<?php

/**
 * This template generates links to social media icons once set in the theme options.  
 *
 * @package reznor
 */
?>
<ul class="social-media">

	<?php if ( get_theme_mod( 'rss' ) ) : ?>
		<li><a class="hastip rss-icon" title="RSS feed" href="<?php echo esc_url( get_theme_mod( 'rss' ) ); ?>" target="_blank"><i class="fa fa-rss-square fa-2x"></i></a></li>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'twitter' ) ) : ?>
		<li><a class="hastip twitter-icon" title="Twitter" href="<?php echo esc_url( get_theme_mod( 'twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter fa-2x"></i></a></li>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'facebook' ) ) : ?>
		<li><a class="hastip facebook-icon" title="Facebook" href="<?php echo esc_url( get_theme_mod( 'facebook' ) ); ?>" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a></li>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'pinterest' ) ) : ?>
		<li><a class="hastip pinterest-icon" title="Pinterest" href="<?php echo esc_url( get_theme_mod( 'pinterest' ) ); ?>" target="_blank"><i class="fa fa-pinterest fa-2x"></i></a></li>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'linkedin' ) ) : ?>
		<li><a class="hastip linkedin-icon" title="LinkedIn" href="<?php echo esc_url( get_theme_mod( 'linkedin' ) ); ?>" target="_blank"><i class="fa fa-linkedin fa-2x"></i></a></li>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'googleplus' ) ) : ?>
		<li><a class="hastip google-icon" title="Google+" href="<?php echo esc_url( get_theme_mod( 'googleplus' ) ); ?>" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'flickr' ) ) : ?>
		<li><a class="hastip flickr-icon" title="Flickr" href="<?php echo esc_url( get_theme_mod( 'flickr' ) ); ?>" target="_blank"><i class="fa fa-flickr fa-2x"></i></a></li>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'youtube' ) ) : ?>
		<li><a class="hastip youtube-icon" title="Youtube" href="<?php echo esc_url( get_theme_mod( 'youtube' ) ); ?>" target="_blank"><i class="fa fa-youtube-play fa-2x"></i></a></li>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'vimeo' ) ) : ?>
		<li><a class="hastip vimeo-icon" title="Vimeo" href="<?php echo esc_url( get_theme_mod( 'vimeo' ) ); ?>" target="_blank"><i class="fa fa-vimeo-square fa-2x"></i></a></li>
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'dribble' ) ) : ?>
		<li><a class="hastip dribbble-icon" title="Dribbble" href="<?php echo esc_url( get_theme_mod( 'dribble' ) ); ?>" target="_blank"><i class="fa fa-dribbble fa-2x"></i></a></li>
	<?php endif; ?>	
	
	<?php if ( get_theme_mod( 'tumblr' ) ) : ?>
		<li><a class="hastip tumblr-icon" title="Tumblr" href="<?php echo esc_url( get_theme_mod( 'tumblr' ) ); ?>" target="_blank"><i class="fa fa-tumblr-square fa-2x"></i></a></li>
	<?php endif; ?>

	<?php if ( get_theme_mod( 'github' ) ) : ?>
		<li><a class="hastip github-icon" title="Github" href="<?php echo esc_url( get_theme_mod( 'github' ) ); ?>" target="_blank"><i class="fa fa-github fa-2x"></i></a></li>
	<?php endif; ?>	
    
    <?php if ( get_theme_mod( 'instagram' ) ) : ?>
		<li><a class="hastip instagram-icon" title="Instagram" href="<?php echo esc_url( get_theme_mod( 'instagram' ) ); ?>" target="_blank"><i class="fa fa-instagram fa-2x"></i></a></li>
	<?php endif; ?>		

</ul><!-- #social-icons-->