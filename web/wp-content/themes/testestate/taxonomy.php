<?php
/**
 * Taxonomy template
 * Assets ID: app
 *
 * @package TestEstate\Temaplate
 */

get_header();
?>

<h1><?php echo get_queried_object()->name; //phpcs:ignore ?></h1>
<?php include THEME_DIR . '/parts/object-loop.php'; ?>
	

<?php
get_footer();
