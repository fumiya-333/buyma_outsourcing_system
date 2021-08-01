<?php
use App\Constants\AppConstants;

Breadcrumbs::register(AppConstants::ROOT_DIR_TOP, function ($breadcrumbs) {
    $breadcrumbs->push('トップ', url(AppConstants::ROOT_DIR_TOP));
});
