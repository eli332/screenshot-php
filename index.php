<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style>
        body { background-color: #efefef;min-height: 100vh; }
    </style>
</head>
<body>

    <?php

    // $page_content = file_get_contents('https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=https://www.stackoverflow.com/&screenshot=true');
    $page_content = file_get_contents('https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=https://lucasmoreira.com.br/&screenshot=true');
    $page_content = json_decode($page_content);

    echo '<pre>';
    // echo 'responseCode: '.$page_content->responseCode.'<br>';
    echo 'title: '.$page_content->title.'<br>';
    // echo 'score: '.$page_content->score.'<br>';
    // print_r($page_content->screenshot);
    // echo 'screenshot: '.$page_content->screenshot->data.'<br>';
    echo 'screenshot: '.$page_content->screenshot->height.'<br>';
    echo 'screenshot: '.$page_content->screenshot->width.'<br>';
    echo 'screenshot: '.$page_content->screenshot->mime_type.'<br>';
    $image_data = $page_content->screenshot->data;
    // print_r($page_content);
    // die();

    $image_data = str_replace(array('_','-'), array('/','+'), $image_data); 
    ?>

    <img height="179" width="320" src="data:image/jpeg;base64, <?php echo $image_data ?>" alt="">

</body>
</html>