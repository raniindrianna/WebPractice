<!DOCTYPE html>
<html>
  <head>
</head>
<body>
  <table border="1" width="1000px" align="center">
    <tr align="center" height="50px">
      <td>HEADER</td>
</tr>

<tr?>
  <td>
    <a href="template.php?page=home.php">HOME</a>
    <a href="template.php?page=berita.php">BERITA</a>
    <a href="template.php?page=pengembanganDataSiswa.php">DATA SISWA</a>
    <a href="template.php?page=pengembanganDataSiswa.php">SEARCH</a>
    <a href="template.php?page=insert.php">INSERT DATA</a>

</td>
</tr>

<tr align ="center" height="300px">
  <td>
    
<?php
if(isset($_GET['page'])) {
  $page = $_GET['page'];
}else{
 $page = "home";
}
include $page;
?>
</td>
</tr>

<tr align="center" heigh="50px">
  <td>FOOTER</td>
</tr>

</table>
</body>
</html>