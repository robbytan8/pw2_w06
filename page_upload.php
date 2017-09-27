<?php
$submitPressed = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitPressed)) {
    $newFileName = filter_input(INPUT_POST, 'txtName',
            FILTER_SANITIZE_SPECIAL_CHARS);
    $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);
    if (isset($_FILES['txtFile']['name'])) {
        $targetDirectory = 'uploads/';
        $fileExtension = pathinfo($_FILES['txtFile']['name'], PATHINFO_EXTENSION);
        $fileType = exif_imagetype($_FILES['txtFile']['tmp_name']);
        $targetFile = $targetDirectory . $newFileName . '.' . $fileExtension;
        $uploadOk = TRUE;
        if ($_FILES['txtFile']['size'] > 2048 * 2048) {
            $uploadOk = FALSE;
            $stringError = 'File exceed 2 MB' . '<br>';
        }
        if (!in_array($fileType, $allowedTypes)) {
            $uploadOk = FALSE;
            echo $fileType;
            $stringError = 'Image file must be jpg or png' . '<br>';
        }
        if ($uploadOk) {
            move_uploaded_file($_FILES['txtFile']['tmp_name'], $targetFile);
        }
    }
}

if (isset($stringError)) {
    echo '<div class="err_message">' . $stringError . '</div>';
}
?>

<form method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Upload Image to Server</legend>
        <label id="txtNameId">New File Name</label>
        <input id="txtNameId" name="txtName" type="text" placeholder="File Name" required="" autofocus="" >
        <br>
        <label for="txtFileId">Upload File</label>
        <input id="txtFileId" name="txtFile" type="file" >
        <br>
        <input name="btnSubmit" type="submit" value="Send Image To Server" />
    </fieldset>
</form>

