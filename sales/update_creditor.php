<?php 
	include("../server/connection.php");
	include '../set.php';

  	if (isset($_GET['id'])){
		$id   =   $_GET['id'];
            $sql  =   "SELECT * FROM sales WHERE reciept_no='$id'";
		$result1   = mysqli_query($db, $sql);
		$row1  =   mysqli_fetch_array($result1);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');
	?>

</head>
<body>
	<div class="contain h-100">
		<div class="header bg-dark">
			<img class="img-fluid w-100 mt-2 ml-1" src="../images/logo.png" >
		</div>
	<div class="sidebar">
	<button><h3><i class="fas fa-tachometer-alt"></i>  Dashboard</h3></button>
	<button id="sidebar_button" onclick="window.location.href='../sales/sales.php'"><i class="fas fa-list-ul"></i> Sales</button>
	<button id="sidebar_button" onclick="window.location.href='../sales/creditors.php'"><i class="fas fa-truck"></i> Creditors</button>
	<button id="sidebar_button" onclick="window.location.href='../sales/charts.php'"><i class="fas fa-truck"></i> Sales Charts</button>
	<button id="sidebar_button" type="button" data-toggle="popover" title="Product Management" data-content="Here you will create, update, delete and view products." data-placement="bottom"><i class="fas fa-question"></i> Help</button>
	<div class="fixed-bottom">
		<button class="btn m-2 p-2" id="sidebar_button" onclick="window.location.href='../sales/creditors.php'"><i class="fas fa-arrow-alt-circle-left"></i> Back</button>
	</div>
</div>
        <form method="post" action="update.php" class="pr-4">
		<div class="main">
			<div class="side">
				<h1 class="ml-4">Creditors Management</h1>
				<hr>
			</div>

			<div class="second_side table-responsive">
					<p class="bg-danger w-50"><?php echo $msg;?></p>
					<table class="mt-5">
						<tbody>
							<tr style="visibility: hidden">
								<td  valign="baseline">reciept_no:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="id" class="form-control-sm form-control" value="<?php echo $row1['reciept_no'];?>"required></div></td>
							</tr>
                            <tr>
                                <td  valign="baseline">Owes:</td>
                                <td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="owes" class="form-control-sm form-control" value="<?php echo $row1['owes'];?>"required></div></td>
                            </tr>

						<?php }?>
						</tbody>
					</table>
					<div class="text-left mt-3">
                        <button type="submit" name="update" class="btn btn-secondary"><i class="fas fa-thumbs-up"></i> Update</button>
						<button type="button" class="btn btn-danger" onclick="window.location.href='../sales/creditors.php'" ><i class="fas fa-ban"></i> Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="../bootstrap4/jquery/jquery.min.js"></script>
	<script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
	<script>
		$(function () {
  			$('[data-toggle="popover"]').popover()
	})
	</script>
</body>
</html>