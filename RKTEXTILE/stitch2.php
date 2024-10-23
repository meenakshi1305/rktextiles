<?php
include './adminheader.php';
    $d = $_GET['d'];
    $result = mysqli_query($link, "select tailor,addr,mobile from stitching where id='$d'");
    $r = mysqli_fetch_row($result);
    mysqli_free_result($result);
?>
<div style="text-align:center;">
    <div style="display:flex;justify-content:center;width: 100%; height: 60% ;background:url('images/demo/bbg.jpg');">
<form name="f" action="stitch2.php" style="float:left; margin:5%;background-color:pink;padding:2%;border-radius:10px"  method="post">
    <table class="center_tab" style="width:40%;">
	<thead>
	    <tr>
                <th colspan="2" class="center">TAILOR INFORMATION</th>
	    </tr>
	</thead>
	<tbody>
            <tr>
		<th>Tailor Name</th>
                <td><?php echo $r[0];?></td>
	    </tr>
            <tr>
		<th>Address</th>
                <td><?php echo nl2br($r[1]);?></td>
	    </tr>
            <tr>
		<th>Mobile</th>
                <td><?php echo $r[2];?></td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
                    <input type="button" name="sub1" value="Back" onclick="call()">
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
include './adminfooter.php';
?>
</div>
</div>
<script>
    function call() {
        location.href='stitch.php'
    }
</script>