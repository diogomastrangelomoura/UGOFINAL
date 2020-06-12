<?php
ob_start();
@session_start();
require ("../../config.php");


$delete = $db->select("DELETE FROM check_indi_index WHERE id_checklist='$id'");
$delete = $db->select("DELETE FROM checklists WHERE id_checklist='$id'");

echo 1;
?>