<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package devotion
 */

 ?>

<?php // <!-- Non existing links will redirect home --> ?>

<?php wp_redirect(get_option('home')); ?>
