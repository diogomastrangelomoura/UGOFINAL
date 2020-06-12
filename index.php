<?php require ("includes/header.php"); ?>

	<body>

		<div id="preloader"><div id="status"><div class="spinner"></div></div></div>
               
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-t-30">
                        <img src="assets/images/novo_logo.png" height="60" alt="logo">
                    </h3>

                    <div class="p-1">
                        <h4 class=" font-18 m-b-5 text-center">Sistema de Gerenciamento</h4>
                        <p class="text-muted text-center">Informe seu email e senha para acessar.</p>


                        <form class="form-horizontal m-t-30" action="controlers/login/login.php" method="post" id="FormLogin">
                            
                            <?php 
                                if(isset($_SESSION['session_type'])){ 
                            ?>    
                                <div class="alert alert-<?php echo $_SESSION['session_type']; ?>">
                                    <?php echo $_SESSION['session_title']; ?> <?php echo $_SESSION['session_message']; ?>
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </div> 
                            <?php 
                                    unset($_SESSION['session_type']);
                                    unset($_SESSION['session_message']);
                                    unset($_SESSION['session_title']);    
                                } 
                            ?>    

                            <div class="form-group">
                                <label for="username">Usuário</label>
                                <input type="text" class="form-control" name="usuario" placeholder="Informe o usuário" required>
                            </div>

                            <div class="form-group">
                                <label for="userpassword">Senha</label>
                                <input type="password" class="form-control" name="senha" placeholder="Informe a senha" required>
                            </div>

                            <div class="form-group row m-t-20">
                                
                                <div class="col-sm-12 text-left">
                                    <button class="btn btn-ugo w-md waves-effect waves-light btn-block btn-lg" type="submit">   
                                    <i class="fa fa-spinner fa-pulse fa-fw icon-button hide"></i>    
                                    Acessar
                                    </button>
                                </div>
                                
                                <div class="col-sm-6 text-right hide">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Lembrar-me</label>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-10">
                                    <a href="recovery-pass" class="text-muted"><i class="mdi mdi-lock"></i> Esqueceu sua senha?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-20 text-center">
               <p>© <?php echo date("Y"); ?> Ugo. Todos os Direitos Reservados <b>SIS Tecnologia</b></p>
            </div>

        </div>


<?php require ("includes/footer.php"); ?>
<script src="<?php echo PATH; ?>assets/js/login.js"></script>

	</body>
</html>