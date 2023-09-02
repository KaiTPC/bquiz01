<?php include_once "base.php";?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>卓越科技大學校園資訊系統</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
</head>

<body>
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>

	<div id="main">
		<a title="" href="">
			<!-- https://www.php.net/manual/zh/function.property-exists.php -->
			<!--https://community.devsense.com/d/839-php0416-arrayobject-builtin-class-reports-error/3  -->

			<div class="ti" style="background:url('./upload/<?=$Title->img;?>'); background-size:cover;"></div>
			<!-- 指到db內的 title 內的 img 函式 -->
			<!--標題-->
		</a>
	
			<!-- 引入時以網址方式載入 -->
			<?php
			$do = $_GET['do'] ?? 'main'; //使用三元運算式來取得網址的GET參數

			$file = "./view/front/" . $do . ".php"; //建立檔案路徑及檔名

			//判斷檔案是否存在,存在則載入,不存在則載入首頁 main.php (實際上寫入db)
		
			if (file_exists($file)) {
				include $file;
			} else {
				include "./View/Front/main.php";
			}
			?>
					<script>
						var nowpage = 0,
							num = 0;

						function pp(x) {
							var s, t;
							if (x == 1 && nowpage - 1 >= 0) {
								nowpage--;
							}
							if (x == 2 && (nowpage < (num - 3)) <= num * 1 + 3) {
								nowpage++;
							}
							$(".im").hide()
							for (s = 0; s <= 2; s++) {
								t = s * 1 + nowpage * 1;
								$("#ssaa" + t).show()
							}
						}
						pp(1)
					</script>
				</div>
			</div>
		</div>
		<div style="clear:both;"></div>
		<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
			<span class="t" style="line-height:123px;"></span>
		</div>
	</div>

</body>

</html>