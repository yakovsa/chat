<!DOCTYPE html>
<html> 
    <head> 
        <title>Chat list</title> 
    </head> 
    <body> 
<?php
        // a placeholder to display some message
        if (!empty($error))
            echo "<h2>" . $error . "</h2>";
        else {
            // display the cars using a HTML table
?>
            <table> 
                <thead> <tr> <th>ID</th> <th>NAME</th> </tr> </thead> 
                <tbody> 
<?php
                    foreach ($chats as $key => $value) {
                    echo "<tr>";
                        echo "<td>";
                            echo $value["id"];
                            echo "</td>";
                        echo "<td>";
                            echo $value["message"];
                            echo "</td>";
                        echo "</tr>";
                    }
?> 
                </tbody> 
            </table> 
<?php
          // end of else (HTML table)
        } 
?>
        <a href="javascript:history.back()">Back</a>
    </body> 
</html>
