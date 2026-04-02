<?php get_header(); ?>

<?php
$current_term = get_queried_object();

// 親ターム取得（タブ用）
$parent_terms = get_terms(array(
    'taxonomy'   => 'course_type',
    'parent'     => 0,
    'hide_empty' => false,
));

// 子ターム取得（アコーディオン用）
$child_terms = get_terms(array(
    'taxonomy'   => 'course_type',
    'parent'     => $current_term->term_id,
    'hide_empty' => false,
));
?>

<div class="course-taxonomy-page">

    <!-- =============================
         親タームタブ
    ============================== -->
    <div class="taxonomy-buttons">
        <?php if (!empty($parent_terms) && !is_wp_error($parent_terms)) : ?>
            <?php foreach ($parent_terms as $term) : ?>
                <?php
                $is_active = (
                    $term->term_id === $current_term->term_id ||
                    $term->term_id === $current_term->parent
                );
                ?>
                <a href="<?php echo esc_url(get_term_link($term)); ?>" class="taxonomy-btn <?php echo $is_active ? 'active' : ''; ?>">
                    <?php echo esc_html($term->name); ?>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- タイトル -->
    <h1 class="taxonomy-title">
        <?php echo esc_html($current_term->name); ?>のコース
    </h1>

    <!-- =============================
         子ターム アコーディオン表示
    ============================== -->

    <?php if (!empty($child_terms) && !is_wp_error($child_terms)) : ?>

        <?php foreach ($child_terms as $child) : ?>

            <div class="accordion-area">
                <details class="common-accordion">

                    <!-- 子ターム名 -->
                    <summary>
                        <?php echo esc_html($child->name); ?>
                    </summary>

                    <div class="js-ac-wrap">
                        <div class="common-accordion-content">

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

                        </div>
                    </div>

                </details>
            </div>

        <?php endforeach; ?>

    <?php else : ?>

        <!-- 子タームが無い場合（末端ターム） -->
        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <div class="course-card-inner">
                    <div class="course-item">
                        <h4 class="sub-course-title">
                            <?php the_title(); ?>
                        </h4>

                        <div class="course-detail-flex">

                            <?php if (has_post_thumbnail()) : ?>
                                <div class="detail-visual">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>

                            <div class="detail-info">
                                <p class="course-text">
                                    <?php the_excerpt(); ?>
                                </p>
                                <p>
                                    <a href="<?php the_permalink(); ?>">
                                        詳しく見る →
                                    </a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            <?php endwhile; ?>

        <?php else : ?>
            <p class="no-courses">
                このカテゴリーにはコースがありません。
            </p>
        <?php endif; ?>

    <?php endif; ?>

</div>

<?php get_footer(); ?>
