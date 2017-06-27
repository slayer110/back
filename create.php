<?php
/**
 * Created by PhpStorm.
 * User: Виктор
 * Date: 10.06.2017
 * Time: 18:50
 */
$dbh = new PDO('mysql:host=localhost;dbname=back', 'root', 'viktor');

$data = json_decode($_GET['data'], true);


$date = $data["Date"];
$curCod = $data['Cur_Abbreviation'];
$curId = $data['Cur_ID'];
$rate = $data['Cur_OfficialRate'];
$nameRus = $data['nameRus'];
if (!$data['completed']) {

//$dbh->query('INSERT INTO currency (date, cur_id, cur_cod, rate, name_rus) VALUE ('.$date.','.$curId.','.$curCod.','.$rate.','.$nameRus.')');

    $dbh->exec("INSERT INTO currency (date, cur_id, cur_cod, rate, name_rus) VALUE ('$date','$curId','$curCod','$rate','$nameRus')");

} else {
    var_dump("5");
    $stmt = $dbh->query("SELECT  id FROM currency WHERE date ='$date' AND cur_id = '$curId'");

    $row = $stmt->fetchAll();

    $id = $row[0]['id'];

    $dbh->exec("DELETE FROM currency WHERE id = $id");



}
echo json_encode(array('status' => 'success'));