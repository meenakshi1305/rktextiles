<?php
include './adminheader.php';
if(!isset($_POST['sub1'])) {  
?>
 <div ><a href='yettopay.php' style='color:blue;font-size:100%'>--Back--</a></div>
<div style="text-align:center;">
    <div style="display:flex;justify-content:center;width: 100%; height: 60% ;background:url('images/demo/bbg.jpg');">
<form name="f" action="report.php" method="post"  style="float:center; margin:5%;background-color:pink;padding:5%;border-radius:10px">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2" class="center">DATEWISE REPORT</th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>From Date</th>
		<td><input type="date" name="fromdt" required autofocus></td>
	    </tr>
            <tr>
		<th>To Date</th>
                <td><input type="date" name="todt" required></td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="sub1" value="Show">
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {
    extract($_POST);
$result = mysqli_query($link, "select * from purchase where dt between '$fromdt' and '$todt'") or die(mysqli_error($link));
    echo "<table class='report_tab' style='min-width:75%;float:center; margin:5%;background-color:pink;padding:10%;border-radius:10px'><thead><tr><th colspan='4' class='center'>PURCHASE REPORT";
    echo "<tr><th>Date<th>Dress Name<th>Supplier<th>Bill Value<tbody>";
    $tot=0;
    while($row=  mysqli_fetch_row($result)) {
	echo "<tr>";	
        echo "<td>$row[1]<td>".ucfirst($row[2])."<td>$row[3]<td>Rs.$row[5]";
        $tot+=$row[5];
    }
    echo "<tr><th colspan='3'>Total<td>Rs.$tot/-";
    echo "</tbody></table>";
mysqli_free_result($result);
echo "<hr>";
$result = mysqli_query($link, "select * from sales where dt between '$fromdt' and '$todt'") or die(mysqli_error($link));
    echo "<table class='report_tab' style='min-width:75%;float:center; margin:5%;background-color:pink;padding:10%;border-radius:10px'><thead><tr><th colspan='4' class='center'>SALES REPORT";
    echo "<tr><th>Date<th>Dress Name<th>Customer<th>Bill Value<tbody>";
    $tot=0;
    while($row=  mysqli_fetch_row($result)) {
	echo "<tr>";	
        echo "<td>$row[1]<td>".ucfirst($row[2])."<td>$row[3]<td>Rs.$row[6]";
        $tot+=$row[6];
    }
    echo "<tr><th colspan='3'>Total<td>Rs.$tot/-";
    echo "</tbody></table>";
    
mysqli_free_result($result);
}

include './adminfooter.php';
?>
</div>
</div>