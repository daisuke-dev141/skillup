<?php get_header(); ?>


<main class="page-main">
    <div class="inner">
        <section class="content-wrap">
            <!-- ページ見出し -->
            <div class="hero-banner">
                <img src="<?php echo get_theme_file_uri('/assets/images/course/kv-course.jpg'); ?>" alt="コースの画像" width="1620" height="1146">
                <div class="hero-text">
                    <span>learning_content</span>
                    <h2>視聴ページ</h2>
                </div>
            </div>
        </section>

        <section>
            <div class="reasons-section">
                <h3 class="detail-title"><?php the_title(); ?></h3>
            </div>
            <?php
            $file      = get_field('learning_file');
            $file_type = get_field('file_type');

            if ($file && $file_type) :

                $url = $file['url'];
            ?>

            <div class="learning-file">

                <?php
                    // --------------------
                    // 動画
                    // --------------------
                    if ($file_type === 'video') : ?>

                <video controls width="100%">
                    <source src="<?php echo esc_url($url); ?>">
                    お使いのブラウザは動画に対応していません。
                </video>

                <?php
                    // --------------------
                    // PDF
                    // --------------------
                    elseif ($file_type === 'pdf') : ?>

                <iframe src="<?php echo esc_url($url); ?>" width="100%" height="800">
                </iframe>

                <?php
                    // --------------------
                    // PowerPoint
                    // --------------------
                    elseif ($file_type === 'ppt') : ?>

                <iframe src="https://view.officeapps.live.com/op/embed.aspx?src=<?php echo esc_url($url); ?>" width="100%">
                </iframe>

                <?php endif; ?>

            </div>
        </section>

        <?php endif; ?>

        <section class="video-description">
            <h3 style="text-align: center; margin-bottom: 20px;">内容</h3>

            <!-- ノート風デザインの適用 -->
            <div class="cstm-box-notebook content-area">
                <?php the_content(); ?>
            </div>
        </section>

        <!-- お申し込みボタン -->
        <div class="cta-container">
            <a href="<?php echo esc_url(home_url('/flow/')); ?>" class="btn-apply" target="_blank">お申し込みの流れはこちらへ</a>
        </div>

        <nav class="news-navigation" aria-label="前後のお知らせ">
            <div class="nav-links-simple">
                <div class="nav-prev">
                    <?php previous_post_link('%link', '前へ'); ?>
                </div>

                <a href="<?php echo esc_url(home_url('/free/')); ?>" class="nav-all">一覧へ</a>

                <div class="nav-next">
                    <?php next_post_link('%link', '次へ'); ?>
                </div>
            </div>
        </nav>

    </div>

</main>

<?php get_footer(); ?>