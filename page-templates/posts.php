<?php /* Template Name: Posts */ ?>

<?php get_header(); ?>    

<!-- TITLE -->
<section class="py-5">
	<div class="container container-800">
		<h1 class="text-center"><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>
</section>

<section class="py-0">
	<div class="container">
		<div class="row align-items-end">
		</div>
		<?php $args = array('posts_per_page' => 51, 'post_type' => 'post', 'post_status' => 'publish'); ?>
		<?php $posts = get_posts($args); ?>
		<div class="row">
			<?php foreach ( $posts as $post ) { ?>
				<?php echo get_template_part( 'partials/post' ); ?>
			<?php } ?>
		</div>
	</div>
	
</section>


<?php get_footer(); ?>