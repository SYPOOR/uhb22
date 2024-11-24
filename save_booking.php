<?php
// إعداد الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookings";

$conn = new mysqli($servername, $username, $password, $dbname);

// تحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// معالجة البيانات المرسلة من الفورم
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $time = $_POST['time'];
    $seat = $_POST['seat'];

    // إدخال الحجز في قاعدة البيانات
    $stmt = $conn->prepare("INSERT INTO reservations (time, seat) VALUES (?, ?)");
    $stmt->bind_param("ss", $time, $seat);

    if ($stmt->execute()) {
        echo json_encode(["message" => "تم الحجز بنجاح!"]);
    } else {
        echo json_encode(["message" => "حدث خطأ أثناء الحجز."]);
    }

    $stmt->close();
}

$conn->close();
?>
