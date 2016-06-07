<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package devotion
 */

?>

    </div><?php // <!-- #content --> ?>

  </div>
</div><?php // <!-- #page --> ?>

<?php wp_footer(); ?>

<div class="site-footer-widgets">
	<div class="site-mobile-nav">

		<?php do_action ( 'site-mobile-nav-before' ); ?>

		<?php if(is_active_sidebar('site-mobile-nav')) { dynamic_sidebar('site-mobile-nav'); } ?>

		<?php do_action ( 'site-mobile-nav-after' ); ?>
    
	</div>
</div>

</body>
</html>
