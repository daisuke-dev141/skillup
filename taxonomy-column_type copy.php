<?php
// 開いているタクソノミーページの情報を取得
$column_slug = get_query_var('column_type');
$column = get_term_by('slug', $column_slug, 'column_type');
?>

<!-- header.phpを読み込み -->
<?php get_header(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">

<?php
$term = get_queried_object();
$taxonomy = get_taxonomy($term->taxonomy);
?>

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

<main>
    <section class="section section-foodList">
        <div class="section_inner">
            <div class="section_header">
                <h2 class="heading heading-primary"><span></span><?php echo $taxonomy->labels->name; ?></h2>
            </div>

            <section class="section_body">
                <h3 class="heading heading-secondary">
                    <?php single_term_title(''); ?>
                    <span><?php echo strtoupper($column->slug); ?></span>
                </h3>
                <ul class="foodList">
                    <?php if (have_posts()): ?>

                    <?php while (have_posts()): ?>
                    <?php the_post(); ?>
                    <li class="foodList_item">

                        <!-- <?php echo get_template_part('template-parts/loop', 'food'); ?> -->

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

                    <?php endif; ?>
                </ul>
            </section>
        </div>
    </section>
</main>

<!-- footer.phpを読み込み -->
<?php get_footer(); ?>
