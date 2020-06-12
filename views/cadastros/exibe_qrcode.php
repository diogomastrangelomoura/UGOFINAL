<?php
require ("../../config.php");
QRcode::png($id_objeto, "../../assets/images/qrcode/QR_code.png", QR_ECLEVEL_L , 9);
?>

<img src="assets/images/qrcode/QR_code.png">
<center>
	<button style="display: none;" class="btn btn-ugo-border waves-light waves-effect print-page"><i class="mdi mdi-printer"></i> Imprimir placa</button>
</center>