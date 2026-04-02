<?php get_header(); ?>

<!-- ===== main ===== -->

<main class="page-main">
    <div class="inner">
        <section class="content-wrap">
            <div class="hero-banner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
                <div class="hero-text">
                    <span>access</span>
                    <h2>アクセス</h2>
                </div>
            </div>
        </section>
        <div class="content-area">
            <!-- ===== アクセスセクション（access.html の main 内を置き換え） ===== -->
            <?php the_content(); ?>
        </div>
    </div>
</main>

<!-- ========== フッター ========== -->
<?php get_footer(); ?>
