<?php
// File upload folder 
$uploadDir = 'arquivos/';

// Allowed file types 
$allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg');

// Default response 
$response = array(
    'status' => 0,
    'message' => 'Form submission failed, please try again.'
);

// If form is submitted 
if (!isset($_POST['fileToUpload'])) {


    // Check whether submitted data is not empty 

    $uploadStatus = 1;

    // Upload file 
    $uploadedFile = '';
    if (!empty($_FILES["fileToUpload"]["name"])) {
        // File path config 
        $fileName = basename($_FILES["fileToUpload"]["name"]);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats to upload 
        if (in_array($fileType, $allowTypes)) {
            // Upload file to the server 
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
                $uploadedFile = $fileName;
                $uploadStatus = 1;
                $response['message'] = 'Form data submitted successfully!';
            } else {
                $uploadStatus = 0;
                $response['message'] = 'Sorry, there was an error uploading your file.';
            }
        } else {
            $uploadStatus = 0;
            $response['message'] = 'Sorry, only ' . implode('/', $allowTypes) . ' files are allowed to upload.';
        }
    }

    $response['status'] = $uploadStatus;

}

// Return response 
echo json_encode($response);
