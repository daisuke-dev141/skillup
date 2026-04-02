<?php
// 開いているタクソノミーページの情報を取得
$column_slug = get_query_var('column_type');
$column = get_term_by('slug', $column_slug, 'column_type');
?>

<!-- header.phpを読み込み -->
<?php get_header(); ?>

<?php
// タクソノミーのタームを取得
$faq_terms = get_terms(['taxonomy' => 'faq_type']);
if (!empty($faq_terms)):
?>

    <!-- オーバーレイ（headerの外） -->
    <div class="nav-overlay" id="navOverlay"></div>

    <!-- ===== main ===== -->
    <main class="page-main">
        <div class="inner">
            <section class="content-wrap">
                <div class="hero-banner">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="コースイメージ">
                    <div class="hero-text">
                        <span>faq</span>
                        <h2>FAQ</h2>
                    </div>
                </div>
            </section>

            <!-- heroの外に出す -->
            <div class="search-bar-area">
                <form method="get" action="" class="search-container">

                    <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="キーワード検索" maxlength="20">

                    <input type="submit" value="&#xf002">
                </form>
            </div>
            <?php $count = wp_count_posts('faq'); ?>
            <div class="category-tabs">
                <a href="<?php echo home_url('/faq/'); ?>" class="tab-btn <?php if (is_post_type_archive('faq')) echo 'active'; ?>">すべて(<?php echo $count->publish; ?>)</a>
                <?php foreach ($faq_terms as $faq): ?>

                    <a href="<?php echo get_term_link($faq) ?>" class="tab-btn <?php if (is_tax('faq_type', $faq->slug)) echo 'active'; ?>">
                        <?php echo $faq->name; ?>(<?php echo $faq->count; ?>)
                    </a>

                <?php endforeach; ?>
                <!-- <li><a href="#" class="tab-btn">新設コース</a></li>
                    <li><a href="#" class="tab-btn">申し込み情報</a></li>
                    <li><a href="#" class="tab-btn">その他</a></li> -->
            </div>
        </div>

        <div class="binder-wrapper">

            <?php if (have_posts()): ?>
                <ul>
                    <?php
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                    $posts_per_page = get_option('posts_per_page');
                    $q_num = ($paged - 1) * $posts_per_page + 1;
                    ?>
                    <?php while (have_posts()): ?>
                        <?php the_post(); ?>

                        <!-- アコーディオンエリア -->
                        <?php get_template_part('template-parts/faq-accordion2', null, ['q_num' => $q_num]); ?>
                        <?php $q_num++; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
            <?php else: ?>
                <p>検索結果がありません。</p>
            <?php endif; ?>

            <!-- ページネーション -->
            <div class="pagination">
                <?php if (function_exists('wp_pagenavi')) : ?>
                    <?php wp_pagenavi(); ?>
                <?php endif; ?>
            </div>
        </div>
    </main>

<?php endif; ?>

<!-- footer.phpを読み込み -->
<?php get_footer(); ?>
