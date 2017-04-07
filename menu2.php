<?php
	//MySQLへの接続文字列を定義
	$dsn = 'mysql:host=localhost;dbname=testphp;charset=utf8';
	$user = 'root';
	$pass = 'root';
	
	//MySQLにPDO接続するためのクラスを定義
	$db = new PDO($dsn, $user, $pass);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	

	
?>


<script>
	/**
	 * 確認ダイアログの返り値によりフォーム送信
	*/
	function submitChk () {
		/* 確認ダイアログ表示 */
		var flag = confirm ( "データを出力します。\nよろしいでしょうか。");
		/* flag が TRUEなら出力実行、FALSEなら出力しない */
		return flag;
	}
</script>


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
									PHP+MySQL テーブルレコードの登録、表示、出力
								</td>
							</tr>
							<tr class="topicsbody">
								<td>
									<div>①PHPでMySQLのテーブルレコードにフォームデータの値を登録してみる</div>
									<div>
										<Form id="testact1" action="testact1.php" method="post" class="form1">
											<div class="topicssubhead">選手名登録(サンプル)</div>
											<div>球団</div>
											<div>
												<select name="team" form="testact1">
													<?php
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
														
														//コンボボックスに初めに取得したデータを表示
														while ($row = $stmt->fetch()):
															echo "<option value=\"" . $row['no'] . "\">" . $row['teamname'] . "</option>";
														endwhile;
													?>
												</select>
											</div>
											<div>背番号</div>
											<div><input type="text" name="backno" required aria-required="true"></div>
											<div>選手名</div>
											<div><input type="text" name="humname" required aria-required="true"></div>
											<div><input type="submit" value="登録" class="button"></div>
										</Form>
									</div>
									<div class="blankrow"></div>
									<div>②登録したデータを一覧で表示してみる</div>
									<div>
										<table class="datalist">
											<thread>
												<tr>
													<td class="dataheader">
														チーム名
													</td>
													<td class="dataheader">
														背番号
													</td>
													<td class="dataheader">
														選手名
													</td>
												</tr>
											</thread>
											<tbody>
												<?php
													//プリペイドステートメントを作成
													//球団名のコンボボックスを取得するクエリをセット
													$stmt = $db->prepare("
															SELECT teamname.teamname,testact1.backno, testact1.humname FROM testact1,teamname WHERE testact1.teamno = teamname.no"
														);
													
													//例外発生時にエラーを出力
													try{
														//クエリを実行
														$stmt->execute();
													}catch(PDOExeption $e){
														//クエリ実行時にエラーが発生した場合、エラーで返却
														die('エラー：' . $e->getMessage());
													}
													
													//コンボボックスに初めに取得したデータを表示
													while ($row = $stmt->fetch()):
														//<tr><td>球団名</td><td>背番号</td><td>選手名</td></tr>
														echo '<tr><td class=\'datarow\'>' . $row['teamname'] . '</td><td class=\'datarow\' style=\'text-align:center;\'>' . $row['backno'] . '</td><td class=\'datarow\'>' . $row['humname'] . '</td></tr>';
													endwhile;
													$db= null;
												?>
											</tbody>
										</table>
									</div>
									<div class="blankrow"></div>
									<div>③登録したデータを出力してみる</div>
									<div>
										<form id="output" action="testact2.php" method="post" class="form1" onsubmit="return submitChk()">
											<div><input type="file" name="outputpass" id="outputpass" accept="text/plain"></div>
											<div><input type="submit" value="出力実行" class="button"></div>
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
