<?php
use App\Constants\AppConstants;

Breadcrumbs::register(AppConstants::KEY_TOP, function ($breadcrumbs) {
    $breadcrumbs->push('トップ', url(AppConstants::KEY_TOP));
});
