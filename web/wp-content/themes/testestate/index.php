<?php
/**
 * Index template file.
 * Assets ID: app
 *
 * @package TestEstate\Template
 */

$cities = get_terms(
	'city',
	[
		'hide_empty' => false,
	]
);

get_header();
?>

<h1>Главная</h1>
<div class="row">
<?php
foreach ( $cities as $city ) :
	?>
	<div class="col-4">
		<a href="<?php echo esc_url( get_term_link( $city ) ); ?>">
			<img class="object_list_photo" src="<?php echo get_field('фото', $city)['sizes']['thumbnail']; ?>" alt="<?php echo get_field('фото')['description']; //phpcs:ignore ?>">		
			<h4><?php echo esc_html( $city->name ); ?></h4>
		</a>
	</div>
	<?php
endforeach;
?>
</div>

<?php
get_footer();
