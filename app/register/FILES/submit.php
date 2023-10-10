<?php session_start();

// File upload folder 
$uploadDir = $_SESSION['pasta_cadastrante'];

// Allowed file types 
$allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg');

// Default response 
$response = array(
    'status' => 0,
    'message' => 'Form submission failed, please try again.'
);

$form_name = $_GET['nome'];
$file = $_FILES[$form_name];

// If form is submitted 
if (!isset($file)) {


    // Check whether submitted data is not empty 

    $uploadStatus = 1;

    // Upload file 
    $uploadedFile = '';
    if (!empty($file["name"])) {
        // File path config 
        $fileName = basename($file["name"]);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats to upload 
        if (in_array($fileType, $allowTypes)) {
            // Upload file to the server 
            if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
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
