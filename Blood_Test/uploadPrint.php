<?php
if (isset($_GET['Test_Number'])) {
	//$imagePath = 'uploads/' . basename($_GET['QR']);
$id = $_GET['Test_Number'];
	// حفظ الصورة على الخادم
	// (في هذا المثال، نفترض أن الصورة "my-image.jpg" موجودة مسبقًا)
	//file_put_contents($imagePath, file_get_contents('data:QR/png;base64,' . $_GET['QR']));

	// إعادة التوجيه إلى صفحة ثانية مع مسار الصورة المحفوظة
	header('Location: Print.php?Test_Number=' . $id);
	exit();
}
