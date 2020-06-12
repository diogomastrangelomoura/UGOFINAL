 // Select2
$(".select2").select2();


$(document).on('click', '.btn_novo_campo', function(e) {
   
   $(".esconde-info").hide();

   var row = $('.copy-create').clone(true);	
   $(".create-clone-options", row).html('');
   
   var d = new Date();

   var data_id = (d.getDate()+d.getMonth()+d.getFullYear()+d.getHours()+d.getMinutes()+d.getSeconds()+d.getMilliseconds());
   
   row.attr('id' , 'CloneApaga'+data_id);
   $(".apaga-clone", row).attr('data-id' , data_id);
   $(".create-clone-options", row).attr('id' ,'create-clone-options'+ data_id);
   $(".tipos_campos", row).attr('data-id' , data_id);

   row.removeClass('copy-create');
   row.removeClass('hide');
   row.addClass('UltimaCopia');
   $('.create-clone').prepend(row);

   $('<input>').attr({
             type: 'hidden',
             id: 'contadorOptions'+data_id,
             name: 'contadoroptions[]',
             value: '0'
         }).appendTo('#CloneApaga'+data_id);
   
   row.find("input[type='text']").focus();

});


$(document).on('click', '.apaga-clone', function(e) {
   

   $(".esconde-info").hide();

  id = $(this).attr('data-id'); 
   $("#CloneApaga"+id).slideUp('slow', function(){
      $("#CloneApaga"+id).remove();

      var matched = $(".UltimaCopia").length;
      if(matched==0){
          $(".esconde-info").show();
      }

   });

});



function criaCamposSelect(val,id,repete=0){

          var d = new Date();
          var create_id = (d.getDate()+d.getMonth()+d.getFullYear()+d.getHours()+d.getMinutes()+d.getSeconds()+d.getMilliseconds());

           row = $('.CloneOptions').clone(true);
           row.attr('id' , 'ApagaCloneOption'+create_id);

           $(".apaga-clone-option", row).attr('data-id' , create_id);     
           $(".apaga-clone-option", row).attr('data-get' , id);             
           
           row.removeClass('CloneOptions');
           row.removeClass('hide');
           row.addClass('UltimaCopiaOption');


           $('#create-clone-options'+id).prepend(row);


           row2 = $('.CloneAdicionaOptionBotao').clone(true);
           $(".btn_nova_option", row2).attr('data-id' , id);
           row2.removeClass('CloneAdicionaOptionBotao');
           row2.removeClass('hide');
           row2.addClass('UltimaCopiaOptionBotao');   

           
           $('#create-clone-options'+id).append(row2);
           $('#create-clone-options'+id).show();

           

           if(repete>0){
             
             $("#contadorOptions"+id).val('3');

             if(repete==3){
              row.find("input[type='text']").val('Não se Aplica');  
             } else if(repete==2){
              row.find("input[type='text']").val('Não Conforme'); 
             } else if(repete==1){
              row.find("input[type='text']").val('Conforme');

             }
             

             x = 1;
             while(x<repete){
              criaCamposSelect(val,id,(repete-1));
              x++;
             }

             if(x==repete){
                $(".btn_nova_option").hide();
                $(".btn_nova_option:last").show();
             }

           } else {
              row.find("input[type='text']").focus();
              $("#contadorOptions"+id).val('1');
           }
           
}


$(document).on('change', '.tipos_campos', function(e) {
   
   val = $(this).val();
   id = $(this).attr('data-id'); 
   
   
   if(val=='select'){

          //QUANDO FOR CHECKLIST
         if($("#opcoes_padrao").prop("checked") == true){

            
          criaCamposSelect(val,id,3);


         //QUANDO FOR FORM DE CADASTRO   
         } else {

           criaCamposSelect(val,id);

         }


   } else {

      $("#contadorOptions"+id).val('0');
      $("#create-clone-options"+id).slideUp('slow', function(){
         $("#create-clone-options"+id).html('');
      });


   }

});


$(document).on('click', '.btn_nova_option', function(e) {

         id = $(this).attr('data-id'); 
         var d = new Date();
         var create_id = (d.getDate()+d.getMonth()+d.getFullYear()+d.getHours()+d.getMinutes()+d.getSeconds()+d.getMilliseconds());
   
         row = $('.CloneOptions').clone(true);
         row.attr('id' , 'ApagaCloneOption'+create_id);

         $(".apaga-clone-option", row).attr('data-id' , create_id);
         $(".apaga-clone-option", row).attr('data-get' , id);
         $(".btn_nova_option", row).remove();

         row.removeClass('CloneOptions');
         row.removeClass('hide');
         row.addClass('UltimaCopiaOption');

         $('#create-clone-options'+id).prepend(row);

         row.find("input[type='text']").focus();

         cont = parseInt($("#contadorOptions"+id).val());
         cont = (cont+1);
         $("#contadorOptions"+id).val(cont)

});


$(document).on('click', '.apaga-clone-option', function(e) {
   
  id = $(this).attr('data-id'); 
  get = $(this).attr('data-get'); 
  cont = parseInt($("#contadorOptions"+get).val());
  cont = (cont-1);
  if(cont<0){cont=0};
  $("#contadorOptions"+get).val(cont);

   $("#ApagaCloneOption"+id).slideUp('slow', function(){
      $("#ApagaCloneOption"+id).remove();
   });

});


$(document).on('click', '.select-checkbox-all', function(e) {
   
  if ($(this).is(':checked')) {
      $(".select-checkbox"). prop("checked", true);
  } else {
      $(".select-checkbox"). prop("checked", false);
  }

});


$(document).on('click', '.print-page', function(e) {
   
  window.print()

});

$(document).on('click', '.botao-qrcode', function(e) {

  id = $(this).attr('data-id'); 
  name = $(this).attr('data-name'); 

  $.post('views/cadastros/exibe_qrcode.php', {id_objeto:id, name:name}, function(retorno){
              
    $("#body-response-qrcode").html(retorno)

  });
   
  $(".ModalQrCode").modal();

});

$(document).on('click', '.button-new-checklist', function(e) {

  $.post('views/checklist/select-checklist.php', {id:0}, function(retorno){
              
    $("#body-response-checklist").html(retorno)

  });
   
  $(".ModalChecklist").modal();

});





$(".nome_editando").keyup(function(){
  $(".exibe_nome_editando").html(this.value);
});




