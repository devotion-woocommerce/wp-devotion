<div class="site-meta">

  <div class="site-meta__search">
    <div class="toggle-search">
      <i class="btn__search fa fa-search" aria-hidden="true"></i>
      <!-- <div>
        <?php echo __( 'Search', 'woocommerce' ) ?>
      </div> -->
    </div>

    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/'  ) ) ?>">
      <label class="screen-reader-text" for="s"><?php echo __( 'Search for:', 'woocommerce' ) ?></label>
      <input class="searchform__input" type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="<?php echo __( 'Enter your search', 'woocommerce' ) ?>" />
      <input class="searchform__submit" type="submit" id="searchsubmit" value="<?php echo __( 'Search', 'woocommerce' ) ?>" />
      <input type="hidden" name="post_type" value="product" />
    </form>
  </div>

</div>
