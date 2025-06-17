<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
require 'includes/db.php';

$email = $_SESSION['email'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM users WHERE email='$email'"));
$user_id = $user['id'];

$data = mysqli_query($conn, "SELECT * FROM anak WHERE user_id=$user_id ORDER BY tanggal ASC");

$labels = [];
$tinggi = [];
$berat = [];
$tinggi_color = [];
$berat_color = [];
while ($row = mysqli_fetch_assoc($data)) {
    $labels[] = $row['tanggal'];
    $tinggi[] = $row['tinggi'];
    $berat[] = $row['berat'];

    if ($row['tinggi'] < 85) {
        $tinggi_color[] = 'rgba(255, 204, 0, 1)';
    } elseif ($row['tinggi'] >= 85 && $row['tinggi'] <= 120) {
        $tinggi_color[] = 'rgba(39, 174, 96, 1)';
    } else {
        $tinggi_color[] = 'rgba(255, 99, 71, 1)';
    }

    if ($row['berat'] < 12) {
        $berat_color[] = 'rgba(255, 204, 0, 1)'; 
    } elseif ($row['berat'] >= 12 && $row['berat'] <= 18) {
        $berat_color[] = 'rgba(39, 174, 96, 1)'; 
    } else {
        $berat_color[] = 'rgba(255, 99, 71, 1)'; 
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Grafik Pertumbuhan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #F6FBFF;
            font-family: 'Segoe UI', sans-serif;
            text-align: center;
            padding: 20px;
        }
        .btn-back {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #D6E4F0;
            color: #1D4E89;
            padding: 8px 16px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #c3d7eb;
        }

        h2 {
            color: #1D4E89;
            margin-bottom: 20px;
        }
        .toggle {
            display: inline-flex;
            background-color: #e1effe;
            border-radius: 25px;
            padding: 5px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .toggle button {
            border: none;
            background: transparent;
            padding: 20px 30px;
            cursor: pointer;
            font-weight: bold;
            color: #1D4E89;
            border-radius: 20px;
        }
        .toggle button.active {
            background-color: #D6E4F0;
        }
        .chart-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            height: 500px;
            margin: auto;
        }
        canvas {
            width: 100% !important;
            height: 100% !important;
        }

        .legend {
            margin-top: 15px;
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .legend span {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 15px;
            font-weight: bold;
        }
        .kurang { background-color: #FFF3C7; color: #000; }
        .normal { background-color: #D3F4D1; color: #000; }
        .berlebih { background-color: #FFD8B1; color: #000; }
    </style>
</head>
<body>

    <a href="dashboard.php" class="btn-back">← Kembali</a>

    <h2>Grafik Pertumbuhan</h2>

    <div class="toggle">
        <button id="btn-tinggi" class="active">Tinggi</button>
        <button id="btn-berat">Berat</button>
    </div>

    <div class="chart-container">
        <canvas id="chartCanvas"></canvas>
    </div>

    <div class="legend">
        <span class="kurang">Kurang</span>
        <span class="normal">Normal</span>
        <span class="berlebih">Berlebih</span>
    </div>

    <script>
        const labels = <?= json_encode($labels) ?>;
        const tinggiData = <?= json_encode($tinggi) ?>;
        const beratData = <?= json_encode($berat) ?>;
        const tinggiColors = <?= json_encode($tinggi_color) ?>;
        const beratColors = <?= json_encode($berat_color) ?>;

        const ctx = document.getElementById('chartCanvas').getContext('2d');

        let chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Tinggi Badan (cm)',
                    data: tinggiData,
                    borderColor: '#1D4E89',
                    backgroundColor: tinggiColors,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });

        const btnTinggi = document.getElementById('btn-tinggi');
        const btnBerat = document.getElementById('btn-berat');

        btnTinggi.addEventListener('click', () => {
            chart.data.datasets[0].data = tinggiData;
            chart.data.datasets[0].label = 'Tinggi Badan (cm)';
            chart.data.datasets[0].borderColor = '#1D4E89';
            chart.data.datasets[0].backgroundColor = tinggiColors;
            chart.update();
            btnTinggi.classList.add('active');
            btnBerat.classList.remove('active');
        });

        btnBerat.addEventListener('click', () => {
            chart.data.datasets[0].data = beratData;
            chart.data.datasets[0].label = 'Berat Badan (kg)';
            chart.data.datasets[0].borderColor = '#2B6CB0';
            chart.data.datasets[0].backgroundColor = beratColors;
            chart.update();
            btnBerat.classList.add('active');
            btnTinggi.classList.remove('active');
        });
    </script>
</body>
</html>