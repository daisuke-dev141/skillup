<?php
// 開いているタクソノミーページの情報を取得
$column_slug = get_query_var('column_type');
$column = get_term_by('slug', $column_slug, 'column_type');
?>

<!-- header.phpを読み込み -->
<?php get_header(); ?>

<?php
$term = get_queried_object();
$taxonomy = get_taxonomy($term->taxonomy);
?>

<!-- ===== main ===== -->
<main class="page-main">
    <div class="inner">
        <section class="content-wrap">
            <div class="hero-banner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
                <div class="hero-text">
                    <span>column</span>
                    <h2>IT広場</h2>
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
    </div>

    <?php
    // タクソノミーのタームを取得
    $column_terms = get_terms(['taxonomy' => 'column_type']);
    if (!empty($column_terms)):
    ?>

    <nav class="taxonomy-area">
        <div class="taxonomy-list">
            <a href="<?php echo esc_url(home_url('/column/')) ?>">
                <div class="taxonomy-pot <?php if (is_post_type_archive('column')) echo 'is-current'; ?>">
                    <div class="leaf">
                        <img class="leaf-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/column/seed-leaf.png" alt="leaf">
                        <img class="flower-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/column/seed-flower.png" alt="flower">
                    </div>
                    <?php $count = wp_count_posts('column'); ?>
                    <div class="pot"><span class="label">すべて<br>(<?php echo $count->publish; ?>)</span></div>
                </div>
            </a>
            <?php foreach ($column_terms as $column): ?>
            <a href="<?php echo esc_url(get_term_link($column)) ?>">
                <div class="taxonomy-pot <?php if (is_tax('column_type', $column->slug)) echo 'is-current'; ?>">
                    <div class="leaf">
                        <img class="leaf-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/column/seed-leaf.png" alt="leaf">
                        <img class="flower-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/column/seed-flower.png" alt="flower">
                    </div>
                    <div class="pot"><span class="label"><?php echo $column->name; ?><br>(<?php echo esc_html($column->count); ?>)</span></div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

        <div class="taxonomy-line-container">
            <div class="taxonomy-line"></div>
            <div class="pencil-deco"></div>
        </div>
    </nav>

    <section>
        <!-- 関連コラム -->
        <div class="related-column-wrap">
            <ul class="card-list-class">
                <?php if (have_posts()): ?>
                <?php while (have_posts()): ?>
                <?php the_post(); ?>
                <?php get_template_part('template-parts/column-card'); ?>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php else: ?>
                <p>検索結果がありません。</p>

                <?php endif; ?>
            </ul>
        </div>
    </section>

    <!-- ========== ページネーション ========== -->
    <div class="pagination">
        <?php if (function_exists('wp_pagenavi')): ?>
        <?php wp_pagenavi(); ?>
        <?php endif; ?>
    </div>


    <?php endif; ?>
</main>

<!-- ========== フッター ========== -->
<?php get_footer(); ?>