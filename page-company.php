<?php get_header(); ?>


<!-- コンテンツ全体を囲むため -->
<main class="main-content page-main">
    <div class="inner">
        <section class="content-wrap">
            <div class="hero-banner">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="コースイメージ">
                <div class="hero-text">
                    <span>service_for_company</span>
                    <h2>企業向けサービス</h2>
                </div>
            </div>
        </section>
        <div class="content-area">
            <section class="reasons-section">
                <h3>QLIPが選ばれる理由</h3>

                <div class="reasons-container">

                    <h4 class="reason-subtitle">
                        <i class="fa-solid fa-laptop-code"></i> 実務直結の演習量
                    </h4>
                    <p class="reason-text">
                        基礎知識のインプットだけでなく、実際の現場で使われる設計書に基づいたコーディング課題を重視。修了時には即戦力として動ける技術が身につきます。
                    </p>



                    <h4 class="reason-subtitle">
                        <i class="fa-solid fa-sliders"></i> 柔軟な研修カスタマイズ
                    </h4>
                    <p class="reason-text">
                        貴社の開発環境や、受講者のスキルレベルに合わせたカリキュラム調整が可能です。新入社員研修から既存社員のスキルアップまで幅広く対応します。
                    </p>



                    <h4 class="reason-subtitle">
                        <i class="fa-solid fa-chart-line"></i> 徹底した進捗サポート
                    </h4>
                    <p class="reason-text">
                        受講者の「どこでつまずいているか」をリアルタイムで把握。講師による個別フィードバックで、脱落者を出さない丁寧な指導を行います。
                    </p>


                </div>
            </section>

            <!-- 実績紹介 -->
            <section class="course-wrap">
                <h3>実績紹介</h3>

                <div class="related-course-wrap">
                    <ul class="course-list-class">
                        <li class="course-card">
                            <!-- <a href="https://qlip-programming.com/jobtrain/"> -->
                            <div class="course-item-text">
                                <h3 class="course-title">ITパスポート</h3>
                                <div class="plan-p">
                                    <p class="plan-desc">国家試験の出題範囲に基づき、ITの広範な知識を網羅的に学ぶ対策講座です。
                                        企業のIT化を推進する上で必要な「ストラテジ系（経営）」「マネジメント系（管理）」「テクノロジ系（技術）」の3分野をバランスよく学習。
                                        専門用語の意味を単に覚えるだけでなく、実際のビジネスケースを想定した解説で、知識を実務に応用する力を養います。
                                        また、過去問題の分析に基づいた試験対策や、出題されやすい重要ポイントを効率的に反復学習。短期間で合格ラインに到達できるよう、
                                        戦略的な学習方法を提供し、ITリテラシーを公的に証明します。</p>
                                    <div class="button-wrap">
                                        <a href="#" class="orange-btn">詳細はこちらへ</a>
                                    </div>
                                </div>
                            </div>
                            <!-- </a> -->
                        </li>


                    </ul>
                </div>
            </section>





            <!-- ===== アクセスセクション（access.html の main 内を置き換え） ===== -->

            <section class="access-section content-wrap" id="access">
                <h3>アクセス</h3>
                <div class="access-container">

                    <!-- 左：テキストエリア -->
                    <div class="access-left">

                        <!-- 基本情報 -->
                        <div class="access-info">
                            <h3><span>クリップ プログラミングスクール</span></h3>
                            <div class="access-details">
                                <p>〒770-0832</p>
                                <p>徳島県徳島市寺島本町東3丁目12-8<br>K1ビル 5F・6F</p>
                                <!-- ★ タップで発信できるようにリンク化 -->
                                <p>TEL：<a href="tel:088-676-3151">088-676-3151</a></p>
                                <p>FAX：088-676-3152</p>
                                <p>受付時間：9:30〜18:00（土日祝を除く）</p>
                            </div>

                            <!-- ★ スマホ用CTAボタン（電話・地図） -->
                            <div class="access-cta">
                                <a href="tel:088-623-3205" class="btn-call">
                                    <i class="fa-solid fa-phone"></i> 電話する
                                </a>
                                <a href="https://www.google.com/maps/search/?api=1&query=%E5%BE%B3%E5%B3%B6%E7%9C%8C%E5%BE%B3%E5%B3%B6%E5%B8%82%E5%AF%BA%E5%B3%B6%E6%9C%AC%E7%94%BA%E6%9D%B13%E4%B8%81%E7%9B%AE12-8+K1%E3%83%93%E3%83%AB" target="_blank" rel="noopener noreferrer" class="btn-map">
                                    <i class="fa-solid fa-map-location-dot"></i> 地図を開く
                                </a>
                            </div>
                        </div>

                        <!-- アクセス注意事項 -->
                        <div class="access-notes">
                            <h3>＜お車・自転車等でお越しになる場合＞</h3>
                            <ul>
                                <li>自転車・二輪車自動車用専用駐輪場無し</li>
                                <li>専用駐車場無し（周辺有料駐車場をご利用ください）</li>
                            </ul>
                            <h3>＜公共交通機関をご利用になる場合＞</h3>
                            <ul>
                                <li>JR 徳島駅から徒歩 約3分</li>
                                <li>徳島市営バス 徳島駅前バスターミナルから徒歩 約3分</li>
                            </ul>
                        </div>

                    </div>
                    <!-- ed 左：テキストエリア -->


                    <!-- 右：Google Map -->
                    <div class="access-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.842481543028!2d134.55026691521545!3d34.073551980600215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35536d61a9afe8cf%3A0xfa0a82ff41aaaac3!2z44CSNzcwLTA4MzIg5b6z5bO255yM5b6z5bO25biC5a-65bO25pys55S65p2x77yT5LiB55uu77yR77yS4oiS77yYIEsx44OT44Or!5e0!3m2!1sja!2sjp!4v1669716471104!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Qlipプログラミングスクール 地図">
                        </iframe>

                    </div>

                </div>
            </section>
        </div>

    </div>

    <div class="contact-section">
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="orange-btn">お問い合わせへ</a>
    </div>
</main>

<?php get_footer(); ?>