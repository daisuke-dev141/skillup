<?php get_header(); ?>

<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$keyword = isset($_GET['keyword']) ? sanitize_text_field($_GET['keyword']) : '';

$selected_levels = isset($_GET['course_level']) ? (array)$_GET['course_level'] : array();
$selected_types  = isset($_GET['course_type']) ? (array)$_GET['course_type'] : array();


$args = array(
    'post_type' => 'course',
    'posts_per_page' => 6,
    'paged' => $paged
);


/* キーワード検索 */

if (!empty($keyword)) {

    $args['s'] = $keyword;

    $selected_levels = array();
    $selected_types  = array();
}


/* チェックボックス検索 */ else {

    $tax_query = array();

    if (!empty($selected_levels)) {
        $tax_query[] = array(
            'taxonomy' => 'course_level',
            'field' => 'slug',
            'terms' => $selected_levels
        );
    }

    if (!empty($selected_types)) {
        $tax_query[] = array(
            'taxonomy' => 'course_type',
            'field' => 'slug',
            'terms' => $selected_types
        );
    }

    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }
}

$query = new WP_Query($args);
if (function_exists('relevanssi_do_query')) {
    relevanssi_do_query($query);
}
?>



<main class="course-list-main">
    <div class="inner">
        <section class="content-wrap">
            <div class="hero-banner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
                <div class="hero-text">
                    <span>course_search</span>
                    <h2>コース詳細検索</h2>
                </div>
            </div>
        </section>

        <form method="get" action="<?php echo esc_url(get_permalink()); ?>" class="course-search">


            <!-- キーワード検索 -->

            <div class="search-bar-area">

                <input type="text" name="keyword" value="<?php echo esc_attr($keyword); ?>" placeholder="キーワード検索" class="search-input" maxlength="20">

                <button type="submit" class="keyword-search-btn search-btn">
                    検索
                </button>

            </div>



            <!-- レベル -->

            <div class="filter-group">

                <p>レベル</p>

                <?php foreach (
                    get_terms([
                        'taxonomy' => 'course_level',
                        'hide_empty' => false
                    ]) as $level
                ): ?>

                <label>

                    <input type="checkbox" name="course_level[]" value="<?php echo esc_attr($level->slug); ?>" <?php checked(in_array($level->slug, $selected_levels)); ?>>

                    <?php echo esc_html($level->name); ?>

                </label>

                <?php endforeach; ?>

            </div>



            <!-- コースタイプ -->

            <div class="filter-group">

                <p>コースタイプ</p>

                <?php foreach (
                    get_terms([
                        'taxonomy' => 'course_type',
                        'hide_empty' => false,
                        'parent' => 0
                    ]) as $type
                ): ?>

                <label>

                    <input type="checkbox" name="course_type[]" value="<?php echo esc_attr($type->slug); ?>" <?php checked(in_array($type->slug, $selected_types)); ?>>

                    <?php echo esc_html($type->name); ?>

                </label>

                <?php endforeach; ?>

            </div>



            <!-- 検索ボタン -->
            <div class="search-actions">

                <!-- リセット -->

                <a href="<?php echo esc_url(get_permalink()); ?>" class="search-reset">

                    リセット

                </a>

                <button type="submit" class="search-btn">
                    検索
                </button>

            </div>

            <small>※キーワード検索が優先されます</small>
        </form>



        <div class="course-container">

            <p class="result-count">

                検索結果：<?php echo $query->found_posts; ?>件

            </p>


            <?php if ($query->have_posts()): ?>

            <div class="accordion-area">

                <ul class="js-ac-inner">

                    <?php while ($query->have_posts()): $query->the_post(); ?>

                    <?php get_template_part('template-parts/course-card'); ?>

                    <?php endwhile; ?>

                </ul>

            </div>

            <?php else: ?>

            <p>該当するコースがありません。</p>

            <?php endif; ?>

        </div>



        <div class="pagination">

            <?php
            if (function_exists('wp_pagenavi')) {
                wp_pagenavi(['query' => $query]);
            }
            ?>

        </div>


    </div>
</main>


<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>