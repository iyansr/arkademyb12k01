<?php 
  require_once('koneksi.php');

  $id = intval($_POST['id']);
  $stmt = $db->prepare("DELETE FROM nama WHERE id = :id");
  $stmt->bindParam(":id", $id, PDO::PARAM_INT);

  $stmt->execute();

  echo'{}';

?>