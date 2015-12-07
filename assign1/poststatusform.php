<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml"  lang="en" xml:lang="en" >

    <head>
         <!--Add the style.css to class -->
        <link rel = "stylesheet" href="style/style.css">
            <!-- name of the page-->
            <title>Web Development - Assignment 1</title>

            <meta http-equiv = "Content-Type" content="text/html; charset=utf-8" />

    </head>
    <!--Add the style to bode -->
    <body  class = "wordCentre" >
        <!--connect to database  -->
        <form method="post" action="poststatusprocess.php">
            <h1 class="headsize">Post Status Page</h1><HR></br>
                <div class ="border">
                    </br>
                    <table class = "tableLayout">
                        <tr ><td><label for = "codeRe">Status Code(required):</label></td>
                            <td><input type="text" name="codeRe" maxlength="5" value='<?php echo "eg:S0000"; ?>'/></td></tr>
                        <tr><td><label>Status(required): </label></td>
                            <td><input type = "text" name = "status"></td></tr>
                        <tr><td><p></p></td></tr>
                        <tr><td><label for="share">Share: </label></td>
                            <td><input type="radio" name="share" value="public">Public
                                    <input type="radio" name="share" value="friends">Friends
                                        <input type="radio" name="share" value="onlyMe">Only Me</td></tr>
                                            <tr><td><label>Date:  </label></td>
                                                <td><input type="text" name="date" value='<?php echo $tt = date("d/m/y"); ?>'/></td></tr>
                                            <td><label for="permission"> Permission Type: </label></td>
                                            <td> <input type = "checkbox" name = "permissionArray1" value = "allowLike ">Allow Like
                                                    <input type = "checkbox" name = "permissionArray2" value = "allowComm ">Allow Comments
                                                        <input type = "checkbox" name = "permissionArray3" value = "allowShare ">Allow Share</td></tr>
                                                            <tr><td><input type="submit" name ="post" id="button" value="Post">
                                                                        <input type="submit" name="reset" id="reset"value ="Reset"></td></tr>
                                                                            <tr><td><a href = 'index.php'>Return to Home page</a></td></tr>
                                                                            </table>
                                                                            </br>
                                                                            </div>
                                                                            </form>
                                                                            </br> 
                                                                           <img alt="logo" src="image/logo.JPG">
                                                                                </body>
                                                                                </html>