<?php
//include the autoloader
require_once('../vendor/autoload.php');
//if manual installation has been used comment line that requires the autoload and uncomment this line:
//require_once('../init.php');

use Ilovepdf\ImagepdfTask;


// you can call task class directly
// to get your key pair, please visit https://developer.ilovepdf.com/user/projects
$myTask = new ImagepdfTask('project_public_03144eb45dd6bcfe1339f7f6121b283d_XalA382911eb5b90bbbaceb9310b336190ce1','secret_key_8aad35a9e6710bccf22b1227c4b173c6__iH4A1a682cb9773bdb79296b7d57709c0f87');

// file var keeps info about server file id, name...
// it can be used latter to cancel file
$file = $myTask->addFile('git-use.png');

// process files
$myTask->execute();

// and finally download file. If no path is set, it will be downloaded on current folder
$myTask->download();