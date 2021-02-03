<?php
/*
Author: Taigo Ito
Author URI: https://qwel.design/
*/

// Setup

function hangakobo_setup()
{
  // アイキャッチ画像をサポート
  add_theme_support('post-thumbnails');

  // HTML5マークアップの使用
  add_theme_support('html5', [
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ]);

  // タイトルタグ出力
  add_theme_support('title-tag');

  // カスタムロゴ
  add_theme_support('custom-logo');
  
  // カスタムメニュー
  register_nav_menus([
    'primary' => 'Primary Menu',
    'secondary' => 'Secondary Menu'
  ]);

  // 固定ページの抜粋
  add_post_type_support('page', 'excerpt');

  // メディアサイズ指定
  update_option('thumbnail_size_w', 240);
  update_option('thumbnail_size_h', 240);
  update_option('medium_size_w', 360);
  update_option('medium_size_h', 360);
  update_option('medium_large_size_w', 0);
  update_option('medium_large_size_h', 0);
  update_option('large_size_w', 720);
  update_option('large_size_h', 720);
}
add_action('after_setup_theme', 'hangakobo_setup');


// Widgets

function hangakobo_widgets_init()
{
  register_sidebar([
    'name' => 'Blog Sidebar',
    'id' => 'blog-sidebar',
    'before_widget' => '<aside class="widget">',
    'after_widget' => '</aside>',
    'before_title' => '<h2 class="widget__title">',
    'after_title' => '</h2>'
  ]);
}
add_action('widgets_init', 'hangakobo_widgets_init');


// Scripts

function hangakobo_scripts()
{
  wp_enqueue_script('fonts', '//typesquare.com/3/tsst/script/ja/typesquare.js?5d707b2fef1c4640b81d12bbac1e0217&fadein=10', [], null, false);
  wp_enqueue_style('style', get_template_directory_uri() . '/style.css', [], null);
}
add_action('wp_enqueue_scripts', 'hangakobo_scripts');


// Post
// デフォルト投稿タイプ呼称・アイコン変更

$post_name = '版画ゆうびん';
$post_icon = 'dashicons-star-filled';

function change_menulabel()
{
  global $menu;
  global $submenu;
  global $post_name;
  $menu[5][0] = $post_name;
  $submenu['edit.php'][5][0] = $post_name . '一覧';
}
add_action('admin_menu', 'change_menulabel');

function change_objectlabel()
{
  global $wp_post_types;
  global $post_name;
  global $post_icon;
  $wp_post_types['post']->label = $post_name;
  $wp_post_types['post']->labels->name = $post_name;
  $wp_post_types['post']->labels->singular_name = $post_name;
  $wp_post_types['post']->menu_icon = $post_icon;
}
add_action('init', 'change_objectlabel');


// Works

$works_slug = 'works';
$works_name = '作品';
$works_icon = 'dashicons-hammer';

function register_option_works()
{
  global $works_slug;
  global $works_name;
  global $works_icon;

  register_post_type($works_slug, [
    'labels' => [
      'name' => $works_name,
      'all_items' => $works_name . '一覧'
    ],
    'public' => true,
    'menu_position' => 6,
    'menu_icon' => $works_icon,
    'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
    'has_archive' => true,
    'rewrite' => [
      'slug' => $works_slug,
      'with_front' => false,
      'hierarchical' => true
    ],
    'query_var' => true,
    'show_in_rest' => true
  ]);
}
add_action('init', 'register_option_works');


// feature

$feature_slug = 'feature';
$feature_name = '特集';
$feature_icon = 'dashicons-menu';

$feature_cat_slug = 'feature-tag';
$feature_cat_name = '特集タグ';

$feature_tag_slug = 'feature-year';
$feature_tag_name = '特集年';

