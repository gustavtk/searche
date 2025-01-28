<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <!-- TITLE OF PAGE -->
    <section class="py-5">
        <div class="container text-center">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>
    
    <!-- PAGE CONTENT -->
    <section class="container">
        <article class="article pb-5">
            <?php the_content(); ?>
        </article>
    </section>

<?php endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php get_footer(); ?>