<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_files', function (Blueprint $table) {
            $table->increments('file_id')->comment('ファイルID');
            $table->string('file_name', '255')->comment('ファイル名');
            $table->integer('contents_id')->unsigned();
            $table->foreign('contents_id')->references('contents_id')->on('contents')->onDelete('cascade');
            $table->string('file_path', 50)->comment('ファイルパス');
            $table->boolean('del_flg')->comment('削除フラグ');
            $table->timestamps();
        });

        DB::table('content_files')->insert([
            ['file_name' => 'お取引について_テンプレート.txt', 'contents_id' => 3, 'file_path' => 'お取引について_テンプレート.txt', 'del_flg' => false],
            ['file_name' => 'お知らせについて_テンプレート.txt', 'contents_id' => 3, 'file_path' => 'お知らせについて_テンプレート.txt', 'del_flg' => false],
            ['file_name' => '出品作業の流れ.pdf', 'contents_id' => 4, 'file_path' => '出品作業の流れ.pdf', 'del_flg' => false],
            ['file_name' => '出品外注担当者様契約書.docx', 'contents_id' => 7, 'file_path' => '出品外注担当者様契約書.docx', 'del_flg' => false],
            ['file_name' => '出品外注さん募集テンプレート.txt', 'contents_id' => 8, 'file_path' => '出品外注さん募集テンプレート.txt', 'del_flg' => false],
            ['file_name' => '買付外注さん募集テンプレート.txt', 'contents_id' => 15, 'file_path' => '買付外注さん募集テンプレート.txt', 'del_flg' => false],
            ['file_name' => '買付外注さんテンプレート（ランサーズ）.txt', 'contents_id' => 15, 'file_path' => '買付外注さんテンプレート（ランサーズ）.txt', 'del_flg' => false],
            ['file_name' => '買付外注さん募集テンプレート_地球の歩き方.txt', 'contents_id' => 16, 'file_path' => '買付外注さん募集テンプレート_地球の歩き方.txt', 'del_flg' => false],
            ['file_name' => '買付外注さん募集テンプレート_フェイスブック.txt', 'contents_id' => 17, 'file_path' => '買付外注さん募集テンプレート_フェイスブック.txt', 'del_flg' => false],
            ['file_name' => '買付外注さん募集テンプレート_インスタグラム.txt', 'contents_id' => 17, 'file_path' => '買付外注さん募集テンプレート_インスタグラム.txt', 'del_flg' => false],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_files');
    }
}
