<?php get_header(); ?>

<?php
$courses = get_field('modelplan_id');
?>

<?php if ($courses) : ?>
<!-- 学習ステップセクション -->
<div class="step-container">
    <div class="step-header">
        <h2 class="step-title">学習ステップ</h2>
        <span class="total-time">
            総学習時間：
            <?php
                $total_time = 0;
                foreach ($courses as $course) {
                    $total_time += (int) get_field('course_time', $course->ID);
                }
                echo $total_time;
                ?>時間
        </span>
    </div>

    <div class="step-list">

        <?php
            $step = 1;
            foreach ($courses as $post) :
                setup_postdata($post);

                $course_time = get_field('course_time'); // 数値フィールド想定
                $price = get_field('course_price');
                $level = get_field('level'); // 初級・中級など
            ?>

        <div class="step-item">
            <div class="step-number"><?php echo $step; ?></div>

            <div class="step-card-group">
                <div class="step-main-card">
                    <div class="card-top">
                        <h3 class="course-name"><?php the_title(); ?></h3>

                        <span class="level-badge-<?php echo esc_attr($level); ?>">
                            <?php echo esc_html($level); ?>
                        </span>
                    </div>

                    <p class="course-desc">
                                <?php the_excerpt(); ?>
                            </p>

                    <a href="<?php the_permalink(); ?>" class="course-id-btn">
                        コースID：<?php echo get_the_ID(); ?>
                    </a>
                </div>

                <div class="step-info-bar">
                    <span class="info-item">
                        学習時間：約<?php echo esc_html($course_time); ?>時間
                    </span>
                    <span class="info-item">
                        価格：<?php echo number_format($price); ?>円
                    </span>
                </div>
            </div>
        </div>

        <?php
                $step++;
            endforeach;
            wp_reset_postdata();
            ?>

    </div>
</div>
<?php endif; ?>

<?php get_footer(); ?>
