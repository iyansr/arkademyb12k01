<?php 
  require_once('koneksi.php');

  $nama = trim($_POST['nama']);
  $id_salary = trim($_POST['id_salary']);
  $id_work = trim($_POST['id_work']);
  $stmt = $db->prepare("UPDATE nama SET name = :nama, id_work = :id_work, id_salary = :id_salary)");
  $stmt->bindParam(":nama", $nama);
  $stmt->bindParam(":id_salary", $id_salary);
  $stmt->bindParam(":id_work", $id_work);

  $stmt->execute();

  echo'{}';

?>