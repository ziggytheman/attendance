<?php
//	Secure Connection Script

include('htconfig/dbConfig.php');
include('includes/dbaccess.php');
include('includes/fn_commonFunctions.php');
include('includes/fn_insert_validations.php');
$nameOption = createNameDropDown($dbSelected);
//	END	Secure Connection Script
$footerMsg = $errorMsg = $userMsg = "";

if ($dbSuccess) {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $name = "";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = clean_input($_POST["name"]);
        if (strlen($name) > 0) {
            if (insertDetail($dbSelected, $name)) {
                $footerMsg = $name . " has been successfully logged.";
                //   header("Location: index.php");
                $name = "";
            } else {
                $errorMsg = "Insert Failed. Please contact Tony";
            }
        } else {
            $errorMsg = "Name cannot be blank";
        }
    }
} else {
    $contentMsg = 'No database connection.';
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Staff Attendance</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css" > 
        <link rel="stylesheet" type="text/css" href="css/nhi.css" >
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <h1 id="pageHeader">Staff Attendance</h1>
            <div id="message">
                <p><span id="returnMsg">Welcome. Please enter your name. Last Name, First Initial</span></p>
            </div>
        </header> 
        <form method="post" action="index.php" >
            <div class="fieldSet">
                <fieldset>
                    <legend>Employee Sign In</legend>
                    <div class="column1">
                        <p>
                            <label class="field" for="name">Name</label>
                            <input list="names" name="name" id="name" class="textbox-150" 
                                   autofocus placeholder="Last name, First Initial"
                                   />

                            <datalist id="names">
                                <?php echo $nameOption; ?>       
                            </datalist>
                        </p>
                    </div>
                </fieldset>
            </div>
            <input type="submit" value="Enter">
            <input type="reset" value="Cancel">
        </form>
        <footer>
            <p><span id="footerMsg"><?php echo $footerMsg ?></span></p>
            <p><span id="userMsg"></span></p>
            <p><span id="errorMsg"><?php echo $errorMsg ?></span></p>
        </footer><!-- end footer -->
    </body>

</html>
<script>
    jQuery(document).ready(function () {
        setTimeout(function () {
            document.getElementById('footerMsg').innerHTML = "";
        }, 5000);
        setTimeout(function () {
            document.getElementById('errorMsg').innerHTML = "";
        }, 5000);
    });
</script>
