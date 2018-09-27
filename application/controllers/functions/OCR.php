<?php
if(isset($_POST['add_po']) && isset($_FILES)) {
    require __DIR__ . '/vendor/autoload.php';
    $target_dir = "/uploads/";
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
    $target_file = $target_dir . generateRandomString() .'.'.$FileType;
    echo $_FILES["image"]["tmp_name"];
    // Check file size
    if ($_FILES["image"]["size"] > 5000000) {
        header('HTTP/1.0 403 Forbidden');
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if($FileType != "pdf" && $FileType != "png" && $FileType != "jpg") {
        header('HTTP/1.0 403 Forbidden');
        echo "Sorry, please upload a pdf file";
        $uploadOk = 0;
    }
    if ($uploadOk == 1) {

        if (is_uploaded_file($_FILES['image']['tmp_name']))
        {
            define ('SITE_ROOT', realpath(dirname(__FILE__)));
            echo "<br> inside is_upload_file";
            //in case you want to move  the file in uploads directory
            move_uploaded_file($_FILES['image']['tmp_name'], SITE_ROOT.$target_file);
            echo 'moved file to destination directory';
            uploadToApi($target_file);
        }else {
            header('HTTP/1.0 403 Forbidden');
            echo "Sorry, there was an error uploading your file.";
        }


        /*if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            uploadToApi($target_file);
        } else {
            header('HTTP/1.0 403 Forbidden');
            echo "Sorry, there was an error uploading your file.";
        }*/
    }
} else {
    header('HTTP/1.0 403 Forbidden');
    echo "Sorry, please upload a pdf file after if";
}

function uploadToApi($target_file){
    require __DIR__ . '/vendor/autoload.php';
    // define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $fileData = fopen(SITE_ROOT.$target_file, 'r');
    $client = new \GuzzleHttp\Client();
    try {
        $r = $client->request('POST', 'http://api.ocr.space/parse/image',[
            'headers' => ['apiKey' => '9fa7089fcb88957'],
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => $fileData
                ]
            ]
        ], ['file' => $fileData]);
        $response =  json_decode($r->getBody(),true);
        if($response['ErrorMessage'] == "") {

            foreach($response['ParsedResults'] as $pareValue) {
                $text = $pareValue['ParsedText'];
                echo $text;
                if ( (! empty($_POST['placement_officer_name'])) ){
                    $name = $_POST['placement_officer_name'];
                    
                    if ( (strpos($text, $name) !== false))  {
                        echo 'true';
                    }else{
                        echo 'false';
                    }
                }
            }
        } else {
            header('HTTP/1.0 400 Forbidden');
            print_r( $response['ErrorMessage']);
        }
    } catch(Exception $err) {
        header('HTTP/1.0 403 Forbidden');
        echo $err->getMessage();
    }
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>