<?php get_header(); ?>

<main class="page-main">

    <div class="inner">
        <section class="content-wrap">
            <div class="hero-banner">
                <img src="<?php echo get_theme_file_uri('/assets/images/course/kv-course.jpg'); ?>" alt="コースイメージ">
                <div class="hero-text">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'course_type');

                    if ($terms) {
                        echo '<span>course-' . $terms[0]->slug . '</span>';
                    }
                    ?>

                    <?php $terms = get_the_terms(get_the_ID(), 'course_type'); ?>
                    <h2>
                        コース詳細-<?php if ($terms) {
                                    foreach ($terms as $term) {
                                        if ($term->parent == 0) {
                                            echo $term->name;
                                        }
                                    }
                                } ?></h2>
                </div>
            </div>
        </section>

        <section>
            <div class="reasons-section">
                <h3 class="detail-title">
                    <?php the_title(); ?>
                </h3>
                <div class="course-meta">

                    <?php if ($code = get_field('course_code')) : ?>
                        <span class="course-meta__code">
                            <?php echo esc_html($code); ?>
                        </span>
                    <?php endif; ?>

                    <?php
                    $type_terms = get_the_terms(get_the_ID(), 'course_type');
                    if ($type_terms && !is_wp_error($type_terms)) {
                        foreach ($type_terms as $term) {
                            if ($term->parent) {
                                $parent = get_term($term->parent, 'course_type');
                            } else {
                                $parent = $term;
                            }
                            echo '<a class="course-meta__type" href="' . esc_url(get_term_link($parent)) . '"><span>';
                            echo esc_html($parent->name);
                            echo '</span></a>';
                            break;
                        }
                    }
                    ?>

                    <?php
                    $level_terms = get_the_terms(get_the_ID(), 'course_level');
                    if ($level_terms && !is_wp_error($level_terms)) {
                        foreach ($level_terms as $term) {
                            echo '<span class="course-meta__level">';
                            echo esc_html($term->name);
                            echo '</span>';
                            break;
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="course-imgset">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(get_theme_file_uri('assets/images/common/no-image.jpg')); ?>" alt="No Image">
                <?php endif; ?>
            </div>

            <div class="c-text">
                <?php the_content(); ?>
            </div>

            <div class="recommend-box">
                <p>こんな方におすすめ</p>
                <?php
                $text = get_field("course_target");
                $items = split_by_newline($text);
                if ($items) : ?>
                    <ul>
                        <?php foreach ($items as $item) : ?>
                            <li><?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>



            <div class="course-info-wrap">
                <table class="course-info-table">
                    <tr>
                        <th><i class="fa-regular fa-calendar" aria-hidden="true"></i>受講期間</th>
                        <td><?php the_field("course_period"); ?></td>
                    </tr>
                    <tr>
                        <th><i class="fa-solid fa-globe" aria-hidden="true"></i>受講環境</th>
                        <td><?php the_field("course_environment"); ?></td>
                    </tr>
                    <tr>
                        <th><i class="fa-solid fa-computer" aria-hidden="true"></i>受講スタイル</th>
                        <td>
                            <?php
                            $values = get_field('course_style');
                            if (!empty($values)) {
                                echo esc_html(implode('、', (array)$values));
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="fa-solid fa-users" aria-hidden="true"></i>対象者の条件</th>
                        <td><?php the_field("course_condition"); ?></td>
                    </tr>
                    <tr>
                        <th><i class="fa-solid fa-link" aria-hidden="true"></i>関連URL</th>
                        <td>
                            <?php
                            $link = get_field('out_link') ?: get_field('in_link');
                            $name = get_field('out_name') ?: get_field('in_name');
                            if ($link && $name) : ?>
                                <a href="<?php echo esc_url($link); ?>" target="_blank" class="blue-underline">
                                    <?php echo esc_html($name); ?>
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <section aria-labelledby="curriculum-heading">
            <div class="curriculum-wrap">
                <?php
                $text = get_field("course_curriculum");
                $curriculums = split_by_newline($text);
                $count = count((array)$curriculums);
                ?>
                <h3 id="curriculum-heading"><i class="fa-solid fa-book-open" aria-hidden="true"></i>カリキュラム（全<?php echo $count; ?>回）</h3>
                <ul class="curriculum-content">
                    <?php if ($curriculums) : foreach ($curriculums as $curriculum) : ?>
                            <li class="curriculum-item item-blue">
                                <span class="curriculum-title"><?php echo esc_html($curriculum); ?></span>
                            </li>
                    <?php endforeach;
                    endif; ?>
                </ul>
            </div>
        </section>

        <section aria-labelledby="qualification-heading">
            <div class="target-qualification-wrap">
                <h3 id="qualification-heading"><i class="fa-solid fa-book-open" aria-hidden="true"></i>目標資格</h3>
                <?php $terms = get_the_terms(get_the_ID(), 'target_qualification'); ?>
                <?php if ($terms && !is_wp_error($terms)) : ?>
                    <ul class="c-badge-list c-badge-list--static">
                        <?php foreach ($terms as $term) : ?>
                            <li class="c-badge-item"><?php echo esc_html($term->name); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </section>

        <section>
            <div class="target-qualification-wrap">
                <h3 id="related-course-heading"><i class="fa-solid fa-book-open" aria-hidden="true"></i>関連コース</h3>
                <ul class="c-badge-list c-badge-list--link">
                    <?php
                    $related_courses = get_field('course_related');
                    if ($related_courses) :
                        foreach ($related_courses as $post) : setup_postdata($post); ?>
                            <li class="c-badge-item">
                                <a href="<?php the_permalink(); ?>" class="c-badge-link"><?php the_title(); ?></a>
                            </li>
                    <?php endforeach;
                        wp_reset_postdata();
                    endif; ?>
                </ul>
            </div>
        </section>

        <section aria-labelledby="price-heading">
            <div class="price-wrap">
                <h3 id="price-heading"><i class="fa-solid fa-book-open" aria-hidden="true"></i>料金</h3>
                <div class="price-card">
                    <p class="price-label">受講料</p>
                    <p class="price-amount"><?php echo number_format(get_field("course_fee")); ?><small>円（税込み）</small></p>
                    <p class="price-note">ネット環境があればすぐにはじめられます!</p>
                    <a href="<?php echo home_url('/app_form/?course_id=' . get_the_ID()); ?>" class="btn-apply" target="_blank">お申し込みはこちらへ</a>
                    <?php if (get_field('in_link')): ?>
                        <a href="<?php echo esc_url(get_field('in_link')); ?>" class="btn-free-trial">まずは無料で体験してみる</a>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php if (get_field('out_link')): ?>
            <div class="news-action-bottom">
                <a href="<?php the_field('out_link') ?>" class="btn-apply" target="_blank">本コース視聴はこちらへ</a>
            </div>
        <?php endif; ?>


        <section aria-labelledby="job-heading">
            <div class="growth-job">
                <h3 id="job-heading"><i class="fa-solid fa-book-open" aria-hidden="true"></i>目指せる職業</h3>
                <?php
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
        $column_posts = get_field('course_column');
        if ($column_posts) : ?>
            <section aria-labelledby="column-heading">
                <div class="related-column-wrap">
                    <h3 id="column-heading"><i class="fa-solid fa-book-open" aria-hidden="true"></i>関連コラム</h3>
                    <?php
                    $column_posts = get_field('course_column');
                    if ($column_posts) : ?>
                        <ul class="card-list-class">
                            <?php foreach ($column_posts as $post) : setup_postdata($post); ?>
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
                            <?php endforeach;
                            wp_reset_postdata(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
