
    <?php
include './adminheader.php';
?>
 <div ><a href='stitch.php' style='color:blue;font-size:100%'>--Back--</a></div>
<?php
$result = mysqli_query($link, "select * from purchase where billamt-paidamt>0") or die(mysqli_error($link));
    echo "<div style='float:center; margin:5%;background-color:pink;padding:2%;border-radius:10px'><table class='report_tab' style='min-width:60%;'><thead><tr><th colspan='7' class='center'>PAYABLE OUTSTANDING</div>";
    echo "<tr><th>Date<th>Item Name<th>Supplier<th>Qty<th>BillAmt<th>Paid<th>Balance<tbody>";
    while($row=  mysqli_fetch_row($result)) {
	echo "<tr>";	
            foreach($row as $k=>$r) {
                if($k!=0)
                    echo "<td>$r";
            }
            $bal=$row[5]-$row[6];
	echo "<td>Rs.$bal/-";
    }
    echo "</tbody></table>";
mysqli_free_result($result);
echo "<hr>";

$result = mysqli_query($link, "select * from sales where billamt-receipt>0") or die(mysqli_error($link));
    echo "<div  style='float:center; margin:5%;background-color:pink;padding:2%;border-radius:10px'><table class='report_tab' style='min-width:60%;'><thead><tr><th colspan='8' class='center'>RECEIVABLE OUTSTANDING</div>";
    echo "<tr><th>Date<th>Cloth Name<th>Customer<th>Qty<th>Rate<th>BillAmt<th>Paid<th>Balance<tbody>";
    while($row=  mysqli_fetch_row($result)) {
	echo "<tr>";	
            foreach($row as $k=>$r) {
                if($k!=0)
                    echo "<td>$r";
            }
	echo "<td>Rs.".($row[6]-$row[7])."/-";
    }
    echo "</tbody></table>";
mysqli_free_result($result);
include './adminfooter.php';
?>