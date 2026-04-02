<?php get_header(); ?>

<!-- ===== main ===== -->
<main class="page-main">
    <div class="inner">
        <section class="content-wrap">
            <div class="hero-banner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
                <div class="hero-text">
                    <span>cancel_policy</span>
                    <h2>キャンセルポリシー</h2>
                </div>
            </div>
        </section>
        <div class="content-area">
            <!-- キャンセルポリシー -->
            <?php the_content(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
