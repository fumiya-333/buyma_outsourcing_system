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
	 	const VIEW_TITLE = 'BUYMA物販学習用サイト';

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
		const STORAGE_DISPLAY_FILE_PATH = 'storage/display/';
		/** ストレージのファイルパス（ダウンロード用） */
		const STORAGE_DOWNLOAD_FILE_PATH = 'public/download/';

		/********************************************
		/* ルーティングディレクトリ
		********************************************/
		/** ユーザー認証 */
		const ROOT_DIR_AUTHS = 'auths';
		/** 仮登録 */
		const ROOT_DIR_PRE_REGIST = 'preRegist';
		/** 本登録 */
		const ROOT_DIR_REGIST = 'regist';
		/** パスワード仮更新 */
		const ROOT_DIR_PRE_UPDATE = 'preUpdate';
		/** 本パスワード更新 */
		const ROOT_DIR_UPDATE = 'update';
		/** ログアウト */
		const ROOT_DIR_LOGOUT = 'logout';
		/** 学習機能 */
		const ROOT_DIR_STUDYS = 'studys';
		/** 一覧 */
		const ROOT_DIR_LIST = 'list';
		/** 詳細 */
		const ROOT_DIR_DETAIL = 'detail';

		/** 仮登録画面 */
		const ROOT_DIR_AUTHS_PRE_REGIST = self::ROOT_DIR_AUTHS . '/' . self::ROOT_DIR_PRE_REGIST;
		/** 本登録画面 */
		const ROOT_DIR_AUTHS_REGIST = self::ROOT_DIR_AUTHS . '/' . self::ROOT_DIR_REGIST;
		/** パスワード本更新画面 */
		const ROOT_DIR_AUTHS_PRE_UPDATE = self::ROOT_DIR_AUTHS . '/' . self::ROOT_DIR_PRE_UPDATE;
		/** パスワード本更新画面 */
		const ROOT_DIR_AUTHS_UPDATE = self::ROOT_DIR_AUTHS . '/' . self::ROOT_DIR_UPDATE;
		/** ログアウト画面 */
		const ROOT_DIR_AUTHS_LOGOUT = self::ROOT_DIR_AUTHS . '/' . self::ROOT_DIR_LOGOUT;
		/** 学習一覧画面 */
		const ROOT_DIR_STUDYS_LIST = self::ROOT_DIR_STUDYS . '/' . self::ROOT_DIR_LIST;
		/** 学習詳細画面 */
		const ROOT_DIR_STUDYS_DETAIL = self::ROOT_DIR_STUDYS . '/' . self::ROOT_DIR_DETAIL;

		/********************************************
		/* エラーメッセージ
		********************************************/
		/** ログイン認証共通エラー */
		const ERR_MSG_AUTH = '入力エラーが発生しました。以下の項目を確認してください。';
}
