<?php get_header(); ?>


<main>

    <section class="kv">
        <!-- キャッチコピー -->
        <h2 class="catchcopy">
            未来の選択肢を広げる<br>
            学びのプラットフォーム</h2>

        <!-- ★ Swiper本体だけにswiperクラスを付ける -->
        <div class="swiper kv-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/kv.png" alt="" class="kv-pc">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/sp-kv.png" alt="" class="kv-sp">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/kv-top-img-02.png" alt="" class="kv-pc">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/sp-kv2.jpg" alt="" class="kv-sp">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/kv-top-img-03.png" alt="" class="kv-pc">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/sp-kv3.jpg" alt="" class="kv-sp">
                </div>
                <div class="swiper-slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/kv-top-img-04.png" alt="" class="kv-pc">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/sp-kv4.jpg" alt="" class="kv-sp">
                </div>
            </div>
        </div>
    </section>

    <div class="main-wrap">
        <div class="inner">


            <!-- 新着情報 -->
            <section class="news-wrap">
                <h2 class="section-title">
                    <small>News</small>
                    新着情報<span class="scroll-border"></span>
                </h2>

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

                                                <h3 class="news-title"><?php the_title(); ?></h3>
                                                <p class="news-text">
                                                    <?php echo wp_trim_words(get_the_excerpt(), 100, '…'); ?>
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
                    <a href="<?php echo esc_url(home_url('/news/')); ?>" class="blue-btn">新着情報一覧へ</a>
                </div>
            </section>

            <!-- IT広場 -->
            <section class="column-wrap">
                <h2 class="section-title">
                    <small>column</small>

                    <span class="column-heading">
                        <span class="taxonomy-pot">
                            <span class="leaf">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/column/seed-leaf.png" alt="">
                            </span>
                            <span class="pot"></span>
                        </span>

                        IT広場

                        <span class="taxonomy-pot">
                            <span class="leaf">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/column/seed-leaf.png" alt="">
                            </span>
                            <span class="pot"></span>
                        </span>
                    </span>
                </h2>
                <!-- 最新コラム３つ -->

                <?php
                $column_query = new WP_Query([
                    'post_type'      => 'column',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                ]);

                if ($column_query->have_posts()) : ?>
                    <div class="related-column-wrap">
                        <ul class="card-list-class">

                            <?php while ($column_query->have_posts()) : $column_query->the_post(); ?>

                                <?php get_template_part('template-parts/column-card'); ?>

                            <?php endwhile;
                            wp_reset_postdata(); ?>

                        </ul>

                    <?php else : ?>
                        <p>現在、IT広場の記事はありません。</p>
                    <?php endif; ?>
                    <div class="button-wrap">
                        <a href="<?php echo esc_url(home_url('/column/')); ?>" class="brown-btn">一覧ページへ</a>
                    </div>
                    </div>

            </section>

            <!-- モデルプラン -->
            <section class="plan-wrap">
                <!-- モデルプランの紹介 -->
                <h2 class="section-title">
                    <small>model plan</small>
                    モデルプランの紹介
                </h2>

                <div class="pc-section">
                    <div class="pc-side">
                        <!-- 吹き出しスライダー -->
                        <div class="swiper balloon-swiper">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <p>デザインとコードの両立を目指す
                                    </p>
                                </div>
                                <!-- <div class="swiper-slide">
                                    <p>SEキャリアアップ</p>
                                </div>
                                <div class="swiper-slide">
                                    <p>フリーランスで独立</p>
                                </div>
                                <div class="swiper-slide">
                                    <p>子育ての合間に資格取得</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="pc-left">
                        <div class="pc-mock">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/pc-frame.png" alt="" class="pc-frame">

                            <!-- 画像スライダー -->
                            <div class="swiper pc-swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/pc1.png" alt=""></div>
                                    <!-- <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/pc2.png" alt=""></div>
                                    <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/pc3.png" alt=""></div>
                                    <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/pc4.png" alt=""></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 右：テキスト -->
                    <div class="pc-right">
                        <div class="up-wrap">
                            <h3>モデルプランとは？</h3>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/up.jpg" alt="">
                        </div>
                        <p class="plan-text">いくつかのモデルを想定してそれに合ったコースを紹介しています。</p>
                    </div>
                </div>
                <div class="button-wrap">
                    <a href="<?php echo esc_url(home_url('/modelplan/')); ?>" class="blue-btn">モデルプラン一覧へ</a>
                </div>
            </section>

            <!-- コースの紹介 -->
            <section class="course-wrap">
                <h2 class="section-title">
                    <small>Introduction</small>
                    コースの紹介
                </h2>

                <?php
                $course_query = new WP_Query([
                    'post_type'      => 'course',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                    'orderby'        => 'rand'
                ]);

                if ($course_query->have_posts()) : ?>
                    <ul class="course-list-class">
                        <?php while ($course_query->have_posts()) : $course_query->the_post();
                        ?>
                            <li class="course-card">

                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium', ['class' => 'course-card-img', 'alt' => 'courses']); ?>
                                    <?php else : ?>
                                        <img class="course-card-img" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about/qlip_lesson_class.png'); ?>" alt="courses">
                                    <?php endif; ?>
                                    <div class="course-item-text">
                                        <h3 class="course-title"><?php the_title(); ?></h3>
                                        <div class="plan-p">
                                            <p class="plan-desc"><?php the_excerpt(); ?></p>

                                        </div>
                                    </div>
                                </a>

                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </ul>
                <?php else : ?>
                    <p>現在、コース情報はありません。</p>
                <?php endif; ?>

                <div class="button-wrap">
                    <a href="<?php echo esc_url(get_term_link("it_basic", "course_type")); ?>" class="blue-btn">コース一覧へ</a>
                </div>
            </section>








            <!-- 申し込みの流れ -->
            <section class="application-wrap">
                <h2 class="section-title">
                    <small>application</small>
                    お申し込みの流れ
                </h2>

                <div class="flow-steps">
                    <div class="flow-step">
                        <div class="step-number">Step 1</div>
                        <div class="step-text">
                            <div class="sp-inline">
                                <h3>コースの選定</h3>
                                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/step1.png" alt="" class="sp-img"> -->
                            </div>
                            <p>各コースの詳細を確認→受講コースの確定。</p>
                        </div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/step1.png" alt="" class="pc-img">
                    </div>

                    <div class="arrow"></div>

                    <div class="flow-step">
                        <div class="step-number">Step 2</div>
                        <div class="step-text">
                            <div class="sp-inline">
                                <h3>受講申し込み</h3>
                                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/step2.png" alt="" class="sp-img"> -->
                            </div>
                            <p>申込内容の入力→確定して送信。</p>
                        </div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/step2.png" alt="" class="pc-img">
                    </div>
                    <div class="arrow"></div>

                    <div class="flow-step">
                        <div class="step-number">Step 3</div>
                        <div class="step-text">
                            <div class="sp-inline">
                                <h3>授業料の振り込み</h3>
                                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/step3.png" alt="" class="sp-img"> -->
                            </div>
                            <p>振込情報を取得し、料金を振り込む。</p>
                        </div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/step3.png" alt="" class="pc-img">
                    </div>

                    <div class="arrow"></div>

                    <div class="flow-step">
                        <div class="step-number">Step 4</div>
                        <div class="step-text">
                            <div class="sp-inline">
                                <h3>アカウントの取得</h3>
                                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/step4.png" alt="" class="sp-img"> -->
                            </div>
                            <p>ログイン情報と授業用アカウントを発行。</p>
                        </div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/step4.png" alt="" class="pc-img">
                    </div>

                    <div class="arrow"></div>

                    <div class="flow-step">
                        <div class="step-number">Step 5</div>
                        <div class="step-text">
                            <div class="sp-inline">
                                <h3>受講開始</h3>
                                <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/step5.png" alt="" class="sp-img"> -->
                            </div>
                            <p>カリキュラムに沿って受講開始。</p>
                        </div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/top/step5.png" alt="" class="pc-img">
                    </div>
                </div>
                <div class="button-wrap">
                    <a href="<?php echo esc_url(home_url('/flow/')); ?>" class="orange-btn">詳しくはこちらへ</a>
                </div>
            </section>



            <!-- QLIPについて -->
            <!-- <section class="about-wrap">
                    <h2 class="section-title">
                        <small>about</small>
                        QLIPについて
                    </h2>
                    <div class="left-column">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/about/qlip_school_img.png" alt="クリッププログラミングスクールのロゴ">
                    </div>
                    <div class="right-column">
                        <h4>クリッププログラミングスクールは、四国初の本格IT教育施設です。</h4>

                        <p>厚労省認定の職業訓練(約6ヶ月)、小1〜高3向けキッズコース、一般向け
                        スキルアップの3スタイルを提供。WEB制作・デザイン、Office、アプリ開発など多様なIT技術を習得でき、デジタル人材育成科の新設や無料体験会、就職支援も展開し、地域の学びを支えています。</p>
                    </div>
                    <div class="button-wrap">
                        <a href="" class="btn whiteblue-btn">詳細ページへ</a>
                    </div>
                </section> -->



            <!-- 企業向けサービス -->
            <section class="it-servise-wrap">
                <h2 class="section-title">
                    <small>IT servise</small>
                    企業向けサービス
                </h2>
                <div class="it-servise-bg">
                    <p>法人向け</p>
                    <div class="it-servise-text">
                        <div class="balloon">
                            <p>企業が<strong class="employee">社員教育</strong>に</p>
                        </div>
                        <p><strong class="skillip">スキリップ</strong>を</p>
                        <p><strong class="merit">活用するメリット</strong>は？</p>
                        <p>実績と選ばれる理由をくわしく説明！</p>
                    </div>
                    <div class="button-wrap">
                        <a href="<?php echo esc_url(home_url('/company/')); ?>" class="blue-btn">詳しくはこちらへ</a>
                    </div>
                </div>
            </section>

            <!-- FAQ -->
            <!-- <section class="faq-wrap">
                <h2 class="section-title">
                    <small>FAQ</small>
                    よくある質問
                </h2>

                <ul>
                    <?php
                    $faq_query = new WP_Query([
                        'post_type'      => 'faq',
                        'post__in'       => [56, 59, 493],
                        'orderby'        => 'post__in',
                        'posts_per_page' => 3,
                        'post_status'    => 'publish',
                    ]);

                    if ($faq_query->have_posts()) :
                        while ($faq_query->have_posts()) :
                            $faq_query->the_post();
                    ?>
                    <?php get_template_part('template-parts/faq-accordion'); ?>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                </ul>
                <div class="button-column">
                    <div class="button-wrap">
                        <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="blue-btn">FAQへ</a>
                    </div>
                    <div class="button-wrap">
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="orange-btn">お問い合わせへ</a>
                    </div>
                </div>

            </section> -->
        </div>
    </div>
</main>

<?php get_footer(); ?>
