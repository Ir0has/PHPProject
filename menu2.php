<?php
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
			select * from teamname"
		);
	
	//例外発生時にエラーを出力
	try{
		//クエリを実行
		$stmt->execute();
	}catch(PDOExeption $e){
		//クエリ実行時にエラーが発生した場合、エラーで返却
		die('エラー：' . $e->getMessage());
	}
	
?>


<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>karihataの勉強のページ</title>
		<link rel="stylesheet" type="text/css" href="./css/menu2.css" media="all">
	</head>
	<body class="menu">
		<div>
			<a href="top.html">＜＜TOPページ</a>
		</div>
		<div align="center">
			<table class="common">
				<tr>
					<td align="center">
						<table class="title">
							<tr>
								<td>
									<div>
										メニュー２
									</div>
									<div>
										～PHPとGitHubの勉強用のページ～
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr class="blankrow"><td></td></tr>
				<tr>
					<td align="left">
						<table class="topics">
							<tr class="topicshead">
								<td>
									PHP+MySQL テーブルレコードの登録
								</td>
							</tr>
							<tr class="topicsbody">
								<td>
									<div>PHPでMySQLのテーブルレコードにフォームデータの値を登録してみる</div>
									<div>
										<Form id="testact1" action="testact1.php" method="post" class="form1">
											<div class="topicssubhead">サンプルフォーム</div>
											<div>球団<div/>
											<div>
												<select name="team" form="testact1">
													<?php
														//コンボボックスに初めに取得したデータを表示
														while ($row = $stmt->fetch()):
															echo '<option value=\"' . $row['no'] . '\">' . $row['teamname'] . '</option>';
														endwhile;
													?>
													
												</select>
											</div>
											<div>背番号<div/>
											<div><input type="text" name="backno" aria-required="true"></div>
											<div>氏名<div/>
											<div><input type="text" name="humname" aria-required="true"></div>
											<div><input type="submit" value="登録" class="botton"></div>
										</form>
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
