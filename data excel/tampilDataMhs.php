<?php
include 'PHPExcel/IOFactory.php';

$inputFileName = 'dataMhs.xlsx';
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch (Exception $e) {
    die('Error loading file ' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
}

$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

echo "<table border = 1>";
for ($row = 1; $row <= $highestRow; $row++) {
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    $nim = $rowData[0][0];
    $nama = $rowData[0][1];
    $tanggal_lahir = PHPExcel_Style_NumberFormat::toFormattedString(
        $rowData[0][2],
        PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY
    );
    // $umur = $rowData[0][4];
    // date('Y-m-d', strtotime($rowData[0][3]));
    echo " <tr>
        <td>$nim</td>
        <td>$nama</td>
        <td>$tanggal_lahir</td>
       
      </tr>
     ";
}
echo "</table>";
