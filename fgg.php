<?php //子テーマ用関数

//親skins の取得有無の設定
function include_parent_skins(){
  return true; //親skinsを含める場合はtrue、含めない場合はfalse
}

//子テーマ用のビジュアルエディタースタイルを適用
add_editor_style();

//以下にSimplicity子テーマ用の関数を書く
add_image_size('thumb750',750,450,true);

/* pop-tabs.js読み込み */
function my_scripts() {
	wp_enqueue_script( 'pop-tabs', get_bloginfo( 'stylesheet_directory') . '/pop-tabs.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts');

/* ヘッダー下にウィジェットエリアを作成 */
if (function_exists('register_sidebar')) {

	register_sidebar(array(
		'name' => 'ヘッダー下用ウィジェット',
		'id' => 'header-bottom',
		'description' => 'ヘッダー下に表示するウィジェットです。',
		'before_widget' => '<div class="header-bottom">',
		'after_widget' => '</div>',
	));
}
/***************************************************************/
/***************************************************************/
/***************************************************************/
/***************************************************************/
/***************************************************************/





//ぶろにゅー
function rssBlonew($iti = 0){
    require_once "Cache/Lite.php";
    $cache_opt = array(
        "cacheDir" => "./wp-content/themes/simplicity2-child/Cache/tmp/", //キャッシュファイルの保存場所
        "lifeTime" => 3600, //キャッシュ時間
        "pearErrorMode" => CACHE_LITE_ERROR_DIE
    );
    
    $cache_obj = new Cache_Lite($cache_opt); 
    
    // 読み込み件数を決定する
    if($iti == 0){
        $cache_id = "rssblonew0";
        if($cache_obj->get($cache_id)){
            //キャッシュが存在する場合は、キャッシュを取得
            $data = $cache_obj->get($cache_id);
            echo $data;
        } else {
            $url = "http://blog-news.doorblog.jp/feed/adult.xml";
            $num_of_data = 4;
            $result = rssBuroNew($url, $num_of_data);
            $cache_obj->save($result, $cache_id);
        }
        
        
    } else {
        $cache_id = "rssblonew1";
        if($cache_obj->get($cache_id)){
            $data = $cache_obj->get($cache_id);
            echo $data;
        } else {
            $url = "http://blog-news.doorblog.jp/feed/adult.xml";
            $num_of_data = 8;
            $result = rssBuroNew($url, $num_of_data);
            $cache_obj->save($result, $cache_id);
        }     
    }
    
    echo $result;
}


//にゅーぷる
function rssnewpul($iti = 0){
//キャッシュ処理
require_once "Cache/Lite.php";
//オプションの設定
$cache_opt = array(
"cacheDir" => "./wp-content/themes/simplicity2-child/Cache/tmp/", //キャッシュファイルの保存場所
"lifeTime" => 3600, //キャッシュ時間
"pearErrorMode" => CACHE_LITE_ERROR_DIE
);
    
    //オブジェクトを作成
$cache_obj = new Cache_Lite($cache_opt); 

 
  // 読み込み件数を決定する
    if($iti == 0){
        //キャッシュの目印
        $cache_id = "rssnewpul0";
        
        if($cache_obj->get($cache_id)){
            //キャッシュが存在する場合は、キャッシュを取得
            $data = $cache_obj->get($cache_id);
            echo $data;
        } else {
            //rssのurl
            $url = "http://newpuru.com/rss/adult.xml";
            //取得件数
            $num_of_data = 4;
            //処理関数にurlと取得数と位置を渡す
            $rdata = syoriNewpul($url, $num_of_data, $iti);
            //キャッシュを保存
            $cache_obj->save($rdata, $cache_id);
        }
        
    } else {
        $cache_id = "rssnewpul1";
        if($cache_obj->get($cache_id)){
            $data = $cache_obj->get($cache_id);
            echo $data;
        } else {
            $url = "http://newpuru.com/rss/all.xml";
        $num_of_data = 4;
        $rdata = syoriNewpul($url, $num_of_data, $iti);
        $cache_obj->save($rdata, $cache_id);
        }
        
    } 
    echo $rdata;   
    //キャッシュ保存   
    }    
	


//複数取得
function iroiro() {  

//キャッシュ処理
require_once "Cache/Lite.php";
//オプションの設定
$cache_opt = array(
"cacheDir" => "./wp-content/themes/simplicity2-child/Cache/tmp/", //キャッシュファイルの保存場所
"lifeTime" => 3600, //キャッシュ時間
"pearErrorMode" => CACHE_LITE_ERROR_DIE
);

   //オブジェクトを作成
$cache_obj = new Cache_Lite($cache_opt); 
$cache_id = "iroiro";
    
if($cache_obj->get($cache_id)){
//キャッシュが存在する場合は、キャッシュを取得
$data = $cache_obj->get($cache_id);
echo $data;

}else{

$rssList = array(
    "http://blog-news.doorblog.jp/feed/adult.xml",
    "http://blog-news.doorblog.jp/feed/omosiro.xml",   
);
    
$num_of_data = 4;
$site = 0;
$result = wRss($rssList, $num_of_data, $site);
echo $result;
//キャッシュ保存
$cache_obj->save($result, $cache_id);

}  
}


 

 

 
/*$url = "http://newmofu.doorblog.jp/rss/hot.xml";*/
 



//下部記事下にゅーぷる
function kaburss() {
    
    require_once "Cache/Lite.php";
    $cache_opt = array(
        "cacheDir" => "./wp-content/themes/simplicity2-child/Cache/tmp/", //キャッシュファイルの保存場所
        "lifeTime" => 3600, //キャッシュ時間
        "pearErrorMode" => CACHE_LITE_ERROR_DIE
    );
     $cache_obj = new Cache_Lite($cache_opt); 
     $cache_id = "kaburss";
    
    if($cache_obj->get($cache_id)){
        //キャッシュが存在する場合は、キャッシュを取得
        $data = $cache_obj->get($cache_id);
        echo $data;
    }else{
        $rssList = array(
        "http://newpuru.com/rss/world.xml",
        "http://newpuru.com/rss/2ch.xml",
        "http://newpuru.com/rss/omoshiro.xml"  
        );
        $num_of_data = 4;
        $site = 1;
        $result = wRss($rssList, $num_of_data, $site);
        echo $result;
    
    $cache_obj->save($result, $cache_id);
    }
    
    
}


//文字のみrss
function rssmoji() {
    require_once "Cache/Lite.php";
    $cache_opt = array(
        "cacheDir" => "./wp-content/themes/simplicity2-child/Cache/tmp/", //キャッシュファイルの保存場所
        "lifeTime" => 3600, //キャッシュ時間
        "pearErrorMode" => CACHE_LITE_ERROR_DIE
    );
     $cache_obj = new Cache_Lite($cache_opt); 
     $cache_id = "rssmoji";
    if($cache_obj->get($cache_id)){
        //キャッシュが存在する場合は、キャッシュを取得
        $data = $cache_obj->get($cache_id);
        echo $data;
    }else{
        $rss = "http://newmofu.doorblog.jp/rss/hot.xml";
	   // 読み込み件数を決定する
	   $num_of_data = 30;
        $result = syoriRssMoji($rss, $num_of_data);
        echo $result;	
        $cache_obj->save($result, $cache_id);
    }
    
}

//スマホフッターrss
function rssmobile(){
    
    require_once "Cache/Lite.php";
    $cache_opt = array(
        "cacheDir" => "./wp-content/themes/simplicity2-child/Cache/tmp/", //キャッシュファイルの保存場所
        "lifeTime" => 3600, //キャッシュ時間
        "pearErrorMode" => CACHE_LITE_ERROR_DIE
    );
     $cache_obj = new Cache_Lite($cache_opt); 
     $cache_id = "rssmobile";
    if($cache_obj->get($cache_id)){
        //キャッシュが存在する場合は、キャッシュを取得
        $data = $cache_obj->get($cache_id);
        echo $data;
    }else {
       // 読み込み件数を決定する
        $url = "http://blog-news.doorblog.jp/feed/adult.xml";
        $num_of_data = 4;
        $result = rssBuroNew($url, $num_of_data);
        echo $result; 
        $cache_obj->save($result, $cache_id);
        
    }
    
    
}









/*******************************************************************/
/*******************************************************************/
/*********curlで情報取得**********/
function curl($url) {
    $data = "";
    $agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36";
$header = array(
    'Accept-Encoding: deflate',
    'Accept-Language: ja,en-US;q=0.9,en;q=0.8',
);
    $cp = curl_init();
    $ref = "http://localhost/wp_original/";
    
    curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($cp, CURLOPT_URL, $url);
    curl_setopt($cp, CURLOPT_TIMEOUT, 60);
    curl_setopt($cp, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($cp, CURLOPT_COOKIESESSION, true);
    curl_setopt($cp, CURLOPT_COOKIEJAR, 'cookie-name');
curl_setopt($cp, CURLOPT_COOKIEFILE, './wp-content/themes/simplicity2-child/Cache/tmp/'); 
    curl_setopt($cp, CURLOPT_REFERER, $ref);
    

    
    curl_setopt($cp, CURLOPT_USERAGENT, $agent);
    curl_setopt($cp, CURLOPT_HTTPHEADER, $header);
    $data = curl_exec($cp);
    
    curl_close($cp);
    return $data;
}


/**********************************/
/******** ぶろにゅー処理部分*********/
/*********************************/
function rssBuroNew($url, $num_of_data) {
    
    $xml= curl($url);
    $rssdata = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA );
    
    for ($i=0; $i<$num_of_data; $i++){
    $entry = $rssdata->channel->item[$i]; //記事1個取得
    $date = date("Y/m/d", strtotime($entry->pubDate));
    $title = $entry->title; //タイトル取得
    $link = $entry->link; //リンクURL取得
        
        
        
        /* img文字列検索 */
        preg_match('/src="(.*?)"/u',$entry->description,$m);
        $src = $m[1];
        if(!isset($src)){
            $src = "http://localhost/wp_original/wp-content/uploads/2018/08/aaaw.jpg";
        }
        
        
        
        
        /*文字数*/
        $rtitle = wp_trim_words($title, 38 , '…' );
        
        $img .= '<div class="example"><ul><li><a href="'. $link .'"target="_blank"><img class="rssimg" src="'. $src .'">'. '<p class="tp">'. $rtitle . '</p></a></li></ul></div>';
    
	}
    
    $rdate =  $img;
}

/******* にゅーもふ文字rss処理********/
function syoriRssMoji($rss, $num_of_data) {
    $xml = curl($rss);
    $rssdata = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
    
    //出力内容の初期化
	$outdata = "";
    
    //設定した読み込み件数分だけ取得を繰り返す
	for ($i=0; $i<$num_of_data; $i++){
		$entry = $rssdata->channel->item[$i]; //記事1個取得
		$date = date("Y/m/d", strtotime($entry->pubDate));
		$title = $entry->title; //タイトル取得
		$link = $entry->link; //リンクURL取得

		//出力内容に日付けを入れる
		$outdata .= '<li><p class="rssmoji"><a href="' . $link . '" target="_blank">' ;

		//出力内容にリンク付きでタイトルを入れる
		$outdata .= '<span>' . $title . '</span></a> </p></li>';
      
	}

	$rdate = '<div class=rss1><ul>' . $outdata . '</ul></div>'; //実行結果を出力する
    return $rdate;

}

/*******************************/
/*************siteで分ける複数rss取得処理*****************/
function wRss($rssList, $num_of_data, $site) {
    
    //出力内容の初期化
	$outdata = "";
    for($n=0;$n<2;$n++){
        //URL設定
        $xml= curl($rssList[$n]);
        $rssdata = simplexml_load_string($xml,'SimpleXMLElement', LIBXML_NOCDATA);
    
        for ($i=0; $i<$num_of_data; $i++){
	   	$entry = $rssdata->channel->item[$i]; //記事1個取得
	   	$date = date("Y/m/d", strtotime($entry->pubDate));
	   	$title = $entry->title; //タイトル取得
	   	$link = $entry->link; //リンクURL取得
        /* img文字列検索 */
        if($site == 1){
            preg_match('/src="(.*?)"/u',$entry->children('content',true),$m);
            $src = $m[1];
            /* 画像ない場合*/
            if(!isset($src)){
                $src = "http://localhost/wp_original/wp-content/uploads/2018/08/aaaw.jpg";
            }
            $img .= '<div class="example2"><ul><li><a href="'. $link .'"target="_blank"><img class="kijirssimg" src="'. $src .'">'. '<p class="tp2">'. $title . '</p></a></li></ul></div>';
            
        } else {
            preg_match('/src="(.*?)"/u',$entry->description,$m);
            $src = $m[1];
            /* 画像ない場合*/
            if(!isset($src)){
                $src = "http://localhost/wp_original/wp-content/uploads/2018/08/aaaw.jpg";
            }
            $rtitle = wp_trim_words( $title, 38 , '…' );  
            $img .= '<div class="example"><ul><li><a href="'. $link .'"target="_blank"><img class="rssimg" src="'. $src .'">'. '<p class="tp">'. $rtitle . '</p></a></li></ul></div>';
        }
        
             
    
	}
}
    if($site == 1){
        $rdata = $img;
    } else {
        $rdata = $img; //全部出力する
    }
    return $rdata; 
}

/***************************/
/**********にゅーぷる****************/
/***********************************/
function syoriNewpul($url, $num_of_data, $iti) {
 
     $xml= curl($url);
     $rssdata = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA );

	//出力内容の初期化
	$outdata = "";
    $i = 0;

	//設定した読み込み件数分だけ取得を繰り返す
	/*for ($i=0; $i<$num_of_data; $i++)*/
        for ($i=0; $i<$num_of_data; $i++) {
		$entry = $rssdata->channel->item[$i]; //記事1個取得
		$date = date("Y/m/d", strtotime($entry->pubDate));
		$title = $entry->title; //タイトル取得
		$link = $entry->link; //リンクURL取得
        
        preg_match('/src="(.*?)"/u',$entry->children('content',true),$m);
        $src = $m[1];
        
        /* 画像ない場合*/
        if(!isset($src)){
            $src = "http://localhost/wp_original/wp-content/uploads/2018/08/aaaw.jpg";
          /*  $i--;
            continue;*/

        }
        /* img文字列検索 */
        if($iti == 2){// ヘッダー部分   
            
        $rtitle = wp_trim_words( $title, 38 , '…' );
        $img .= '<div class="example"><ul><li><a href="'. $link .'"target="_blank"><img class="rssimg" src="'. $src .'">'. '<p class="tp">'. $rtitle . '</p></a></li></ul></div>';
        } else {
        /*画像ダウンロード*/
         $kekka = gazouget($src);
        
        //ダウンロードできた場合
        if($kekka != 0) {
            $img .= '<div class="example2"><ul><li><a href="'. $link .'"target="_blank"><img class="kijirssimg" src="'. 'http://localhost/wp_original/wp-content/themes/simplicity2-child/download/'.$kekka .'">'. '<p class="tp2">'. $title . '</p></a></li></ul></div>';
        } else {
            /*$i--;
            continuea;*/
        }
        
        }  
        
	}
    
    /* ヘッダー部分　*/
    if($iti == 2){
        /*$rdata = '<div class="rssheader">' . $img . '</div>';*/
        $rdata = $img;
    } else{
        $rdata = $img ;
    }
    
    return $rdata;
}


