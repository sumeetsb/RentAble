<?php
require ('../model/ratings_db.php');
require ('../model/rating.php');
require ('../model/database.php');?>
<?php
include('../view/header.php');

?>

<?php 
if (isset($_POST['action'])){
    if ($_POST['action']=="showusers"){
        $rated_id=$_POST['selected_user'];
    }
    if ($_POST['action']=="addnew" && !empty($_POST["ucomment"])){
        $raterid = $_POST['rater_id'];
        $ratedid = $_POST['rated_id'];
        $rate = $_POST['urating'];
        $comment = $_POST['ucomment'];
        $rated_id=$_POST['rated_id'];
        $newrating = new rating($raterid, $ratedid, $rate, $comment);
        RatingDB::addRating($newrating);
        $errorcomment=" Your rating has been submitted for approval ";
    }
    if ($_POST['action']=="addnew" && empty($_POST["ucomment"])){
        $errorcomment="Please enter a comment";
        $rated_id = $_POST['rated_id'];
    }
}
else {     $rated_id="4";
}
$userlist=RatingDB::getUsers();
$rater_id="7";
$nratings = ['1','2','3','4','5'];
$ratings = RatingDB::getRatingsbyId($rated_id);
?>
<h2>See ratings for user <?php echo $rated_id?></h2>
<form action="postrating.php" method="post">
    <select name="selected_user">
        <?php foreach ($userlist as $suser) {
            echo "<option value=".$suser[0]." >".$suser[0]."</option>";
    } ?>
    </select>
    <input type='submit' name='getuser' value='Show User' />
    <input type='hidden' name='action' value='showusers' />
</form>
<table>
    <tr>
        <td>Rated By</td>
        <td>Comments</td>
        <td>Rating</td>
    </tr>
    <?php foreach ($ratings as $rt) {
        echo "<tr><td>".$rt[1]."</td><td>".$rt[4]."</td><td>".$rt[3]."</td>";
    } ?>
</table>
<table>
    <form action='postrating.php' method='post'>
    <tr>
        <td></td>
        <td>                
            <input type='text' name='ucomment'/>
        </td>
        <td>
            <select name="urating">
            <?php foreach($nratings as $nrating) {
            echo "<option value=".$nrating." selected >".$nrating."</option>";
            }?>
            </select>
        </td>
    </tr>
</table>
<input type='hidden' name='rater_id' value='<?php echo $rater_id ?>' />
<input type='hidden' name='rated_id' value='<?php echo $rated_id ?>' />
<input type='hidden' name='action' value='addnew' />
<input type='submit' name='submit' value='Submit' />
<p><?php echo $errorcomment ?></p>
</form>
       
<?php
include('../view/footer.php');
?>