<?php
$link = "https://www.youtube.com/watch?v=ddddddd";

$api_url = "https://www.page2api.com/api/v1/scrape";
$payload = [
  "api_key" => "0f0eaee359a056c60b2300732c13064810ca16c5",
  "real_browser" =>  true,
  "premium_proxy" =>  "us",
  "wait_for" =>  "like-button-view-model",
  "parse" =>  [
    "title" =>  "meta[name=title] >> content"
  ]
];
$payload["url"] = $link;

$postdata = json_encode($payload);
$ch = curl_init($api_url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

echo $result, "<br>";

$valid = TRUE;
$errmsg = substr($result, 2, 5);
if($errmsg == "error") echo "failed to scrape";
else{
  echo "success";
}

?>