add_action( 'loop_start', 'wpshout_cpt_archive_demo' );
function wpshout_cpt_archive_demo() {
	if( ! is_archive( 'community_news' ) || ! is_main_query() ) :
		return;
	endif;

	$queried = get_queried_object();

	$count = wp_count_posts( $queried->name );
	echo '<h1>' . $queried->label . ' (' . $count->publish . ' entries)</h1>';
}

add_action( 'wp', 'wpshout_get_queried_object' );
function wpshout_get_queried_object() {
	var_dump( get_queried_object() );
}

<?php $queried = get_queried_object(); ?>

<?php if( get_class( $queried ) === 'WP_Term' ) : ?>

	<p><em>Just so you know, there are <?php echo $queried->count; ?> posts that belong to the term <?php echo $queried->name; ?>.</em></p>

<?php endif; ?>

header class="page-header">
	<?php $queried = get_queried_object(); ?>

	<?php if( get_class( $queried ) === 'WP_User' ) : ?>

		<h1>Super-Cool Stuff by <?php echo $queried->data->display_name; ?></h1>

	<?php else: ?>

		the_archive_title( '<h1 class="page-title">', '</h1>' );

	<?php endif; ?>
</header>
