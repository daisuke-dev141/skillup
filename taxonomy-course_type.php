<?php get_header(); ?>

<?php
$current_term = get_queried_object();

// 親ターム取得（タブ用）
$parent_terms = get_terms(array(
    'taxonomy'   => 'course_type',
    'parent'     => 0,
    'hide_empty' => false,
    'orderby'    => 'term_order',
    'order'      => 'ASC',
));

// 子ターム取得（アコーディオン用）
$child_terms = get_terms(array(
    'taxonomy'   => 'course_type',
    'parent'     => $current_term->term_id,
    'hide_empty' => false,
    'orderby'    => 'term_order',
    'order'      => 'ASC',
));
?>

<!-- ========== メインコンテンツ ========== -->
<main class="course-list-main">
    <div class="inner">
        <div class="main-inner">
            <!-- トップに戻るアンカー -->
            <div id="TOP"></div>

            <!-- コース一覧タイトル -->
            <section class="content-wrap">
                <div class="hero-banner">
                    <img src="<?php echo get_theme_file_uri('/assets/images/course/kv-course.jpg'); ?>" alt="コースイメージ">
                    <div class="hero-text">
                        <span>course</span>
                        <h2>コース一覧</h2>
                    </div>
                </div>
            </section>

            <div class="course-container">

                <!-- =============================
                        親タームタブ
                ============================== -->
                <div class="category-tabs">

                    <?php if (!empty($parent_terms) && !is_wp_error($parent_terms)) : ?>
                    <?php foreach ($parent_terms as $term) : ?>
                    <?php
                            $is_active = (
                                $term->term_id === $current_term->term_id ||
                                $term->term_id === $current_term->parent
                            );
                            ?>
                    <a href="<?php echo esc_url(get_term_link($term)); ?>" class="tab-btn <?php echo $is_active ? 'active' : ''; ?>">
                        <?php echo esc_html($term->name); ?>(<?php echo esc_html($term->count); ?>)
                    </a>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- =============================
                    子ターム アコーディオン表示
                ============================== -->
                <!-- アコーディオンエリア -->
                <?php if (!empty($child_terms) && !is_wp_error($child_terms)) : ?>

                <a href="<?php echo esc_url(home_url('/course-search/')); ?>" class="detail-search-btn">
                    詳細検索
                </a>

                <!-- <?php foreach ($child_terms as $child) : ?>
                        <div class="accordion-area">
                            <details class="common-accordion"> -->
                <!-- 子ターム名 -->
                <!-- <summary>
                                    <?php echo esc_html($child->name); ?>
                                </summary>
                                <ul class="js-ac-inner">
                                    <?php
                                    $courses = get_posts(array(
                                        'post_type'      => 'course',
                                        'posts_per_page' => -1,
                                        'orderby'        => 'menu_order',
                                        'order'          => 'ASC',
                                        'tax_query'      => array(
                                            array(
                                                'taxonomy' => 'course_type',
                                                'field'    => 'term_id',
                                                'terms'    => $child->term_id,
                                            ),
                                        ),
                                    ));
                                    ?>

                                    <?php if ($courses) : ?>
                                        <?php foreach ($courses as $post) : setup_postdata($post); ?>

                                            <?php get_template_part('template-parts/course-card'); ?>

                                        <?php endforeach;
                                        wp_reset_postdata(); ?>
                                    <?php else : ?>
                                        <p class="no-courses">
                                            このカテゴリーにはコースがありません。
                                        </p>
                                    <?php endif; ?>

                                </ul>
                            </details>
                        </div>
                    <?php endforeach; ?> -->

                <?php foreach ($child_terms as $child) : ?>

                <?php
                        $courses = get_posts(array(
                            'post_type'      => 'course',
                            'posts_per_page' => -1,
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC',
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => 'course_type',
                                    'field'    => 'term_id',
                                    'terms'    => $child->term_id,
                                ),
                            ),
                        ));

                        // コースが存在しない子タームはスキップ
                        if (empty($courses)) continue;
                        ?>

                <div class="accordion-area">

                    <details class="common-accordion">
                        <summary>
                            <?php echo esc_html($child->name); ?> (<?php echo count($courses); ?>)
                        </summary>
                        <ul class="js-ac-inner">

                            <?php foreach ($courses as $post) : setup_postdata($post); ?>
                            <?php get_template_part('template-parts/course-card'); ?>
                            <?php endforeach;
                                    wp_reset_postdata(); ?>

                        </ul>
                    </details>
                </div>

                <?php endforeach; ?>
                <?php endif ?>


            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
