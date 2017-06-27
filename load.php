<?php
/**
 * Created by PhpStorm.
 * User: Виктор
 * Date: 10.06.2017
 * Time: 22:54
 */
$dbh = new PDO('mysql:host=localhost;dbname=back', 'root', 'viktor');

$data = $_GET['date'];

if ($data) {

    $stmt = $dbh->query("SELECT * FROM currency WHERE date ='$data'");


}else{
    $stmt = $dbh->query("SELECT * FROM currency ");
}
$rows = $stmt->fetchAll();

echo json_encode($rows);