<?php
session_start();
session_unset(); 
// destroy the session 
session_destroy(); 

			echo "<script>
			window.location.href='index.html';
		
			</script>";

	
exit();


?>