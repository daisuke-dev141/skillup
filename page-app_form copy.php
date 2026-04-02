<!-- header.phpを読み込み -->
<?php get_header(); ?>

<!-- メニュー情報を取得して表示させる -->

<?php
$course_id = isset($_GET['course_id']) ? intval($_GET['course_id']) : 0;

if ($course_id) {
    $title = get_the_title($course_id);
    $price = get_field('course_fee', $course_id);   // ACFの場合
    $date  = get_field('course_period', $course_id);
    $style = get_field('course_style', $course_id);
}

echo $course_id;
print_r($title)
// if (is_array($style)) {
//     $style = implode(' / ', $style);
// }
?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post(); ?>

<main>
    <section class="content-wrap">
        <div class="hero-banner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
            <div class="hero-text">
                <h2><?php the_title(); ?></h2>
            </div>
        </div>
    </section>
    <div class="form-inner">
        <p class="from-body">お申込みありがとうございます。確認メールを入力されたメールアドレスへ送りいたします。<br>
                    もしも届かない場合は大変お手数ですが、お電話( 088-624-7295)にてお問い合わせください。<br>
                    折り返しご連絡させていただきます。</p>
        <hr>
        <!-- <?php if (is_page(['contact', 'confirm'])): ?>
                        <div class="form_group">
                            <p><label for="course-name">講座名</label></p>
                            <div class="form_text">
                                <p><?php echo esc_html($title); ?></p>
                            </div>
                            <input type="hidden" name="course-name" value="<?php echo esc_attr($title); ?>">
                        </div>
                        <div class="form_group">
                            <p><label for="course-fee">受講料金（税込）</label></p>
                            <div class="form_text">
                                <p><?php echo esc_html($price); ?></p>
                            </div>
                            <input type="hidden" name="course-fee" value="<?php echo esc_attr($price); ?>">
                        </div>
                        <div class="form_group">
                            <p><label for="course-date">開催日程</label></p>
                            <div class="form_text">
                                <p><?php echo esc_html($date); ?></p>
                            </div>
                            <input type="hidden" name="course-date" value="<?php echo esc_attr($date); ?>">
                        </div>
                        <div class="form_group">
                            <p><label for="course-style">受講スタイル</label></p>
                            <div class="form_text">
                                <p><?php echo esc_html($style); ?></p>
                            </div>
                            <input type="hidden" name="course-style" value="<?php echo esc_attr($style); ?>">
                        </div>
                    <?php endif; ?> -->
        <!-- <?php if ($course_id && is_page('app_form')): ?> -->
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const title = document.querySelector('input[name="course-title"]');
            // const price = document.querySelector('input[name="menu_price"]');

            console.log(title);

            if (title) {
                title.value = "<?php echo esc_js($title); ?>";
            }

            // if (price) {
            //     price.value = "<?php echo esc_js(number_format((int)$price) . '円'); ?>";
            // }
        });
        </script>
        <!-- <?php endif; ?> -->
        <?php the_content(); ?>

</main>

<?php endwhile;
endif;
?>

<!-- <script>
    const cf7 = document.querySelector('.wpcf7-form')
    const render = (html) => cf7.innerHTML = html

    const renderCf7Component = () => {
        const component = `<?php require('cf7-component.php') ?>`
        render(component)
    }
    renderCf7Component()
</script> -->

<!-- footer.phpを読み込み -->
<?php get_footer(); ?>