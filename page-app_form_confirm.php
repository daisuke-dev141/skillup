<!-- header.phpを読み込み -->
<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post(); ?>

<main>
    <section class="content-wrap">
        <div class="hero-banner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
            <div class="hero-text">
                <span>content_confirmation</span>
                <h2><?php the_title(); ?></h2>
            </div>
        </div>
    </section>
    <div class="form-inner">

        <?php the_content(); ?>

</main>

<?php endwhile;
endif;
?>

<!-- footer.phpを読み込み -->
<?php get_footer(); ?>
