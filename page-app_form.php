<!-- header.phpを読み込み -->
<?php get_header(); ?>

<!-- メニュー情報を取得して表示させる -->

<?php
$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

if ($course_id) {
    $title = get_the_title($course_id);
    $price = number_format(get_field('course_fee', $course_id));   // ACFの場合
    $date  = get_field('course_period', $course_id);
    $style = get_field('course_style', $course_id);
}

if (is_array($style)) {
    $style = implode(' , ', $style);
}
// echo $course_id;
// print_r($title);
// print_r($price);
// print_r($date);
// print_r($style);
?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <main>
            <section class="content-wrap">
                <div class="hero-banner">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
                    <div class="hero-text">
                        <span>application</span>
                        <h2><?php the_title(); ?></h2>
                    </div>
                </div>
            </section>
            <div class="form-inner">

                <?php if ($course_id && is_page('app_form')): ?>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const title = document.querySelector('input[name="course-title"]');
                            const price = document.querySelector('input[name="course-price"]');
                            const date = document.querySelector('input[name="course-date"]');
                            const style = document.querySelector('input[name="course-style"]');

                            if (title) {
                                title.value = "<?php echo esc_js($title); ?>";
                            }

                            if (price) {
                                price.value = "<?php echo esc_js($price); ?>" + "円";
                            }

                            if (date) {
                                date.value = "<?php echo esc_js($date); ?>";
                            }

                            if (style) {
                                style.value = "<?php echo esc_js($style); ?>";
                            }
                        });
                    </script>
                <?php endif; ?>
                <?php the_content(); ?>

        </main>

<?php endwhile;
endif;
?>

<!-- footer.phpを読み込み -->
<?php get_footer(); ?>
