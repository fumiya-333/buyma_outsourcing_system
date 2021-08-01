<?php
/**
 * 共通定数クラス
 *
 * @version 1.0
 * @author tsuji
 */
namespace App\Constants;

/**
 * 共通定数クラス
 *
 * 共通で利用する定数を記載
 */
class AppConstants {

		/********************************************
		/* 画面表示
	 	********************************************/
	 	/** 画面タイトル */
	 	const VIEW_TITLE = 'BUYMA運営担当者用サイト';

	 	/********************************************
		/* ロジックキー
	 	********************************************/
	 	/** メッセージ */
		const KEY_MSG = 'msg';
		/** エラーメッセージ */
		const KEY_ERR = 'error';
		/** ハッシュ sha256 */
		const HASH_KEY_SHA256 = 'sha256';
		/** ストレージのファイルパス（表示用） */
		// const STORAGE_DISPLAY_FILE_PATH = '/storage/display/';
		/** ストレージのファイルパス（ダウンロード用） */
		// const STORAGE_DOWNLOAD_FILE_PATH = 'public/download/';

		/********************************************
		/* パラメータキー
		********************************************/
		/** ユーザー認証 */
		const KEY_AUTHS = 'auths';
		/** 仮登録 */
		const KEY_PRE_REGIST = 'preRegist';
		/** 本登録 */
		const KEY_REGIST = 'regist';
		/** パスワード仮更新 */
		const KEY_PRE_UPDATE = 'preUpdate';
		/** 本パスワード更新 */
		const KEY_UPDATE = 'update';
		/** ログアウト */
		const KEY_LOGOUT = 'logout';
		/** トップ */
		const KEY_TOP = 'top';
		/** 出品リスト */
		const KEY_LISTING = 'listing';
		/** お問い合わせ一覧 */
		const KEY_CONTACT_LIST = 'contact_list';
		/** リサーチ詳細一覧 */
		const KEY_RESEARCH_DETAIL_LIST = 'research_detail_list';
		/** アカウント・外注担当者一覧 */
		const KEY_ACCOUNT_OUTSOURCING_LIST = 'account_outsourcing_list';
		/** メニュー */
		const KEY_MENU_PARAM_ARRAY = 'menu_param_array';
		/** 管理画面ファイル */
		const KEY_MANAGEMENTS = 'managements';
		/** indexファイル */
		const KEY_INDEX = 'index';

		/********************************************
		/* ルーティングディレクトリ
		********************************************/
		/** 仮登録画面 */
		const ROOT_DIR_AUTHS_PRE_REGIST = self::KEY_AUTHS . '/' . self::KEY_PRE_REGIST;
		/** 本登録画面 */
		const ROOT_DIR_AUTHS_REGIST = self::KEY_AUTHS . '/' . self::KEY_REGIST;
		/** パスワード仮更新画面 */
		const ROOT_DIR_AUTHS_PRE_UPDATE = self::KEY_AUTHS . '/' . self::KEY_PRE_UPDATE;
		/** パスワード本更新画面 */
		const ROOT_DIR_AUTHS_UPDATE = self::KEY_AUTHS . '/' . self::KEY_UPDATE;
		/** ログアウト画面 */
		const ROOT_DIR_AUTHS_LOGOUT = self::KEY_AUTHS . '/' . self::KEY_LOGOUT;

		/********************************************
		/* ビューファイル指定パス
		********************************************/
		/** 管理画面 */
		const VIEW_FILE_PATH_MANAGEMENTS_INDEX = self::KEY_MANAGEMENTS . '.' . self::KEY_INDEX;

		/********************************************
		/* ロジック用定数
		********************************************/
		/** フラグオフ */
		const FG_OFF = '0';
		/** フラグオン */
		const FG_ON = '1';

		/********************************************
		/* エラーメッセージ
		********************************************/
		/** ログイン認証共通エラー */
		const ERR_MSG_AUTH = '入力エラーが発生しました。以下の項目を確認してください。';
}
