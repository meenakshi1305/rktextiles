<?php
include './adminheader.php';

if (!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "SELECT empno, ename, basic, monthlysalary FROM emp");
    $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    ?>
 <div ><a href='employee.php' style='color:blue;font-size:100%'>--Back--</a></div>
    <div style="text-align:center;">
        <div style="display:flex;justify-content:center;width: 100%; height: 60%; background:url('images/demo/bbg.jpg');">
            <form name="f" action="salary.php" method="post" style="float:left; margin:5%; background-color:pink; padding:2%; border-radius:10px">
                <table class="center_tab">
                    <thead>
                        <tr>
                            <th colspan="2" class="center">SALARY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Employee</th>
                            <td>
                                <select name="empno">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['empno'] . "'>" . $row['empno'] . " - " . $row['ename'] . "</option>";
                                    }
                                    mysqli_free_result($result);
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Month</th>
                            <td>
                                <select id="monthSelect" name="month"> <!-- Added id="monthSelect" -->
                                    <?php
                                    foreach ($month as $m)
                                        echo "<option value='$m'>$m</option>";
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Present</th>
                            <td>
                                <div id='checkboxes'></div> <!-- Placeholder for dynamic checkboxes -->
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
            if (isset($_GET['d'])) {
                mysqli_query($link, "DELETE FROM salary WHERE id='$_GET[d]'");
            }
            $result = mysqli_query($link, "SELECT s.id, s.empno, s.month, s.present, s.da, s.hra, s.pf, s.net 
                                            FROM salary s JOIN emp e ON s.empno = e.empno") or die(mysqli_error($link));
            echo "<div  style='float:right; margin:5%; background-color:pink; padding:2%; border-radius:10px'><table class='report_tab' style='min-width:250px; float:right;'><thead><tr><th colspan='9' class='center'>EMPLOYEE SALARY</div>";
            echo "<tr><th>No<th>Month<th>Present<th>DA<th>HRA<th>PF<th>Task<tbody>";
            while ($row = mysqli_fetch_row($result)) {
                echo "<tr>";
                foreach ($row as $k => $r) {
                    if ($k != 0)
                        echo "<td>$r";
                }
                echo "<td><a href='salary.php?d=$row[0]' style='color:black' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
            }
            echo "</tbody></table>";
            mysqli_free_result($result);
            ?>
        </div>
    </div>
    
   
    <script>
        // Update checkboxes based on the selected month
        document.getElementById('monthSelect').addEventListener('change', function() {
            var checkboxes = document.getElementById('checkboxes');
            var monthDays = 30; // Default to 30 days
            if (this.value == 'Feb') {
                monthDays = 28; // February has 28 days
            } else if (['Apr', 'Jun', 'Sep', 'Nov'].includes(this.value)) {
                monthDays = 30; // April, June, September, November have 30 days
            } else {
                monthDays = 31; // Rest of the months have 31 days
            }

            checkboxes.innerHTML = ''; // Clear existing checkboxes
            for (var i = 1; i <= monthDays; i++) {
                checkboxes.innerHTML += "<input type='checkbox' name='present[]' value='" + i + "'>" + i + " ";
            }
        });
    </script>


<?php
} else {
    extract($_POST);
    $month = $month . "-" . date('Y', time());

    $result = mysqli_query($link, "SELECT basic, monthlysalary FROM emp WHERE empno='$empno'");
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    // Counting the number of checked checkboxes
    $present_days_count = count($present);

    // Calculate basic salary based on monthly salary and present days
    $basic = $row['basic'] + ($row['monthlysalary'] * $present_days_count);

    // Calculate other components
    $da = $basic * 0.10;
    $hra = $basic * 0.5;
    $pf = $basic * 0.07;
    $net = round($basic + $da + $hra - $pf);

    mysqli_query($link, "INSERT INTO salary(empno, month, present, da, hra, pf, net) 
                         VALUES('$empno','$month','$present_days_count','$da','$hra','$pf','$net')") 
                         or die("<div class='center'>".mysqli_error($link)."<br><a href='salary.php'>Back</a></div>");

    echo "<div class='center' style='font-weight:bolder;font-size:300%;color:green;margin:10%'>Submitted Successfully!<br><a href='salary.php' style='color:blue;font-size:100%'>--Back--</a></div>";
}

include './adminfooter.php';
?>
