<!-- header.phpを読み込み -->
<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">

<?php
// タクソノミーのタームを取得
$column_terms = get_terms(['taxonomy' => 'column_type']);
if (!empty($column_terms)):
?>

    <ul>
        <?php foreach ($column_terms as $column): ?>
            <li>
                <a href="<?php echo get_term_link($column) ?>">
                    <?php echo $column->name; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php foreach ($column_terms as $column): ?>
        <section class="section_body">
            <h3 class="heading heading-secondary">
                <?php echo $column->name; ?>
                <span><?php echo strtoupper($column->slug); ?></span>
            </h3>
            <ul class="foodList">
                <?php
                // メニューの投稿タイプ
                $args = [
                    'post_type' => 'column',
                    'post_per_page' => -1,
                    'order' => 'ASC',
                    'orderby' => 'data',
                ];
                // メニューの種類を絞り込む
                $taxquerysp = ['relation' => 'AND'];
                $taxquerysp[] = [
                    'taxonomy' => 'column_type',
                    'terms' => $column->slug,
                    'field' => 'slug',
                ];
                $args['tax_query'] = $taxquerysp;
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()): ?>

                    <?php while ($the_query->have_posts()): ?>
                        <?php $the_query->the_post(); ?>
                        <li class="foodList_item">


                            <div class="foodCard">
                                <a href="<?php the_permalink() ?>">
                                    <div class="foodCrad_pic">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        <?php else: ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="foodCrad_body">
                                        <h4 class="foodCrad_title"><?php the_title(); ?></h4>
                                        <p class="foodCrad_price"><?php the_excerpt(); ?></p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </ul>
        </section>
    <?php endforeach; ?>
<?php endif; ?>

<!-- footer.phpを読み込み -->
<?php get_footer(); ?>
