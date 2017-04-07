<?php
	//submit反映確認用スクリプトその２
	//サンプルフォームからPOST送信されたデータを
	//本スクリプトで「testphp」DBの「testact1」テーブルレコードをテキストファイルに出力する
	//ファイル名はPOST送信元のテキストボックスの値を使用する
	
	//ファイルポインタを作成するための配列を用意
	$outputpass = $_POST['outputpass'];
	
	//動作確認用でページに表示
	echo "<div>" . $outputpass . "</div>";
	
	//条理チェック(ブランクチェック、ディレクトリ存在チェック)
	//出力先ファイルパスがブランク、もしくは存在しないディレクトリパスの場合
	if ($outputpass == ''){
		
		header('Location: menu2.php');
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
	//球団名のコンボボックスを取得するクエリをセット
	$stmt = $db->prepare("
			SELECT teamname.teamname, testact1.backno, testact1.humname FROM testact1,teamname WHERE testact1.teamno = teamname.no"
		);
	
	//例外発生時にエラーを出力
	try{
		//クエリを実行
		$stmt->execute();
		
		
		//ファイルポインタを作成
		$fp = fopen($outputpass,"w");
		
		if ($fp){
			
			//初めの行にはカラムヘッダーを書き込む
			$filedata = '球団名,背番号,選手名' . "\r\n";
			fwrite($fp, $filedata);
			
			
			while ($row = $stmt->fetch()):
				//球団名,背番号,選手名のカンマ区切りのCSV形式で出力を行う
				$filedata = $row['teamname'] . ',' . $row['backno'] . ',' . $row['humname'] . "\r\n";
				fwrite($fp, $filedata);
			endwhile;
			fclose($fp);
		}else{
			$fp = null;
			die('エラー：' . $e->getMessage());
		}
		$fp = null;
		
		
		//「menu2.php」に返却
		header('Location: menu2.php');
		exit();
		$db= null;
	}catch(PDOExeption $e){
		//クエリ実行時にエラーが発生した場合、エラーで返却
		echo 'エラー';
		//die('エラー：' . $e->getMessage());
		//header('Location: menu2.php');
		$db= null;
	}
	
	
	
?>