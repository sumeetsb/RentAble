<?php
require ('../model/ratings_db.php');
require ('../model/rating.php');
require ('../model/db_connect.php');?>
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
        echo $raterid;
        echo $ratedid;
        echo $rate;
        echo $comment;
        $newrating = new rating($raterid, $ratedid, $rate, $comment);
        RatingDB::addRating($newrating);
        $errorcomment=" Your rating has been submitted for approval ";
    }
    if ($_POST['action']=="addnew" && empty($_POST["ucomment"])){
        $errorcomment="Please enter a comment";
        $rated_id = $_POST['rated_id'];
    }
}
else {     $rated_id="1";
}
$userlist=RatingDB::getUsers();
$rater_id="3";
$nratings = ['1','2','3','4','5'];
$ratings = RatingDB::getRatingsbyId($rated_id);
?>
<link rel="stylesheet" type="text/css" href="../css/rating.css" />

<h2>See ratings for user <?php 
        $u_name_rater = RatingDB::getUserbyId($rated_id);
        foreach ($u_name_rater as $rater){
        $first_name=$rater[1];
        $last_name=$rater[2];
        }
        echo $first_name; echo $last_name;?></h2>
<form action="index.php" method="post">
    <select name="selected_user">
        <?php foreach ($userlist as $suser) {
            echo "<option value=".$suser[0]." >".$suser[0]."</option>";
    } ?>
    </select>
    <input type='submit' name='getuser' value='Show User' />
    <input type='hidden' name='action' value='showusers' />
</form>
<table id="rating_table">
    <tr>
        <td>Rated By</td>
        <td>Comments</td>
        <td>Rating</td>
    </tr>
    <?php foreach ($ratings as $rt) {
        $u_name_rater = RatingDB::getUserbyId($rt[1]);
        foreach ($u_name_rater as $rater){
        $first_name=$rater[1];
        $last_name=$rater[2];
        }
        echo "<tr><td>".$first_name."  ".$last_name."</td><td>".$rt[4]."</td><td>".$rt[3]."</td>";
    } ?>
</table>
<table>
    <form action='index.php' method='post'>
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