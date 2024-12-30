This note refers to the file [create.php](/php/video/create.php).
The code from line 16 to 42 uses an API to fetch the data of the video from YouTube.
```    // Check if link is valid
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

    $errormsg = substr($result, 2, 5);
    if($errormsg == "error"){
        header("Location: ../../main_pages/create.html?err");
        exit();
    }
```
Therefore the execution of the code depends on the status of the API, so sometimes it doesn't work. When there is a problem with the code, the user is no longer able to create new video entries. To solve this, just comment out said lines. However, this means the user will be able to upload links that are invalid.
