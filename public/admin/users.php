<?php
session_start();
ob_start();
define(ROOT, $_SERVER['DOCUMENT_ROOT'] . "/DigiMarket-master");
require(ROOT . "/core/init.php");
require(ROOT . "/library/modules/user/ranks/ranks.php");
$ranks = new Ranks;
$ranks->checkPriv($_COOKIE['username'], $_SESSION['password'], "uR");
if ($ranks->authed == 1) {
$fetchUsers = $conn->prepare("SELECT * FROM `us`");
$fetchUsers->execute();

while($fu = $fetchUsers->fetch(PDO::FETCH_ASSOC)) {
	?>
	<form action="users.php" method="POST">
		Username: <?= $fu['username'] ?><br>
		Rank: <?php if ( empty($fu['rank']) ) { echo "WARNING: This user has no rank - this could be potentially dangerous!"; } else { 
		$fetchUserRank = $conn->prepare("SELECT * FROM `ranks` WHERE id=:id");
		$fetchUserRank->bindParam(":id", $fu['rank']);
		$fetchUserRank->execute();
		while ($fur = $fetchUserRank->fetch(PDO::FETCH_ASSOC)) {
		echo $fur['title'];
		}
		} ?><br>
		
	Actions: <select name="rankModification">
				<?php
		$fetchRanks = $conn->prepare("SELECT * FROM `ranks`");
		$fetchRanks->execute();
		while ($fr = $fetchRanks->fetch(PDO::FETCH_ASSOC)) {
		?>
		<option value="<?= $fr['id'] ?>"><?= $fr['title'] ?></option>
		<?php } ?>
		</select>
		<input type="text" id="username" name="username" value="<?= $fu['username'] ?>" style="display:none;" />
		<input type="text" id ="text" name="submitted" value=1 style="display:none;" /> <input type="submit" />
	</form>
	<?php
}

if ( isset( $_POST['submitted'] ) ) {
	$ranks->setRank($_POST['username'], $_POST['rankModification']);
	echo "<br><br>Loading...";
	header("Refresh:0");
}
} else {
	echo "You are not authorized to view this page";
}
ob_end_flush();
?>