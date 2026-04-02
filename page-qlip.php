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
            <!-- <h3 class="section-title we-title area">QLIPプログラミングスクールについて</h3> -->

            <!-- 流れる背景文字 -->
            <div class="related-column-wrap we-wrap">
                <div class="flow-bg">
                    <div class="flow-inner">
                        <span>QLiP PROGRAMMING SCHOOL</span>
                        <span>QLiP PROGRAMMING SCHOOL</span>
                    </div>
                </div>
                <div class="c-text">
                    <h3>変化の時代に強くなる“IT基礎力”を<br>
                        QLIPプログラミングスクールで</h3>
                </div>

                <!-- <div class="about-wrap"> -->
                <!-- QLIPについて -->
                <!-- <div class="left-column">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about/qlip_school_img.png" alt="クリッププログラミングスクールのロゴ">
                </div>
                <div class="right-column">-->

                <div class="we-p">
                    <p>変化の激しいAI時代の今こそ、“IT基礎力”を身につけることで、より高い競争力と多様な選択肢を手にすることができます。</p>

                    <p>QLIPプログラミングスクールは、徳島県に根ざしたIT基礎教育の専門機関です。私たちの社是は、<span style="color:red; font-weight:bold;">「共に学び、未来を創る」</span>です。</p>

                    <p>この言葉には、単なる知識やスキルの習得にとどまらず、学びを通じて社会に貢献できる人材を育てたいという強い想いが込められています。共に学び、共に成長することで、一人ひとりの可能性を最大限に引き出し、未来を担う人材を育成すること。それが私たちの使命です。この理念を胸に、地域社会の発展に貢献してまいります。</p>

                    <p>本校では、厚生労働省認定の職業訓練サービスをはじめ、社会人のスキルアップ支援、企業向けのIT基礎セミナー、小学生から高校生向けのプログラミングコースなど、幅広いニーズに応える学びの場を提供しています。</p>

                    <p>IT基礎、OAスキル、プログラミング基礎、Webデザイン、HTML・CSS・JavaScript、Webサイト制作、WordPress、Webアプリケーション開発（Java・PHP・Laravel）など、基礎から実践まで体系的に学べるカリキュラムを整えています。</p>

                    <p>また、多様な職業訓練科や各種スキル習得コースの開設、無料体験会、就職支援なども積極的に展開し、地域の人材育成とキャリア形成を力強くサポートしています。</p>
                </div>
            </div>
        </section>

        <section>
            <!-- 関連コラム -->
            <h3 class="section-title area">主な業務とサービスの紹介</h3>
            <div class="related-column-wrap">

                <ul class="card-list-class">
                    <li class="column-card">
                        <a href="https://qlip-programming.com/jobtrain/" target="_blank">
                            <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/qlip_lesson_class.png" alt="courses">

                            <div class="column-item-text">

                                <h3 class="column-title">職業訓練（厚生労働大臣認定）</h3>
                                <div class="plan-p">
                                    <p class="plan-desc">求職中の方を対象に、厚生労働大臣の認定を受けた職業訓練コースを提供しています。カリキュラムは4ヶ月から6ヶ月程度で、IT基礎から実践的なスキルまで、就職に直結する内容を体系的に学ぶことができます。。</p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="column-card">
                        <a href="https://qlip-programming.com/qliplab/" target="_blank">
                            <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/qlip_kids_class..png" alt="courses">

                            <div class="column-item-text">

                                <h3 class="column-title">小中高生のためのプログラミング</h3>
                                <div class="plan-p">
                                    <p class="plan-desc">「はじめてのプログラミング教育」を理念に、小学校1年生から中学校3年生までを対象としたカリキュラムを展開しています。楽しみながら論理的思考力を育み、将来のITスキルの土台を築くことを目指します。</p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="column-card">
                        <a href="<?php echo esc_url(home_url('/company/')); ?>" target="_blank">
                            <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/qlip_skillup_class..png" alt="courses">

                            <div class="column-item-text">

                                <h3 class="column-title">社会人・企業向けITスキルアップ支援 </h3>
                                <div class="plan-p">
                                    <p class="plan-desc">OAスキル、プログラミング、Web制作など、実務に役立つITスキルを身につけたい方・さらに磨きたい方を対象とした一般向けカリキュラムを提供しています。また、企業様向けの研修やセミナーも実施しており、業務効率化や人材育成をサポートします。</p>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </section>

        <!-- <section>
            <div class="related-column-wrap we-wrap">

                <div class="flow-bg">
                    <div class="flow-inner">
                        <span>QLiP PROGRAMMING SCHOOL</span>
                        <span>QLiP PROGRAMMING SCHOOL</span>
                    </div>
                </div>
                <h3 class="section-title we-title area">私たちの想い</h3>
                <div class="we-p">

                    <p>受講生一人ひとりの目的やレベルに寄り添い、学びを形にするITスクールです。<br>
                        四国初の本格IT教育施設として、徳島からプログラミングやデザインなどの専門スキルを学べる環境を提供しています。求職者向け職業訓練、キッズ・学生向け教育、一般向けスキルアップなど、ライフスタイルに合わせた多様な受講スタイルを用意しています。<br>
                        キッズクラスでは「はじめてのプログラミング教育」を大切にし、子どもたちの学びの第一歩を支えています。</p>
                </div>
            </div>
        </section> -->

        <section>
            <!-- 講師の紹介 -->
            <h3 class="section-title teacher-title area">先生の紹介</h3>
            <div class="related-column-wrap teacher-wrap">

                <ul class="card-list-class">
                    <li class="column-card">
                        <div class="card-inner">
                            <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/hukusima.jpg" alt="courses">
                            <div class="column-item-text">

                                <h3 class="column-title">福島先生の自己紹介</h3>
                                <div class="plan-p">
                                    <p>大学では電子工学を専攻し、卒業後は某大学にて12年間、講師として教育に携わってまいりました。
                                        その後、大学院で情報技術やプログラミングを学び、システム開発の分野へと転身。<br>
                                        以降15年以上にわたり、生産管理・在庫管理・販売管理・電子カルテ・Webサイト・Webアプリケーションなど、幅広い分野のシステムやアプリケーションの開発およびプロジェクト管理に従事してきました。<br>
                                        また、2010年以降はシステム開発に携わる傍ら、求職者支援訓練において講師としても活動しており、実務経験を活かした実践的かつ丁寧な指導に力を入れています。</p>
                                    <p class="plan-desc">【得意言語】<br>Visual Basic／HTML・CSS・JavaScript／Java／PHP／SQL／WordPress／Laravel。</p>

                                    <p>【担当科目】<br>カリキュラム全般を担当していますが、主にHTML・CSS・JavaScript、Webデザイン、PHP、SQL、WordPressなどの科目を中心に指導しています。また、キャリアコンサルティングや就職支援にも力を入れています。</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="column-card">
                        <div class="card-inner">

                            <div class="img-wrap">
                                <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/emoto.jpg" alt="courses">

                                <a href="<?php echo esc_url(get_permalink(948)); ?>" target="_blank" class="interview-btn">

                                    <p>インタビューへ</p>
                                </a>
                            </div>

                            <div class="column-item-text">

                                <h3 class="column-title">江本先生の自己紹介</h3>
                                <div class="plan-p">
                                    <p>小さいころから映画が大好きで、将来は映画監督になることを夢見て、前職では映像業界で働いていました。<br>
                                        その後、地元・徳島に戻ったことをきっかけに職業訓練を受講し、現在は教育の世界で講師として活動しています。<br>

                                        映像制作の仕事もとてもやりがいがありましたが、教育にはまた違った魅力があり、日々楽しく取り組んでいます。<br>
                                        これまでの経験を活かしながら、受講生の皆さんと一緒に成長していけるよう努めています。</p>
                                    <p class="plan-desc">【得意言語】<br>HTML・CSS・JavaScript／SQL／PHP</p>
                                    <p>【担当科目】<br>カリキュラム全般を担当していますが、主に以下の科目を担当しています：
                                        HTML・CSS・JavaScript／Webデザイン／PHP／SQL／WordPress
                                        また、キャリアコンサルティングや就職支援にも力を入れています。</p>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li class="column-card">
                        <div class="card-inner">
                            <!-- 左カラム：画像＋ボタン -->
                            <div class="img-wrap">
                                <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/urashima.jpg" alt="courses">
                                <a href="<?php echo esc_url(get_permalink(436)); ?>" target="_blank" class="interview-btn">
                                    <p>インタビューへ</p>

                                </a>
                            </div>

                            <!-- 右カラム：テキスト -->
                            <div class="column-item-text">
                                <h3 class="column-title">浦島先生の自己紹介</h3>
                                <div class="plan-p">
                                    <p>職業訓練とキッズ講座でプログラミングの授業を担当している、浦島です。<br>

                                        幼稚園の頃に初めてプレイした『スーパーマリオブラザーズ3』がきっかけで、ゲームの世界に夢中になりました。
                                        「自分でもゲームを作ってみたい！」という思いからプログラミングに興味を持ち、学び始めたことが、今の仕事につながっています。
                                        <br>
                                        現在は、職業訓練や子ども向け講座を通じて、プログラミングの楽しさや面白さを伝えることに力を入れています。
                                    </p>
                                    <p class="plan-desc">【得意言語】<br>HTML & CSS／JavaScript／PHP／WordPress／Java／C#／Scratch</p>

                                    <p>【担当科目】<br>IT情報技術概論、HTML・CSS・JavaScript、データベース基礎、Java、PHP、WordPressなどの科目を担当しています。</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="column-card">
                        <div class="card-inner">

                            <div class="img-wrap">
                                <img class="column-card-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/about/sakurai.jpg" alt="courses">

                                <a href="<?php echo esc_url(get_permalink(684)); ?>" target="_blank" class="interview-btn">

                                    <p>インタビューへ</p>
                                </a>
                            </div>

                            <div class="column-item-text">

                                <h3 class="column-title">櫻井先生の自己紹介</noframes>
                                </h3>
                                <div class="plan-p">
                                    <p>学卒後、機械設計を4年間、総務事務を5年間経験し、さらなるスキルアップを目指して職業訓練を受講しました。現在はご縁があり、職業訓練の講師および事務を担当しています。<br>

                                        前職での経験を活かし、業務にすぐ役立つExcelをはじめとしたOffice系ソフトの指導を得意としています。また、現在は実践的なWebサイト制作スキルの習得にも取り組んでおり、日々学びを深めています。</p>

                                    <p class="plan-desc">【得意言語】<br>Excel／Access（VBA）
                                        ／HTML・CSS・JavaScript／SQL</p>
                                    <p>【担当科目】<br>Microsoft Office関連科目全般をはじめ、IT情報技術概論やHTML・CSS・JavaScriptの指導を担当しています。また、キャリアコンサルティングや就職支援にも取り組んでいます。</p>
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
