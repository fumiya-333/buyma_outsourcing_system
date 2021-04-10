<?php
use App\Constants\AppConstants;

Breadcrumbs::register(AppConstants::ROOT_DIR_STUDYS_LIST, function ($breadcrumbs) {
    $breadcrumbs->push('トップ', url(AppConstants::ROOT_DIR_STUDYS_LIST));
});

Breadcrumbs::register(AppConstants::ROOT_DIR_STUDYS_DETAIL, function ($breadcrumbs, $content) {
		$breadcrumbs->parent(AppConstants::ROOT_DIR_STUDYS_LIST);
    $breadcrumbs->push($content->contents_name, url(AppConstants::ROOT_DIR_STUDYS_DETAIL . '/' . $content->contents_id));
});
