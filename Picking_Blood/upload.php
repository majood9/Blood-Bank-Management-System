<?php
if (isset($_GET['Donation_Number'])) {
	//$imagePath = 'uploads/' . basename($_GET['QR']);
$id = $_GET['Donation_Number'];
// $date_view = $_GET['date_view'];
	// حفظ الصورة على الخادم
	// (في هذا المثال، نفترض أن الصورة "my-image.jpg" موجودة مسبقًا)
	//file_put_contents($imagePath, file_get_contents('data:QR/png;base64,' . $_GET['QR']));

	// إعادة التوجيه إلى صفحة ثانية مع مسار الصورة المحفوظة
	header('Location: QR_Print.php?Donation_Number=' . $id  );
	exit();
}
