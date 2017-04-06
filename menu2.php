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
													<option value="読売ジャイアンツ" selected>読売ジャイアンツ</option>
													<option value="阪神タイガース">阪神タイガース</option>
													<option value="中日ドラゴンズ">中日ドラゴンズ</option>
													<option value="横浜DeNAベイスターズ">横浜DeNAベイスターズ</option>
													<option value="広島東洋カープ">広島東洋カープ</option>
													<option value="東京ヤクルトスワローズ">東京ヤクルトスワローズ</option>
													<option value="オリックス・バファローズ">オリックス・バファローズ</option>
													<option value="福岡ソフトバンクホークス">福岡ソフトバンクホークス</option>
													<option value="北海道日本ハムファイターズ">北海道日本ハムファイターズ</option>
													<option value="千葉ロッテマリーンズ">千葉ロッテマリーンズ</option>
													<option value="埼玉西武ライオンズ">埼玉西武ライオンズ</option>
													<option value="東北楽天ゴールデンイーグルズ">東北楽天ゴールデンイーグルズ</option>
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