function register_option_feature()
{
  global $feature_slug;
  global $feature_name;
  global $feature_icon;

  global $feature_cat_slug;
  global $feature_cat_name;
  global $feature_tag_slug;
  global $feature_tag_name;

  register_post_type($feature_slug, [
    'labels' => [
      'name' => $feature_name,
      'all_items' => $feature_name . '一覧'
    ],
    'public' => true,
    'menu_position' => 7,
    'menu_icon' => $feature_icon,
    'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
    'has_archive' => true,
    'rewrite' => [
      'slug' => $feature_slug,
      'with_front' => false,
      'hierarchical' => true
    ],
    'query_var' => true,
    'show_in_rest' => true
  ]);

  register_taxonomy(
    $feature_cat_slug,
    $feature_slug,
    [
      'label' => $feature_cat_name,
      'public' => true,
      'show_admin_column' => true,
      'hierarchical' => true,
      'rewrite' => [
        'slug' => $feature_cat_slug,
        'with_front' => false,
        'hierarchical' => true
      ],
      'query_var' => true,
      'show_in_rest' => true
    ]
  );

  register_taxonomy(
    $feature_tag_slug,
    $feature_slug,
    [
      'label' => $feature_tag_name,
      'public' => true,
      'show_admin_column' => true,
      'hierarchical' => true,
      'rewrite' => [
        'slug' => $feature_tag_slug,
        'with_front' => false,
        'hierarchical' => false
      ],
      'query_var' => true,
      'show_in_rest' => true
    ]
  );
}
add_action('init', 'register_option_feature');

function add_feature_fields()
{
  global $feature_name;
  add_meta_box('feature_setting', $feature_name . '詳細', 'insert_feature_fields', 'feature', 'normal');
}
add_action('admin_menu', 'add_feature_fields');

function insert_feature_fields()
{
  global $post;
  echo '背景色：<input type="text" name="background-color" value="' . get_post_meta($post->ID, 'background-color', true) . '" size="50"><br>';
  echo '文字色：<input type="text" name="color" value="' . get_post_meta($post->ID, 'color', true) . '" size="50"><br>';
}

function save_feature_fields($postID)
{
  if (!empty($_POST['background-color'])) {
    update_post_meta($postID, 'background-color', $_POST['background-color']);
  } else {
    delete_post_meta($postID, 'background-color');
  }
  if (!empty($_POST['border-color'])) {
    update_post_meta($postID, 'border-color', $_POST['border-color']);
  } else {
    delete_post_meta($postID, 'border-color');
  }
  if (!empty($_POST['color'])) {
    update_post_meta($postID, 'color', $_POST['color']);
  } else {
    delete_post_meta($postID, 'color');
  }
}
add_action('save_post', 'save_feature_fields');

function insert_feature_cat()
{
  global $feature_slug;
  global $feature_cat_slug;
  global $feature_tag_slug;
  echo '<ul class="list-' . $feature_cat_slug . '">';
  echo '<li class="list-' . $feature_cat_slug . '__item">' .
    '<a href="' . get_post_type_archive_link($feature_slug) . '">' .
    get_post_type_object($feature_slug)->label . '一覧' .
    '</a>' .
    '</li>';
  $terms = get_terms($feature_cat_slug, ['orderby' => 'name']);
  foreach ($terms as $term) {
    echo '<li class="list-' . $feature_cat_slug . '__item">' .
      '<a href="' . get_term_link($term->term_id, $feature_cat_slug) . '">' .
      $term->name .
      '</a>' .
      '</li>';
  }
  $terms = get_terms($feature_tag_slug, ['orderby' => 'ID']);
  foreach (array_reverse($terms) as $term) {
    echo '<li class="list-' . $feature_cat_slug . '__item">' .
      '<a href="' . get_term_link($term->term_id, $feature_tag_slug) . '">' .
      $term->name .
      '</a>' .
      '</li>';
  }
  echo '</ul>';
}


// Shop

$shop_slug = 'shop';
$shop_name = '店舗';
$shop_icon = 'dashicons-cart';

