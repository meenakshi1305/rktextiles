<?php
include './adminheader.php';
if(!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select billamt-receipt from sales where id='$_GET[id]'");
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
?>
<div><a href='sales.php?id=6' style='color:blue;font-size:100%'>--Back--</a></div>
<div style="text-align:center;">
    <div style="display:flex;justify-content:center;width: 100%; height: 60% ;background:url('images/demo/bbg.jpg');">
<form name="f" action="sales1.php" method="post"style="float:left; margin:5%;background-color:pink;padding:2%;border-radius:10px" onsubmit="return check()">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2" class="center">RECEIPT</th>
	    </tr>
	</thead>
	<tbody>
            <tr>
		<th>Receipt Mode</th>
                <td>
                    <select name="pymtmode">
                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                    </select>
                </td>
	    </tr>
            <tr>
		<th>Bank Name</th>
		<td><input type="text" name="bank"></td>
	    </tr>
            <tr>
		<th>Chq No/Tran. No.</th>
		<td><input type="text" name="chqno"></td>
	    </tr>
	    <tr>
		<th>Balance Amount</th>
		<td>
                    <input type="text" name="pamt" value="<?php echo $row[0];?>" required readonly>
                    <input type="hidden" name="sid" value="<?php echo $_GET['id'];?>">
                </td>
	    </tr>
            <tr>
		<th>Amount Received</th>
		<td><input type="text" name="paid" required pattern="\d+"></td>
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
} else {
    extract($_POST);
    $dt = date('Y-m-d',time());
    mysqli_query($link, "update sales set receipt=receipt+$paid where id='$sid'");
    mysqli_query($link, "insert into receipt(dt,sid,pymtmode,bank,chqno,amt) values('$dt','$sid','$pymtmode','$bank','$chqno','$paid')");
    echo "<div class='center' style='font-weight:bolder;font-size:300%;color:green;margin:10%'>Recipt Made!<br><a href='sales.php?id=6' style='color:blue;font-size:100%'>--Back--</a></div>";
}
?>
<script>
    function check() {
        if(parseInt(f.paid.value)>parseInt(f.pamt.value)) {
            alert("Amount Received is greater than Receivable Amount...!")
            f.paid.focus()
            return false
        }
        return true
    }
</script>
<?php
include './adminfooter.php';
?>
</div>
</div>