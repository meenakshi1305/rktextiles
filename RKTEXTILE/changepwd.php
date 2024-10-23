<?php
include './header.php';
?>
<section class="light-bg" style="padding-top: 100px;min-height: 590px; background:url('images/demo/slider-1.jpg');background-size:cover;">
<div class="container">
    <div class="row">
<?php
if(!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select * from admin");
    $row = mysqli_fetch_row($result);    
    mysqli_free_result($result);
?>
<form name="f" action="changepwd.php" method="post" onsubmit="return chk()">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2" class="center">CHANGE PASSWORD</th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>Current Password</th>
                <td><input type="password" name="opwd" required autofocus><input type="hidden" name="hpwd" value="<?php echo $row[1];?>" required></td>
	    </tr>
            <tr>
		<th>New Password</th>
                <td><input type="password" name="pwd" required></td>
	    </tr>
	    <tr>
		<th>Confirm Password</th>
                <td><input type="password" name="cpwd" required></td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="sub1" value="Change">		    
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {
    extract($_POST);
    if(strcmp($hpwd, $opwd)==0) {
        $b = mysqli_query($link, "update admin set pwd='$pwd'") or die(mysqli_error($link));
        if($b) {
            echo "<div class='center'>Password Set Successfully...!<br><a href='login.php'>Back</a></div>";
        } else {
            echo "<div class='center'>".mysqli_error($link)."<br><a href='changepwd.php'>Back</a></div>";
        }
    } else {
        echo "<div class='center'>Invalid Current Password...!<br><a href='login.php'>Back</a></div>";
    }
}
?>
        </div>
</div>
</section>
<?php
include './footer.php';
?>
<script>
    function chk() {
        if(f.pwd.value != f.cpwd.value) {
            alert("Confirm Password not Match...!")
            f.cpwd.focus()
            return false
        }
        return true
    }
</script>