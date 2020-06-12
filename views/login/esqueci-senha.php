<?php require ("../../includes/header.php"); ?>

	<body>

		<div id="preloader"><div id="status"><div class="spinner"></div></div></div>
               
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.html" class="logo logo-admin"><img src="assets/images/novo_logo.png" height="60" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 mb-3 text-center">Esqueci minha senha!</h4>
                        <div class="alert alert-info" role="alert">
                            Informe o e-mail para receber as instruções!
                        </div>

                        <form class="form-horizontal m-t-30" action="index.html">

                            <div class="form-group">
                                <label for="useremail">E-mail</label>
                                <input type="email" class="form-control" id="useremail" placeholder="Informe seu e-mail">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-left">
                                    <button class="btn btn-ugo w-md waves-effect waves-light" type="submit">Reenviar senha</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
               <p>© <?php echo date("Y"); ?> Ugo. Todos os Direitos Reservados <b>SIS Tecnologia</b></p>
            </div>

        </div>


<?php require ("../../includes/footer.php"); ?>

	</body>
</html>