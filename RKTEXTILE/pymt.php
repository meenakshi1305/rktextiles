<?php
include './adminheader.php';
if(!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select clothname from cloth");
?>
<div><a href='purchase.php?' style='color:blue;font-size:100%'>--Back--</a></div>
<div style="text-align:center;">
    <div style="display:flex;justify-content:center;width: 100%; height: 60% ;background:url('images/demo/bbg.jpg');">
<form name="f" action="pymt.php" method="post" style="float:center; margin:5%;background-color:pink;padding:5%;border-radius:10px" onsubmit="return chk()">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2" class="center">PAYMENT</th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>Payment Mode</th>
                <td>
                    <select name="pymtmode">
                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                    </select>
                    <input type="hidden" name="pid" value="<?php echo $_GET['pid'];?>">
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
                <td><input type="text" name="payable" pattern="\d+" value="<?php echo $_GET['bal'];?>" required readonly></td>
	    </tr>
            <tr>
		<th>Paying Amount</th>
                <td>
                    <input type="text" name="amt" pattern="\d+" required>
                </td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="sub1" value="Pay Amount">
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {
    extract($_POST);
    $dt = date('Y-m-d',time());
    mysqli_query($link, "insert into payment(dt,purid,pymtmode,bank,chqno,amt) values('$dt','$pid','$pymtmode','$bank','$chqno','$amt')");
    mysqli_query($link, "update purchase set paidamt=paidamt+$amt where id='$pid'");
    echo "<div class='center' style='font-weight:bolder;font-size:300%;color:green;margin:10%'>Payment Made Successfully...!<br><a href='purchase.php?' style='color:blue;font-size:100%'>--Back--</a></div>";
}
include './adminfooter.php';
?>
</div>
</div>
<script>
    function chk() {
        if(parseInt(f.amt.value) > parseInt(f.payable.value)) {
            alert("Payable Amount is greater than Balance Amount...!")
            return false
        }
        return true
    }
</script>