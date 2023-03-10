<?php
$botnet_agents = array("botnet-agent-1", "botnet-agent-2", "botnet-agent-3"); // Các user agent của botnet

$user_agent = $_SERVER['HTTP_USER_AGENT']; // Lấy user agent của người dùng truy cập trang web

foreach ($botnet_agents as $agent) { // Kiểm tra user agent có tồn tại trong danh sách của botnet hay không
  if (strpos($user_agent, $agent) !== false) { 
    die("Truy cập của bạn bị chặn do nguy cơ từ botnet. Vui lòng liên hệ với chúng tôi nếu bạn cần truy cập vào trang web.");
  }
}

// Chống lại DDoS bằng cách ngăn chặn người dùng gửi quá nhiều yêu cầu truy cập trong một khoảng thời gian ngắn
$ip_address = $_SERVER['REMOTE_ADDR']; // Lấy địa chỉ IP của người dùng truy cập trang web
$log_file = 'access_log.txt'; // Tên tệp nhật ký lưu trữ
$log_content = file_get_contents($log_file); // Đọc nội dung của tệp nhật ký

// Kiểm tra xem địa chỉ IP của người dùng đã truy cập trang web bao nhiêu lần trong khoảng thời gian 1 phút qua
$ip_count = substr_count($log_content, $ip_address);
if ($ip_count > 10) { // Nếu địa chỉ IP của người dùng đã truy cập trang web quá nhiều lần trong 1 phút
  sleep(5); // Ngăn chặn người dùng gửi yêu cầu truy cập trong 5 giây
}

// Nếu không phải là botnet hoặc DDoS, mở tệp hình ảnh ss.jpg
header('Content-Type: /domains/anontoken1.tk/public_html/jpeg');
readfile('mygirlfriend.jpg');

// Lưu địa chỉ IP của người dùng vào tệp nhật ký để kiểm tra DDoS
$log_content .= $ip_address . "\n";
file_put_contents($log_file, $log_content);
?>
