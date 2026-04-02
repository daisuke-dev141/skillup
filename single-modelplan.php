<?php get_header(); ?>

<!-- ========== メインコンテンツ ========== -->
<main class="page-main">
    <div class="inner">
        <section class="content-wrap">
            <div class="hero-banner">
                <img src="<?php echo get_theme_file_uri('/assets/images/course/kv-course.jpg'); ?>" alt="コースイメージ" width="1620" height="1146">
                <div class="hero-text">
                    <span>modelplan</span>
                    <h2>モデルプラン</h2>

                </div>
            </div>
        </section>

        <!-- 概要 -->

        <section>
            <div class="reasons-section">
                <h3 class="detail-title"><?php the_title(); ?></h3>
            </div>
            <div class="c-text">
                <p class="c-text-title">概要</p>
                <p><?php the_content(); ?></p>
            </div>


            <!-- 対象 -->
            <div class="recommend-box">
                <p>対象</p>
                <?php
                $text = get_field("modelplan_target");
                $items = split_by_newline($text);
                ?>
                <ul>
                    <?php foreach ($items as $item) : ?>
                        <li><?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>


            <?php
            $courses = get_field('modelplan_id');
            ?>

            <?php if ($courses) : ?>
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

                            $course_time = get_field('course_time');
                            $level = get_field('level');
                            $price_raw = get_field('course_fee');
                            $price = (int) str_replace(',', '', $price_raw);
                            $course_code = get_post_field('course_code'); // フィールド名に合わせて調整してください
                        ?>

                            <div class="step-item">
                                <div class="step-number"><?php echo $step; ?></div>

                                <a href="<?php the_permalink(); ?>" class="step-card-link-wrapper">
                                    <div class="step-card-group">
                                        <div class="step-main-card">
                                            <div class="card-top">
                                                <h3 class="course-name"><?php the_title(); ?></h3>
                                                <span class="level-badge-<?php echo esc_attr($level); ?>">
                                                    <?php echo esc_html($level); ?>
                                                </span>
                                            </div>

                                            <div class="course-desc">
                                                <?php the_excerpt(); ?>
                                            </div>

                                            <span class="course-id-btn">
                                                コースID：<?php echo esc_html($course_code); ?>
                                            </span>
                                        </div>

                                        <div class="step-info-bar">
                                            <span class="info-item">
                                                学習時間：約<?php echo esc_html($course_time); ?>
                                            </span>
                                            <span class="info-item">
                                                価格：<?php echo number_format($price); ?>円
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php
                            $step++;
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            <?php endif; ?>

        </section>


        <!-- 主な習得スキル -->
        <?php
        $skills = split_by_newline(get_field('modelplan_skill'));
        ?>

        <section>
            <div class="target-qualification-wrap">
                <h3>
                    <i class="fa-solid fa-book-open" aria-hidden="true"></i>
                    主な習得スキル
                </h3>

                <?php if ($skills) : ?>
                    <ul class="target-qualification">
                        <?php foreach ($skills as $skill) : ?>
                            <li class="qualification-badge">
                                <?php echo esc_html($skill); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </section>


        <!-- 目標資格 -->
        <section>
            <div class="target-qualification-wrap">
                <h3><i class="fa-solid fa-book-open" aria-hidden="true"></i>目標資格</h3>
                <?php
                $terms = get_the_terms(get_the_ID(), 'target_qualification');
                ?>

                <?php if ($terms && !is_wp_error($terms)) : ?>
                    <ul class="target-qualification">
                        <?php foreach ($terms as $term) : ?>
                            <li class="qualification-badge"><?php echo esc_html($term->name); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </section>


        <section aria-labelledby="job-heading">
            <!--目指せる職業  -->
            <div class="growth-job">
                <h3 id="job-heading"><i class="fa-solid fa-book-open" aria-hidden="true"></i>目指せる職業</h3>
                <?php
                // 今の投稿に紐づいているタームだけ取得
                $terms = get_the_terms(get_the_ID(), 'target_occupation');

                if (!empty($terms) && !is_wp_error($terms)) : ?>
                    <ul class="job">
                        <?php foreach ($terms as $term) :

                            $slug = $term->slug;
                            $image_url = get_theme_file_uri("/assets/images/target-job/{$slug}.jpg");
                        ?>
                            <li class="target-job-item">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($term->name); ?>">
                                <p><?php echo esc_html($term->name); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </section>


        <?php
        $posts = get_field('modelplan_column');
        ?>

        <?php if ($posts) : ?>
            <!-- 関連コラムセクション -->
            <section aria-labelledby="column-heading">
                <!-- 関連コラム -->
                <div class="related-column-wrap">
                    <h3 id="column-heading"><i class="fa-solid fa-book-open" aria-hidden="true"></i>関連コラム</h3>

                    <ul class="card-list-class">
                        <?php foreach ($posts as $post) :
                            setup_postdata($post); ?>

                            <li class="column-card">
                                <a href="<?php the_permalink(); ?>" target="_blank">

                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium', ['class' => 'column-card-img']); ?>
                                    <?php else : ?>
                                        <img class="column-card-img" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/o-summary-woman-1.png'); ?>" alt="">
                                    <?php endif; ?>

                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'column_type');
                                    $term_name = '';

                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        $term_name = $terms[0]->name;
                                    }
                                    ?>

                                    <div class="column-item-text">

                                        <div class="column-inline">
                                            <time class="column-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                            </time>

                                            <?php if ($term_name) : ?>
                                                <span class="column-category">
                                                    <?php echo esc_html($term_name); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <h4 class="card-title"><?php the_title(); ?></h4>

                                        <p class="card-desc">
                                            <?php echo wp_trim_words(get_the_excerpt(), 30, '…'); ?>
                                        </p>

                                    </div>
                                </a>
                            </li>


                        <?php endforeach; ?>
                    </ul>


                </div>

            </section>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
