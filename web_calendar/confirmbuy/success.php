<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ตรวจสอบว่ามีข้อมูลที่ส่งมาและไม่ว่างเปล่าหรือไม่
    if (isset($_POST['product_id']) && isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_FILES['slip'])) {
        // ดึงข้อมูลจากแบบฟอร์ม
        $product_id = $_POST['product_id'];
        $calendarType = $_POST['calendarType'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        
        // ดำเนินการกับไฟล์ภาพที่อัปโหลด
        $imagePayment = $_FILES['slip']['name'];
        $imagePayment_tmp = $_FILES['slip']['tmp_name'];
        $upload_dir = "../uploads/"; // โฟลเดอร์ที่จะเก็บไฟล์ภาพ

        // ย้ายไฟล์ภาพไปยังโฟลเดอร์ปลายทาง
        move_uploaded_file($imagePayment_tmp, $upload_dir.$imagePayment);

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_calendar";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO sales_calendar(productId, calendarType, price, amount, name, address, phoneNumber, imagePayment) VALUES(:productId, :calendarType, :price, :amount, :name, :address, :phoneNumber, :imagePayment)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':productId', $product_id);
            $stmt->bindParam(':calendarType', $calendarType);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':amount', $quantity); 
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phoneNumber', $phone);
            $stmt->bindParam(':imagePayment', $imagePayment);

            $stmt->execute();

            echo "เพิ่มข้อมูลสำเร็จ";
            header("Location: ../home/index.php");
            exit();
        } catch(PDOException $e) {
            echo "เกิดข้อผิดพลาด: " . $e->getMessage();
        }

        $conn = null;
    } else {
        echo "กรุณากรอกข้อมูลให้ครบถ้วน";
    }
}

