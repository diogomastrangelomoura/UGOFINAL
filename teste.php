
<script type="text/javascript">
	var d = new Date();

	mes = parseInt(d.getMonth() + 1); if(mes<10){mes = '0'+mes;}
	dia = d.getDate(); if(dia<10){hora = '0'+hora;}
	hora = d.getHours(); if(hora<10){hora = '0'+hora;}
	minutos = d.getMinutes(); if(minutos<10){minutos = '0'+minutos;}
	segundos = d.getSeconds(); if(segundos<10){segundos = '0'+segundos;}


    var data =
      d.getFullYear() +
      '-' +
      mes
      '-' +
      dia +
      'T' +
      hora +
      ':' +
      minutos +
      ':' +
      segundos +
      'Z';


      alert(data);
</script>