function register_option_shop()
{
  global $shop_slug;
  global $shop_name;
  global $shop_icon;

  register_post_type($shop_slug, [
    'labels' => [
      'name' => $shop_name,
      'all_items' => $shop_name . '一覧'
    ],
    'public' => true,
    'menu_position' => 8,
    'menu_icon' => $shop_icon,
    'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
    'has_archive' => true,
    'rewrite' => [
      'slug' => $shop_slug,
      'with_front' => false,
      'hierarchical' => true
    ],
    'query_var' => true,
    'show_in_rest' => true
  ]);
}
add_action('init', 'register_option_shop');

function add_shop_fields()
{
  global $shop_name;
  add_meta_box('shop_setting', $shop_name . '詳細', 'insert_shop_fields', 'shop', 'normal');
}
add_action('admin_menu', 'add_shop_fields');

function insert_shop_fields()
{
  global $post;
  echo 'URL：<input type="text" name="url" value="' . get_post_meta($post->ID, 'url', true) . '" size="50"><br>';
}

function save_shop_fields($postID)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $postID;
  } else if (isset($_POST['action']) && $_POST['action'] == 'inline-save') {
    return $postID;
  } else {
    if (!empty($_POST['url'])) {
      update_post_meta($postID, 'url', $_POST['url']);
    } else {
      delete_post_meta($postID, 'url');
    }
  }
}
add_action('save_post', 'save_shop_fields');


// User Photo

function insert_user_profile($bool)
{
  global $profileuser;
  echo '<tr><th><label for="instagrambusinessid">インスタグラムID</label></th><td><input type="text" name="instagrambusinessid" value="' . $profileuser->instagrambusinessid . '" size="20"></td></tr>';
  echo '<tr><th><label for="accesstoken">アクセストークン</label></th><td><input type="text" name="accesstoken" value="' . $profileuser->accesstoken . '" size="200"></td></tr>';
  return $bool;
}
add_action('show_password_fields', 'insert_user_profile');

function save_user_profile($user_id, $prev_user_data)
{
  update_user_meta($user_id, 'instagrambusinessid', $_POST['instagrambusinessid'], $prev_user_data->instagrambusinessid);
  update_user_meta($user_id, 'accesstoken', $_POST['accesstoken'], $prev_user_data->accesstoken);
}
add_action('profile_update', 'save_user_profile', 10, 2);


// Breadcrumb

