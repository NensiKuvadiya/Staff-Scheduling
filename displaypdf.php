<?php
session_start();
$pdf_file=$_SESSION["pdf"]; // replace with your PDF file path

// Output the PDF file
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . basename($pdf_file) . '"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

@readfile($pdf_file);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Display PDF in HTML</title>
	<style>
		#pdf-container {
			width: 100%;
			height: 600px;
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<div id="pdf-container">
		<embed src="<?php echo  $_SERVER['PHP_SELF']; ?>" type="application/pdf" width="100%" height="100%">
	</div>
</body>
</html>