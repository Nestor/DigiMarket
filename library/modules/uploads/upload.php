<?php
class Upload {
	function fileUpload($uFile, $tmpName) { // Values will be inserted when the main chunk of code is in

        $directory = UPLOAD_DIR;
        $fileToUpload = $directory . $uFile;

echo "<hr>";
Try {
    if (move_uploaded_file($tmpName, $fileToUpload)) {
        echo "File Upload: Success ( " . $uFile . " )";
    } else {
        echo "File Upload: Failed";
    }
} Catch (exception $error) {
    if (DEVELOPMENT == 1) {
        echo "Something has gone badly wrong<br>" . $error->getMessage();
    }
}
echo "<hr>";

	}

	function picUpload() { // Values will be inserted when the main chunk of code is in
	
	}
}
?>