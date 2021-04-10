<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_steps', function (Blueprint $table) {
            $table->increments('step_id')->unsigned()->comment('ステップID');
            $table->string('step_name', 50)->comment('ステップ名');
            $table->boolean('del_flg')->comment('削除フラグ');
            $table->timestamps();
        });

        DB::table('content_steps')->insert([
            ['step_name' => 'step0. はじめに', 'del_flg' => false],
            ['step_name' => 'step1. アカウント作成、出品作業・外注さん募集方法', 'del_flg' => false],
            ['step_name' => 'step2. リサーチ方法', 'del_flg' => false],
            ['step_name' => 'step3. 買い付け方法', 'del_flg' => false],
            ['step_name' => 'step4. その他、売上を上げるテクニック', 'del_flg' => false]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_steps');
    }
}
