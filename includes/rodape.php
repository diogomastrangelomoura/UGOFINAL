						
						
					</div>
					
				</div>
            </div>            

    </div>        

        <?php 
        @session_start();
        ?>

    	<input type="hidden" name="session_type" value="<?php if(isset($_SESSION['session_type'])){ echo $_SESSION['session_type']; unset($_SESSION['session_type']);} ?>">
    	<input type="hidden" name="session_message" value="<?php if(isset($_SESSION['session_message'])){ echo $_SESSION['session_message']; unset($_SESSION['session_message']);} ?>">
    	<input type="hidden" name="session_title" value="<?php if(isset($_SESSION['session_title'])){ echo $_SESSION['session_title']; unset($_SESSION['session_title']);} ?>">

        <?php require("footer.php"); ?>
        

    </body>
</html>    