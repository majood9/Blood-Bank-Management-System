<?php
// تحديد التاريخ المحدد
$specifiedDate = '2023-10-01'; // يمكنك تغيير هذا التاريخ حسب الحاجة

// الحصول على التاريخ الحالي
$currentDate = date('Y-m-d');

// تحديد ما إذا كان التاريخ قد تم تجاوزه
$isDateExceeded = $currentDate > $specifiedDate;
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إشعار تاريخ</title>
    <script>
        // دالة لإظهار الإشعار المنبثق
        function showNotification() {
            alert("تنبيه: لقد تجاوزت التاريخ المحدد!");
        }
    </script>
</head>
<body>

<?php if ($isDateExceeded): ?>
    <script>
        // استدعاء الدالة لإظهار الإشعار المنبثق
        showNotification();
    </script>
<?php else: ?>
    <p>التاريخ المحدد لم يتجاوز بعد.</p>
<?php endif; ?>

</body>
</html>
