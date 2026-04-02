<?php
// 開いているタクソノミーページの情報を取得
$free_slug = get_query_var('free_type');
$free = get_term_by('slug', $free_slug, 'free_type');
?>

<?php get_header(); ?>

<?php
$term = get_queried_object();
$taxonomy = get_taxonomy($term->taxonomy);
?>

<main class="page-main">

    <div class="inner">

        <!-- ヒーローバナー -->
        <section class="content-wrap">
            <!-- ヒーローバナー -->
            <div class="hero-banner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
                <div class="hero-text">
                    <span>free</span>
                    <h2>無料視聴</h2>
                </div>
            </div>
        </section>

        <!-- ===== カテゴリータブ（course_type） ===== -->
        <div class="category-tabs">

            <!-- すべて -->
            <?php $count = wp_count_posts('free'); ?>
            <a href="<?php echo get_post_type_archive_link('free'); ?>" class="tab-btn <?php if (is_post_type_archive('free')) echo 'active'; ?>">
                すべて(<?php echo $count->publish; ?>)
            </a>

            <?php
            $terms = get_terms([
                'taxonomy'   => 'free_type',
                'hide_empty' => false,
                'parent'     => 0,
            ]);

            if ($terms && !is_wp_error($terms)) :
                foreach ($terms as $term) :

                    // 今見ているタームかチェック
                    $active_class = '';
                    if (is_tax('free_type') && get_queried_object_id() === $term->term_id) {
                        $active_class = 'active';
                    }
            ?>
                    <a href="<?php echo esc_url(get_term_link($term)); ?>" class="tab-btn <?php echo $active_class; ?>">
                        <?php echo esc_html($term->name); ?>(<?php echo esc_html($term->count); ?>)
                    </a>
            <?php
                endforeach;
            endif;
            ?>
        </div>

        <!-- ===== 動画リスト ===== -->
        <div class="movie-list">

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <div class="movie-card">
                        <?php
                        $movie_id = get_field('movie_link');

                        if ($movie_id) :
                        ?>
                            <a href="<?php echo get_permalink($movie_id); ?>" class="movie-link" target="_blank">
                            <?php endif; ?>
                            <div class="movie-card-inner">

                                <!-- サムネイル -->
                                <div class="movie-thumb-area">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium'); ?>
                                    <?php else : ?>
                                        <div class="thumb-placeholder">No Image</div>
                                    <?php endif; ?>
                                </div>

                                <!-- コンテンツ -->
                                <div class="movie-content-area">
                                    <h3 class="movie-label">
                                        <?php the_title(); ?>
                                    </h3>

                                    <div class="movie-desc-group">
                                        <span class="movie-desc-title">概要</span>
                                        <p class="movie-desc-text">
                                            <?php echo wp_trim_words(get_the_excerpt(), 100, '...'); ?>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            </a>
                    </div>

            <?php endwhile;
            endif; ?>

        </div>

        <!-- ===== ページネーション ===== -->
        <div class="pagination">
            <?php if (function_exists('wp_pagenavi')) : ?>
                <?php wp_pagenavi(); ?>
            <?php endif; ?>
        </div>

    </div>

</main>

<?php get_footer(); ?>
