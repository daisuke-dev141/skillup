<?php get_header(); ?>

<main class="plan-list-main">
    <div class="inner">
        <div class="main-inner">
            <!-- トップに戻るアンカー -->
            <div id="TOP"></div>

            <section class="content-wrap">
                <h2 class="visually-hidden">SEO対策</h2>
                <div class="hero-banner">
                    <img src="../assets/images/course/kv-course.jpg" alt="コースイメージ">
                    <div class="hero-text">
                        <!-- <span class="page-title-label">[コース紹介]</span> -->
                        <h2 class="page-title">モデルプラン一覧</h2>
                    </div>
                </div>
                <div class="c-text">
                    <p>モデルプランとは・・・</p>
                    <small>いくつかのモデルを想定してそれに合ったコースを紹介しています。</small>
                </div>
            </section>

            <section>
                <h2 class="visually-hidden">SEO対策</h2>
                <!-- 関連コラム -->
                <div class="related-column-wrap">
                    <ul class="card-list-class">

                        <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post();
                                // カスタムフィールドの取得（ACFのフィールド名に合わせて変更してください）

                                // アイキャッチ画像の取得（なければデフォルト画像）
                                $img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                                if (!$img_url) {
                                    $img_url = get_template_directory_uri() . '/assets/images/common/no-image.png';
                                }
                            ?>

                        <li class="colum-card">
                            <article>
                                <h2 class="visually-hidden">SEO対策</h2>

                                <a href="<?php the_permalink(); ?>">
                                    <img class="colum-card-img" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title(); ?>">

                                    <div class="colum-item-text">
                                        <h3 class="column-title"><?php the_title(); ?></h3>

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

        </div>
    </div>
</main>


<?php get_footer(); ?>
