<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"  lang="en" xml:lang="en" >

    <head>
         <!--Add the style.css to class -->
        <link rel = "stylesheet" href="style.css">
            <!-- name of the page-->
            <title>Connect to database </title>
            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    </head>
    <!--Add the style to bode -->
    <body class = "wordCentre">
        <h1 class="headsize">Check Data Input</h1>
        <HR>
            <?php
            require_once ("settings.php");
            $conn = @mysqli_connect($host, $user, $pswd, $dbnm);
            if (!$conn) {
                echo "<p> Database connection failure</p>";
            } else {
                $sql_tble = "CREATE TABLE IF NOT EXISTS postingsystem(
					 code CHAR(5) PRIMARY KEY NOT NULL,
					 status VARCHAR(255) NOT NULL,
                                        share CHAR(15),
 					 date CHAR(15) NOT NULL,
					 permission_type VARCHAR(255))";
                $queryResult = @mysqli_query($conn, $sql_tble)
                        or die("<p> Unable to excute the query.</p>"
                                . "<p>Error code " . mysqli_errno($conn)
                                . ":" . mysqli_error($conn)) . "</p>";
                echo "<p> Successfully created the table.</p>";                
                $checkCode = false;
                $statusCheck = false;
                $checkDate = false;
                if (!isset($_POST["codeRe"]) && !isset($_POST["status"]) && !isset($_POST["date"])) {
                    $_SESSION["$check"] = "Wrong code format. Code be like S0000. Status can contain word and number, date should be like 01/02/15";
                } else {
                    $code = $_POST["codeRe"];
                    $codeFormat = "/^S\d\d\d\d$/";
                    $status = $_POST["status"];
                    $statusFormat = "/^[A-Za-z0-9\,\.\?\!\s]+$/";
                    $date = $_POST["date"];
                    $dateFormat = "/\d{1,2}\/\d{1,2}\/\d{2}$|\d{1,2}\/\d{1,2}\/\d{4}$/";
                    if (preg_match($codeFormat, $code)) {
                        $checkCode = true;
                    } else {
                        $_SESSION["checkCode"] = "Wrong code format. Should be like S0000";
                    }
                    if (preg_match($statusFormat, $status)) {
                        $statusCheck = true;
                    } else {
                        $_SESSION["statusCheck"] = "Sorry, wrong format";
                    }
                    if (preg_match($dateFormat, $date)) {
                        $checkDate = true;
                    } else {
                        $_SESSION["checkDate"] = "The date you enter is wrong. The format is 01/01/2000";
                    }
                }
                     if ($checkCode && $statusCheck && $checkDate) {

                    $share = $_POST["share"];
                    $type = null;
                    $type = $_POST["permissionArray1"].$_POST["permissionArray2"].$_POST["permissionArray3"];
                     $query_check = "select * from postingsystem where code='$code'";
                    $result = mysqli_query($conn, $query_check);
                    if (!$result) {
                        echo "<p class='wrong'>Sorry,connection fail</p>";
                        echo "<a href='index.php'>return to the Home page</a>";
                    } else {
                       $row = mysqli_fetch_assoc($result);
                        if ($row != null) {
                            echo "<p style='color:#FF0000'>Failure,status code exists</p>";
                            echo "<a href='poststatusform.php'>return to the post page</a>";
                            echo "<a href='index.php'>return to the Home page</a>";
                        } else {
                     $query = "insert into postingsystem(code,status,share,date,permission_type) 
                                values('$code','$status','$share','$date','$type')";
                             echo "successful post";
                            echo "<p><a href='index.php'>return to Homepage</a></p>";
                            mysqli_query($conn, $query);
                        }
                    }
                    mysqli_close($conn); 
                } else {
                    echo "<p>you enter wrong format, please return post page</p>";
                    echo "</br>";
                    echo "<a href='index.php' >return to the Home page</a>";
                    echo "</br>";
                    echo "<a href='poststatusform.php'>return to post form</a>";
                }
            }
           ?>
            </br> 
            <img alt="logo" src="image/logo.JPG">
                </body>
                </html>