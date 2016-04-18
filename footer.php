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

    </div><!-- #content -->

  </div>
  <!-- <footer id="colophon" class="site-footer" role="contentinfo"></footer> --> <!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<div class="site-footer-widgets">
	<div class="site-mobile-nav">

		<button class="mobile-nav-toggle lines-button" type="button" role="button" aria-label="Toggle Navigation">
		  <span class="lines"></span>
		</button>

		<?php do_action ( 'site-mobile-nav-before' ); ?>

		<?php if(is_active_sidebar('site-mobile-nav')) { dynamic_sidebar('site-mobile-nav'); } ?>

		<?php do_action ( 'site-mobile-nav-after' ); ?>
	</div>
</div>

</body>
</html>
