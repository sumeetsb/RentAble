<?php
require ('../model/ratings_db.php');
require ('../model/rating.php');
require ('../model/db_connect.php');?>
<?php
include('../view/header.php');

?>
<?php
$errorcomment = "";

// checking for different actions of the form and validation
if (isset($_POST['action'])){
        $rating_id = $_POST['rating_id'];
        if ($_POST['action']=='delete_rating'){
            RatingDB::deleteRating($rating_id);
            }
        if ($_POST['action']=='approve_rating'){
            RatingDB::approveRating($rating_id);
            }
        if ($_POST['action']=='insert' && !empty($_POST["ucomment"])){
            $raterid = $_POST['rater_id'];
            $ratedid = $_POST['rated_id'];
            $rate = $_POST['urating'];
            $comment = $_POST['ucomment'];
            $newrating = new rating($raterid, $ratedid, $rate, $comment);
            RatingDB::addRating($newrating);
            $errorcomment=" ";
            }
        if ($_POST['action']=='insert' && empty($_POST["ucomment"])){
            $errorcomment="Enter your comment";
            }
        if ($_POST['action']=='udpate_rating' && !empty($_POST["ucomment"])){
            $raterid = $_POST['rater_id'];
            $ratedid = $_POST['rated_id'];
            $rate = $_POST['urating'];
            $comment = $_POST['ucomment'];
            $newrating = new rating($raterid, $ratedid, $rate, $comment);
            RatingDB::updateRating($newrating,$rating_id);
            $errorcomment=" ";
            }
        if ($_POST['action']=='update_rating' && empty($_POST["ucomment"])){
            $errorcomment="Enter your comment";
            }
        }        
// getting all ratings, and all user ids from the database
        $ratings = RatingDB::getRatingsALL();
        $nratings = ['1','2','3','4','5'];
        $user_idlist=RatingDB::getUserIds();
        $user_idlist2=RatingDB::getUserIds();
?>
<link rel="stylesheet" type="text/css" href="../css/rating.css" />
<!--table which shows all ratings and options to edit them -->
<table id="rating_table">
    <tr>
        <td>Rated By</td>
        <td>Rated User</td>
        <td>Comments</td>
        <td>Rating</td>
        <td>Option</td>
        <td>Approve</td>
        <td>Delete</td>
    </tr>
    <form action='index.php' method='post'>
    <tr>
        <td>
            <input type='hidden' name='action' value='insert'/>
            <select name="rater_id">
            <?php foreach ($user_idlist as $rid) {
                echo "<option value=".$rid[0]." >".$rid[0]."</option>";
            } ?>
            </select>
        </td>
        <td>
            <select name="rated_id">
            <?php foreach ($user_idlist2 as $rid) {
                echo "<option value=".$rid[0]." >".$rid[0]."</option>";
            } ?>
            </select>
        </td>                
        <td>
            <input type='text' name='ucomment'/>
        </td>
        <td>
            <select name="urating">
            <?php foreach($nratings as $nrating) : ?>
                <option value=<?php echo $nrating?> selected ><?php echo $nrating?></option>';
            <?php endforeach; ?>
            </select>
        </td>
        <td>
            <input type='submit' name='submit' value='Create' /></td>
    </tr>
    </form>
    
    <?php foreach ($ratings as $rt): ?>
        <tr>
            <form action='index.php' method='post'>
                <td><?php echo $rt[1]?></td>
                <td><?php echo $rt[2]?></td>
                <td><input type="text" name="ucomment" value="<?php echo $rt[4]?>"></td>
                <td>
                    <select name="urating">
                    <?php foreach($nratings as $nrating) {
                        if ($nrating==$rt[3]){
                            echo "<option value='".$nrating."' selected >".$nrating."</option>";}
                        else { echo "<option value='".$nrating."'  >".$nrating."</option>";}
                        }
                    ?>
                    </select>
                </td>
                <td>
                    <input type='submit' value='Update' />
                    <input type='hidden' name='action' value='udpate_rating' />
                    <input type='hidden' name='rating_id' value='<?php echo $rt[0]?>'>
                </td>
            </form>    
            <?php if ($rt[5]=='1'){
            echo '<td> Approved</td>';
            }
            else { 
            echo "<td><form action='index.php' method='post'>";
            echo "<input type='hidden' name='action' value='approve_rating' />";
            echo "<input type='hidden' name='rating_id' value='".$rt[0]."' />";
            echo "<input type='submit' value='Approve' /></form></td>";
            }
            echo "<td><form action='index.php' method='post'>";
            echo "<input type='hidden' name='action' value='delete_rating' />";
            echo "<input type='hidden' name='rating_id' value='".$rt[0]."' />";
            echo "<input type='submit' value='Delete' /></form></td>";
            echo "<tr>";
            ?>
    <?php endforeach; ?>
</table>
<p><?php $errorcomment ?></p>
<?php
include('../view/footer.php');
?>