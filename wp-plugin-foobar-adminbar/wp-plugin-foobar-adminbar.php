<?php
/*
Plugin Name: Foobar Adminbar
Description: 管理者以外のユーザログイン時にアドミンバーメニューから「WPロゴ」「更新」「コメント」「投稿」「ユーザプロフィール」「ダッシュボード」「検索」を削除するプラグイン
Version:     0.0.1
Author:      アルム＝バンド
*/

function foobar_rm_adminbar_menu_exclude_admin( $wp_admin_bar ) {
    // ログイン時
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
        // 管理者以外
        if ( ! in_array( 'administrator', $current_user->roles, true) ) {
            $wp_admin_bar->remove_menu( 'wp-logo' );        // WordPressロゴ
            $wp_admin_bar->remove_menu( 'about' );          // WordPressロゴ / WordPressについて
            $wp_admin_bar->remove_menu( 'wporg' );          // WordPressロゴ / WordPress.org
            $wp_admin_bar->remove_menu( 'documentation' );  // WordPressロゴ / ドキュメンテーション
            $wp_admin_bar->remove_menu( 'support-forums' ); // WordPressロゴ / サポート
            $wp_admin_bar->remove_menu( 'feedback' );       // WordPressロゴ / フィードバック
            $wp_admin_bar->remove_menu( 'updates' );        // 更新
            $wp_admin_bar->remove_menu( 'comments' );       // コメント
            $wp_admin_bar->remove_menu( 'new-content' );    // 新規投稿
            $wp_admin_bar->remove_menu( 'new-post' );       // 新規投稿 / 投稿
            $wp_admin_bar->remove_menu( 'new-media' );      // 新規投稿 / メディア
            $wp_admin_bar->remove_menu( 'new-page' );       // 新規投稿 / 固定
            $wp_admin_bar->remove_menu( 'new-user' );       // 新規投稿 / ユーザー
            $wp_admin_bar->remove_menu( 'dashboard' );      // サイト名 / ダッシュボード (公開側)
            $wp_admin_bar->remove_menu( 'search' );         // 検索 (公開側)
//            $wp_admin_bar->remove_menu( 'my-account' );   // マイアカウント
            $wp_admin_bar->remove_menu( 'user-info' );      // マイアカウント / プロフィール
            $wp_admin_bar->remove_menu( 'edit-profile' );   // マイアカウント / プロフィール編集
        }
    }
}
add_action( 'admin_bar_menu', 'foobar_rm_adminbar_menu_exclude_admin', 999, 1 );
