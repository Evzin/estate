<?php
/**
 * Single estate object template
 * Assets ID: app
 *
 * @package TestEstate\Template
 */

the_post();
get_header();
?>

<h1><?php the_title(); ?></h1>
<div class="row">
	<div class="col-5">
		<strong>Тип:</strong> <?php echo esc_html( get_field( 'тип' )->name ); ?> <br>
		<strong>Город:</strong> <?php echo esc_html( get_field( 'город' )->name ); ?> <br>
		<strong>Стоимость:</strong> <?php the_field( 'стоимость' ); ?>руб <br><br>
		<strong>Адрес:</strong> <?php the_field( 'адрес' ); ?> <br>
		<strong>Площадь:</strong> <?php the_field( 'площадь' ); ?> <br>
		<strong>Жилая площадь:</strong><?php the_field( 'жилая_площадь' ); ?> <br>
		<strong>Этаж:</strong> <?php the_field( 'этаж' ); ?>
	</div>
	<div class="col">
		<?php
		$photos = get_field( 'фото' );
		if ( ! empty( $photos ) ) :
			?>
			<div class="row">
				<?php
				foreach ( $photos as $photo ) :
					?>
					<div class="col-4">
						<a href="<?php echo esc_url( $photo['url'] ); ?>" target="_blank">
							<img src="<?php echo esc_url( $photo['sizes']['thumbnail'] ); ?>">
						</a>
					</div>
					<?php
				endforeach;
				?>
			</div>
			<?php
		endif;
		?>
	</div>
</div>

<?php
get_footer();
