<!-- header.phpを読み込み -->
<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post(); ?>

<main>
    <section class="content-wrap">
        <div class="hero-banner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/course/kv-course.jpg" alt="" width="1620" height="1146">
            <div class="hero-text">
                <span>thanks</span>
                <h2><?php the_title(); ?></h2>
            </div>
        </div>
    </section>
    <div class="form-inner">
        <p class="from-body">お申込みありがとうございます。確認メールを入力されたメールアドレスへ送りいたします。<br>
                    もしも届かない場合は大変お手数ですが、お電話( 088-676-3151 )にてお問い合わせください。<br>
                    折り返しご連絡させていただきます。</p>
        <hr>
        <div class="form_thanks">
            <?php the_content(); ?>
        </div>

</main>

<?php endwhile;
endif;
?>

<!-- footer.phpを読み込み -->
<?php get_footer(); ?>
