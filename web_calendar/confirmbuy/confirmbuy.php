<?php
    $id = $_GET['id'];
    $amount = $_GET['amount'];
    $calendar_type = $_GET['calendar_type'];
    $new_price = $_GET['price'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            width: 100%;
            text-align: center;
            background-color: #f0f0f0;
            padding: 20px 0;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        section {
            text-align: center;
            margin-bottom: 20px;
        }

    
        section form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        section form label {
            margin-bottom: 20px;
        }

        section form input[type="text"] {
            padding: 8px;
            margin-bottom: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        section form input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        section form input[type="submit"]:hover {
            background-color: #45a
        }
    </style>
</head>

<body>
    <header>
        <h1>Payment</h1>
    </header>

    <main>
        
        <section>
            <h2>Payment Details</h2>
            <img src="../component/img/กสิกรไทย.jpg" alt="bank" style="width: 100px; height: auto;">
            <p> หมายเลขบัญชี 019-5-35xxx-x <br> บริษัท xxxxx
            <p>
                <br>
                <img src="../component/img/kplusshop_qr.png" alt="QR Code" style="width: 300px; height: auto;">
                <form action="../confirmbuy/success.php" method="post" enctype="multipart/form-data">
                    <label for="quantity">จำนวนสินค้า:</label><br>
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="calendarType" value="<?php echo $calendar_type; ?>">
                    <input type="text" id="quantity" name="quantity" value="<?php echo $amount; ?>" readonly><br>
                    <label for="price">ราคา:</label><br>
                    <input type="text" id="price" name="price" value="<?php echo $new_price; ?>" readonly><br>
                    <label for="name">ชื่อ:</label><br>
                    <input type="text" id="name" name="name" required><br>
                    <label for="address">ที่อยู่ในการจัดส่ง:</label><br>
                    <input type="text" id="address" name="address" required><br>
                    <label for="phone">เบอร์โทรศัพท์:</label><br>
                    <input type="text" id="phone" name="phone" required><br>
                    <label for="slip">หลักฐานการจ่ายเงิน:</label><br>
                    <input type="file" id="slip" name="slip" required>
                    <input type="submit" value="ตกลง">
                </form>
        </section>
    </main>
</body>

</html>