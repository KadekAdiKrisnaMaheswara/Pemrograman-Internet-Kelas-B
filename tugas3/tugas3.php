<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrol AC Berdasarkan Suhu dan Kelembapan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="number"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .result h3 {
            margin: 0 0 10px;
            color: #333;
        }

        .result p {
            margin: 5px 0;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Input Suhu dan Kelembapan</h2>

    <form method="POST" action="">
        <label for="suhu">Suhu (°C):</label>
        <input type="number" id="suhu" name="suhu" required>
        
        <label for="kelembapan">Kelembapan (%):</label>
        <input type="number" id="kelembapan" name="kelembapan" required>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $suhu = $_POST['suhu'];
        $kelembapan = $_POST['kelembapan'];

        function kontrolAC($suhu, $kelembapan) {
            if ($suhu < 20 && $kelembapan < 50) {
                return "AC mati";
            } elseif ($suhu >= 20 && $suhu <= 30 && $kelembapan >= 50 && $kelembapan <= 70) {
                return "AC menyala ringan";
            } elseif ($suhu > 30 && $kelembapan > 70) {
                return "AC menyala berat";
            } elseif ($suhu < 20) {
                return "AC mati";
            } else {
                return "AC standby";
            }
        }

        $statusAC = kontrolAC($suhu, $kelembapan);

        echo '<div class="result">';
        echo '<h3>Hasil:</h3>';
        echo '<p>Suhu: ' . $suhu . '°C</p>';
        echo '<p>Kelembapan: ' . $kelembapan . '%</p>';
        echo '<p>Status AC: ' . $statusAC . '</p>';
        echo '</div>';
    }
    ?>

    <div class="footer">
        <p>Kadek Adi Krisna Maheswara</p>
        <p>2305551086</p>
    </div>
</div>

</body>
</html>
