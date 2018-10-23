<?php
/**
 * Single realty partial template.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>
		
		<?php
		
		$area = get_field( "area" );
		if( $area )
		{
			echo '<b>Площадь: </b>'.$area.' кв. м.<br>';
		}
		
		$price = get_field( "price" );
		if( $price )
		{
			echo '<b>Стоимость: </b>'.$price.' руб.<br>';
		}
		
		$address = get_field( "address" );
		if( $address )
		{
			echo '<b>Адрес: </b>'.$address.'<br>';
		}
		
		$living_area = get_field( "living_area" );
		if( $living_area )
		{
			echo '<b>Жилая площадь: </b>'.$living_area.' кв. м.<br>';
		}
		
		$floor = get_field( "floor" );
		if( $floor )
		{
			echo '<b>Этаж: </b>'.$floor.'<br>';
		}
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
