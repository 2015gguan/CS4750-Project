<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from Player where Last_name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchLastName'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($First_name, $Last_name, $Position);
                echo "<table border=1><th>First Name</th><th>Last Name</th><th>Position</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$First_name</td><td>$Last_name</td><td>$Position</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
