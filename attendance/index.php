<?php
//	Secure Connection Script

include('htconfig/dbConfig.php');
include('includes/dbaccess.php');
include('includes/fn_commonFunctions.php');
include('includes/fn_insert_validations.php');
$nameOption = createNameDropDown($dbSelected);
//	END	Secure Connection Script
if ($dbSuccess) {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $name = "";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = clean_input($_POST["name"]);
        if (insertDetail($dbSelected, $name)) {
            $footerMsg = "Insert was successful. ";
            header("Location: index.php");
        } else {
            $footerMsg = "Insert FAILED. ";
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
        <title></title>
    </head>
    <body>
        <form method="post" action="index.php" >
            <div class="fieldSet">
                <fieldset>
                    <legend>Staff Attendance</legend>
                    <div class="column1">
                        <p>
                            <label class="field" for="name">Name</label>
                            <input list="names" name="name" id="name" class="textbox-150" 
                                   autofocus
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
            <p><span id="footerMsg"></span></p>
            <p><span id="userMsg"><?php echo "Welcome. Please enter your name."; ?></span></p>
        </footer><!-- end footer -->
    </body>

</html>
