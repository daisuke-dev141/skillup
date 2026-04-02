<!-- header.phpを読み込み -->
<?php get_header(); ?>

<main>
    <div class="inner">
        <section class="content-wrap">
            <div class="hero-banner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
                <div class="hero-text">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'column_type');

                    if ($terms) {
                        echo '<span>column-' . $terms[0]->slug . '</span>';
                    }
                    ?>
                    <h2>IT広場-<?php the_terms(get_the_ID(), 'column_type'); ?></h2>
                </div>
            </div>
        </section>
        <?php if (have_posts()): ?>

        <?php while (have_posts()): ?>
        <?php the_post(); ?>




        <!-- アンケート -->
        <?php if (has_term(['interview', 'enquete'], 'column_type')): ?>

        <section>
            <div class="reasons-section">
                <h3 class="detail-title">
                                <?php the_title(); ?>
                            </h3>
            </div>
            <div class="article-meta">
                <div class="article-company-info">
                    <?php
                                $terms = get_the_terms(get_the_ID(), 'column_type');

                                if ($terms && !is_wp_error($terms)) :
                                    foreach ($terms as $term) :
                                ?>
                    <a class="company-tag" href="<?php echo esc_url(get_term_link($term)); ?>">
                        <?php echo esc_html($term->name); ?>
                    </a>
                    <?php
                                    endforeach;
                                endif;
                                ?>

                    <time class="article-date" datetime="<?php echo get_the_date('c'); ?>">
                        <?php echo get_the_date('Y.m.d'); ?>
                    </time>
                </div>
            </div>

            <div class="article-eyecatch">
                <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium', ['class' => 'article-eyecatch-img']);
                            }
                            ?>
            </div>


        </section>

        <article>
            <div class="content-area">
                <?php the_content(); ?>
            </div>
        </article>


        <!-- IT基礎知識 -->
        <?php elseif (has_term('it_knowledge', 'column_type')): ?>

        <section>
            <div class="reasons-section">
                <h3 class="detail-title">
                                <?php the_title(); ?>
                            </h3>
            </div>


            <div class="article-meta">
                <div class="article-company-info">
                    <?php
                                $terms = get_the_terms(get_the_ID(), 'column_type');

                                if ($terms && !is_wp_error($terms)) :
                                    foreach ($terms as $term) :
                                ?>
                    <a class="company-tag" href="<?php echo esc_url(get_term_link($term)); ?>">
                        <?php echo esc_html($term->name); ?>
                    </a>
                    <?php
                                    endforeach;
                                endif;
                                ?>

                    <time class="article-date" datetime="<?php echo get_the_date('c'); ?>">
                        <?php echo get_the_date('Y.m.d'); ?>
                    </time>
                </div>
            </div>
            <div class="article-eyecatch">
                <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('medium', ['class' => 'article-eyecatch-img']);
                            }
                            ?>
            </div>
        </section>

        <article>
            <div class="content-area">
                <?php the_content(); ?>
            </div>
        </article>

        <!-- その他 -->
        <?php elseif (has_term('column_others', 'column_type')): ?>
        <section>
            <div class="reasons-section">
                <h3 class="detail-title">
                                <?php the_title(); ?>
                            </h3>
            </div>
            <div class="article-company-info">
                <?php
                            $terms = get_the_terms(get_the_ID(), 'column_type');

                            if ($terms && !is_wp_error($terms)) :
                                foreach ($terms as $term) :
                            ?>
                <a class="company-tag" href="<?php echo esc_url(get_term_link($term)); ?>">
                    <?php echo esc_html($term->name); ?>
                </a>
                <?php
                                endforeach;
                            endif;
                            ?>

                <time class="article-date" datetime="<?php echo get_the_date('c'); ?>">
                    <?php echo get_the_date('Y.m.d'); ?>
                </time>
            </div>
        </section>

        <article>
            <div class="content-area">
                <?php the_content(); ?>
            </div>
        </article>

        <?php endif; ?>

        <?php endwhile; ?>

        <?php endif; ?>
        <nav class="news-navigation" aria-label="前後のお知らせ">
            <div class="nav-links-simple">
                <div class="nav-prev">
                    <?php previous_post_link('%link', '前へ'); ?>
                </div>

                <a href="<?php echo esc_url(home_url('/column/')); ?>" class="nav-all">一覧へ</a>

                <div class="nav-next">
                    <?php next_post_link('%link', '次へ'); ?>
                </div>
            </div>
        </nav>
    </div>
</main>
<!-- ========== フッター ========== -->
<!-- footer.phpを読み込み -->
<?php get_footer(); ?>