function cache($cache_id) {
//PEARのキャッシュライブラリを読み込み
require_once "Cache/Lite.php";
 
//オプションの設定
$cache_opt = array(
"cacheDir" => "./wp-content/themes/simplicity2-child/Cache/tmp/", //キャッシュファイルの保存場所
"lifeTime" => 3600, //キャッシュ時間
"pearErrorMode" => CACHE_LITE_ERROR_DIE
);
 
//オブジェクトを作成
$cache_obj = new Cache_Lite($cache_opt);
 
/*$url = "http://newmofu.doorblog.jp/rss/hot.xml";*/
 
if($cache_obj->get($cache_id)){
//キャッシュが存在する場合は、キャッシュを取得
$data = $cache_obj->get($cache_id);
}else{
$data = file_get_contents($url);
//キャッシュが存在しない場合は、キャッシュを保存
$cache_obj->save($data, $cache_id);
}
    
}


function gazouget($src) {

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $src);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
$imgdata = curl_exec($ch);
curl_close($ch);
		
    $kekka = 0;
    if($imgdata == null || !$imgdata || empty($imgdata) || !isset($imgdata)) {
        
        return $kekka;    
    }
        
		$filename = basename($src);
        $filename = date('Ymdhis').$filename;
		file_put_contents('./wp-content/themes/simplicity2-child/download/'.$filename ,$imgdata);
        
        return $filename;

}

?>