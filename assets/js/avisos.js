/*
 Template Name: Fonik - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Sweet Alert init js
 */

!function ($) {
    "use strict";

    var SweetAlert = function () {
    };

    //examples
    SweetAlert.prototype.init = function () {

     
    },
        //init
        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.SweetAlert.init()
    }(window.jQuery);


    $(document).ready(function() {

    	aviso_title = $("input[name=session_title]").val();
    	aviso_message = $("input[name=session_message]").val();
    	aviso_type = $("input[name=session_type]").val();

    	if(aviso_title!='' && aviso_message!='' && aviso_type!='') {
	        setTimeout(function(){    
	            swal(
	                {
	                    title: aviso_title,
	                    text: aviso_message,
	                    type: aviso_type,
                        confirmButtonColor: '#6f2f9f',
	                    showCancelButton: false

	                    
	                }
	            )
	        }, 400);    

	        $("input[name=session_title]").val('');
    		$("input[name=session_message]").val('');
    		$("input[name=session_type]").val('');

	    }
    });

    


$(document).on('click', '.apaga-elemento', function(e) {
   
        id = $(this).attr('data-id'); 
        post = $(this).attr('data-post'); 
        aviso_title = $(this).attr('data-title'); 
        aviso_message = $(this).attr('data-text'); 
        retorno = $(this).attr('data-return'); 

        if(id==0){
            var ids = [];
            $.each($("input[name='ids']:checked"), function(){
                ids.push($(this).val());
            });

            id = ids;
        }

        swal.queue([{
                title: aviso_title,
                text: aviso_message,
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Não, cancelar',
                confirmButtonClass: 'btn btn-ugo',
                cancelButtonClass: 'btn btn-danger m-l-10',                
                buttonsStyling: true,
                confirmButtonColor: '#6f2f9f',
                cancelButtonColor: '#d9534f',
                showLoaderOnConfirm: true,
                preConfirm: function () {

                    $.post(post, {id:id}, function(res){
                        
                       location.href = retorno;                                                
                       
                    });
                }
        }])
        

});




