<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"  lang="en" xml:lang="en" >

    <head>
         <!--Add the style.css to class -->
        <link rel = "stylesheet" href="style/style.css">

            <meta http-equiv="content-type" content="text/html; charset=utf-8" />
            <!-- name of the page-->
            <title>Status Posting System</title>

    </head>

    <!--Add the style to bode -->
    <body class = "wordCentre">

        <h1 class = "headsize">Search result</h1>

        <HR></br>

            <?php
            /*connect to the seetings */
            require_once ("settings.php");
            $conn = @mysqli_connect($host, $user, $pswd, $dbnm);
            $statusSearch = $_GET["searchStatus"];
            $sql = "select * from postingsystem where status like '%$statusSearch%'";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                /*
                 * check the connection
                 */
                echo "<p>Sorry,connection fail</p>";
                echo "<a href='index.php'>return to the Home page</a>";
            } else {
                $row = mysqli_fetch_assoc($result);
                if ($row == null) {
                    echo "
			<p>Sorry,The status does not exist</p>";
                } else {

                    while ($row) {
			$code = $row["code"];

                        $status = $row["status"];

                        $share = $row["share"];

                        $date = $row["date"];

                        $permission = $row["permission_type"];
                        /*
                         * show details
                         */
                        echo "<p>Status:", $status, "</p>

                              <p>Status Code: ", $code, "</p>

                              <p>Share: ", $share, "</p>

                              <p>Date Posted: ", $date, "</p>

                              <p>Permission: ",$permission, "</p></br>";

                        $row = mysqli_fetch_assoc($result);
                    }
                }
            }
            mysqli_close($conn); 
            ?>

            <p>	<a href="index.php">Return to Home Page</a></p>

            </br> 
            <!--link that back to home page -->
            <img alt="logo" src="image/logo.JPG">
                </body>
                </html>