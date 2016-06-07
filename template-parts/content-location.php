<?php
/**
 * Template part for displaying store locations.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package devotion
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content location__contacts">

    <div class="location__info-wrap">
      <header class="entry-header">
        <h1 class="entry-title"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h1>
      </header>

      <?php the_content(); ?>
      <?php
        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'devotion' ),
          'after'  => '</div>',
        ) );
      ?>

      <?php if ( get_post_meta( $post->ID, 'location_address', true ) != '' ) : ?>
        <div class="location__info location__info-address">
          <h3 class="location__label location__label-address">
            <i class="fa fa-map-signs" aria-hidden="true"></i>
            <?php echo __( 'Address', 'devotion' ) ?>:
          </h3>
          <p class="location__field location__field-address">
            <span class="location__address"><?php echo get_post_meta( $post->ID, 'location_address', true ); ?>,</span>
            <span class="location__city-name"><?php echo  get_the_term_list($post->ID, 'city'); ?>,</span>
            <span class="location__city-country"><?php echo  get_the_term_list($post->ID, 'country'); ?></span>
          </p>
        </div>
      <?php endif; ?>

      <?php if ( get_post_meta( $post->ID, 'location_telephone', true ) != '' ) : ?>
        <div class="location__info location__info-telephone">
          <h3 class="location__label location__label-telephone">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <?php echo __( 'Telephone', 'devotion' ) ?>:
          </h3>
          <p class="location__field location__field-telephone">
            <a href="tel:<?php
						$phone = preg_replace('/[^0-9]/', '', get_post_meta( $post->ID, 'location_telephone', true ));
						echo $phone; ?>"><?php echo get_post_meta( $post->ID, 'location_telephone', true ); ?></a>
          </p>
        </div>
      <?php endif; ?>

      <?php if ( get_post_meta( $post->ID, 'location_email', true ) != '' ) : ?>
        <div class="location__info location__info-email">
          <h3 class="location__label location__label-email">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <?php echo __( 'E-mail', 'devotion' ) ?>:
          </h3>
          <p class="location__field location__field-email">
            <a href="mailto:<?php echo get_post_meta( $post->ID, 'location_email', true ); ?>"><?php echo get_post_meta( $post->ID, 'location_email', true ); ?></a>
          </p>
        </div>
      <?php endif; ?>

      <?php if ( get_post_meta( $post->ID, 'location_hours', true ) != '' ) : ?>
        <div class="location__info location__info-hours">
          <h3 class="location__label location__label-hours">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <?php echo __( 'Hours', 'devotion' ) ?>:
          </h3>
          <p class="location__field location__field-hours">
            <?php echo get_post_meta( $post->ID, 'location_hours', true ); ?>
          </p>
        </div>
      <?php endif; ?>

    </div>

    <?php if ( get_post_meta( $post->ID, 'location_map', true ) != '' ) : ?>
      <div class="location__map">
        <iframe class="location__map-iframe" width="600" height="250" frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?q=<?php echo urlencode(get_post_meta( $post->ID, 'location_map', true )); ?>&key=AIzaSyB9MFl8GOOto--Hp4XbFKKnUUbkdY20zQU"
                allowfullscreen>
        </iframe>
      </div>
    <?php endif; ?>

	</div><?php // <!-- .entry-content --> ?>

	<footer class="entry-footer">
		<?php devotion_entry_footer(); ?>
	</footer>
</article>
