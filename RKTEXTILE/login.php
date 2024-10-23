<?php
include './header.php';
?>
<section class="light-bg" style="padding-top: 100px; min-height: 590px; background:url('images/demo/slider-1.jpg'); background-size: cover;">
    <div class="container">
                <?php
                if (!isset($_POST['sub1'])) {
                ?>
                <style>
                    .styled-div {
                        background: white;
                        margin: 25%;
                        padding: 5%;
						width: 50%;
						height:100%;
						border-radius:10px;
                    }
                    .text-box {
                        margin-bottom: 10px; 
                        width: 100%;
                        box-sizing: border-box;
                        padding: 20px;
                    }
                    .button {
                        width: 100%;
                        padding: 20px;
                        background-color: #4CAF50; 
                        border: none;
                        color: white;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        margin-top: 10px; 
                        cursor: pointer;
                    }
                </style>
                <form name="f" action="" method="post" style="align-text:center">  
                    <div class="styled-div">
                        <input type="text" class="text-box" name="userid" placeholder=" User Id">
                        <input type="text" class="text-box" name="pwd" placeholder=" Password">
                        <input type="submit" name="sub1" class="button" value="Login">
                        <br>
                        <span style="margin:25%">Change Password <a href="changepwd.php">Here...!</a></span>
                    </div>
                </form>
                <?php
                } else {
                    extract($_POST);
                    $result = mysqli_query($link, "select * from admin where userid='$userid' and pwd='$pwd'") or die(mysqli_error($link));
                    if (mysqli_num_rows($result) > 0) {
                        $_SESSION['adminuserid'] = $userid;
                        header("Location:adminhome.php");
                    } else {
                        echo "<div class='center'>Invalid Userid/Password...!<br><a href='login.php'>Back</a></div>";
                    }
                    mysqli_free_result($result);
                }
                ?>
    </div>
</section>
<?php
include './footer.php';
?>
