<?php
require_once('imgtopdf/init.php');
use Ilovepdf\ImagepdfTask;
class Functions{
    public  $num=1;
    public function  __construct(){

    }

    public function convertToPdf($inputFile,$studentName){
	
        //Path where the file will be saved temp on the server
		echo $inputFile;
		$save_path="C:\\xampp\\htdocs\\recruitment\\application\\models\images\\";
        $upload_path="C:\\xampp\\htdocs\\recruitment\\application\\controllers\\";
        $myTask = new ImagepdfTask('project_public_8b48af26cd7d32dec89b35859ef2d93f_ULSnmb62edef6dcddd843eaba5a9176e03292','secret_key_aba451cd5371505f4b594e2c07dbee24_SosfHf7f7194cf7c520bb61aa630b2b59dcd4');
        $studentName = $studentName.".jpg";
        if (move_uploaded_file($inputFile,$upload_path)) {
            $file = $myTask->addFile($upload_path.$studentName);
            $myTask->execute();
            $myTask->download($save_path);
            unlink($upload_path.$studentName);
            return $save_path;
        }
        else{
            echo "move_uploaded_file() error!!" ;
        }
		
    }//end of convertToPdf

    /*
    This function performs the OCR task and is called by the addDocuments method of student controller when the submit button of the students_personal_documents form is pressed
    INPUT --> BUTTON PRESSED , FILE TO BE CONVERTED ,STRING TO BE CHECKED
    RETURNS --> Path of the file where it is been stored locally
    API: OCR Space*/
    public function doOCR($button,$image,$strToCheck){
        if($this->num==1){
            define ('SITE_ROOT', realpath(dirname(__FILE__)));
            $this->num=2;
        }
        if(isset($_POST[$button]) && isset($_FILES)) {
            require_once(__DIR__ . '/functions/vendor/autoload.php');
            $target_dir = "/functions//uploads/";
            $uploadOk = 1;
            $FileType = strtolower(pathinfo($_FILES[$image]["name"],PATHINFO_EXTENSION));
            $target_file = $target_dir . $this->generateRandomString() .'.'.$FileType;
            // Check file size
            if ($_FILES[$image]["size"] > 5000000) {
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

                if (is_uploaded_file($_FILES[$image]['tmp_name']))
                {


                    //in case you want to move  the file in uploads directory
                    move_uploaded_file($_FILES[$image]['tmp_name'], SITE_ROOT.$target_file);

                    return $this->uploadToApi($target_file,$strToCheck);
                }else {
                    header('HTTP/1.0 403 Forbidden');
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            header('HTTP/1.0 403 Forbidden');
            echo "Sorry, please upload a pdf file after if";
        }
    }//emd of doOCR Method
    /*This function is called by doOCR method which actually performs the OCR Task
    INPUT --> FILE TO BE CHECKED , STRING TO BE CHECKED
    RETURNS --> BOOLEAN
    */
    public function uploadToApi($target_file,$strToCheck){
        require_once(__DIR__ . '/functions/vendor/autoload.php');
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
                    //echo $text;
                    if ( (! empty($_POST[$strToCheck])) ){
                        $name = $_POST[$strToCheck];

                        if ( (strpos($text, $name) !== false))  {
                            //  echo "true";
                            return true;
                        }else{
                            return false;
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

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
?>