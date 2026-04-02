<?php
// ディスクリプションの設定
$description = "";

if (is_front_page()) {
    $description = "未経験から初学者向けプログラミングスクールQlip。LaravelやFigma等の基礎を習得し、IT業界への就職など未来の選択肢を広げます。";
} elseif (is_home("info") || is_category("info") || is_singular('post')) {
    $description = "プログラミングスクール新着情報。初心者向けHTMLやCSSコース、お得なキャンペーンをご案内。Web制作の学習に役立つQLIPの最新ニュースです。";
} elseif (is_post_type_archive('course') || is_tax("course_type") || is_singular('course')) {
    $description = "プログラミングスクールのコース一覧。初心者向けIT基礎コースやWebデザイン等を提供。専門用語や機械が苦手な方、PC未経験者の学び直しを丁寧にサポートします。";
} elseif (is_page('company')) {
    $description = "企業向けプログラミング研修はQlipへ。新入社員を即戦力に導く実務直結のコーディング演習を提供。ITパスポート等のレベル別カリキュラムで支援します。";
} elseif (is_page('qlip')) {
    $description = "徳島のプログラミングスクールQLiP。未経験からHTMLやPHPの基礎を習得。職業訓練から企業研修まで多様な学びを提供しIT業界への就職を支援します。";
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ディスクリプション変数を出力する -->
    <meta name="description" content="<?php echo $description; ?>">
    <!-- <meta name="description" content="QLIPは未経験からWeb業界を目指す方向けのプログラミングスクールです"> -->

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- ========== ヘッダー ========== -->
    <div id="TOP"></div>
    <header class="header">
        <div class="header-inner">

            <!-- ロゴ -->
            <div class="logo">
                <h1>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.png" alt="スキリップ 未来の選択肢を広げる学びのプラットフォーム">
                    </a>
                </h1>
            </div>

            <!-- ナビ（ドロワー） -->
            <nav class="header-nav">
                <button type="button" class="nav-close"></button>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/qlip/')); ?>"><small>about</small><br>訓練校について</a></li>
                    <li><a href="<?php echo esc_url(get_term_link("it_basic", "course_type")); ?>"><small>course</small><br>コース一覧</a></li>
                    <li><a href="<?php echo esc_url(home_url('/modelplan/')); ?>"><small>modelplan</small><br>モデルプラン</a></li>
                    <li><a href="<?php echo esc_url(home_url('/column/')); ?>"><small>column</small><br>IT広場</a></li>
                    <li><a href="<?php echo esc_url(home_url('/faq/')); ?>"><small>faq</small><br>FAQ</a></li>
                    <li><a href="<?php echo esc_url(home_url('/free/')); ?>"><small>free</small><br>無料視聴</a></li>
                </ul>

                <!-- ドロワー内ボタン（スマホ・タブレット用） -->
                <div class="nav-button nav-button--drawer">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" target="_blank">お問い合わせ</a>
                    <!-- お申し込みの流れに飛ぶ -->
                    <a href="<?php echo esc_url(home_url('/flow/')); ?>">お申し込み</a>
                </div>
            </nav>

            <div class="header-right">
                <!-- ヘッダー右側ボタン（PC用） -->
                <div class="nav-button nav-button--header">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" target="_blank">お問い合わせ</a>
                    <a href="<?php echo esc_url(home_url('/flow/')); ?>">お申し込み</a>
                </div>

                <!-- ハンバーガー -->
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

        <!-- オーバーレイ -->
        <div class="nav-overlay" id="navOverlay"></div>

        <?php if (!is_front_page()): ?>
            <?php get_template_part('template-parts/breadcrumb'); ?>
        <?php endif; ?>

    </header>
