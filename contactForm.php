<?php
$recepient = "chernushov88@gmail.com,lexstatus2016@gmail.com";
$sitename = "sivochka";

$phone = trim($_POST["phone"]);
$name = trim($_POST["name"]);

$phone = trim($_POST["phone"]);
$name = trim($_POST["name"]);
/*
$data_form = trim($_POST["data_form"]);
$mail = trim($_POST["mail"]);
$country = trim($_POST["country"]);
$data_form = trim($_POST["data_form"]);
$city = trim($_POST["city"]);
$utm_source = trim($_POST["utm_source"]);
$utm_campaign = trim($_POST["utm_campaign"]);
$utm_medium = trim($_POST["utm_medium"]);
$date_submitted = trim($_POST["date_submitted"]);
$time_submitted = trim($_POST["time_submitted"]);
$ip_address = $_SERVER["REMOTE_ADDR"];
$page_variant_name = trim($_POST["page_variant_name"]);
$page_uuid = trim($_POST["page_uuid"]);
$page_name = trim($_POST["page_name"]);
$page_url = trim($_POST["page_url"]);
$ref = trim($_POST["ref"]);
$src = trim($_POST["src"]);
$utm_term = trim($_POST["utm_term"]);
$utm_content = trim($_POST["utm_content"]);
$lead_name = trim($_POST["lead_name"]);
$lead_price = trim($_POST["lead_price"]);
$event_id = trim($_POST["event_id"]);
$landing_version = trim($_POST["landing_version"]);
$event_type = trim($_POST["event_type"]);
$event_subject = trim($_POST["event_subject"]);
$event_source = trim($_POST["event_source"]);
$event_motivation = trim($_POST["event_motivation"]);
$message_template_id = trim($_POST["message_template_id"]);
$product_id = trim($_POST["product_id"]);
$GA_client_id = $_COOKIE['_ga'];
$hmid = trim($_POST["hmid"]);
$invite_id = trim($_POST["invite_id"]);
*/

$pagetitle = "Заявка на sivochka";
$messageTB = "
‼ $pagetitle ‼
👤 Имя: $name
☎ Телефон: $phone
";
$message = "
Имя: $name <br>
Телефон: $phone  <br>
";

//SEND MESSAGE TO TELEGRAM
function sendMessage($chatID, $message, $token)
{
$url = "https://api.telegram.org/" . $token . "/sendMessage?chat_id=" . $chatID;
$url = $url . "&text=" . urlencode($message);
$ch = curl_init();
$optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
curl_setopt_array($ch, $optArray);
$result = curl_exec($ch);
curl_close($ch);
}
$token = "bot1404308978:AAHuYHQaLXG6U-epkLgpFDlK-kVXnUSkhpQ";
$chatID = "-401661750";

sendMessage($chatID, $messageTB, $token);

// Для отправки HTML-письма должен быть установлен заголовок Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=urf-8' . "\r\n";

// Дополнительные заголовки
$headers .= 'From: http://syvochka.com';

mail($recepient, $pagetitle, $message, $headers);





