<?php 
    $dept_name = $_POST["dept_name"];
    $dept_id = strtoupper(substr($dept_name, 0,2) . substr($dept_name, strlen($dept_name)-1));
    if(!empty($dept_name) || !empty($dept_id))
    {
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "attendance";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT dept_id FROM department WHERE dept_id = ? LIMIT 1";
            $Insert = "INSERT INTO `department`(`DEPT_ID`, `DEPT_NAME`) VALUES (? ,?)";
            
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $dept_id);
            $stmt->execute();
            $stmt->bind_result($dept_id);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ss",$dept_id, $dept_name);
                if ($stmt->execute()) {
                    echo "Data successfully inserted";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Department is already added";
            }
            $stmt->close();
            $conn->close();
        }
    }
     else {
        echo "All fields are required";
        die();
    }  
    header('Location: ../pages/course.html');
?>