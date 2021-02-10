<?php
/**
 * Single object template partial.
 *
 * @package TestEsate\Template
 */

?>

<div class="col-4">
	<a href="<?php the_permalink(); ?>">
		<img class="object_list_photo" src="<?php echo get_field( 'фото' )[0]['sizes']['thumbnail']; ?>" alt="<?php echo get_field( 'фото' )[0]['description'];  //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>">		
		<h4><?php the_title(); ?></h4>
		<?php the_field( 'стоимость' ); ?> руб
	</a>
</div>
