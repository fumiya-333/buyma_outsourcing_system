<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\AppConstants;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('contents_id')->unsigned()->comment('コンテンツID');
            $table->integer('step_id')->unsigned();
            $table->foreign('step_id')->references('step_id')->on('content_steps')->onDelete('cascade');
            $table->string('contents_name', 50)->comment('コンテンツ名');
            $table->string('youtube_video_id', 255)->comment('YOUTUBE動画ID');
            $table->text('contents_text')->comment('コンテンツテキスト');
            $table->boolean('del_flg')->comment('削除フラグ');
            $table->timestamps();
        });

        DB::table('contents')->insert([
            ['step_id' => '1', 'contents_name' => '【はじめに】開始からBUYMAで利益を出すまでのフロー', 'youtube_video_id' => 'A12ZceABfbw', 'contents_text' => '', 'del_flg' => false],
            ['step_id' => '2', 'contents_name' => 'BUYMAアカウント作成方法', 'youtube_video_id' => '', 'contents_text' => '<h3 class="font-weight-bold">BUYMAアカウント作成方法</h3></h3 class="font-weight-bold">初めに、下記リンクのBUYMAページにアクセスします。<br><p><a href="https://www.buyma.com/">https://www.buyma.com/</a></p><p>BUYMAトップページのヘッダー上部の<b>今すぐ会員登録ボタン</b>をクリックします。</p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'member_regist.png" class="mb-4"><h4 class="font-weight-bold mt-5">購入者側のアカウント登録を行う</h4><p>下記画像の会員登録フォームが表示されますので、必要項目を入力して<b>同意して会員登録をするボタン</b>をクリックします。</p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'member_regist_form.png" class="mb-4"><p>※ニックネームに関しては<b>ハイブランドを売るのにコンセプトに合った名前</b>を付けないといけません。適当に付けないよう、よく考えて決めていきましょう。</p><p>ニックネームの付け方に関しては、以下を参考にして下さい。</p><div class="alert alert-danger msg h6" role="alert"><ul><li>・ヨーロッパの国や町、地名など</li><li>・洋楽等の音楽の歌詞</li><li>・ファッション関連の言葉をフランス語やイタリア語にしたもの</li></ul></div><p>その後、<b>メールアドレス認証</b>を行いますと会員登録は完了です。</p><h4 class="font-weight-bold mt-5">出品者側のアカウント登録を行う</h4><p>購入者側のアカウント登録を行いましたら、次は出品者登録を行います。</p><p>BUYMAトップページの<b>ヘッダー上部にアカウント名</b>が表示されるので、そこをクリックしてマイページに飛びます。</p><p>下記画像（マイページ）の<b>赤枠の箇所</b>から出品者登録が可能です。</p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'buyer_regist.png" class="mb-4"><p>その後、<b>メールアドレスの承認画面</b>へ進みますので、メールアドレスを入力して、届いたメールから手続きを行うと<b>メールアドレス認証</b>は完了です。</p><h4 class="font-weight-bold mt-5">基本情報の入力を行う</h4><p>次はパーソナルショッパーとして必要な基本情報の項目を入力していきます。</p><p>（自己紹介文はまだ入力する必要はございません。）</p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'basic_info_setting.png" class="mb-4"><p>次回の内容では、プロフィール設定のやり方についてご説明していきます。</p>', 'del_flg' => false],
            ['step_id' => '2', 'contents_name' => 'プロフィール設定', 'youtube_video_id' => 'e2Rm-GG4SAs', 'contents_text' => '<h3 class="font-weight-bold">プロフィール設定</h3><p>マイページから<b>アカウント情報</b>をクリックし、<b>パーソナルショッパープロフィール設定</b>をクリックします。</p><p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'account_info.png" class="mb-4"></p><p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'personal_shopper_profile.png" class="mb-4"></p><h4 class="font-weight-bold mt-5">自己紹介文</h4><p>自分自身の自己紹介ではなく、<b>パーソナルショッパーとしての自己紹介</b>を記載します。</p><p>丁寧にお客様に伝わり、安心感を与えられるような文章を記載していきましょう。具体的な中身としては、</p><div role="alert" class="alert alert-danger h6"><ul><li>・挨拶文</li><li>・どのようなショップなのか、どのようなブランドを取り扱っているのか</li></ul></div><p>他にも<b>アカウント名の由来やコンセプト</b>を記載するのもOKです。もし文章が思いつかない場合は、他のショッパーさんを参考にするといいです。</p><p>※ コピペはしないようにして下さい！もしバレるとアカウント停止の恐れがあります。</p><p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'introduction_setting.png" class="mb-4"></p><p>上記の画像の<b>自己紹介文</b>は、下記画像<b>赤枠の自己紹介</b>に反映されます。</p><p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'introduction_reflect.png" class="mb-4"></p><h4 class="font-weight-bold mt-5">カバー画像</h4><p>カバー画像の設定も非常に重要です。</p><p>例えばハイブランド商品を販売するのに、お店の外装が居酒屋だと変ですよね？</p><p>ハイブランド商品を売る場合だと、高級感があるカバー画像を設定する必要があります。例を挙げると、</p><div role="alert" class="alert alert-danger h6"><ul><li>・海外の街や景色の画像</li><li>・海外の高級店の外装や内装の画像</li></ul></div><p>を無料のダウンロードサイトを探せば見つかりますので、そこから利用して頂ければ問題ございません。</p><p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'cover_img_setting.png" class="mb-4"></p><p>上記の画像の<b>カバー画像</b>は、下記画像の<b>赤枠</b>に反映されます。</p><p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'cover_img_refrect.png" class="mb-4"></p><h4 class="font-weight-bold mt-5">写真1(プロフィール画像)</h4><p>こちらもカバー画像と同じくハイブランドを売るためのコンセプトに合った画像を設定します。</p><div role="alert" class="alert alert-danger h6"><ul><li>・犬等のペット画像</li><li>・女性や男性のモデル画像</li></ul></div><h3 class="font-weight-bold mt-5">PR情報設定</h3><p>ヘッダー上部の<b>PR情報メニュー</b>をクリックすると、PR情報入力画面にアクセスします。</p><p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'prinfo.png" class="mb-4"></p><h4 class="font-weight-bold mt-5">お知らせ</h4><p>お知らせについては、他のショッパーさんを参考にして、お客様にとって<b>メリット</b>になる内容を記載して下さい。</p><p>他のショッパーさんのお知らせを見て参考にして頂ければ問題ございません。</p><p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'notice.png" class="mb-4"></p><h4 class="font-weight-bold mt-5">お取引について</h4><p>お取引についてについては、お客様と取引をする際の<b>クレーム対策</b>となり、何かトラブルが発生した時に<b>こちらを守るため</b>の内容を記載して頂ければ問題ございません。</p><p><img src="' . AppConstants::STORAGE_DISPLAY_FILE_PATH . 'transaction.png" class="mb-4"></p>', 'del_flg' => false],
            ['step_id' => '2', 'contents_name' => '出品作業の流れ', 'youtube_video_id' => 'iU9yeas4Mas', 'contents_text' => '↓ Gimpインストール先<br><a href="https://www.gimp.org/">https://www.gimp.org/</a>', 'del_flg' => false],
            ['step_id' => '2', 'contents_name' => '画像編集のやり方', 'youtube_video_id' => 'tk4fl6-NzYo', 'contents_text' => '↓ save image as typeインストーラー（公式サイト画像ダウンロード時使用）<br>
<a href="https://chrome.google.com/webstore/detail/save-image-as-type/gabfmnliflodkdafenbcpjdlppllnemd">https://chrome.google.com/webstore/detail/save-image-as-type/gabfmnliflodkdafenbcpjdlppllnemd</a>', 'del_flg' => false],
            ['step_id' => '2', 'contents_name' => 'BUYMA商品販売時に発生する経費について', 'youtube_video_id' => '', 'contents_text' => '<h3 class="font-weight-bold">BUYMA商品販売時に発生する経費について</h3><p>BUYMA商品販売時に発生する経費についてご説明させて頂きます。</p><p>リサーチを行う上で、商品を販売する際に赤字にならないよう、<b>商品を販売した際にどれくらいの経費が発生するのか</b>を把握しておく必要があります。</p><p>リサーチ動画では赤字にならないための計算式はお伝えしておりますが、もしご自身で価格設定をしたい場合に、どれくらい費用が発生するのかについて知識が必要になるため、是非覚えて頂ければと思います。</p><br><p class="font-weight-bold">商品販売時に必要となる経費の項目は以下になります。</p><p>・商品代金</p><p>・送料</p><p>・梱包費</p><p>・外注費</p><p>・BUYMA手数料</p><p>・送金手数料</p><p>・カード決済手数料</p><p>・関税</p><br><p>外注費に関しては、買付外注さん買付を行って頂く際に必要な<b>交通費と報酬（3,000円～5,000円）</b>が発生します。</p><p>ですので、大体<b>4,000円～6000円前後</b>発生するものと想定して頂ければ問題ございません。</p><br><p>BUYMA手数料に関しては、<b>商品販売価格の7.7%</b>発生します。利益計算時には、BUYMA手数料も発生する事を忘れないように計算を行って下さ</p><p>い。</p><p>プレミアムパーソナルショッパーの場合だと、<b>5.4%</b>と手数料が安くなり、ショップの場合だと、売上によって手数料が安くなります。</p>↓ショップの手数料について<br><p><a href="https://qa.buyma.com/bm/usage-fee/5930.html">https://qa.buyma.com/bm/usage-fee/5930.html</a></p><br><p>送金手数料に関して、<b>買付パートナーさんへ買付依頼を行う場合は現金を口座に送金</b>する必要があります。</p><p>送金方法としては、<b>海外の買付パートナーさんの場合は海外口座に送金</b>する必要があるので、送金方法としては<b>TrasferWiseかPaypal</b>で送金する事</p><p>ができます。</p><b>国内口座対応可能な買付パートナーさんの場合は、国内口座に直接送金</b>を行って下さい。</p><p>海外口座送金の場合は、<b>TrasferWiseの方が手数料が圧倒的に安い</b>ので、<b>TrasferWiseで送金</b>する事をおすすめ致します。</p><p class="font-weight-bold">↓TrasferWize<br><a href="https://wise.com/jp">https://wise.com/jp</a></p><p class="font-weight-bold">↓Paypal<br><a href="https://www.paypal.com/jp/webapps/mpp/personal">https://www.paypal.com/jp/webapps/mpp/personal</a></p><br><p>カード決済手数料に関しては、海外でカード決済する際に為替手数料が発生します。</p><p>また、以下のように取り扱うカードブランドによって為替手数料の割合が変動しますので、参考にして頂ければと思います。</p><p>VISA、Mastercard、JCB ・・・ 1.63%</p><p>アメックス ・・・ 2%</p><br><p>関税に関しては、今回は<b>直営店から買付パートナーさん経由でお客様の元へ直送</b>しますので、お客様負担になり関係ないのですが、どれくらい金額</p><p>が発生するのかをお問い合わせがくる事がよくありますので、こちらも覚えておいて頂くようお願い致します。</p><p>個人輸入の場合の計算式は、下記になります。</p><p class="font-weight-bold">(仕入れ価格 + 送料 + 保険料) * 60%</p><p><b>仕入れ価格と送料と保険料の6割</b>が課税対象の価格になり、<b>200,000円の価格だと60%の120,000円に対して、関税が発生します。</b></p><p>また、関税の税率は<b>カバンや財布の場合は10%～15%</b>前後発生し、<b>革靴の場合は30%</b>とカテゴリによって変わってきます。</p>難しくてわからない方でも、下記のサイトにて<b>商品価格と税率を入力して頂ければ関税の自動計算</b>ができますので、是非活用して頂ければと思いま</p><p>す。税率についても下記のリンクに記載していますので、ご確認下さい。</p>関税自動計算ツール<br><a href="https://www.kaigai2han.com/1-x-0/">https://www.kaigai2han.com/1-x-0/</a>', 'del_flg' => false],
            ['step_id' => '2', 'contents_name' => '出品外注さん募集の流れ', 'youtube_video_id' => 'MSbpSrteETs', 'contents_text' => '', 'del_flg' => false],
            ['step_id' => '2', 'contents_name' => '出品外注さんの募集方法', 'youtube_video_id' => 'jIeADvrsOkg', 'contents_text' => '', 'del_flg' => false],
            ['step_id' => '2', 'contents_name' => '出品外注さんの対応の仕方', 'youtube_video_id' => '', 'contents_text' => '<h3 class="font-weight-bold">出品外注さんの対応の仕方</h3><p>バイマを運営していく上で、<b>利益を上げていくには出品数を増やしていく事</b>が重要になりますので、<b>出品外注さんとの対応が非常に重要になってい</p><p>きます。</b></p><p>そのため、一人あたりの出品数を伸ばしていけるように<b>環境づくりをしていく事</b>が大切です。</p><br><p>利益を上げていくために重要なポイントの<b>1つ目は、コミュニケーション</b>です。</p><p>わからない所があったら丁寧に説明したり、逆にしっかり作業進めて頂けたら、作業進めて頂きましてありがとうございます。等、感謝の言葉や褒</p><p>めて頂く事を意識して進めて頂ければ、頑張って次からも出品数増やして頂けるので是非実践してみて下さい。</p><br><p><b>2つ目はお給料を条件付きで上げる事</b>です。</p><p><b>毎月出品数100件を超える場合、101件目以降は40円から50円にお給料を上げる</b>事が効果的です。そうすれば、出品外注さんも100件以上は気合い入</p><p>れて進めてくださります。</p><br><p>コミュニケーション、お給料を上げていく上記の方法で進めて頂ければ、出品数も自然に伸びてくるので、実践して頂くようお願い致します。</p><p>ただ、それでもやってくださらない方もいますので、その場合は<b>思い切って新しい出品外注さんを募集する事をお勧めします。</b></p><p>また新しく募集した出品外注さんがしっかりと出品数伸ばしてくださる可能性がありますので、是非実践して頂ければと思います。</p>', 'del_flg' => false],
            ['step_id' => '3', 'contents_name' => 'リサーチ方法①_人気順リサーチ', 'youtube_video_id' => 'QMf0YwZcMn0', 'contents_text' => '為替レート変換君<br><a href="http://fx.monegle.com/">http://fx.monegle.com/', 'del_flg' => false],
            ['step_id' => '3', 'contents_name' => 'リサーチ方法②_ショッパーリサーチ', 'youtube_video_id' => 'qEziqpL4tB8', 'contents_text' => '世界各国のGoogle検索ページ<br><a href="https://so-zou.jp/web-app/tech/search-engine/google/url/">https://so-zou.jp/web-app/tech/search-engine/google/url/</a>', 'del_flg' => false],
            ['step_id' => '3', 'contents_name' => 'リサーチ方法③_旬ワードリサーチ', 'youtube_video_id' => 'Sk1XOE50Jl8', 'contents_text' => '<p>季節毎に売れるカテゴリ</p><table class="table table-bordered"><tr><th>1月</th><td>ストール・パンプス・ワンピース・サンダル・サングラス・ショートパンツ等の春物</td></tr><tr><th>2月</th><td>ストール・パンプス・ワンピース・サンダル・サングラス・ショートパンツ等の春物</td></tr><tr><th>3月</th><td>ブラウス・シャツ・サンダル・サングラス等の夏物</td></tr><tr><th>4月</th><td>ブラウス・シャツ・サンダル・サングラス等の夏物</td></tr><tr><th>5月</th><td>ブラウス・シャツ・サンダル・サングラス等の夏物</td></tr><tr><th>6月</th><td>ブラウス・シャツ・サンダル・サングラス等の夏物</td></tr><tr><th>7月</th><td>ブラウス・シャツ・サンダル・サングラス等の夏物</td></tr><tr><th>8月</th><td>ブーツ、コート、マフラー、ジャケット等の秋冬物</td></tr><tr><th>9月</th><td>ブーツ、コート、マフラー、手袋等の秋冬物</td></tr><tr><th>10月</th><td>ブーツ、コート、マフラー、手袋等の冬物</td></tr><tr><th>11月</th><td>ブーツ、コート、マフラー、手袋等の冬物</td></tr><tr><th>12月</th><td>ブーツ、コート、マフラー、手袋等の冬物</td></tr></table>', 'del_flg' => false],
            ['step_id' => '3', 'contents_name' => 'リサーチ方法_CHANELとHERMES', 'youtube_video_id' => '9hmhER5UFuc', 'contents_text' => '<p>各ブランド毎の買付先優先順位</p><table class="table table-bordered"><tr><th>ルイヴィトン</th><td>①ヨーロッパ全域（フランス、イタリア、ドイツ等）②イギリス、スイス ③シンガポール、アメリカ、オーストラリア、韓国、香港、中国等</td></tr><tr><th>シャネル</th><td>①香港、トルコ、日本 ②アメリカ、スイス ③ヨーロッパ</td></tr><tr><th>エルメス</th><td>①ヨーロッパ全域（フランス、イタリア、ドイツ等）②イギリス、スイス ③シンガポール、アメリカ、オーストラリア、韓国、香港、中国等</td></tr></table>', 'del_flg' => false],
            ['step_id' => '4', 'contents_name' => '商品の仕入れ方・送金方法について', 'youtube_video_id' => 'N6ZS8aFO6cQ', 'contents_text' => '', 'del_flg' => false],
            ['step_id' => '4', 'contents_name' => '買付外注さんの見つけ方_クラウドワークス・ランサーズ', 'youtube_video_id' => 'uMSQowyNw8E', 'contents_text' => '', 'del_flg' => false],
            ['step_id' => '4', 'contents_name' => '買付外注さんの見つけ方_地球の歩き方', 'youtube_video_id' => 'wrYVdsjGbtM', 'contents_text' => '', 'del_flg' => false],
            ['step_id' => '4', 'contents_name' => '買付外注さんの見つけ方_SNS（フェイスブック・インスタグラム）', 'youtube_video_id' => '53yjOcfijp8', 'contents_text' => '', 'del_flg' => false],
            ['step_id' => '5', 'contents_name' => '利益の上げ方', 'youtube_video_id' => 'TrpuyF9bUIA', 'contents_text' => '', 'del_flg' => false],
            ['step_id' => '5', 'contents_name' => '評価を上げるための工夫', 'youtube_video_id' => 'eZDM8z8xdBU', 'contents_text' => '', 'del_flg' => false],
            ['step_id' => '5', 'contents_name' => 'トラブル対応方法', 'youtube_video_id' => '4iWtoBP_1sk', 'contents_text' => '', 'del_flg' => false],
            ['step_id' => '5', 'contents_name' => '資金繰りについて', 'youtube_video_id' => 'xQRCJGYR4ng', 'contents_text' => '<p>↓ ハピタス<br><a href="https://hapitas.jp/register">https://hapitas.jp/register</a></p>↓ 日本政策金融公庫<br><a href="https://www.jfc.go.jp/">https://www.jfc.go.jp/</a>', 'del_flg' => false],
            ['step_id' => '5', 'contents_name' => 'BUYMA利用規約について', 'youtube_video_id' => 'sBkLsVRJBMw', 'contents_text' => '↓ 利用規約<br><a href="https://qa.buyma.com/">https://qa.buyma.com/</a>', 'del_flg' => false],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
