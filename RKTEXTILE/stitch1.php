<?php
include './adminheader.php';
if(!isset($_POST['sub1'])) {
    $d = $_GET['d'];
?>
<div style="text-align:center;">
    <div style="display:flex;justify-content:center;width: 100%; height: 60% ;background:url('images/demo/bbg.jpg');">
<form name="f" action="stitch1.php" style="float:left; margin:5%;background-color:pink;padding:2%;border-radius:10px" method="post">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2" class="center">STITCHING RECEIVED</th>
	    </tr>
	</thead>
	<tbody>
            <tr>
		<th>Received Date</th>
                <td>
                    <input type="date" name="rdt" value="<?php echo date('Y-m-d',time())?>" required>
                    <input type="hidden" name="sid" value="<?php echo $d;?>">
                </td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="sub1" value="Store">
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {
    extract($_POST);
    $b = mysqli_query($link, "update stitching set rdt='$rdt' where id='$sid'");
    if($b)
    echo "<div class='center' style='font-weight:bolder;font-size:300%;color:green;margin:10%'>Data Stored!<br><a href='sales.php' style='color:blue;font-size:100%'>--Back--</a></div>";

    else
    echo "<div class='center'>".  mysqli_error($link)."<br><a href='stitch.php'>Back</a></div>";
}
include './adminfooter.php';
?>
</div>
</div>