function insert_breadcrumb()
{
  echo '<div class="breadcrumb"><ul class="breadcrumb__items">';
  echo '<li class="breadcrumb__item">' .
    '<a href="' . home_url('/') . '">top</a>' .
    '</li>';

  if (is_home()) {
    // メインページ
    echo '<li class="breadcrumb__item">' . get_post_type_object('post')->label . '一覧' . '</li>';
  } else {
    // WPオブジェクト取得
    $wp_obj = get_queried_object();

    if (is_single()) {
      // 個別投稿ページ
      $postID = $wp_obj->ID;
      $post_type = $wp_obj->post_type;
      $post_title = $wp_obj->post_title;

      // カスタム投稿タイプを判定
      global $feature_slug;
      global $feature_cat_slug;
      if ($post_type == 'post') {
        // 「版画ゆうびん」の場合、「カテゴリー」を取得
        $the_tax = 'category';
      } else if ($post_type == $feature_slug) {
        // 「特集」の場合、「特集タグ」を取得
        $the_tax = $feature_cat_slug;
      } else {
        $the_tax = '';
      }

      // 投稿タイプ一覧を表示
      echo '<li class="breadcrumb__item">' .
      '<a href="' . get_post_type_archive_link($post_type) . '">' .
      get_post_type_object($post_type)->label . '一覧' .
      '</a>' .
      '</li>';

    // タクソノミーが紐づいていれば表示
    /*if ($the_tax != "") {
      $terms = get_the_terms($postID, $the_tax); // 投稿に紐づく全タームを取得

      if (!empty($terms)) {
        $term = $terms[0];

        // 親タームがあれば表示
        if ($term->parent > 0) {
          // 親タームのIDリストを取得
          $parent_array = array_reverse(get_ancestors($term->term_id, $the_tax));
          foreach ($parent_array as $parent_id) {
            $parent_term = get_term($parent_id, $the_tax);
            echo '<li class="breadcrumb__item">' .
                '<a href="' . get_term_link($parent_id, $the_tax) . '">' .
                $parent_term->name .
                '</a>' .
                '</li>';
            }
          }

          // 最下層タームを表示
          echo '<li class="breadcrumb__item">' .
            '<a href="' . get_term_link($term->term_id, $the_tax) . '">' .
            $term->name .
            '</a>' .
            '</li>';
        }
      }*/

      // 自身
      echo '<li class="breadcrumb__item">' . $post_title . '</li>';
    } else if (is_page()) {
      // 固定ページ
      $page_id = $wp_obj->ID;
      $page_title = $wp_obj->post_title;

      if ($wp_obj->post_parent > 0) {
        // 親ページ
        $parent_array = array_reverse(get_post_ancestors($page_id));
        foreach ($parent_array as $parent_id) {
          echo '<li class="breadcrumb__item">' .
            '<a href="' . get_permalink($parent_id) . '">' .
            get_the_title($parent_id) .
            '</a>' .
            '</li>';
        }
      }
      // 自身
      echo '<li class="breadcrumb__item">' . $page_title . '</li>';
    } else if (is_post_type_archive()) {
      // カスタム投稿アーカイブ
      echo '<li class="breadcrumb__item">' . $wp_obj->label . '一覧</li>';
    } else if (is_date()) {
      // 日付別
      $year = get_query_var('year');
      $month = get_query_var('monthnum');
      $day = get_query_var('day');

      if ($day > 0) {
        // 日別アーカイブ
        echo '<li class="breadcrumb__item"><a href="' . get_year_link($year) . '">' . $year . '年</a></li>' .
          '<li class="breadcrumb__item"><a href="' . get_month_link($year, $month) . '">' . $month . '月</a></li>' .
          '<li class="breadcrumb__item">' . $day . '日</li>';
      } else if ($month > 0) {
        // 月別アーカイブ
        echo '<li class="breadcrumb__item"><a href="' . get_year_link($year) . '">' . $year . '年</a></li>' .
          '<li class="breadcrumb__item">' . $month . '月</li>';
      } else {
        // 年別アーカイブ
        echo '<li class="breadcrumb__item">' . $year . '年</li>';
      }
    } else if (is_author()) {
      // 投稿者アーカイブ
      echo '<li class="breadcrumb__item">' . $wp_obj->display_name . ' の記事</li>';
    } else if (is_archive()) {
      // タームアーカイブ
      $term_id = $wp_obj->term_id;
      $term_name = $wp_obj->name;
      $tax_name = $wp_obj->taxonomy;

      // 「カテゴリー」、「タグ」の場合、「版画ゆうびん」を表示
      if ($tax_name == 'category' || $tax_name == 'tag') {
        $post_type = 'post';
      }

      // 「特集タグ」、「特集年」の場合、「特集一覧」を表示
      global $feature_slug;
      global $feature_cat_slug;
      global $feature_tag_slug;
      if ($tax_name == $feature_cat_slug || $tax_name == $feature_tag_slug) {
        $post_type = $feature_slug;
      }

      // 投稿タイプ一覧を表示
      echo '<li class="breadcrumb__item">' .
        '<a href="' . get_post_type_archive_link($post_type) . '">' .
        get_post_type_object($post_type)->label . '一覧' .
        '</a>';

      // 親ページがあれば順番に表示
      if ($wp_obj->parent > 0) {
        $parent_array = array_reverse(get_ancestors($term_id, $tax_name));
        foreach ($parent_array as $parent_id) {
          $parent_term = get_term($parent_id, $tax_name);
          echo '<li class="breadcrumb__item">' .
            '<a href="' . get_term_link($parent_id, $tax_name) . '">' .
            $parent_term->name .
            '</a>' .
            '</li>';
        }
      }
      // ターム自身の表示
      echo '<li class="breadcrumb__item">' . $term_name . '</li>';
    } else if (is_search()) {
      // 検索結果ページ
      echo '<li class="breadcrumb__item">「' . get_search_query() . '」で検索した結果</li>';
    } else if (is_404()) {
      // 404ページ
      echo '<li class="breadcrumb__item">404 Not Found</li>';
    }
  }

  echo '</ul></div>';
}


