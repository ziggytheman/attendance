<?php
//	Secure Connection Script

include('htconfig/dbConfig.php');
include('includes/dbaccess.php');
//	END	Secure Connection Script
if ($dbSuccess) {
    $name = "";
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
        <form method="post" action="index.php?content=autoTardy" >
            <div class="fieldSet">
                <fieldset>
                    <legend>Staff Attendance</legend>
                    <div class="column1">
                        <p>
                            <label class="field" for="name">Name</label>
                            <input type="text" name="name" id="studentId" class="textbox-150" 
                                   autofocus onfocus="myFunction(this)" value="<?php echo $name; ?>"
                                   />
                        </p>
                    </div>
                </fieldset>
            </div>
            <input type="submit" value="Enter">
            <input type="reset" value="Cancel">
        </form>
    </body>
</html>
