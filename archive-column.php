<?php get_header(); ?>

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

        <!-- 検索バー -->
        <div class="search-bar-area">
            <form method="get" action="<?php echo esc_url(get_post_type_archive_link('column')); ?>" class="search-container">
                <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="キーワード検索" maxlength="20">
                <input type="submit" value="&#xf002">
            </form>
        </div>
    </div>

    <?php
    $column_terms = get_terms(['taxonomy' => 'column_type']);
    if (!empty($column_terms)):
    ?>

    <nav class="taxonomy-area">
        <div class="taxonomy-list">
            <a href="<?php echo esc_url(home_url('/column/')); ?>">
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
            <a href="<?php echo esc_url(get_term_link($column)); ?>">
                <div class="taxonomy-pot">
                    <div class="leaf">
                        <img class="leaf-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/column/seed-leaf.png" alt="leaf">
                        <img class="flower-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/column/seed-flower.png" alt="flower">
                    </div>
                    <div class="pot"><span class="label"><?php echo esc_html($column->name); ?><br>(<?php echo esc_html($column->count); ?>)</span></div>
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
        <div class="related-column-wrap">
            <ul class="card-list-class">
                <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                <?php get_template_part('template-parts/column-card'); ?>
                <?php endwhile; ?>
                <?php else: ?>
                <p>検索結果がありません。</p>
                <?php endif; ?>
            </ul>
        </div>
    </section>

    <!-- ページネーション -->
    <div class="pagination">
        <?php if (function_exists('wp_pagenavi')): ?>
        <?php wp_pagenavi(); ?>
        <?php endif; ?>
    </div>

    <?php endif; ?>
</main>

<?php get_footer(); ?>