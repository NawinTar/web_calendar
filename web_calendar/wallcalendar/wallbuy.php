<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $calendar_type = $_POST['calendar_type'];
        $price = $_POST['price'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_calendar";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT amount FROM wall_calendar WHERE id = :id");
            $stmt->bindParam(':id', $product_id);
            $stmt->execute();
            $row = $stmt->fetch();

            if ($row) {
                $current_amount = $row['amount'];
                $new_amount = $current_amount - $quantity;
                $new_price = $price * $quantity;

                $sql = "UPDATE wall_calendar SET amount = :amount WHERE id = :id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $product_id);
                $stmt->bindParam(':amount', $new_amount);
                $stmt->execute();

                header("Location: ../confirmbuy/confirmbuy.php?id=$product_id&amount=$quantity&calendar_type=$calendar_type&price=$new_price");
                exit(); // จบการทำงานหลังจาก redirect
            } else {
                echo "Error: Product ID not found";
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    } else {
        echo "Error: Missing product ID or quantity";
    }
} 
