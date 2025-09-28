<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>停车优惠券发放</title>
	<link rel="icon" href="./img/icon.png" type="image/png">
    <style>
		.fixed-width {
            width: 200px; /* 设置固定宽度为200像素 */
        }
		.custom-input {
			margin: 10px 20px;       /* 设置宽度 */
			width: 100%;       /* 设置宽度 */
			height: 40px;       /* 设置高度 */
			font-size: 32px;    /* 设置字体大小 */
			padding: 5px;       /* 设置内边距 */
			border: 1px solid #ccc; /* 设置边框样式 */
			border-radius: 5px; /* 设置圆角 */
		}
    </style>
</head>
<body>
    <?php
	
	$chaxunStyle = "width: 100%; height: 50px; font-size: 32px; background-color: blue; color: white; margin: 10px 20px; ";
	$fafangStyle = "width: 100%; height: 50px; font-size: 32px; background-color: blue; color: white; margin: 10px 20px; display: none;";

	// 查询车牌号
	function chaxun($url) {
		// 设置上下文选项
		$headers = [
			"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 NetType/WIFI MicroMessenger/7.0.20.1781(0x6700143B) WindowsWechat(0x63090a13) UnifiedPCWindowsWechat(0xf2541022) XWEB/16467 Flue",
			"Accept: application/json, text/plain, */*",
			"PLATFORM-ID: 5",
			"O-ID: oMBwn6iNHrkRYXdI0WoTUE-gJh2M",
			"TOKEN: eyJraWQiOiJ2MTMiLCJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOjExNTIwNzgsInBob25lIjoiMUZEOEMxMzA5Q0YzQ0QxMzdEQTRFOUEzMjkxNUFDM0EiLCJvcGVuSWQiOiJvTUJ3bjZpTkhya1JZWGRJMFdvVFVFLWdKaDJNIiwidHlwZSI6Ik1QIiwiZXhwIjoxNzU4NjE2MTQ2fQ.6L6gsGTZNZwS1TdZ-77yL-LNguaRw88bnjKOrbghqhk",
			"Sec-Fetch-Site: same-origin",
			"Sec-Fetch-Mode: cors",
			"Sec-Fetch-Dest: empty",
			"Referer: https://h5.dianlvyizhan.com/",
			"Accept-Encoding: gzip, deflate, br",
			"Accept-Language: zh-CN,zh;q=0.9",
			"Cookie: PHONE_ID=1FD8C1309CF3CD137DA4E9A32915AC3A"
		];
		$options = [
			'http' => [
				'method' => 'GET',
				'header' => implode("\r\n", $headers) . "\r\n", // 确保最后有一个空行
			]
		];
		
		$context = stream_context_create($options);
		
		try {
			$response = file_get_contents($url, false, $context);
			
			if ($response === false) {
				throw new Exception("请求失败: " . implode(", ", error_get_last()));
			}
			
			return [
				'success' => true,
				'response' => $response,
				'info' => $http_response_header
			];
		} catch (Exception $e) {
			return [
				'success' => false,
				'error' => $e->getMessage()
			];
		}
	}
	// 发放停车券
	function fafang($url) {
		// 设置上下文选项
		$headers = [
			"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 NetType/WIFI MicroMessenger/7.0.20.1781(0x6700143B) WindowsWechat(0x63090a13) UnifiedPCWindowsWechat(0xf2541022) XWEB/16467 Flue",
			"Accept: application/json, text/plain, */*",
			"PLATFORM-ID: 5",
			"O-ID: oMBwn6iNHrkRYXdI0WoTUE-gJh2M",
			"TOKEN: eyJraWQiOiJ2MTMiLCJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1aWQiOjExNTIwNzgsInBob25lIjoiMUZEOEMxMzA5Q0YzQ0QxMzdEQTRFOUEzMjkxNUFDM0EiLCJvcGVuSWQiOiJvTUJ3bjZpTkhya1JZWGRJMFdvVFVFLWdKaDJNIiwidHlwZSI6Ik1QIiwiZXhwIjoxNzU4NjE2MTQ2fQ.6L6gsGTZNZwS1TdZ-77yL-LNguaRw88bnjKOrbghqhk",
			"Sec-Fetch-Site: same-origin",
			"Sec-Fetch-Mode: cors",
			"Sec-Fetch-Dest: empty",
			"Origin: https://h5.dianlvyizhan.com",
			"Referer: https://h5.dianlvyizhan.com/",
			"Accept-Encoding: gzip, deflate, br",
			"Accept-Language: zh-CN,zh;q=0.9",
			"Cookie: PHONE_ID=1FD8C1309CF3CD137DA4E9A32915AC3A"
		];
		$options = [
			'http' => [
				'method' => 'POST',
				'header' => implode("\r\n", $headers) . "\r\n", // 确保最后有一个空行
			]
		];
		
		$context = stream_context_create($options);
		
		try {
			$response = file_get_contents($url, false, $context);
			
			if ($response === false) {
				throw new Exception("请求失败: " . implode(", ", error_get_last()));
			}
			
			return [
				'success' => true,
				'response' => $response,
				'info' => $http_response_header
			];
		} catch (Exception $e) {
			return [
				'success' => false,
				'error' => $e->getMessage()
			];
		}
	}
	
	// 定义一个变量
    $message = "等待查询";
    // 检查表单是否提交
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['chaxun'])) {
			echo "按钮查询被点击了";
			
			$message = "查询进行中...";
			
			// 获取用户输入的车牌号
			$input_chepainum = $_POST['chepainum'];
			// echo '输入车牌号' . $input_chepainum;
			// echo urlencode($input_chepainum);
			$urlchepaihao = urlencode($input_chepainum);

			$microtime = microtime(true);
			$milliseconds = round($microtime * 1000);
			$url = "https://h5.dianlvyizhan.com/barrier/boot/barrier/query-inparking?plateNo=$urlchepaihao&plNo=DLPK0000033772&showCoupon=1&_t=$milliseconds";
			$result = chaxun($url);
			if ($result['success']) {
				// 对于JSON响应可以解码
				// $data = json_decode($result['response'], true);
				$message = $result['response'];
				// echo $result['response']['success'];
				$jsondata = json_decode($result['response'], true);
				// 检查解析是否成功
				if (json_last_error() !== JSON_ERROR_NONE) {
					$message = "JSON解析错误: " . json_last_error_msg();
				} else {
					if ($jsondata['success']) {
						
						$chaxunStyle = "width: 100%; height: 50px; font-size: 32px; background-color: blue; color: white; margin: 10px 20px; display: none;";
						$fafangStyle = "width: 100%; height: 50px; font-size: 32px; background-color: blue; color: white; margin: 10px 20px; ";
						// $inputStyle = "display: none;";
						
						$message = "车牌号：" . $_POST['chepainum'] . "\n<br>" . "停车时长：" . $jsondata['data']['parkingTime'] . "分钟\n<br>" . "停车费用：" . $jsondata['data']['shouldPayFee']/100 . "元\n<br>";
					} else {
					$message = $jsondata['msg'];
					}
				}
				
			} else {
				$message = "查询请求失败: " . $result['error'] . "\n";
			}
			
			
			
			
			
		} elseif (isset($_POST['fafang'])) {
			echo "按钮发放被点击了";
			$chaxunStyle = "width: 100%; height: 50px; font-size: 32px; background-color: blue; color: white; margin: 10px 20px; ";
			$fafangStyle = "width: 100%; height: 50px; font-size: 32px; background-color: blue; color: white; margin: 10px 20px; display: none;";
			// $inputStyle = "";
			
			$message = "发放进行中...";
			
			// 获取用户输入的车牌号
			$input_chepainum = $_POST['chepainum'];
			$urlchepaihao = urlencode($input_chepainum);

			$url = "https://h5.dianlvyizhan.com/barrier/boot/coupon/issue-merchant-tp-coupon?id=52&plateNo=$urlchepaihao";
			$result = fafang($url);
			if ($result['success']) {
				$message = $result['response'];
				$jsondata = json_decode($result['response'], true);
				// 检查解析是否成功
				if (json_last_error() !== JSON_ERROR_NONE) {
					$message = "JSON解析错误: " . json_last_error_msg();
				} else {
					if ($jsondata['success']) {
						$message = "发放成功！";
					} else {
					$message = $jsondata['msg'];
					}
				}
				
			} else {
				$message = "发放请求失败: " . $result['error'] . "\n";
			}
			
			
			
		}
		

    }
	
    ?>
	
	
	<header>
        <nav>
            <a href="/">
                <img src="./img/logo.png" alt="网站Logo" width="120" height="25">
            </a>
        </nav>
    </header>
    <h1>停车优惠券发放</h1>
    <form method="POST" action="">
		<input type="text" id="chepainum" name="chepainum"  class="custom-input" placeholder="输入车牌号" required style="<?php echo $inputStyle; ?>" value="<?php echo $input_chepainum; ?>">
        <br><br>
        <button type="submit" name="chaxun" style="<?php echo $chaxunStyle; ?>">查询</button>
		<button type="submit" name="fafang" style="<?php echo $fafangStyle; ?>">发放</button>
    </form>
	


	
	<br>
    <span style="font-size: 36px;"><?php echo $message; ?></span> <!-- 用于显示返回的数据 -->
	
</body>
</html>