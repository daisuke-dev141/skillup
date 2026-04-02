<?php get_header(); ?>

<!-- ========== メインコンテンツ ========== -->
<main class="about-main">
    <div class="inner">
        <section class="content-wrap">
            <div class="hero-banner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
                <div class="hero-text">
                    <span>about</span>
                    <h2>訓練校について</h2>
                </div>
            </div>
        </section>

        <section>
            <div class="c-text">
                <h3>あなたの「学びたい」が見つかる場所。</h3>
            </div>

            <div class="about-wrap">
                <!-- QLIPについて -->
                <div class="left-column">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/qlip_school_img.png" alt="クリッププログラミングスクールのロゴ">
                </div>
                <div class="right-column">
                    <p>クリッププログラミングスクールは、四国初の本格IT教育施設です。</p>

                    <p>厚労省認定の職業訓練(約6ヶ月)、小1〜高3向けキッズコース、一般向け、
                        スキルアップの3スタイルを提供。Web制作・デザイン、Office、アプリ開発など多様なIT技術を習得でき、デジタル人材育成科の新設や無料体験会、就職支援も展開し、地域の学びを支えています。</p>
                </div>
            </div>
        </section>

        <section>
            <!-- 関連コラム -->
            <div class="related-column-wrap">
                <h3 class="section-title area">主な事業・サービス</h3>
                <ul class="card-list-class">
                    <li class="column-card">
                        <a href="https://qlip-programming.com/jobtrain/" target="_blank">
                            <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/qlip_lesson_class.png" alt="courses">

                            <div class="column-item-text">

                                <h3 class="column-title">職業訓練</h3>
                                <div class="plan-p">
                                    <p class="plan-desc">現在、求職中の方を対象とした、厚生労働大臣の認定を受けた職業訓練の平均６ヶ月前後のカリキュラムコースです。</p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="column-card">
                        <a href="https://qlip-programming.com/qliplab/" target="_blank">
                            <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/qlip_kids_class..png" alt="courses">

                            <div class="column-item-text">

                                <h3 class="column-title">クリップラボ</h3>
                                <div class="plan-p">
                                    <p class="plan-desc">はじめてのプログラミング教育を理念に、小学校１年生から中学校３年生程度を対象としたカリキュラムコースです。</p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="column-card">
                        <a href="<?php echo esc_url(home_url('/company/')); ?>" target="_blank">
                            <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/qlip_skillup_class..png" alt="courses">

                            <div class="column-item-text">

                                <h3 class="column-title area">企業向けサービス</h3>
                                <div class="plan-p">
                                    <p class="plan-desc">プログラミングをはじめとするITスキルを身につけたい方、みがきたい方を対象とした一般カリキュラムコースです。</p>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </section>

        <section>
            <div class="related-column-wrap we-wrap">
                <!-- 流れる背景文字 -->
                <div class="flow-bg">
                    <div class="flow-inner">
                        <span>QLiP PROGRAMMING SCHOOL</span>
                        <span>QLiP PROGRAMMING SCHOOL</span>
                    </div>
                </div>
                <h3 class="section-title we-title area">私たちの想い</h3>
                <div class="we-p">
                    <!-- <h3>あなたの「学びたい」が見つかる場所。</h3> -->
                    <p>受講生一人ひとりの目的やレベルに寄り添い、学びを形にするITスクールです。<br>
                        四国初の本格IT教育施設として、徳島からプログラミングやデザインなどの専門スキルを学べる環境を提供しています。求職者向け職業訓練、キッズ・学生向け教育、一般向けスキルアップなど、ライフスタイルに合わせた多様な受講スタイルを用意しています。<br>
                        キッズクラスでは「はじめてのプログラミング教育」を大切にし、子どもたちの学びの第一歩を支えています。</p>
                </div>
            </div>
        </section>

        <section>
            <!-- 講師の紹介 -->
            <div class="related-column-wrap teacher-wrap">
                <h3 class="section-title teacher-title area">先生の紹介</h3>
                <ul class="card-list-class">
                    <li class="column-card">
                        <div class="card-inner">
                            <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/hukusima.jpg" alt="courses">
                            <div class="column-item-text">

                                <h3 class="column-title">福島先生</h3>
                                <div class="plan-p">
                                    <p class="plan-desc">担当科目：主に、Web関連各種講座において、CMSによるWebサイトの構築演習（WordPress）、LaravelによるWebアプリ作成、Webマーケティング概論、システム開発の品質管理、 Web制作の企画・設計、Web制作実習、制作プレゼンテーションを担当しています。</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="column-card">
                        <div class="card-inner">
                            <!-- 左カラム：画像＋ボタン -->
                            <div class="img-wrap">
                                <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/urashima_front2.jpg" alt="courses">
                                <a href="<?php echo esc_url(get_permalink(436)); ?>" target="_blank" class="interview-btn">
                                    <p>インタビューへ⇒</p>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/23591819.png" alt="">
                                </a>
                            </div>

                            <!-- 右カラム：テキスト -->
                            <div class="column-item-text">
                                <h3 class="column-title">浦島先生</h3>
                                <div class="plan-p">
                                    <p class="plan-desc">担当科目：HTML&CSS、JavaScript、PHP、WordPress、Javaです。</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="column-card">
                        <div class="card-inner">

                            <div class="img-wrap">
                                <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/sakurai.jpg" alt="courses">

                                <a href="<?php echo esc_url(get_permalink(684)); ?>" target="_blank" class="interview-btn">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/23591819.png" alt="">
                                    <p>インタビューへ⇒</p>
                                </a>
                            </div>

                            <div class="column-item-text">

                                <h3 class="column-title">櫻井先生</h3>
                                <div class="plan-p">
                                    <p class="plan-desc">担当科目：Word、Excel、PowerPoint、マクロ、Access、情報技術概論、HTML＆CSSです。</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="column-card">
                        <div class="card-inner">

                            <div class="img-wrap">
                                <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/qlip_skillup_class..png" alt="courses">

                                <a href="<?php echo esc_url(get_permalink(948)); ?>" target="_blank" class="interview-btn">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/23591819.png" alt="">
                                    <p>インタビューへ⇒</p>
                                </a>
                            </div>

                            <div class="column-item-text">

                                <h3 class="column-title">江本先生</h3>
                                <div class="plan-p">
                                    <p class="plan-desc">担当科目：カリキュラム全般を担当していますが、主にHTML・CSS・JavaScriptと就職支援が多いです。</p>
                                </div>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>

        </section>


    </div>
</main>
<!-- ========== フッター ========== -->
<?php get_footer(); ?>