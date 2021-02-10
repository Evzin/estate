<?php
/**
 * Objects loop template partial.
 *
 * @package TestEstate\Template
 */

if ( have_posts() ) :
	?>
	<div class="row">
	<?php
	while ( have_posts() ) :
		the_post();
		include( THEME_DIR . '/parts/object-single.php' );
		?>
	
		<?php
	endwhile;
	?>
	</div>
	<?php
else :
	?>
	Нет результатов.
	<?php
endif;
