<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Gaya latar belakang, warna teks, dan jenis font */
        body {
            background-color: #34495e;
            color: #ecf0f1;
            font-family: 'Roboto', sans-serif;
            text-align: center;
            padding: 20px;
        }
        /* Gaya judul utama */
        h1 {
            color: #e67e22;
            font-size: 36px;
            font-weight: bold;
        }
        /* Gaya elemen input dan select */
        select, input {
            background-color: #555;
            color: #ecf0f1;
            border: none;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            font-family: 'Roboto', sans-serif;
        }
        /* Menghilangkan outline saat elemen input atau select aktif */
        select:focus, input:focus {
            outline: none;
        }
        /* Gaya tombol "Cek Stok" */
        input[type="submit"] {
            background-color: #e67e22;
            color: #fff;
            cursor: pointer;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
        }
        /* Efek hover pada tombol "Cek Stok" */
        input[type="submit"]:hover {
            background-color: #d35400;
        }
        /* Gaya produk */
        .product {
            display: inline-block;
            text-align: center;
            background-color: #e67e22;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
        }

        /* Gaya gambar produk */
        .product img {
            width: 150px;
            height: 150px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        /* Gaya teks dalam produk */
        .product p {
            font-size: 18px;
        }

        /* Efek hover pada produk (memperbesar) */
        .product:hover {
            transform: scale(1.05);
        }

        /* Gaya footer (penjelasan hak cipta) */
        footer {
            margin-top: 30px;
            color: #ecf0f1;
        }
    </style>
    <title>Aplikasi Pengecekan St</title>
</head>
<body>
    <h1>ZEYNSTORESTOCK</h1>
    <form method="post" action="">
        <label for="nama_barang">Pilih Barang:</label>
        <select name="nama_barang" id="nama_barang">
            <option value="NETFLIX">NETFLIX</option>
            <option value="AMAZON PRIME">AMAZON PRIME</option>
            <option value="DISNEY +">DISNEY +</option>
        </select>
        <input type="submit" value="Cek Stok">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $barang = $_POST['nama_barang'];
        $produk = [
            'NETFLIX' => ['stok' => 0, 'gambar' => 'netflix.png'],
            'AMAZON PRIME' => ['stok' => 5, 'gambar' => 'amazon.png'],
            'DISNEY +' => ['stok' => -2, 'gambar' => 'disney.jpg']
        ];

        if (array_key_exists($barang, $produk)) {
            $stok_barang = $produk[$barang]['stok'];
            $gambar_barang = $produk[$barang]['gambar'];

            echo "<div class='product'>";
            echo "<img src='$gambar_barang' alt='$barang'>";
            echo "<p><strong>$barang</strong></p>";

            if ($stok_barang > 0) {
                echo "<p>Stok masih tersedia: $stok_barang buah.</p>";
            } elseif ($stok_barang == 0) {
                echo "<p>Stok telah habis.</p>";
            } elseif ($stok_barang < 0) {
                echo "<p>minggu depan baru ada bang.</p>";
            }
            echo "</div>";
        } else {
            echo "Barang dengan nama $barang tidak ditemukan.";
        }
    }
    ?>
    <!-- Penjelasan hak cipta -->
    <footer>&copy; 2023 ZEYNSTORESTOCK. All Rights Reserved.</footer>
</body>
</html>
