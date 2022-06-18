<?php
require('fpdf183/fpdf.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademis";

// Membuat koneksi database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}


//create pdf object
$pdf = new fpdf('P', 'mm', 'A4');

//add new page
$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial', 'B', 14);


//Cell(width , height , text , border , end line , [align] )
$pdf->Image("logo/logoss.png", 18, 5, 25, 15);
$pdf->Cell(199, 8, 'DAFTAR DATA MAHASISWA', 0, 1, 'C');
$pdf->Cell(130, 5, '', 0, 1);
$pdf->Cell(130, 5, '', 0, 1);
$pdf->Cell(199, 5, 'Daftar Mahasiswa', 0, 1, 'C'); //end of line
$pdf->Cell(120, 5, '', 0, 1);

//Create Table Header
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 20, 'NIM', 1, 0, 'C');
$pdf->Cell(40, 20, 'Nama', 1, 0, 'C');
$pdf->Cell(40, 20, 'Umur', 1, 0, 'C');
$pdf->Cell(40, 20, 'Foto', 1, 0, 'C');
$pdf->Cell(130, 20, '', 0, 1);


$pdf->SetFont('Arial', '', 12);
//Show data barang from database
$sql = "SELECT * FROM mahasiswa";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //Numbers are right-aligned so we give 'R' after new line parameter

        //  $pdf->Image("images/" . $row['image'], 18, $pdf->GetY() + 3, 25, 15);
        //$pdf->Cell(39, 20, '', 1, 0);
        $pdf->Cell(40, 20, $row['nim'], 1, 0, 'C');
        $pdf->Cell(40, 20, $row['nama'], 1, 0, 'C');
        $pdf->Cell(40, 20, $row['umur'], 1, 0, 'C');
        $foto = $pdf->Image("images/" . $row['image'], 137, $pdf->GetY() + 3, 25, 15);
        $pdf->Cell(40, 20, $foto, 1, 0, 'C');
        $pdf->Cell(130, 20, '', 0, 1);
    }
    // //output the result
    $pdf->Output();
}
