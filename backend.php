<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0068)?do=admin&redo=title -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<!-- 引入do > title之前也要同時修改 -->
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
	<!-- 引入do > title之前也要同時修改 -->
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>
	<iframe style="display:none;" name="back" id="back"></iframe>
	<div id="main">
		<!-- title 這裡要修改載入方式 -->
		<!-- <a title="<?= $Title->title; ?>" href="index.php"> -->
		<!-- 為何選單列背景圖還沒出現?因為下方的url內還沒設定路徑 -->
		
		<div class="ti" style="background:url(./upload/<?= $Title->img; ?>); background-size:cover;"></div>標題
		<!--目前還未定義  -->
		</a>
		<div id="ms">
			<div id="lf" style="float:left;">
				<div id="menuput" class="dbor">
					<!--主選單放此-->
					<span class="t botli">後台管理選單</span>
					<a style="color:#000; font-size:13px; text-decoration:none;" href="./Management page_files/Management page.htm">
						<div class="mainmu">
							網站標題管理 </div>
					</a>
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=ad">
						<div class="mainmu">
							動態文字廣告管理 </div>
					</a>
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=mvim">
						<div class="mainmu">
							動畫圖片管理 </div>
					</a>
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=image">
						<div class="mainmu">
							校園映象資料管理 </div>
					</a>
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=total">
						<div class="mainmu">
							進站總人數管理 </div>
					</a>
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=bottom">
						<div class="mainmu">
							頁尾版權資料管理 </div>
					</a>
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=news">
						<div class="mainmu">
							最新消息資料管理 </div>
					</a>
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=admin">
						<div class="mainmu">
							管理者帳號管理 </div>
					</a>
					<a style="color:#000; font-size:13px; text-decoration:none;" href="?do=admin&redo=menu">
						<div class="mainmu">
							選單管理 </div>
					</a>


				</div>
				<div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
					<span class="t">進站總人數 :
						1 </span>
				</div>
			</div>

			<?php
			$do = $_GET['do'] ?? 'title'; //使用三元運算式來取得網址的GET參數

			$file = "./view/backend/" . $do . ".php"; //建立檔案路徑及檔名

			//判斷檔案是否存在,存在則載入,不存在則載入main.php (實際上寫入db)

			// 92行有讀取問題

			if (file_exists($file)) {
				include $file;
			} else {
				include "./view/backend/title.php";
			}

			// 
			?>

		</div>
		<div style="clear:both;"></div>
		<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;"></span>
		</div>
	</div>

</body>

</html>