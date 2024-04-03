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
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            width: 100%;
            text-align: center;
            background-color: #f0f0f0;
            padding: 20px 0;
        }

        main {
            flex: 1;
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
            align-items: center; /* เพิ่มเพื่อจัดให้รูปภาพและข้อความอยู่ตรงกลางแนวตั้ง */
        }

        .calendar-item {
            margin: 0 10px;
            text-align: center;
            flex: 1; /* ปรับขนาดของกล่องรูปภาพเท่ากัน */
        }

        .calendar-img {
            max-width: 200px;
            height: auto;
            display: block;
            margin: 0 auto; /* จัดให้รูปภาพอยู่ตรงกลาง */
            object-fit: cover; /* ปรับขนาดรูปภาพเพื่อไม่เกิดการเอียง */
        }

        .calendar-item p {
            margin-top: 10px;
        }

        @media screen and (max-width: 600px) {
            .calendar-list {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Calendar Shop</h1>
    </header>

    <main>
        <section>
            <h2>Welcome to Calendar Shop</h2>
        </section>
        <section>
            <ul class="calendar-list">
                <li class="calendar-item">
                    <img src="../component/img/desk.jpg" alt="Desk Calendar" class="calendar-img">
                    <a href="../desktopcalendar/desktopcalendar.php">
                            <p>ปฏิทินตั้งโต๊ะ</p>
                    </a>                    
                </li>
                <li class="calendar-item">
                    <img src="../component/img/Hanging.jpg" alt="Hanging Calendar" class="calendar-img">
                    <a href="../wallcalendar/wallcalendar.php">
                            <p>ปฏิทินแบบแขวน</p>
                    </a>     
                </li>
                <li class="calendar-item">
                    <img src="../component/img/pocket.jpg" alt="Pocket Calendar" class="calendar-img">
                    <a>
                    <p style="text-decoration: line-through;">ปฏิทินพกพา </p>
                    <p style="color: red; ">ยกเลิกการขาย</p>



                    </a>  
                </li>
                <li class="calendar-item">
                    <img src="../component/img/poster.jpg" alt="Poster Calendar" class="calendar-img">
                    <a href="../postercalendar/postercalendar.php">

                            <p>ปฏิทินโปสเตอร์</p>

                    </a>  
                </li>
            </ul>
        </section>
    </main>

</body>
</html>
