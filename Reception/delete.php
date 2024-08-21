<?php

// التحقق مما إذا كان المعلمة "national" موجودة في طلب GET
if(isset($_GET['national'])){
    // استلام قيمة المعلمة "national"
    $national = $_GET['national'];
    // $Donation_code= $_GET['Donation_code'];

    // توصيل الى قاعدة البيانات
    include 'dbconnect.php';

    // إعداد الاستعلام لحذف السجلات المطابقة في جدول "donor" بناءً على القيمة المرسلة في المعلمة "national"
    // $qry = "DELETE FROM donor WHERE donor.national=status.national and status.Donation_code=$Donation_code ";
    // $qry = "DELETE  FROM donor  join status on donor.national = status.national
    //   where status.Donation_code = $Donation_code and donor.national = $national  ";

    $qry = "DELETE  FROM donor  where donor.national=$national  ";
    $qry1 = "DELETE  FROM status  where status.national=$national  ";
    // $qry1 = "DELETE FROM status WHERE  Donation_code=$Donation_code  ";

    // تنفيذ الاستعلام
    $result = mysqli_query($conn, $qry);
    $result1 = mysqli_query($conn, $qry1);
 
    if($result){
        // إذا تمت عملية الحذف بنجاح
    echo"DELETED";
    header('Location:deleteview.php');
}else{
    echo"ERROR!!";
}
 if($result1){
        // إذا تمت عملية الحذف بنجاح
    // echo"DELETED";
    header('Location:deleteview.php');
}else{
    echo"ERROR!!";
}
}
?>