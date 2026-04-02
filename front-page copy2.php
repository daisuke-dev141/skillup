<?php

/**
 * Front Page Template
 *
 * 動的セクション（カスタム投稿）:
 *  - course     : コースの紹介
 *  - model_plan : モデルプラン
 *
 * 動的セクション（標準投稿）:
 *  - post                           : 新着情報
 *  - post（カテゴリー: it-plaza）   : IT広場
 *
 * 固定コンテンツ:
 *  - ヒーロースライダー
 *  - 申し込みの流れ
 *  - 企業向けサービス
 *  - QLIPについて
 *
 * FAQ は ACF Options repeater で管理（未導入時は静的フォールバック）
 */

get_header(); ?>

<main>

    <!-- ========== ヒーロースライダー（固定） ========== -->
    <section class="kv">
        <h2 class="catchcopy">未来の選択肢を広げる<br>学びのプラットホーム</h2>
        <div class="swiper kv-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/kv-top-img_01.png'); ?>" alt="スライド画像">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/2.jpg'); ?>" alt="スライド画像">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/3.jpg'); ?>" alt="スライド画像">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/4.jpg'); ?>" alt="スライド画像">
                </div>
            </div>
        </div>
        <div class="overlay"></div>
        <div class="scroll"><span>Scroll</span></div>
    </section>


    <div class="main-wrap">
        <div class="inner">

            <!-- ========== 新着情報（標準投稿） ========== -->
            <section class="news-wrap">
                <h3 class="section-title">
                    <small>News</small>
                    新着情報<span class="scroll-border"></span>
                </h3>

                <?php
                $news_query = new WP_Query([
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                ]);

                if ($news_query->have_posts()) : ?>
                    <div class="binder-wrapper">

                        <?php while ($news_query->have_posts()) : $news_query->the_post();

                            $cat = get_the_category();
                            $cat_slug = $cat[0]->slug ?? '';
                            $cat_name = $cat[0]->name ?? 'お知らせ';

                            // カテゴリーごとにクラス変更（home.phpと統一）
                            $label_class = '';
                            $thumb_class = '';

                            if ($cat_slug === 'new_open') {
                                $label_class = '';
                                $thumb_class = '';
                            } elseif ($cat_slug === 'recruit_info') {
                                $label_class = 'label-orange';
                                $thumb_class = 'thumb-orange';
                            } elseif ($cat_slug === 'others') {
                                $label_class = 'label-green';
                                $thumb_class = 'thumb-green';
                            }
                        ?>

                            <div class="course-container binder-style">
                                <ul class="news-list">
                                    <li class="news-item">
                                        <a class="news-card" href="<?php the_permalink(); ?>">

                                            <!-- サムネ -->
                                            <div class="news-thumb <?php echo esc_attr($thumb_class); ?>">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail('medium'); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/course/kv-course.jpg'); ?>" alt="">
                                                <?php endif; ?>
                                            </div>

                                            <div class="news-content">
                                                <div>
                                                    <span class="card-category-label <?php echo esc_attr($label_class); ?>">
                                                        <?php echo esc_html($cat_name); ?>
                                                    </span>
                                                    <span class="news-tag">
                                                        <?php echo get_the_date('Y.m.d'); ?>
                                                    </span>
                                                </div>

                                                <p class="news-title"><?php the_title(); ?></p>
                                                <p class="news-text">
                                                    <?php echo wp_trim_words(get_the_excerpt(), 30, '…'); ?>
                                                </p>
                                            </div>

                                        </a>
                                    </li>
                                </ul>
                            </div>

                        <?php endwhile;
                        wp_reset_postdata(); ?>

                    </div>
                <?php else : ?>
                    <p>現在、新着情報はありません。</p>
                <?php endif; ?>

                <div class="button-wrap">
                    <a href="<?php echo esc_url(home_url('/news/')); ?>" class="btn whiteblue-btn">新着情報一覧へ</a>
                </div>
            </section>


            <!-- ========== コースの紹介（カスタム投稿: course） ========== -->
            <section class="course-wrap">
                <h3 class="section-title">
                    <small>Introduction</small>
                    コースの紹介<span class="scroll-border"></span>
                </h3>

                <?php
                $course_query = new WP_Query([
                    'post_type'      => 'course',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ]);

                if ($course_query->have_posts()) : ?>
                    <ul class="card-list-class">
                        <?php while ($course_query->have_posts()) : $course_query->the_post();
                        ?>
                            <li class="column-card">
                                <article>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium', ['class' => 'column-card-img', 'alt' => 'courses']); ?>
                                        <?php else : ?>
                                            <img class="column-card-img" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about/qlip_lesson_class.png'); ?>" alt="courses">
                                        <?php endif; ?>
                                        <div class="column-item-text">
                                            <h3 class="course-title"><?php the_title(); ?></h3>
                                            <div class="plan-p">
                                                <p class="plan-desc"><?php echo wp_trim_words(get_the_excerpt(), 60, '…'); ?></p>

                                            </div>
                                        </div>
                                    </a>
                                </article>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </ul>
                <?php else : ?>
                    <p>現在、コース情報はありません。</p>
                <?php endif; ?>

                <div class="button-wrap">
                    <a href="<?php echo esc_url(get_term_link("it_basic", "course_type")); ?>" class="btn bluewhite-btn">コース一覧へ</a>
                </div>
            </section>


            <!-- ========== モデルプランの紹介（カスタム投稿: model_plan） ========== -->
            <section class="plan-wrap">
                <h3 class="section-title">
                    <small>model plan</small>
                    モデルプランの紹介<span class="scroll-border"></span>
                </h3>

                <div class="pc-section">
                    <div class="pc-side">
                        <div class="swiper balloon-swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <p>2年目デザイナーの苦悩<br>デザインもコードも"分かる"人に</p>
                                </div>
                                <div class="swiper-slide">
                                    <p>3年目コーダーの自己投資<br>エンジニア職を目指してキャリアアップ</p>
                                </div>
                                <div class="swiper-slide">
                                    <p>フリーランスで独立<br>言語に縛られないオールマイティな知識を</p>
                                </div>
                                <div class="swiper-slide">
                                    <p>子育ての合間に資格取得<br>未経験主婦のIT業界への挑戦</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pc-left">
                        <div class="pc-mock">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/top/nPC.png" alt="" class="pc-frame">

                            <div class="swiper pc-swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/top/nPC-1.png" alt=""></div>
                                    <div class="swiper-slide"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/top/nPC-2.png" alt=""></div>
                                    <div class="swiper-slide"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/top/nPC-3.png" alt=""></div>
                                    <div class="swiper-slide"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/top/nPC-4.png" alt=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pc-right">
                        <div class="up-wrap">
                            <h4>モデルプランとは？</h4>
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/top/up.jpg" alt="">
                        </div>
                        <div class="text-border-group">
                            <p class="plan-text">いくつかのモデルを想定してそれに合ったコースを紹介しています。</p>
                            <span class="border"></span>
                        </div>
                    </div>
                </div>
                <div class="button-wrap">
                    <a href="<?php echo esc_url(home_url('/model-plan/')); ?>" class="btn whiteblue-btn">モデルプラン一覧へ</a>
                </div>
            </section>


            <!-- ========== 申し込みの流れ（固定コンテンツ） ========== -->
            <section class="application-wrap">
                <h3 class="section-title">
                    <small>application</small>
                    申し込みの流れ<span class="scroll-border"></span>
                </h3>

                <div class="flow-steps">
                    <div class="flow-step">
                        <div class="step-number">1</div>
                        <h4>お問い合わせ</h4>
                        <p>内容<br>⇓<br>フォームから送信<br>⇓<br>希望のコースを選択</p>
                    </div>
                    <div class="arrow">→</div>
                    <div class="flow-step">
                        <div class="step-number">2</div>
                        <h4>QLIPからの提案</h4>
                        <p>オンライン or 電話<br>⇓<br>レベル確認<br>⇓<br>最適プラン提案</p>
                    </div>
                    <div class="arrow">→</div>
                    <div class="flow-step">
                        <div class="step-number">3</div>
                        <h4>講座の決定</h4>
                        <p>プラン選択<br>⇓<br>お支払い<br>⇓<br>アカウント発行</p>
                    </div>
                    <div class="arrow">→</div>
                    <div class="flow-step">
                        <div class="step-number">4</div>
                        <h4>受講開始</h4>
                        <p>ログイン<br>⇓<br>動画視聴（オンデマンド）<br>⇓<br>実践課題（テスト）</p>
                    </div>
                </div>

                <div class="button-wrap">
                    <?php $application_page = get_page_by_path('application'); ?>
                    <a href="<?php echo esc_url(home_url('/application/')); ?>" class="orange-button">詳しくはこちら</a>
                </div>
            </section>


            <!-- ========== 企業向けサービス（固定コンテンツ） ========== -->
            <section class="it-servise-wrap">
                <h3 class="section-title">
                    <small>IT servise</small>
                    企業向けサービス<span class="scroll-border"></span>
                </h3>
                <div class="img-wrap">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/it-servise/it-servise_banner.jpg'); ?>" alt="">
                    <div class="it-button-wrap">
                        <?php $it_page = get_page_by_path('it-servise'); ?>
                        <a href="<?php echo esc_url(home_url('/company/')); ?>" class="it-button">こちらをクリック</a>
                    </div>
                </div>
            </section>


            <!-- ========== QLIPについて（固定コンテンツ） ========== -->
            <section class="about-wrap">
                <h3 class="section-title">
                    <small>about</small>
                    QLIPについて<span class="scroll-border"></span>
                </h3>
                <div class="left-column">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about/qlip_school_img.png'); ?>" alt="クリッププログラミングスクールのロゴ">
                </div>
                <div class="right-column">
                    <h4>クリッププログラミングスクールは、四国初の本格IT教育施設です。</h4>
                    <p>厚労省認定の職業訓練(約6ヶ月)、小1〜高3向けキッズコース、一般向けスキルアップの3スタイルを提供。WEB制作・デザイン、Office、アプリ開発など多様なIT技術を習得でき、デジタル人材育成科の新設や無料体験会、就職支援も展開し、地域の学びを支えています。</p>
                </div>
                <div class="button-wrap">
                    <?php $about_page = get_page_by_path('about'); ?>
                    <a href="<?php echo esc_url(home_url('/qlip/')); ?>" class="btn whiteblue-btn">詳細ページへ</a>
                </div>
            </section>


            <!-- ========== IT広場（標準投稿 / カテゴリー: it-plaza） ========== -->
            <section class="column-wrap">
                <h3 class="section-title">
                    <small>about</small>
                    IT広場<span class="scroll-border"></span>
                </h3>

                <!-- <div class="section-title">
                    <div class="column-heading">
                        <div class="taxonomy-pot">
                            <div class="leaf"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/column/seed-leaf.png'); ?>" alt=""></div>
                            <div class="pot"></div>
                        </div>
                        <div class="taxonomy-pot">
                            <div class="leaf"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/column/seed-leaf.png'); ?>" alt=""></div>
                            <div class="pot"></div>
                        </div>
                    </div>
                </div> -->

                <?php
                $column_query = new WP_Query([
                    'post_type'      => 'column',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                ]);

                if ($column_query->have_posts()) : ?>
                    <div class="related-column-wrap">
                        <ul class="card-list-class">

                            <?php while ($column_query->have_posts()) : $column_query->the_post();

                                // タクソノミー取得
                                $terms = get_the_terms(get_the_ID(), 'column_type');
                                $term_name = '';

                                if (!empty($terms) && !is_wp_error($terms)) {
                                    $term_name = $terms[0]->name; // 1つ目を表示
                                }
                            ?>

                                <li class="column-card">
                                    <article>
                                        <a href="<?php the_permalink(); ?>">

                                            <!-- アイキャッチ -->
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium', ['class' => 'column-card-img']); ?>
                                            <?php else : ?>
                                                <img class="column-card-img" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/o-summary-woman-1.png'); ?>" alt="">
                                            <?php endif; ?>

                                            <div class="column-item-text">
                                                <time class="column-date" datetime="<?php echo get_the_date('c'); ?>"><?php the_time('Y.m.d'); ?>>
                                                    <?php echo get_the_date('Y.m.d'); ?>
                                                </time>

                                                <h3 class="column-title">
                                                    <?php the_title(); ?>
                                                </h3>

                                                <p class="column-desc">
                                                    <?php echo wp_trim_words(get_the_excerpt(), 30, '…'); ?>
                                                </p>

                                                <?php if ($term_name) : ?>
                                                    <span class="column-category">
                                                        <?php echo esc_html($term_name); ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                        </a>
                                    </article>
                                </li>

                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </ul>
                    <?php else : ?>
                        <p>現在、IT広場の記事はありません。</p>
                    <?php endif; ?>
                    <div class="button-wrap">
                        <a href="<?php echo esc_url(home_url('/column/')); ?>" class="column-button">一覧ページへ</a>
                    </div>
                    </div>

            </section>

            <!-- ========== FAQ（ACF Options repeater / 静的フォールバック） ========== -->
            <section class="faq-wrap">
                <!-- FAQ -->

                <h3 class="section-title">
                    <small>FAQ</small>
                    よくある質問<span class="scroll-border"></span>
                </h3>

                <!-- アコーディオンエリア -->
                <ul>
                    <?php
                    $faq_query = new WP_Query([
                        'post_type'      => 'faq',
                        'post__in'       => [56, 59, 62], // ← 表示したい投稿ID
                        'orderby'        => 'post__in',   // 指定順を維持
                        'posts_per_page' => 3,
                        'post_status'    => 'publish',
                    ]);

                    if ($faq_query->have_posts()) :
                        while ($faq_query->have_posts()) :
                            $faq_query->the_post();
                    ?>
                            <li class="accordion-area">
                                <details class="common-accordion">
                                    <summary>Q.<?php the_title(); ?></summary>
                                    <div class="accordion-answer">
                                        <p>A.<?php the_content(); ?></p>
                                    </div>
                                </details>
                            </li>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </ul>

                <div class="button-column">
                    <div class="button-wrap">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="orange-button">
                            お問い合わせ
                        </a>
                    </div>
                    <div class="button-wrap">
                        <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="btn bluewhite-btn">
                            FAQへ
                        </a>
                    </div>
                </div>
            </section>

        </div><!-- /.inner -->
    </div><!-- /.main-wrap -->

</main>

<?php get_footer(); ?>
