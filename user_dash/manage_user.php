<?php
include '../view/header.php';

?>
<h1>Edit Profile</h1>
<div id="register">
    <form action="index.php" method="post">
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="fname" value="<?php echo $fname; ?>" /></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lname" value="<?php echo $lname; ?>" /></td>
            </tr>
            <tr>
                <td>Enter Birth Date:<br /> (M/D/Y)</td>
                <td>
                    <select name="month">
                        <?php 
                            foreach($months as $mon){
                                echo '<option value="'.$mon.'">'.$mon.'</option>';
                            }
                        ?>
                    </select>/
                    <select name="day">
                        <?php
                            for ( $i = 1; $i < 32; $i++ ){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        ?>
                    </select>/
                    <select name="year">
                        <?php
                            for($y=1900;$y<date('Y');$y++){
                                echo '<option value="'.$y.'">'.$y.'</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value="<?php echo $email; ?>" /></td>
            </tr>
            <tr>
                <td>Phone (ex: 416-466-6666):</td>
                <td><input type="text" name="phone" value="<?php echo$phone; ?>"/></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="uname" value="<?php echo $uname; ?>"/></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="pass" value="<?php echo $pass; ?>" /></td>
            </tr>
            <tr>
                <td>Re-enter Password:</td>
                <td><input type="password" name="pass2" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="update" value="Save Changes" /></td>
                
            </tr>
        </table>
    </form>
    <?php 
    foreach($errors as $err){
        echo '<p class="error">'.$err.'</p>';
    }
    ?>
</div>

<?php 

include '../view/footer.php';