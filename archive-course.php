<?php get_header(); ?>

<?php
$selected_levels = isset($_GET['course_level']) ? (array)$_GET['course_level'] : array();
$selected_styles = isset($_GET['course_style']) ? (array)$_GET['course_style'] : array();
$keyword = get_search_query();

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$tax_query = array();

if (!empty($selected_levels)) {
    $tax_query[] = array(
        'taxonomy' => 'course_level',
        'field'    => 'slug',
        'terms'    => $selected_levels,
    );
}

if (!empty($selected_styles)) {
    $tax_query[] = array(
        'taxonomy' => 'course_style',
        'field'    => 'slug',
        'terms'    => $selected_styles,
    );
}

$args = array(
    'post_type'      => 'course',
    'posts_per_page' => 10,
    'paged'          => $paged,
    's'              => $keyword,
);

if (!empty($tax_query)) {
    $args['tax_query'] = $tax_query;
}

$query = new WP_Query($args);
?>

<main class="course-list-main">
    <div class="inner">
        <div class="main-inner">

            <section class="content-wrap">
                <div class="hero-banner">
                    <img src="<?php echo get_theme_file_uri('/assets/images/course/kv-course.jpg'); ?>" alt="">
                    <div class="hero-text">
                        <span>course</span>
                        <h2>コース一覧</h2>
                    </div>
                </div>
            </section>


            <!-- キーワード検索 -->
            <div class="search-bar-area">
                <form method="get" action="<?php echo esc_url(home_url('/course/')); ?>" class="search-container">

                    <input type="text" name="s" value="<?php echo esc_attr($keyword); ?>" placeholder="キーワード検索" class="search-input">

                    <input type="submit" value="&#xf002;" class="search-submit">

                </form>
            </div>


            <!-- レベル・スタイル検索 -->
            <form method="get" class="level-search">

                <!-- レベル -->
                <?php
                $levels = get_terms(array(
                    'taxonomy'   => 'course_level',
                    'hide_empty' => false,
                ));
                ?>

                <?php if (!empty($levels) && !is_wp_error($levels)) : ?>
                    <?php foreach ($levels as $level) : ?>

                        <label>
                            <input type="checkbox" name="course_level[]" value="<?php echo esc_attr($level->slug); ?>" <?php
                                                                                                                        if (!empty($selected_levels) && in_array($level->slug, $selected_levels)) {
                                                                                                                            echo 'checked';
                                                                                                                        }
                                                                                                                        ?>>

                            <?php echo esc_html($level->name); ?>

                        </label>

                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- スタイル -->
                <?php
                $styles = get_terms(array(
                    'taxonomy'   => 'course_style',
                    'hide_empty' => false,
                ));
                ?>

                <?php if (!empty($styles) && !is_wp_error($styles)) : ?>
                    <?php foreach ($styles as $style) : ?>

                        <label>
                            <input type="checkbox" name="course_style[]" value="<?php echo esc_attr($style->slug); ?>" <?php
                                                                                                                        if (!empty($selected_styles) && in_array($style->slug, $selected_styles)) {
                                                                                                                            echo 'checked';
                                                                                                                        }
                                                                                                                        ?>>

                            <?php echo esc_html($style->name); ?>

                        </label>

                    <?php endforeach; ?>
                <?php endif; ?>

                <input type="hidden" name="s" value="<?php echo esc_attr($keyword); ?>">

                <button type="submit">検索</button>

            </form>


            <div class="course-container">

                <?php
                // 親ターム取得
                $parent_terms = get_terms(array(
                    'taxonomy'   => 'course_type',
                    'parent'     => 0,
                    'hide_empty' => false,
                    'orderby'    => 'term_order',
                    'order'      => 'ASC',
                ));
                ?>

                <div class="category-tabs">

                    <a href="<?php echo esc_url(get_post_type_archive_link('course')); ?>" class="tab-btn <?php if (is_post_type_archive('course')) echo 'active'; ?>">
                        すべて
                    </a>

                    <?php if (!empty($parent_terms) && !is_wp_error($parent_terms)) : ?>
                        <?php foreach ($parent_terms as $term) : ?>

                            <a href="<?php echo esc_url(get_term_link($term)); ?>" class="tab-btn">
                                <?php echo esc_html($term->name); ?>
                            </a>

                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>


                <?php if ($query->have_posts()) : ?>

                    <div class="accordion-area">

                        <ul class="js-ac-inner">

                            <?php while ($query->have_posts()) : $query->the_post(); ?>

                                <?php get_template_part('template-parts/course-card'); ?>

                            <?php endwhile; ?>

                        </ul>

                    </div>

                <?php else : ?>

                    <p>該当するコースがありません。</p>

                <?php endif; ?>

            </div>

        </div>


        <div class="pagination">

            <?php
            echo paginate_links(array(
                'total' => $query->max_num_pages
            ));
            ?>

        </div>

    </div>
</main>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