// Pagination

function insert_pagination()
{
  if (is_single()) {
    // 個別投稿ページの場合、前後の記事へ移動できる
    echo '<div class="pagination"><ul class="pagination__items">';

    // 前の記事があれば、前の記事へを表示
    $prev_post = get_previous_post();
    if (!empty($prev_post)) {
      echo '<li class="pagination__item--prev"><a href="' . get_permalink($prev_post->ID) . '"><span data-icon="ei-chevron-left"></span></a></li>';
    }

    // 次の記事があれば、次の記事へを表示
    $next_post = get_next_post();
    if (!empty($next_post)) {
      echo '<li class="pagination__item--next"><a href="' . get_permalink($next_post->ID) . '"><span data-icon="ei-chevron-right"></span></a></li>';
    }

    echo '</ul></div>';
  } else if (is_home() || is_archive() || is_search()) {
    // アーカイブページの場合、ページの切り替えができる
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    $paged = get_query_var('paged') ?: 1;

    // ページ数が2ページ以上の場合から表示
    if ($pages > 1) {
      echo '<div class="pagination"><ul class="pagination__items">';

      // 最初へ
      if ($paged > 3) {
        echo '<li class="pagination__item"><a href="', get_pagenum_link(1), '">1</a></li>';
        if ($paged > 4) {
          echo '<li class="pagination__item--joint"><span>…</span></li>';
        }
      }
      // 前後へ
      for ($i = 1; $i <= $pages; $i++) {
        if ($i <= $paged + 2 && $i >= $paged - 2) {
          if ($paged === $i) {
            echo '<li class="pagination__item--active"><span>' . $i . '</span></li>';
          } else {
            echo '<li class="pagination__item"><a href="', get_pagenum_link($i), '">' . $i . '</a></li>';
          }
        }
      }
      // 最後へ
      if ($paged + 2 < $pages) {
        if ($paged  + 3 < $pages) {
          echo '<li class="pagination__item--joint"><span>…</span></li>';
        }
        echo '<li class="pagination__item"><a href="', get_pagenum_link($pages), '">' . $pages . '</a></li>';
      }

      echo '</ul></div>';
    }
  }
}


// Get my title

function get_my_title()
{
  // WPオブジェクト取得
  $wp_obj = get_queried_object();

  if (is_single()) {
    // 個別投稿ページ
    $post_type = $wp_obj->post_type;
    if ($post_type === 'feature') return $wp_obj->post_title;
    else return get_post_type_object($post_type)->label;
  } else if (is_home() || is_page()) {
    // 固定ページ
    return $wp_obj->post_title;
  } else if (is_post_type_archive()) {
    // カスタム投稿アーカイブ
    $post_type = $wp_obj->name;
    if ($post_type === 'works') return '木版画ギャラリー';
    else return $wp_obj->label . '一覧';
  } else if (is_date()) {
    // 日付別
    $year = get_query_var('year');
    $month = get_query_var('monthnum');
    $day = get_query_var('day');
    if ($day > 0) return $year . '年' . $month . '月' . $day . '日の記事';
    else if ($month > 0) return $year . '年' . $month . '月の記事';
    else return $year . '年の記事';
  } else if (is_author()) {
    // 投稿者アーカイブ
    return $wp_obj->display_name . ' の記事';
  } else if (is_archive()) {
    // タームアーカイブ
    $term_name = $wp_obj->name;
    return $term_name;
  } else if (is_search()) {
    // 検索結果ページ
    return '「' . get_search_query() . '」で検索した結果';
  } else if (is_404()) {
    // 404ページ
    return '404 Not Found';
  }
}


