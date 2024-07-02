<?php
// Set header type konten.
header("Content-Type: application/json; charset=UTF-8");

include '../koneksi.php';

// Deklarasi variable keyword buah.
$buah = $_GET["query"];

// Query ke database.
$query  = $conn->query("SELECT * FROM menu_makanan WHERE nama_menu LIKE '%$buah%' AND id_jenis=5 ORDER BY nama_menu DESC");

// Fetch hasil query.
$result = $query->fetch_All(MYSQLI_ASSOC);

// Cek apakah ada yang cocok atau tidak.
if (count($result) > 0) {
    foreach($result as $data) {
        $output['suggestions'][] = [
            'value' => $data['nama_menu']." ".$data['berat'],
            'buah'  => $data['id_menu']
        ];
    }

    // Encode ke JSON.
    echo json_encode($output);

// Jika tidak ada yang cocok.
} else {
    $output['suggestions'][] = [
        'value' => '',
        'buah'  => ''
    ];

    // Encode ke JSON.
    echo json_encode($output);
}
