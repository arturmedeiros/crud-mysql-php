<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Download Excel</title>
</head>
<body>
<?php

require_once '../config/connection.php';

$db = getenv('DB_NAME');
$sql = "SELECT * FROM $db.products ORDER BY created_at DESC";
$query = mysqli_query($connection, $sql);

$now = date('dmYHms');
$file = 'products_'.$now.'.xls';

// Cria cabeçalho
$html = '';
$html .= '<table>';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th><b>ID</b></th>';
$html .= '<th><b>Code</b></th>';
$html .= '<td><b>Name</b></td>';
$html .= '<td><b>Category</b></td>';
$html .= '<td><b>Quantity</b></td>';
$html .= '<td><b>Provider</b></td>';
$html .= '<td><b>Created at</b></td>';
$html .= '</tr>';
$html .= '</thead>';

// Cria linhas
while($line = mysqli_fetch_assoc($query)){
    $html .= '<tbody>';
    $html .= '<tr>';
    $html .= '<td>'.$line["id"].'</td>';
    $html .= '<td>'.$line["code"].'</td>';
    $html .= '<td>'.$line["name"].'</td>';
    $html .= '<td>'.$line["category"].'</td>';
    $html .= '<td>'.$line["quantity"].'</td>';
    $html .= '<td>'.$line["provider"].'</td>';
    $html .= '<td>'.date_format(date_create($line['created_at']),'d/m/Y à\s H:i').'</td>';
    $html .= '</tr>';
    $html .= '</tbody>';
    ;
}

$html .= '</table>';

// Gerar arquivo
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header ("Content-Transfer-Encoding: binary");
header ("Content-Disposition: attachment; filename=\"{$file}\"" );
header ("Content-Description: PHP Generated Data" );

// Envia o download ao navegador
echo $html;
exit;

?>
</body>
</html>
