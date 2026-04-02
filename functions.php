<?php
// fukushima add start 2026-03-03

// 管理バーを非表示させたいときに、以下のフィルターフックを有効させてください。
add_filter('show_admin_bar', '__return_false');

function redirect_non_logged_in_users()
{

    // 未ログインの場合
    if (! is_user_logged_in()) {

        // ログインページ自身ではリダイレクトしない（ループ防止）
        if (! is_page('login') && ! is_page('wp-login.php')) {
            wp_redirect(wp_login_url());
            exit;
        }
    }
}
add_action('template_redirect', 'redirect_non_logged_in_users');

function redirect_subscriber_after_login($redirect_to, $request, $user)
{

    // ユーザー情報がない場合は何もしない
    if (! isset($user->roles)) {
        return $redirect_to;
    }

    // 購読者（subscriber）ならトップページへ
    if (in_array('subscriber', (array) $user->roles, true)) {
        return home_url();
    }

    // それ以外（管理者・編集者など）は通常の遷移先へ
    return $redirect_to;
}
add_filter('login_redirect', 'redirect_subscriber_after_login', 10, 3);


// fukushima add end

/**
 * <title>タグを有効にする
 */
add_theme_support("title-tag");


/**
 * アイキャッチ画像を使用可能にする
 */
add_theme_support("post-thumbnails");


/**
 * スタイルを適用する
 */
function mytheme_enqueue_styles()
{

    //===== reset.css(共通) =====
    wp_enqueue_style(
        'reset-style',
        get_template_directory_uri() . '/assets/css/reset.css',
        array(),
        '1.0'
    );

    //===== common.css(共通) =====
    wp_enqueue_style(
        'common-style',
        get_template_directory_uri() . '/assets/css/common.css',
        array('reset-style'),
        '1.0'
    );

    //===== content-area.css(共通) =====
    wp_enqueue_style(
        'content-area-style',
        get_template_directory_uri() . '/assets/css/content-area.css',
        array('common-style'),
        '1.0'
    );

    //===== font awesome(共通) =====
    wp_enqueue_style(
        'font-awesome-style',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
        array('reset-style'),
        '1.0'
    );

    //===== TOP =====
    if (is_front_page()) {
        wp_enqueue_style(
            'top-style',
            get_template_directory_uri() . '/assets/css/top.css',
            array('swiper-css'),
            '1.0'
        );


        // Swiper CSS（← 必須）
        wp_enqueue_style(
            'swiper-css',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
            array("common-style"),
            '1.0'
        );
    }

    //===== 新着情報 =====
    if (is_home('info') || is_category()) {
        wp_enqueue_style(
            'news-list-css',
            get_template_directory_uri() . '/assets/css/news-list.css'
        );
    }

    if (is_singular('post')) {

        // 募集情報
        if (has_category('recruit_info')) {
            wp_enqueue_style(
                'news-recruit-css',
                get_template_directory_uri() . '/assets/css/news-recruit.css'
            );
        }

        // 新設コース・その他
        if (has_category(array('new_open', 'others'))) {
            wp_enqueue_style(
                'news-course-css',
                get_template_directory_uri() . '/assets/css/news-course.css'
            );
        }
    }



    //===== コース =====
    // course tax
    if (is_post_type_archive('course') || is_tax("course_type")) {
        wp_enqueue_style(
            'course-tax-css',
            get_template_directory_uri() . '/assets/css/course-list.css',
            array('common-style'),
        );
    }

    // course single
    if (is_singular('course')) {
        wp_enqueue_style(
            'course-single-css',
            get_template_directory_uri() . '/assets/css/course-detail.css'
        );
    }

    //===== モデルプラン =====
    // modelplan archive
    if (is_post_type_archive('modelplan')) {
        wp_enqueue_style(
            'modelplan-archive-css',
            get_template_directory_uri() . '/assets/css/plan-list.css'
        );
    }

    // modelplan single
    if (is_singular('modelplan')) {
        wp_enqueue_style(
            'modelplan-single-css',
            get_template_directory_uri() . '/assets/css/plan-detail.css'
        );
    }

    //===== IT広場 =====
    // column archive or tax
    if (is_post_type_archive('column') || is_tax("column_type")) {
        wp_enqueue_style(
            'column-list-css',
            get_template_directory_uri() . '/assets/css/column-list.css'
        );
    }

    // column single
    if (is_singular('column')) {

        // インタビュー (interview)
        if (has_term(['interview', 'enquete', 'column_others'], 'column_type')) {
            wp_enqueue_style(
                'column-interview-css',
                get_template_directory_uri() . '/assets/css/column-interview.css'
            );
        }

        // アンケート (enquete)
        // if (has_term('enquete', 'column_type')) {
        //     wp_enqueue_style(
        //         'column-questionnaire-css',
        //         get_template_directory_uri() . '/assets/css/column-questionnaire.css'
        //     );
        // }

        // IT知識 (it_knowledge)
        if (has_term('it_knowledge', 'column_type')) {
            wp_enqueue_style(
                'basic-knowledge-css',
                get_template_directory_uri() . '/assets/css/basic-knowledge.css'
            );
        }
    }

    //===== FAQ =====
    // FAQ archive or tax
    if (is_post_type_archive('faq') || is_tax("faq_type")) {
        wp_enqueue_style(
            'faq-archive-css',
            get_template_directory_uri() . '/assets/css/faq-list.css'
        );
    }

    //===== 無料視聴 =====
    // free archive
    if (is_post_type_archive('free') || is_tax("free_type")) {
        wp_enqueue_style(
            'free-archive-css',
            get_template_directory_uri() . '/assets/css/trial.list.css'
        );
    }

    //===== 視聴ページ =====
    // learning_content single
    if (is_singular('learning_content')) {
        wp_enqueue_style(
            'learning_content-css',
            get_template_directory_uri() . '/assets/css/learning-content.css'
        );
    }

    //===== 固定ページ =====
    // お問い合わせ、申し込み
    if (is_page(['contact', 'confirm', 'thanks', 'app_form', 'app_form_thanks', 'app_form_confirm'])) {
        wp_enqueue_style(
            'contact-style',
            get_template_directory_uri() . '/assets/css/contact.css',
            array('common-style'),
            '1.0'
        );
    }
    // 検索ページ
    if (is_page("course-search")) {
        wp_enqueue_style(
            'search-style',
            get_template_directory_uri() . '/assets/css/course-list.css',
            array('common-style'),
            '1.0'
        );

        wp_enqueue_style(
            'search-style2',
            get_template_directory_uri() . '/assets/css/course-search-list.css',
            array('common-style'),
            '1.0'
        );
    }

    // 企業向け詳細ページ
    if (is_page('company')) {
        wp_enqueue_style(
            'it-servise-style',
            get_template_directory_uri() . '/assets/css/it-servise.css',
            array('common-style'),
            '1.0'
        );
    }

    // 訓練校について
    if (is_page('qlip')) {
        wp_enqueue_style(
            'about-style',
            get_template_directory_uri() . '/assets/css/about.css',
            array('common-style'),
            '1.0'
        );
    }

    // 申し込みの流れ
    if (is_page('flow')) {
        wp_enqueue_style(
            'application-style',
            get_template_directory_uri() . '/assets/css/application.css',
            array('common-style'),
            '1.0'
        );
    }

    // アクセス
    if (is_page('access')) {
        wp_enqueue_style(
            'access-style',
            get_template_directory_uri() . '/assets/css/access.css',
            array('common-style'),
            '1.0'
        );
    }

    // 本サイトについて
    if (is_page('skillip')) {
        wp_enqueue_style(
            'about-site-style',
            get_template_directory_uri() . '/assets/css/about-site.css',
            array('common-style'),
            '1.0'
        );
    }

    // プライバシーポリシー,利用契約
    if (is_page(['policy', 'tos'])) {
        wp_enqueue_style(
            'privacy-style',
            get_template_directory_uri() . '/assets/css/privacy.css',
            array('common-style'),
            '1.0'
        );
    }

    // キャンセルポリシー
    if (is_page('cancel')) {
        wp_enqueue_style(
            'cancel-style',
            get_template_directory_uri() . '/assets/css/cancellation-policy.css',
            array('common-style'),
            '1.0'
        );
    }


    //===== 404ページ =====
    if (is_404()) {
        wp_enqueue_style(
            '404-css',
            get_template_directory_uri() . '/assets/css/404.css'
        );
    }
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');


/**
 * スクリプトを適用する
 */
function mytheme_enqueue_script()
{
    // jQuery（WP同梱）
    wp_enqueue_script('jquery');

    /* =====================
     * 共通js
     * ===================== */

    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        null,
        true
    );

    /* =====================
     * front-page
     * ===================== */
    if (is_front_page()) {

        // Swiper JS
        wp_enqueue_script(
            'swiper-js',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
            array("main-js"),
            null,
            true
        );


        wp_enqueue_script(
            'top-js',
            get_template_directory_uri() . '/assets/js/top.js',
            array("swiper-js"),
            null,
            true
        );
    }
}

