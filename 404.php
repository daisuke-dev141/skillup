<!-- header.phpを読み込み -->
<?php get_header(); ?>

<!-- ===== main ===== -->

<main class="page-main">
    <div class="inner">
        <section class="content-wrap">
            <div class="hero-banner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
                <div class="hero-text">
                    <span>404</span>
                    <h2>404</h2>
                </div>
            </div>
        </section>

        <!-- 404コンテンツ -->
        <div class="error-content">

            <!-- アイコン -->
            <div class="error-icon">
                <i class="fa-solid fa-map-location-dot"></i>
            </div>

            <!-- メッセージ -->
            <h3 class="error-title">ページが見つかりません</h3>
            <p class="error-text">
                お探しのページは移動・削除されたか、<br>
                URLが間違っている可能性があります。
            </p>

            <!-- ボタン -->
            <div class="error-btns">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-home">
                    <i class="fa-solid fa-house"></i> トップページへ戻る
                </a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-contact">
                    <i class="fa-solid fa-envelope"></i> お問い合わせ
                </a>
            </div>

            <!-- リンク集 -->
            <div class="error-links">
                <p class="error-links-title">よく見られているページ</p>
                <ul>
                    <li><a href="<?php echo esc_url(get_term_link("it_basic", "course_type")); ?>"><i class="fa-solid fa-chevron-right"></i> コース一覧</a></li>
                    <li><a href="<?php echo esc_url(home_url('/qlip/')); ?>"><i class="fa-solid fa-chevron-right"></i> 訓練校について</a></li>
                    <li><a href="<?php echo esc_url(home_url('/faq/')); ?>"><i class="fa-solid fa-chevron-right"></i> FAQ</a></li>
                    <li><a href="<?php echo esc_url(home_url('/access/')); ?>"><i class="fa-solid fa-chevron-right"></i> アクセス</a></li>
                </ul>
            </div>
        </div>
    </div>
</main>
<!-- ========== フッター ========== -->
<!-- footer.phpを読み込み -->
<?php get_footer(); ?>
