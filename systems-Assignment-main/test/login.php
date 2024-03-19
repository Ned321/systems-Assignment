<?php
    //Include header, menu and database link.
    include "include/header.php";
    include "include/config.php";
    include "include/menu.php";
    
?>
<!-- Login -->
<?php

    //Initialise variables
    $loginUsername = $loginPassword = $errorMessage = "";

    //If request method is POST and form button is clicked
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["loginSubmit"])){
        //Store the data entered within the form
        $loginUsername = $_POST["usernameInput"];
        $loginPassword = $_POST["passwordInput"];

        //SQL Query
        $loginQuery = "SELECT * FROM student WHERE student_username = '$loginUsername'";
        $sqlResult = mysqli_query($conn, $loginQuery);

        //If a match is found
        if(mysqli_num_rows($sqlResult) > 0){
            //Put result in an array to be accessed
            $resultArray = mysqli_fetch_assoc($sqlResult);
            $hashedPassword = $resultArray["student_password"];
        
            //Check passwords are identical when hashed
            if (password_verify($loginPassword, $hashedPassword)) {
                //Details match so start a session and store admin data
                session_start();
                $_SESSION["user_id"] = $resultArray["user_id"];
                $_SESSION["username"] = $resultArray["username"];

                //Redirect to home
                //header("Location: student.php");
            }
            else{
                $errorMessage = "Password incorrect. Login failed.";
            }
        }
        else $errorMessage = "Username incorrect. Login failed.";
    }

    mysqli_close($conn);
?>

<!-- HTML -->
<html>
    <form method="post">
        <section class="form-group col-lg-6 mx-auto">
            <p class="text-dark mt-4 text-center"><strong>Login</strong></p>
            <p class="text-danger mt-2 text-center"><?php echo $errorMessage ?></p>
            <label class="form-label mt-2" for="usernameInput">Username</label>
            <input type="text" class="form-control" id="usernameInput" name="usernameInput" required>
            <label class="form-label mt-2" for="passwordInput">Password</label>
            <input type="text" class="form-control" id="passwordInput" name="passwordInput" required>
            <button type="submit" name="loginSubmit" class="btn btn-info mt-2">Login</button>
        </section>    
    </form>
</html>




























<?php
    //Footer at the bottom.
    include "include/footer.php";
?>

