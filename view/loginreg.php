<?php echo isset($_SESSION['user']) ? 
            "Hello, " . $_SESSION['user'] . '<br /> <a href="'.ROOT.'login?logout=true">Logout</a>'
                    : '<a href="'.ROOT.'login">Login</a> | <a href="'.ROOT.'register">Register</a>'
    
    
    
    ?>