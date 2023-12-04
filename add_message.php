
<?php 


require_once ('connection.php');


				$name = mysqli_real_escape_string($link,$_REQUEST['name']);	
				$email = mysqli_real_escape_string($link,$_REQUEST['email']);	
				$subject = mysqli_real_escape_string($link,$_REQUEST['subject']);	
				$message = mysqli_real_escape_string($link,$_REQUEST['message']);	
								
      
				$sql = "INSERT INTO `message`(`name`, `email`, `subject`, `message`)
								VALUES ('$name', '$email', '$subject', '$message')";
            
                            $result = mysqli_query($link,$sql);
						
                            if(!($result == null))
                                    {
                                        $test = "index.html";
                                            echo "<script>
                                            alert('Done successfully');
                                            window.location.href='$test';
                                            </script>";
                                    die();
                                                                                                
                                    }else
                                        {
                                            echo "<script>
                                                    alert('something went wrong contact administrator');
                                                    window.location.href='admin_dashboard.php';
                                                    </script>";
                                            die();
                                        }
                                    
					
					
				

	
	
			
 ?>