// Get my description

function get_my_description()
{
  // WPオブジェクト取得
  $wp_obj = get_queried_object();

  if (is_home()) {
    return 'おさのなおこが綴る越前海岸からの版画の便り';
  } else if (is_single()) {
    // 個別投稿ページ
    $post_type = $wp_obj->post_type;
    if ($post_type === 'post') return 'おさのなおこが綴る越前海岸からの版画の便り';
    else if ($post_type === 'works') return '暮らしの中からひとかけら<br>空想の世界からひとかけら<br>ゆっくりゆっくり生まれた木版画たち';
    else if ($post_type === 'feature') return $wp_obj->post_excerpt;
    else if ($post_type === 'shop') return '作品を取り扱っている店舗のご紹介';
  } else if (is_home() || is_page()) {
    // 固定ページ
    return $wp_obj->post_content;
  } else if (is_post_type_archive()) {
    // カスタム投稿アーカイブ
    $post_type = $wp_obj->name;
    if ($post_type === 'post') return 'おさのなおこが綴る越前海岸からの版画の便り';
    else if ($post_type === 'works') return '暮らしの中からひとかけら<br>空想の世界からひとかけら<br>ゆっくりゆっくり生まれた木版画たち';
    else if ($post_type === 'feature') return 'これまで手掛けてきた主な制作・イベント情報を特集';
    else if ($post_type === 'shop') return '作品を取り扱っている店舗のご紹介';
  } else if (is_date()) {
    // 日付別
    return '';
  } else if (is_author()) {
    // 投稿アーカイブ
    return '';
  } else if (is_archive()) {
    // タームアーカイブ
    $term_id = $wp_obj->term_id;
    $tax_name = $wp_obj->taxonomy;
    return term_description($term_id, $tax_name);;
  } else if (is_search()) {
    // 検索結果ページ
    return '';
  } else if (is_404()) {
    // 404ページ
    return '';
  }
}


// Get my slug

function get_my_slug()
{
  // WPオブジェクト取得
  $wp_obj = get_queried_object();

  if (is_single()) {
    // 個別投稿ページ
    return $wp_obj->post_type;
  } else if (!is_home() && is_page()) {
    // 固定ページ
    return $wp_obj->post_name;
  } else if (is_post_type_archive()) {
    // カスタム投稿アーカイブ
    return 'archive-' . $wp_obj->name;
  } else if (is_home() || is_date() || is_author() || is_search() || is_404()) {
    // 投稿アーカイブ
    return 'archive';
  } else if (is_archive()) {
    // タームアーカイブ
    $tax_name = $wp_obj->taxonomy;
    // 「カテゴリー」、「タグ」の場合
    if ($tax_name == 'category' || $tax_name == 'tag') {
      return 'archive';
    }
    // 「特集タグ」、「特集年」の場合
    global $feature_slug;
    global $feature_cat_slug;
    global $feature_tag_slug;
    if ($tax_name == $feature_cat_slug || $tax_name == $feature_tag_slug) {
      return 'archive-' . $feature_slug;
    }
  }
}

// Body ID, Main ID
// body要素, main要素にIDを指定し、スタイル・スクリプトを適宜対応させる
// フロントページのスラグは "index" を指定すること

function body_id()
{
  echo 'id="' . get_my_slug() . '"';
}


// No image
// アイキャッチ画像の代替

function no_image($size = 'sm')
{
  echo '<img src="' . get_template_directory_uri() . '/images/no-image' . ($size === 'sm' ? '-sm' : '') . '.gif">';
}


// Excerpt
// 抜粋文字数指定

function register_excerpt_length()
{
  return 64;
}
add_filter('excerpt_length', 'register_excerpt_length', 999);


// Copyright

$copyright = '2007 - ' . date('Y') . ' osano naoko';

function copyright()
{
  global $copyright;
  echo '&copy; ' . $copyright;
}
