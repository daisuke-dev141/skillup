<?php get_header(); ?>

<main class="plan-list-main">
    <div class="inner">
        <!-- main-innerを削除しinnerに統一 -->

        <section class="content-wrap">
            <!-- ページタイトル等のセクション -->
            <div class="hero-banner">
                <img src="<?php echo esc_url(get_theme_file_uri('assets/images/course/kv-course.jpg')); ?>" alt="コースイメージ">
                <div class="hero-text">
                    <span>modelplan</span>
                    <h2>モデルプラン</h2>
                </div>
            </div>

        </section>

        <section>
            <div class="c-text">
                <p>モデルプランとは・・・</p>
                <small>いくつかのモデルを想定してそれに合ったコースの学習ステップを紹介しています。</small>
            </div>
            <!-- 見出しとしての「SEO対策」 -->


            <div class="related-column-wrap">
                <ul class="card-list-class">


                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post();

                        ?>
                            <!-- カード1 -->
                            <li class="column-card">
                                <article>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>

                                            <?php the_post_thumbnail(
                                                'medium',
                                                array(
                                                    'class' => 'column-card-img'
                                                )
                                            ); ?>

                                        <?php else : ?>

                                            <img class="column-card-img" src="<?php echo esc_url(get_theme_file_uri('assets/images/common/no-image.jpg')); ?>" alt="No Image">

                                        <?php endif; ?>
                                        <div class="column-item-text">
                                            <h3 class="column-title"><?php the_title(); ?></h3>
                                            <div class="dashed-line"></div>
                                            <div class="plan-p">
                                                <p class="plan-desc"><?php echo get_the_excerpt(); ?></p>
                                                <div class="plan-prof">
                                                    <p><?php echo get_field("model_profile"); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </li>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p>投稿が見つかりませんでした。</p>
                    <?php endif; ?>


                </ul>
            </div>
        </section>
        <div class="pagination">
            <?php if (function_exists('wp_pagenavi')) : ?>
                <?php wp_pagenavi(); ?>
            <?php endif; ?>
        </div>
    </div>
</main>


<?php get_footer(); ?>
