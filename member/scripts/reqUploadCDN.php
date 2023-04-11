<?php
include_once($_SERVER["DOCUMENT_ROOT"].'/include/config.php');
include_once($_SERVER["DOCUMENT_ROOT"].'/doSpaces/aws/autoloader.php');
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$s3Params=[
        'version' => 'latest',
        'region' => $config['doRegion'],
        'endpoint' => $config['doEndpoint'],
        'credentials' => [
            'key'    => $config['doApiKey'],
            'secret' => $config['doSecretKey'],
            ],
         'debug' => false
        ];
$s3 = new S3Client($s3Params);

if (isset($_POST['folderName'])) {
    $folderName = $_POST['folderName'].'/';
}

if (isset($_POST['uploadType'])) {
    $uploadType = $_POST['uploadType'];
}else {
    $uploadType = 'public-read';
}

if (($_FILES['attachmentData']['name'] != "")){
    $attachmentName = $_POST["attachment"];
    $attachmentSize = $_FILES['attachmentData']['size'];
    $attachmentType = $_FILES['attachmentData']['type'];
    $attachment_temp_name = $_FILES['attachmentData']['tmp_name'];
    $path_attachmentfilename_ext = $attachmentName;

    $putParams = [   
        'ContentLength'     => $attachmentSize,
        'ContentType'       => $attachmentType,
        'Bucket'            => $config['doBucketName'].$folderName,
        'Key'               => $config['doFolderName'].$path_attachmentfilename_ext, // this is the save as file in the space
        'Body'              => fopen($attachment_temp_name,rb), // and this is the file name on this server
        'ACL'               => $uploadType,
         ] ;

    try {
        $result = $s3->putObject($putParams);
        $result->toArray();
        $attStatusMsg = "Congratulations! Attachment Uploaded Successfully.";
    } catch (S3Exception $e) {
        $attStatusMsg = $e;
    }
} else {
    $attStatusMsg = "No Attachment Found.";
}

if (($_FILES['videoData']['name'] != "")){
    $mediaVideoName = $_POST["video"];
    $videoSize = $_FILES['videoData']['size'];
    $videoType = $_FILES['videoData']['type'];
    $video_temp_name = $_FILES['videoData']['tmp_name'];
    $path_videofilename_ext = $mediaVideoName;

    $putParams = [   
        'ContentLength'     => $videoSize,
        'ContentType'       => $videoType,
        'Bucket'            => $config['doBucketName'],
        'Key'               => $config['doFolderName'].$folderName.$path_videofilename_ext, // this is the save as file in the space
        'Body'              => fopen($video_temp_name,rb), // and this is the file name on this server
        'ACL'               => $uploadType,
         ] ;

    try {
        $result = $s3->putObject($putParams);
        $result->toArray();
        $videoStatusMsg = "Congratulations! Video File Uploaded Successfully.";
    } catch (S3Exception $e) {
        $videoStatusMsg = $e;
    }
} else {
    $videoStatusMsg = "No Video File Found.";
}

if (($_FILES['imageData']['name'] != "")){
    $mediaImageName = $_POST["image"];
    $imageSize = $_FILES['imageData']['size'];
    $imageType = $_FILES['imageData']['type'];
    $image_temp_name = $_FILES['imageData']['tmp_name'];
    $path_imagefilename_ext = $mediaImageName;

    $putParams = [   
        'ContentLength'     => $imageSize,
        'ContentType'       => $imageType,
        'Bucket'            => $config['doBucketName'],
        'Key'               => $config['doFolderName'].$folderName.$path_imagefilename_ext, // this is the save as file in the space
        'Body'              => fopen($image_temp_name,rb), // and this is the file name on this server
        'ACL'               => $uploadType,
         ] ;
    try {
        $result = $s3->putObject($putParams);
        $result->toArray();
        $imageStatusMsg = "Congratulations! Image Uploaded Successfully.";
    } catch (S3Exception $e) {
        $imageStatusMsg = json_encode($e);
    }
} else {
    $imageStatusMsg = "No Image File Found.";
}

if($_POST["type"] == 'view'){

    // CreateTemporaryURL
    $cmd = $s3->getCommand('GetObject', [
            'Bucket' => $config['doBucketName'],
            'Key'    => $config['doFolderName'].$folderName."".$_POST['getFileName']
        ]);
    $valid_for = '2 hour';
    try {
        // $result = $s3->deleteObject($putParams);
        $request = $s3->createPresignedRequest($cmd, $valid_for);
        $viewStatusMsg = (string)$request->getUri();
    }
    catch (S3Exception $e) {
        $viewStatusMsg = $e;
    }
}

$returnData = array(
    'status' => 'ok',
    'attStatusMsg' => $attStatusMsg,
    'videoStatusMsg' => $videoStatusMsg,
    'imageStatusMsg' => $imageStatusMsg,
    'viewStatusMsg' => array("url"=>$viewStatusMsg,
    "fileName"=>$_POST['fileName']),
);
echo json_encode($returnData);

?>