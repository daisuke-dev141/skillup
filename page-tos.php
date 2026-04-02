<?php get_header(); ?>

<main class="page-main">
    <div class="inner">
        <section class="content-wrap">
            <div class="hero-banner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
                <div class="hero-text">
                    <span>use_contract</span>
                    <h2>利用規約</h2>
                </div>
            </div>
        </section>

        <!--利用規約 -->
        <div class="content-area">
            <?php the_content(); ?>
        </div>
    </div>
</main>



<!-- ========== フッター ========== -->
<?php get_footer(); ?>
