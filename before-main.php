<?php
//メインカラムの手前に何かを挿入したいときは、このテンプレートを編集
//例えば、3カラムの左サイドバーなどをカスタマイズで作りたいときなどに利用します。

	dynamic_sidebar('header-bottom');

?>

<!-- rss -->
<!--<?php
	$rssdata = simplexml_load_file("http://2chnavi.net/headline/?rss=1");

	// 読み込み件数を決定する
	$num_of_data = 20;

	//出力内容の初期化
	$outdata = "";

    require_once("phpQuery-onefile.php");

	//設定した読み込み件数分だけ取得を繰り返す
	for ($i=0; $i<$num_of_data; $i++){
		$entry = $rssdata->channel->item[$i]; //記事1個取得
		$date = date("Y/m/d", strtotime($entry->pubDate));
		$title = $entry->title; //タイトル取得
		$link = $entry->link; //リンクURL取得

		//出力内容に日付けを入れる
		$outdata .= '<li><a href="' . $link . '" target="_blank">' ;

		//出力内容にリンク付きでタイトルを入れる
		$outdata .= '<span>' . $title . '</span></a>'.' '. $date .'</li>';
        
        
  
      
	}
    
    

	echo '<div class=rss1>'.'<ul>' . $outdata . '</ul>'.'</div>'; //実行結果を出力する
    
    ?>-->

<!--画像取得-->
<!--<?php
  require_once("phpQuery-onefile.php");
  $html = file_get_contents("http://nnews1.com/archives/76537422.html");
  $img1 = phpQuery::newDocument($html)->find("article")->find("img:eq(1)")->text("src");
  echo '<div class=img1>'.$img1 . '</div>';
?>-->

<!--サムネ-->
<?php
	$rssdata = simplexml_load_file("http://2chnavi.net/headline/?rss=1");

	// 読み込み件数を決定する
	$num_of_data = 5;

	//出力内容の初期化
	$outdata = "";

    

	//設定した読み込み件数分だけ取得を繰り返す
	for ($i=0; $i<$num_of_data; $i++){
		$entry = $rssdata->channel->item[$i]; //記事1個取得
		$date = date("Y/m/d", strtotime($entry->pubDate));
		$title = $entry->title; //タイトル取得
		$link = $entry->link; //リンクURL取得

		//出力内容に日付けを入れる
		$outdata .= '<li><a href="' . $link . '" target="_blank">' ;

		//出力内容にリンク付きでタイトルを入れる
		$outdata .= '<span>' . $title . '</span></a>'.' '. $date .'</li>';
        
        
        require_once("phpQuery-onefile.php");
        $html = file_get_contents($link);
        $doc = phpQuery::newDocument($html)->find("td")->find("a:contains(".substr($title,0,-2).")")->attr("href");
        echo $doc;
        
        /* .entry_title:eq(0) */
        
        $html3 = file_get_contents($doc);
        
        if( parse_url($doc)['host']=="summary.livedoor.biz" ) $html3 = "<html>".$html3;
        
        $html2 = phpQuery::newDocument($html3)->find("article")->find(".article-body")->find("img:eq(0)")->attr("src");
        
        
        $um .= '<li><img class="um" src="'. $html2 .'">'. '<p class="rt">'. $title . '</p>';
      
	}
   
    echo'<ul class="io">' . $um . '</ul>';  
    ?>


