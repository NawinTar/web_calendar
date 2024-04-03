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

        .calendar-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .calendar-item {
            margin: 0 10px;
            text-align: center;
            flex: 1;
        }

        .calendar-item img {
            max-width: 350px;
            height: auto;
            cursor: pointer;
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
            <h2>Select Calendar</h2>
            <div class="calendar-list">
                <?php
                $api_url = 'http://localhost/Test/api/api-desktop_calendar';
                $data = file_get_contents($api_url);
                $data = json_decode($data);

                foreach ($data as $item) {
                ?>
                <div class="calendar-item">
                    <img src="<?php echo $item->calendar_data; ?>" alt="Desktop Calendar">
                    <p>ราคา: <?php echo $item->price; ?></p>
                    <p>คงเหลือ: <?php echo $item->amount; ?></p>
                    <form action="../postercalendar/posterbuy.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $item->id; ?>">
                        <input type="hidden" name="calendar_type" value="<?php echo $item->calendar_type; ?>">
                        <input type="hidden" name="price" value="<?php echo $item->price; ?>">
                        <label for="quantity">จำนวน:</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $item->amount; ?>" value="1"><br>
                        <input type="submit" value="Buy Now">
                    </form>
                </div>
                <?php
                }
                ?>
            </div>
        </section>
    </main>
</body>

</html>
