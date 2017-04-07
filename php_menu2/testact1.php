<?php
	//submit反映確認用スクリプト
	//サンプルフォームからPOST送信されたデータを
	//本スクリプトで「testphp」DBの「testact1」テーブルに新規登録する(Insertのみ)
	
	//チーム名、背番号、氏名を配列に格納
	$testact1result = array(
		"team" => $_POST['team'],
		"backno" => $_POST['backno'],
		"humname" => $_POST['humname']
	);
	
	//動作確認用でページに表示
	foreach($testact1result as $result){
		echo "<div>" . $result . "</div>";
	}
	
	
	//条理チェック(ブランク検知)
	//背番号もしくは氏名がブランクの場合、エラーで返却
	if ($testact1result['backno'] == '' || $testact1result['humname'] == ''){
		header('Location: ../menu2.php');
		exit();
	}
	
	
	
	//MySQLへの接続文字列を定義
	$dsn = 'mysql:host=localhost;dbname=testphp;charset=utf8';
	$user = 'root';
	$pass = 'root';
	
	//MySQLにPDO接続するためのクラスを定義
	$db = new PDO($dsn, $user, $pass);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	
	//プリペイドステートメントを作成
	$stmt = $db->prepare("
		INSERT into testact1 (teamno, backno, humname)
		VALUES (:teamname, :backno, :humname)"
		);
	
	//ステートメントパラメータを設定
	$stmt->bindparam('teamname',$testact1result['team'],PDO::PARAM_STR);
	$stmt->bindparam('backno',$testact1result['backno'],PDO::PARAM_STR);
	$stmt->bindparam('humname',$testact1result['humname'],PDO::PARAM_STR);
	
	
	//例外発生時にエラーを出力
	try{
		//クエリを実行
		$stmt->execute();
		
		//「menu2.php」に返却
		header('Location: ../menu2.php');
		exit();
		$db= null;
	}catch(PDOExeption $e){
		//クエリ実行時にエラーが発生した場合、エラーで返却
		
		die('エラー：' . $e->getMessage());
		header('Location: ../menu2.php');
		$db= null;
	}
	
	
	
?>