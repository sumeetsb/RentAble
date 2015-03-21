<?php echo isset($_SESSION['user']) ? 
            "Hello, " . $_SESSION['fname'] . '<br /> <a href="'.ROOT.'?logout=true">Logout</a> | <a href="'.ROOT.'user_dash">Dashboard</a>'
                    : '<a href="'.ROOT.'login">Login</a> | <a href="'.ROOT.'register">Register</a>'
    
    
    
    ?>