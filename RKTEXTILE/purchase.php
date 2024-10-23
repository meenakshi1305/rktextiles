<?php
include './adminheader.php';
if(!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select clothname from cloth");
?>
 <div ><a href='adminhome.php' style='color:blue;font-size:100%'>--Back--</a></div>
<div style="text-align:center;">
    <div style="display:flex;justify-content:center;width: 100%; height: 60% ;background:url('images/demo/bbg.jpg');">
<form name="f" action="purchase.php" method="post" style="float:left; margin:5%;background-color:pink;padding:2%;border-radius:10px">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2" class="center">PURCHASE</th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>Item Name</th>
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
		<th>Supplier Name</th>
                <td><input type="text" name="supplier" pattern="[a-zA-Z .]+" required></td>
	    </tr>
            <tr>
		<th>Qty</th>
		<td><input type="text" name="qty" pattern="\d+" required size="5"></td>
	    </tr>
            <tr>
		<th>Rate per Qty</th>
		<td><input type="text" name="rate" pattern="\d+" required size="5"></td>
	    </tr>
            <tr>
		<th>Bill Amount</th>
                <td>
                    <input type="text" name="billamt" pattern="\d+" required size="10">
                    <input type="button" name="b1" value="Calc" onclick="call()">
                </td>
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
    mysqli_query($link, "delete from purchase where id='$_GET[d]'");
    mysqli_query($link, "update cloth set stock=stock-$_GET[q] where clothname='$_GET[cn]'");
}
$result = mysqli_query($link, "select * from purchase") or die(mysqli_error($link));
    echo "<div style='float:right; margin:5%;background-color:pink;padding:1.5%;border-radius:10px'><table class='report_tab' style='min-width:250px; float:right;margin:5%;'><thead><tr><th colspan='7' class='center'>PURCHASE</div>";
    echo "<tr><th>Date<th>Item Name<th>Supplier<th>Qty<th>BillAmt<th>Paid<th>Task<tbody>";
    while($row=  mysqli_fetch_row($result)) {
	echo "<tr>";	
            foreach($row as $k=>$r) {
                if($k!=0)
                    echo "<td>$r";
            }
            $bal=$row[5]-$row[6];
            if($bal>0)
            echo "<td><a href='purchase.php?d=$row[0]&cn=$row[2]&q=$row[4]' style= 'color:black;'  onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a> | <a href='pymt.php?pid=$row[0]&bal=$bal' style= 'color:black;' >Payment</a>";
            else
            echo "<td><a href='purchase.php?d=$row[0]' style= 'color:black;' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
    }
    echo "</tbody></table>";
mysqli_free_result($result);
} else {
    extract($_POST);
    $dt = date('Y-m-d',time());
    mysqli_query($link, "insert into purchase(dt,clothname,supplier,qty,billamt) values('$dt','$clothname','$supplier','$qty','$billamt')");
    mysqli_query($link, "update cloth set stock=stock+$qty where clothname='$clothname'");
    echo "<div class='center'>Purchase Created...!<br><a href='purchase.php'>Back</a></div>";
}
include './adminfooter.php';
?>
</div>
</div>
<script>
    function call() {
        qty = parseInt(f.qty.value)
        rate = parseInt(f.rate.value)
        if(isNaN(qty)||isNaN(rate)) {
            alert("Enter Qty and Rate...!")
        } else {
            f.billamt.value = qty*rate
        }
    }
</script>