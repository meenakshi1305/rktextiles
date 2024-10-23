<?php
include './adminheader.php';
//include './menu.php';
if(!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select ifnull(max(empno),999)+1 from emp");
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
?>
<div >
    <a href='purchase.php' style='color:blue;font-size:100%'>--Back--</a>
</div>
<div style="text-align:center;">
    <div style="display:flex;justify-content:center;width: 100%; height: 60% ;background:url('images/demo/bbg.jpg');">
<form name="f" action="employee.php" method="post" style="float:left; margin:5%;background-color:pink;padding:2%;border-radius:10px">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2" class="center">EMPLOYEE</th>
	    </tr>
	</thead>
	<tbody>
            <tr>
		<th>Employee Id</th>
		<td><input type="text" name="empno" required value="<?php echo $row[0];?>"></td>
	    </tr>
	    <tr>
		<th>Employee Name</th>
		<td><input type="text" name="ename" required autofocus></td>
	    </tr>
            <tr>
		<th>Gender</th>
		<td>
                    <input type="radio" name="gender" value="Male" checked>Male &nbsp;
                    <input type="radio" name="gender" value="Female">Female
                </td>
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
		<th>Basic Pay/Day</th>
                <td><input type="text" name="basic" pattern="\d+" required></td>
	    </tr>
            <tr>
		<th>Monthly Salary</th>
                <td><input type="text" name="monthlysalary" pattern="\d+" required></td>
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
}
if(isset($_GET['d'])) {
    // Sanitize input to prevent SQL injection
    $empno = mysqli_real_escape_string($link, $_GET['d']);
    // Delete record
    mysqli_query($link, "DELETE FROM emp WHERE empno='$empno'") or die(mysqli_error($link));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract POST variables
    extract($_POST);

    // Validate and sanitize inputs (not implemented in this example)
    
    // Insert new record
    $insert_query = "INSERT INTO emp(empno, ename, gender, addr, mobile, basic, monthlysalary) 
                    VALUES ('$empno', '$ename', '$gender', '$addr', '$mobile', '$basic', '$monthlysalary')";
    $result = mysqli_query($link, $insert_query);
    
    if ($result) {
        echo "<div class='center' style='font-weight:bolder;font-size:300%;color:green;margin:10%'>Employee Created!<br><a href='employee.php' style='color:blue;font-size:100%'>--Back--</a></div>";
    } else {
        echo "Error: " . mysqli_error($link);
    }
}

// Display employee records
$result = mysqli_query($link, "SELECT empno, ename, gender, mobile, basic, monthlysalary FROM emp") or die(mysqli_error($link));
echo "<div style='float:right; margin:5%;background-color:pink;padding:2%;border-radius:10px'><table class='report_tab' style='min-width:250px; float:right;'><thead><tr><th colspan='6' class='center'>EMPLOYEE RECORD</div>";
echo "<tr><th>No<th>Name<th>Gender<th>Mobile<th>Basic<th>Monthlysalary<th>Task<tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";    
    foreach ($row as $r) {                
        echo "<td>$r</td>";
    }
    echo "<td><a href='employee.php?d={$row['empno']}' style= 'color:black;' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a></td>";
}

?>

</div>
</div>

