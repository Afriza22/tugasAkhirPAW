<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Edukasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .artikel-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding: 20px;
            margin: 0 auto;
        }

        .artikel-item {
            display: flex;
            align-items: center;
            background-color: #2b6cb0;
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .artikel-item:hover {
            background-color: #1d4e89;
        }

        .artikel-item img {
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }

        .artikel-item h5 {
            font-size: 18px;
            margin: 0;
        }

        .artikel-item p {
            margin: 0;
            font-size: 14px;
        }

        .artikel-item .btn {
            margin-top: 10px;
            background-color: #fff;
            color: #2b6cb0;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: bold;
            text-decoration: none;
        }

        .artikel-item .btn:hover {
            background-color: #e1effe;
        }

        @media (max-width: 768px) {
            .artikel-container {
                padding: 20px;
            }
            .artikel-item {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }
            .artikel-item img {
                margin-bottom: 15px;
            }
        }

        .back-button {
            background-color: #2b6cb0;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            display: block;
            margin-top: 30px;
            width: 200px;
            margin-left: auto;
            margin-right: auto;
        }

        .back-button:hover {
            background-color: #1d4e89;
        }
    </style>
</head>
<body class="bg-light">

    <div class="artikel-container">

        <a href="https://edugizi.ac.id/pentingnya-gizi-seimbang-dan-manfaatnya-bagi-kesehatan/" class="artikel-item" target="_blank">
            <img src="https://cdn1.iconfinder.com/data/icons/travel-2-5/512/61-512.png" alt="Icon 1">
            <div>
                <h5>Pentingnya gizi seimbang untuk anak</h5>
                <p>Informasi mengenai pentingnya gizi yang seimbang untuk tumbuh kembang anak.</p>
                <button class="btn">Baca Artikel</button>
            </div>
        </a>


        <a href="https://www.haibunda.com/parenting/20240221105235-60-329460/5-cara-tepat-memantau-tumbuh-kembang-anak-menurut-ahli-gizi" class="artikel-item" target="_blank">
            <img src="https://cdn1.iconfinder.com/data/icons/travel-2-5/512/61-512.png" alt="Icon 2">
            <div>
                <h5>Tips memantau tumbuh kembang anak</h5>
                <p>Cara untuk memantau perkembangan fisik dan mental anak dengan tepat.</p>
                <button class="btn">Baca Artikel</button>
            </div>
        </a>

 
        <a href="https://www.alodokter.com/pentingnya-kecukupan-gizi-dalam-1-000-hari-pertama-kehidupan-untuk-daya-tahan-tubuh-dan-tumbuh-kembang-si-kecil" class="artikel-item" target="_blank">
            <img src="https://cdn1.iconfinder.com/data/icons/travel-2-5/512/61-512.png" alt="Icon 3">
            <div>
                <h5>Pentingnya asupan nutrisi pada 1000 hari pertama kehidupan</h5>
                <p>Penjelasan mengenai kebutuhan nutrisi pada periode kritis 1000 hari pertama.</p>
                <button class="btn">Baca Artikel</button>
            </div>
        </a>
    </div>


    <a href="dashboard.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>

</body>
</html>