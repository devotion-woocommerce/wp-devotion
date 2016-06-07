<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package devotion
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<meta name="format-detection" content="telephone=no">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header class="site-header" role="banner">
		<div class="site-branding">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div>

		<nav class="main-navigation" role="navigation">
			<?php
				/**
				 * Implement the Custom Header feature.
				 */
				require get_template_directory() . '/inc/main-navigation.php';
			?>
		</nav>

		<div class="site-transaction">
			<div class="site-customer">
				<span class="customer-interaction"><?php _e( 'Shopping cart' ); ?></span>
				<span class="customer-name">
					<?php echo __( 'Your items', 'devotion' ) ?>
				</span>
			</div>
			
			<div class="site-cart">
				<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
					<span class="cart-total"><?php echo WC()->cart->get_cart_total(); ?></span>
					<span class="cart-count"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span>
				</a>
			</div>
		</div>

	</header>

	<div class="mobile-navigation">

		<nav class="mobile-header-nav">
			<button class="mobile-nav-toggle lines-button" type="button" role="button" aria-label="Toggle Navigation">
				<span class="lines"></span>
			</button>
		</nav>

	</div>

	<div class="page-wrap">

		<?php if( ! is_product() ) {
			/**
			 * is_product - Returns true when viewing a single product.
			 * Load search form only on product listing
			 */

			get_template_part( 'inc/search-form' );

		} ?>

		<div id="content" class="site-content">
