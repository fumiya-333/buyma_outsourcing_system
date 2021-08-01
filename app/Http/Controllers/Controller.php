<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Constants\AppConstants;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $menu_param_array;

    public function __construct()
    {
      $this->menu_param_array = array(
          AppConstants::KEY_TOP => array(
              0 => 'トップ',
              1 => AppConstants::FG_OFF
          ),
          AppConstants::KEY_LISTING => array(
              0 => '出品リスト',
              1 => AppConstants::FG_OFF
          ),
          AppConstants::KEY_CONTACT_LIST => array(
              0 => 'お問い合わせ一覧',
              1 => AppConstants::FG_OFF
          ),
          AppConstants::KEY_RESEARCH_DETAIL_LIST => array(
              0 => 'リサーチ詳細一覧',
              1 => AppConstants::FG_OFF
          ),
          AppConstants::KEY_ACCOUNT_OUTSOURCING_LIST => array(
              0 => 'アカウント・外注担当者一覧',
              1 => AppConstants::FG_OFF
          )
      );
    }
}
