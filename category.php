<?php get_header(); ?>

<!-- TITLE & DESCRIPTION OF CATEGORY -->
<section class="py-5">
    <div class="container text-center">
        <h1><?php single_cat_title(); ?></h1>
        <?php the_archive_description(); ?>
    </div>
</section>

<!-- DISPLAYS POSTS IN THE SAME CATEGORY -->
<div class="container min-height">
    <div class="row">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'partials/post' ); ?>
        <?php endwhile; else: ?>
            <p>Sorry, no posts matched your criteria.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>