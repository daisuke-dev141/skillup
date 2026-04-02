<!-- header.phpを読み込み -->
<?php get_header(); ?>

<!-- オーバーレイ（headerの外） -->
<div class="nav-overlay" id="navOverlay"></div>

<!-- ===== main ===== -->
<main class="page-main">
    <div class="inner">
        <section class="content-wrap">
            <div class="hero-banner">
                <img src="<?php echo get_theme_file_uri('/assets/images/course/kv-course.jpg'); ?>" alt="コースイメージ">
                <div class="hero-text">
                    <span>news</span>
                    <h2>新着情報</h2>
                </div>
            </div>
        </section>
        <!-- heroの外に出す -->
        <div class="search-bar-area">
            <form method="get" action="<?php echo esc_url(home_url('/news/')); ?>" class="search-container">

                <input type="text" name="s" value="<?php echo get_search_query(); ?>" size="25" placeholder="キーワード検索" class="search-input" maxlength="20">

                <input type="submit" value="&#xf002;" class="search-submit">

            </form>
        </div>


        <div class="binder-wrapper">
            <div class="category-tabs">

                <!-- すべて（投稿一覧 = home.php） -->
                <?php $count = wp_count_posts('post'); ?>
                <a href="<?php echo esc_url(home_url('/news/')); ?>" class="tab-btn <?php if (is_home()) echo 'active'; ?>">
                    すべて(<?php echo $count->publish; ?>)
                </a>

                <?php
                $slugs = array('new_open', 'recruit_info', 'others');

                foreach ($slugs as $slug) :
                    $cat = get_category_by_slug($slug);
                    if ($cat) :
                ?>

                        <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" class="tab-btn <?php if (is_category($cat->term_id)) echo 'active'; ?>">
                            <?php echo esc_html($cat->name); ?>(<?php echo esc_html($cat->count); ?>)
                        </a>

                <?php
                    endif;
                endforeach;
                ?>

            </div>

            <!-- リスト -->
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    $cat = get_the_category();
                    $cat_slug = $cat[0]->slug ?? '';
                    $cat_name = $cat[0]->name ?? '';

                    // カテゴリーごとにクラス変更
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

                                    <!-- サムネ（アイキャッチ画像） -->
                                    <div class="news-thumb <?php echo $thumb_class; ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('medium');
                                        } else {
                                            echo 'No Image';
                                        }
                                        ?>
                                    </div>

                                    <div class="news-content">
                                        <!-- カテゴリー表示 -->
                                        <div>
                                            <span class="card-category-label <?php echo $label_class; ?>">
                                                <?php echo esc_html($cat_name); ?>
                                            </span>
                                            <span class="news-tag">
                                                <?php echo get_the_date('Y.m.d'); ?>
                                            </span>
                                        </div>
                                        <h3 class="news-title">
                                            <?php the_title(); ?>
                                        </h3>
                                        <p class="clamp-3"><?php echo esc_html(get_the_excerpt()); ?></p>

                                    </div>

                                </a>
                            </li>
                        </ul>
                    </div>

                <?php endwhile; ?>


            <?php else : ?>
                <p>投稿がありません。</p>
            <?php endif; ?>


            <div class="pagination">
                <?php if (function_exists('wp_pagenavi')) : ?>
                    <?php wp_pagenavi(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

</main>

<!-- footer.phpを読み込み -->
<?php get_footer(); ?>