add_action('wp_enqueue_scripts', 'mytheme_enqueue_script');

/**
 * テキストエリアで改行したものを配列化する
 */
function split_by_newline($text)
{
    if (!$text) {
        return [];
    }

    return array_map(
        'trim',
        preg_split("/\r\n|\n|\r/", $text, -1, PREG_SPLIT_NO_EMPTY)
    );
}

// ツールバーを非表示にしてくれる
// add_filter('show_admin_bar', '__return_false');

/**
 * パンくずリストコースの種類の子ターム非表示
 */
add_filter('bcn_after_fill', 'remove_child_terms_from_breadcrumb');
function remove_child_terms_from_breadcrumb($trail)
{

    foreach ($trail->breadcrumbs as $key => $breadcrumb) {

        $term_id = $breadcrumb->get_id();
        $term = get_term($term_id);

        if ($term && !is_wp_error($term)) {

            // ← ここにタクソノミースラッグを書く
            if ($term->taxonomy === 'course_type' && $term->parent != 0) {
                unset($trail->breadcrumbs[$key]);
            }
        }
    }

    $trail->breadcrumbs = array_values($trail->breadcrumbs);
}

/**
 * 投稿のカスタムhtmlなどにショートコード[theme_url]を入れるとget_template_directory_uri();が出力される
 */
function theme_url()
{
    return get_template_directory_uri();
}
add_shortcode('theme_url', 'theme_url');


// 検索バー
function custom_archive_search($query)
{
    if (!is_admin() && $query->is_main_query()) {

        // archive-faq
        if (is_post_type_archive('faq') && isset($_GET['s'])) {
            $query->set('post_type', 'faq');
        }

        // archive-free
        if (is_post_type_archive('free') && isset($_GET['s'])) {
            $query->set('post_type', 'free');
        }
    }
}
add_action('pre_get_posts', 'custom_archive_search');
