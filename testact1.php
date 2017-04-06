<?php
	//submit反映確認用スクリプト
	//サンプルフォームからPOST送信されたデータを
	//本スクリプトで「testphp」DBの「testact1」テーブルに新規登録する(Insertのみ)
	
	//チーム名、背番号、氏名を配列に格納
	$testact1result = array(
		"team" => $_POST['team'],
		"backno" =>$_POST['backno'],
		"humno" =>$_POST['humname']
	);
	
	//動作確認用でページに表示
	foreach($testact1result as $result){
		echo "<div>" . $result . "</div>";
	}
	
	
	//条理チェック(ブランク検知)
	//背番号もしくは氏名がブランクの場合、エラーで返却
	if ($testact1result['backno'] == '' || $testact1result['humno'] == ''){
		header('Location: menu2.php');
		exit();
	}
	
	
	
	//MySQLへの接続文字列を定義
	$dsn = 'mysql:host=localhost;dbname=testphp;charset=utf-8';
	$user = 'root';
	$pass = '';
	
	
	
	
	
?>