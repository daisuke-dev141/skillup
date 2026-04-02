<!-- header.phpを読み込み -->
<?php get_header(); ?>

<section class="content-wrap">
    <div class="hero-banner">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
        <div class="hero-text">
            <?php
            $terms = get_the_terms(get_the_ID(), 'category');

            if ($terms) {
                echo '<span>news-' . $terms[0]->slug . '</span>';
            }
            ?>
            <h2>新着情報-<?php the_terms(get_the_ID(), 'category'); ?></h2>
        </div>
    </div>
</section>

<?php if (have_posts()): ?>
<?php while (have_posts()): ?>
<?php the_post(); ?>
<div class="inner">
    <section>
        <div class="news-detail">
            <div class="news-header-area">

                <div class="news-title-capsule">
                    <h3 class="news-subject"><?php the_title(); ?></h3>
                </div>
                <div class="news-meta">
                    <time datetime="<?php echo get_the_date('c'); ?>" class="date"><?php the_time('Y.m.d'); ?></time>
                    <span class="category-label"><?php the_terms(get_the_ID(), 'category'); ?></span>
                </div>

            </div>

            <div class="content-wrap content-area">
                <?php if (has_post_thumbnail()): ?>
                <figure class="news-main-visual">
                    <?php the_post_thumbnail(); ?>
                </figure>
                <?php endif; ?>

                <?php the_content(); ?>

                <?php if (has_term('recruit_info', 'category')): ?>
                <!-- 申し込み情報 -->

                <h4 class="content-subtitle">応募情報</h4>
                <div class="course-info-wrap">
                    <table class="course-info-table">
                        <?php if (get_field('post_term_start') && get_field('post_term_end')): ?>
                        <tr>
                            <th>
                                <i class="fa-regular fa-calendar" aria-hidden="true"></i>募集期間
                            </th>
                            <td><?php the_field('post_term_start') ?>～<?php the_field('post_term_end') ?>まで</td>
                        </tr>
                        <?php endif; ?>
                        <?php if (get_field('post_count')): ?>
                        <tr>
                            <th>
                                <i class="fa-solid fa-user-plus" aria-hidden="true"></i>定員数
                            </th>
                            <td><?php the_field('post_count') ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (get_field('post_course_start') && get_field('post_course_end')): ?>
                        <tr>
                            <th>
                                <i class="fa-solid fa-hourglass-start" aria-hidden="true"></i>受講期間
                            </th>
                            <td><?php the_field('post_course_start') ?>～<?php the_field('post_course_end') ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (get_field('post_access')): ?>
                        <tr>
                            <th>
                                <i class="fa-solid fa-laptop-code" aria-hidden="true"></i>
                                受講スタイル
                            </th>
                            <td><?php the_field('post_access') ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (get_field('post_time')): ?>
                        <tr>
                            <th>
                                <i class="fa-solid fa-clock" aria-hidden="true"></i>受講時間
                            </th>
                            <td><?php the_field('post_time') ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (get_field('post_target')): ?>
                        <tr>
                            <th>
                                <i class="fa-solid fa-graduation-cap" aria-hidden="true"></i>
                                対象者の条件
                            </th>
                            <td><?php the_field('post_target') ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (get_field('post_fee')): ?>
                        <tr>
                            <th>
                                <i class="fa-solid fa-credit-card" aria-hidden="true"></i>
                                受講料
                            </th>
                            <td><?php the_field('post_fee') ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (get_field('post_teacher')): ?>
                        <tr>
                            <th>
                                <i class="fa-solid fa-person-chalkboard" aria-hidden="true"></i>
                                担当講師
                            </th>
                            <td><?php the_field('post_teacher') ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (get_field('post_pdf')): ?>
                        <tr>
                            <th>
                                <i class="fa-solid fa-file-pdf" aria-hidden="true"></i>コース紹介PDF
                            </th>
                            <td>
                                <a href="<?php the_field('post_pdf') ?>" target="_blank" class="blue-underline">紹介PDF</a>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php if (get_field('post_note')): ?>
                        <tr>
                            <th>
                                <i class="fa-solid fa-person-chalkboard" aria-hidden="true"></i>
                                備考欄
                            </th>
                            <td><?php the_field('post_note') ?></td>
                        </tr>
                        <?php endif; ?>
                    </table>
                </div>

                <?php endif; ?>
                <?php if (get_field('in_link')): ?>
                <div class="news-action-bottom">
                    <a href="<?php the_field('in_link') ?>" class="btn-apply" target="_blank">詳細はこちらへ</a>
                </div>
                <?php endif; ?>
            </div>


            <nav class="news-navigation" aria-label="前後のお知らせ">
                <div class="nav-links-simple">
                    <div class="nav-prev">
                        <?php previous_post_link('%link', '前へ'); ?>
                    </div>

                    <a href="<?php echo esc_url(home_url('/news/')); ?>" class="nav-all">一覧へ</a>

                    <div class="nav-next">
                        <?php next_post_link('%link', '次へ'); ?>
                    </div>
                </div>
            </nav>
        </div>
    </section>
</div>

<?php endwhile; ?>
<?php endif; ?>


<!-- ========== フッター ========== -->
<!-- footer.phpを読み込み -->
<?php get_footer(); ?>