<?php
include './adminheader.php';
if(!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select clothname from cloth");    
?>
 <div ><a href='sales.php' style='color:blue;font-size:100%'>--Back--</a></div>
<div style="text-align:center;">
    <div style="display:flex;justify-content:center;width: 100%; height: 60% ;background:url('images/demo/bbg.jpg');">
<form name="f" action="stitch.php" method="post"  style="float:left; margin:5%;background-color:pink;padding:2%;border-radius:10px">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2" class="center">STITCHING INFORMATION</th>
	    </tr>
	</thead>
	<tbody>
            <tr>
		<th>Select Dress</th>
                <td>
                    <select name="clothname">
                        <?php
                        while($row = mysqli_fetch_row($result)) {
                            echo "<option value='$row[0]'>$row[0]</option>";
                        }
                        mysqli_free_result($result);
                        ?>
                    </select>
                </td>
	    </tr>
	    <tr>
		<th>Tailor Name</th>
		<td><input type="text" name="tailor" required autofocus></td>
	    </tr>
            <tr>
		<th>Address</th>
                <td><textarea name="addr" required></textarea></td>
	    </tr>
            <tr>
		<th>Mobile</th>
                <td><input type="text" name="mobile" pattern="[9876]\d{9}" required maxlength="10"></td>
	    </tr>
            <tr>
		<th>Qty (Given to Stitch)</th>
                <td><input type="text" name="qty" pattern="\d+" required></td>
	    </tr>
            <tr>
		<th>Date</th>
                <td><input type="date" name="dt" value="<?php echo date('Y-m-d',time())?>" required></td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="sub1" value="Submit">
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
if(isset($_GET['d'])) {
    mysqli_query($link, "delete from stitching where id='$_GET[d]'");
}
$result = mysqli_query($link, "select id,clothname,tailor,qty,dt,rdt from stitching") or die(mysqli_error($link));
    echo "<div  style='float:right; margin:5%;background-color:pink;padding:2%;border-radius:10px'><table class='report_tab' style='min-width:250px; float:right;'><thead><tr><th colspan='6' class='center'>STITCHING RECORD</div>";
    echo "<tr><th>Cloth<th>Tailor<th>Qty<th>Send<th>Received<th>Task<tbody>";
    while($row=  mysqli_fetch_row($result)) {
	echo "<tr>";	
            foreach($row as $k=>$r) {
                if($k!=0)
                    echo "<td>$r";
            }
            echo "<td><a href='stitch.php?d=$row[0]'style= 'color:black;'  onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
            if(strcasecmp($row[5], "0000-00-00")==0)
            echo " | <a href='stitch1.php?d=$row[0]' style= 'color:black;' >Received</a>";
            else
            echo " | Received";
            echo " | <a href='stitch2.php?d=$row[0]' style= 'color:black;' >Show Tailor</a>";
    }
    echo "</tbody></table>";
mysqli_free_result($result);
} else {
    extract($_POST);
    $dt = date('Y-m-d',time());
    mysqli_query($link, "insert into stitching(clothname,tailor,addr,mobile,qty,dt) values('$clothname','$tailor','$addr','$mobile','$qty','$dt')");
    echo "<div class='center'>Stitching Record Stored...!<br><a href='stitch.php'>Back</a></div>";
}
include './adminfooter.php';
?>
</div>
</div>