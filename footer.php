   <!-- ========== フッター ========== -->
   <div id="back-to-top">
       <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/top/top-fade.png" alt="トップへ" class="fade">
       <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/top/top-normal.png" alt="トップへ" class="normal">
       <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/top/top-hover.png" alt="トップへ" class="hover">
   </div>

   <!-- パンくずリスト -->
   <?php if (!is_front_page()): ?>
   <?php get_template_part('template-parts/breadcrumb'); ?>
   <?php endif; ?>


   <footer class="site-footer">

       <!-- 上段：ナビ4列 -->
       <div class="footer-column-wrap">

           <div class="footer-column">
               <p class="footer-title">インフォメーション</p>
               <nav class="footer-nav">
                   <ul>
                       <li><a href="<?php echo esc_url(home_url('/qlip/')); ?>">訓練校について</a></li>
                       <li><a href="<?php echo esc_url(home_url('/news/')); ?>">新着情報</a></li>
                       <li><a href="<?php echo esc_url(home_url('/modelplan/')); ?>">モデルプラン</a></li>
                       <li><a href="<?php echo esc_url(home_url('/column/')); ?>">IT広場</a></li>
                       <li><a href="<?php echo esc_url(home_url('/faq/')); ?>">FAQ</a></li>
                       <li><a href="<?php echo esc_url(home_url('/free/')); ?>">無料視聴</a></li>
                   </ul>
               </nav>
           </div>

           <div class="footer-column">
               <p class="footer-title">コース・サービス</p>
               <nav class="footer-nav">
                   <ul>
                       <li><a href="<?php echo esc_url(get_term_link("it_basic", "course_type")); ?>">コース一覧</a></li>
                       <li><a href="<?php echo esc_url(home_url('/course-search/')); ?>">コース詳細検索</a></li>
                       <li><a href="<?php echo esc_url(home_url('/company/')); ?>">企業向けサービス</a></li>

                   </ul>
               </nav>
           </div>

           <div class="footer-column">
               <p class="footer-title">コンタクト</p>
               <nav class="footer-nav">
                   <ul>
                       <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a></li>
                       <li><a href="<?php echo esc_url(home_url('/flow/')); ?>">お申し込みの流れ</a></li>
                       <li><a href="<?php echo esc_url(home_url('/access/')); ?>">アクセス</a></li>
                   </ul>
               </nav>
           </div>

           <div class="footer-column">
               <p class="footer-title">その他</p>
               <nav class="footer-nav">
                   <ul>
                       <li><a href="<?php echo esc_url(home_url('/skillip/')); ?>">本サイトについて</a></li>
                       <li><a href="<?php echo esc_url(home_url('/policy/')); ?>">プライバシーポリシー</a></li>
                       <li><a href="<?php echo esc_url(home_url('/tos/')); ?>">利用規約</a></li>
                       <li><a href="<?php echo esc_url(home_url('/cancel/')); ?>">キャンセルポリシー</a></li>
                   </ul>
               </nav>
           </div>

       </div>

       <!-- 下段：濃紺背景 -->
       <div class="footer-dark">

           <!-- 会社名（左）＋住所（右）横並び -->
           <div class="footer-info-wrap">

               <div class="footer-company">
                   <div class="footer-logo">
                       <a href="https://www.qlip.school/asp/newscat.asp?nc_id=239" target="_blank">
                           <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/798.png" alt="QLIP Logo">
                       </a>
                   </div>

                   <ul class="footer-sns-wrap">
                       <li>
                           <!--
                        <a href="https://www.youtube.com/" target="_blank" aria-label="YouTube">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        -->
                       </li>
                       <li>
                           <a href="https://www.facebook.com/qlipwebprogrammer/" target="_blank" aria-label="Facebook">
                               <i class="fa-brands fa-facebook-f"></i>
                           </a>
                       </li>
                       <li>
                           <a href="https://www.instagram.com/qlip_programming_school/" target="_blank" aria-label="Instagram">
                               <i class="fa-brands fa-instagram"></i>
                           </a>
                       </li>
                   </ul>
               </div>

               <address class="footer-access">
                   <p>〒770-0832</p>
                   <p>住所：徳島県徳島市寺島本町東3丁目12-8<br>K1ビル 5F・6F</p>
                   <div class="num">
                       <p>電話番号：088-676-3151</p>
                       <p>FAX：088-676-3152</p>
                   </div>
               </address>

           </div>

           <!-- コピーライト -->
           <div class="footer-bottom">
               <small>Copyright© QLIPプログラミングスクール All Rights Reserved.</small>
           </div>

       </div>

   </footer>

   <?php wp_footer(); ?>
   </body>

   </html>