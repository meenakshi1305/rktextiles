<?php
include './adminheader.php';
if(!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select clothname from cloth");
?>
 <div ><a href='purchase.php' style='color:blue;font-size:100%'>--Back--</a></div>
<div style="text-align:center;">
    <div style="display:flex;justify-content:center;width: 100%; height: 60% ;background:url('images/demo/bbg.jpg');">
<form name="f" action="sales.php" method="post" style="float:left; margin:5%;background-color:pink;padding:2%;border-radius:10px">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2" class="center">SALES</th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>Cloth Name</th>
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
		<th>Customer Name</th>
		<td><input type="text" name="customer" pattern="[a-zA-Z .]+" required></td>
	    </tr>
            <tr>
		<th>Qty</th>
		<td><input type="text" name="qty" pattern="\d+" required size="5"></td>
	    </tr>
            <tr>
		<th>Rate</th>
		<td><input type="text" name="rate" pattern="\d+" required onblur="call()"></td>
	    </tr>
            <tr>
		<th>Bill Amount</th>
		<td><input type="text" name="billamt" pattern="\d+" required></td>
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
    mysqli_query($link, "delete from sales where id='$_GET[d]'");
    mysqli_query($link, "update cloth set stock=stock+$_GET[qty] where clothname=(select clothname from sales where id='$_GET[d]')");
}
$result = mysqli_query($link, "select * from sales") or die(mysqli_error($link));
    echo "<div style='float:right; margin:5%;background-color:pink;padding:1%;border-radius:10px;align-item:center'><table class='report_tab' style='min-width:250px; float:right;'><thead><tr><th colspan='8' class='center'>SALES</div>";
    echo "<tr><th>Date<th>Cloth Name<th>Customer<th>Qty<th>Rate<th>BillAmt<th>Paid<th>Task<tbody>";
    while($row=  mysqli_fetch_row($result)) {
	echo "<tr>";	
            foreach($row as $k=>$r) {
                if($k!=0)
                    echo "<td>$r";
            }
            echo "<td><a href='sales.php?d=$row[0]&qty=$row[4]' style= 'color:black;'  onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a> | <a href='sales1.php?id=$row[0]'style= 'color:black;' >Receipt</a>";
    }
    echo "</tbody></table>";
mysqli_free_result($result);
} else {
    extract($_POST);
    $dt = date('Y-m-d',time());
    mysqli_query($link, "insert into sales(dt,clothname,customer,qty,rate,billamt) values('$dt','$clothname','$customer','$qty','$rate','$billamt')");
    mysqli_query($link, "update cloth set stock=stock-$qty where clothname='$clothname'");
    echo "<div class='center' style='font-weight:bolder;font-size:300%;color:green;margin:10%'>Sales Made...!<br><a href='sales.php' style='color:blue;font-size:100%'>--Back--</a></div>";
}
?>
</div>
</div>
<script>
    function call() {
        f.billamt.value = parseInt(f.qty.value)*parseInt(f.rate.value)
    }
    
    function call() {
        var quantity = parseInt(f.qty.value);
        var rate = parseInt(f.rate.value);
        var billAmount = quantity * rate;

        if (quantity <= 30) {
            alert("No sales for quantity 30 or below.");
        }

        f.billamt.value = billAmount;
    }


</script>
<?php
include './adminfooter.php';
?>