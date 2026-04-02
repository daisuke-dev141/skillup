<!-- header.phpを読み込む -->
<?php get_header(); ?>

<main>
  <section class="section">
    <div class="section_inner">
      <div class="section_header">
        <h1 class="heading heading-primary"><span>最新情報</span>NEWS - <?php wp_title(''); ?></h1>
      </div>

      <div class="archive">
        <div class="archive_category">
          <h2 class="archive_title">カテゴリー</h2>
          <ul class="archive_list">
            <!-- <li class="current-cat"><a href="#">お知らせ</a></li>
            <li><a href="#">コラム</a></li> -->
            <?php
            $args = [
              'title_li' => '',     //見出しを削除
              'show_count' => true,
              'orderby' => 'slug',
              'order' => 'desc',
              'hide_empty' => true,
            ];
            wp_list_categories($args);
            ?>
          </ul>
        </div>

        <div class="archive_yealy">
          <h2 class="archive_title">年別</h2>
          <ul class="archive_list">
            <!-- <li><a href='#'>2023</a></li>
            <li><a href='#'>2022</a></li> -->
            <?php
            $args = [
              'type' => 'yearly',     //見出しを削除
            ];
            wp_get_archives($args);
            ?>
          </ul>
        </div>
      </div>

      <div class="section_body">
        <!-- WordPressのループ開始 -->
        <?php if (have_posts()): ?>

          <div class="cardList">
            <?php while (have_posts()): ?>
              <?php the_post(); ?>

              <!-- カード型 -->
              <?php
              get_template_part('template-parts\loop', 'news')
              ?>

            <?php endwhile; ?>
          </div>

        <?php endif; ?>

        <!-- ページネーション -->
        <?php get_template_part('template-parts/pagenavi'); ?>
      </div>

    </div>
  </section>
</main>

<!-- footer.phpを読み込む -->
<?php get_footer(); ?>
