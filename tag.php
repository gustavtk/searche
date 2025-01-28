<?php get_header(); ?>

<!-- TITLE & DESCRIPTION OF TAG -->
<section class="py-5">
	<div class="container text-center">
		<h1><?php single_cat_title(); ?></h1>
		<?php the_archive_description(); ?>
	</div>
</section>

<!-- DISPLAYS POSTS WITH THE SAME TAG -->
<div class="container min-height pb-5">
	<?php $term = get_queried_object(); ?>
	<?php $tag_posts = get_posts(array('posts_per_page'  => 200, 'post_type' => 'post', 'post_status' => 'publish', 'tax_query' => array(array('taxonomy' => 'post_tag', 'field' => 'slug', 'terms' => $term->slug)))); ?>
	<div class="row">
		<?php foreach($tag_posts as $post) { ?>
			<?php get_template_part( 'partials/post' ); ?>
		<?php } ?>
	</div>
</div>

<?php get_footer(); ?>