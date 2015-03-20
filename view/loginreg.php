<?php echo isset($_SESSION['user']) ? 
            "Hello, " . $_SESSION['user'] 
                    : '<a href="'.ROOT.'/login">Login</a> | <a href="'.ROOT.'/register">Register</a>'
    
    
    
    ?>