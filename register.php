<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=devide-width, initial-scale1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title> Account </title>
    <link rel="stylesheet" href="register.css">

</head>

<body>

    <div class="wrapper">


        <?php
        if (isset($_POST["login"])) {
            $Username = $_POST["Username"];
            $password = $_POST["password"];
            require_once "databases.php";
            $sql = "SELECT * FROM account WHERE Username = '$Username'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    header("Location: /post/main.php");
                    die();
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }

        ?>
        <div class="form-wrapper sign-in">

            <form action="register.php" method="post">
                <h2>Login</h2>
                <div class="input-group">
                    <input type="text" required name="Username">
                    <label for="">Username</label>
                </div>
                <div class="input-group">
                    <input type="password" required name="password">
                    <label for="">password</label>
                </div>
                <div class="remember">
                    <label for=""><input type="checkbox"> Remember me</label>
                </div>
                <button type="submit" name="login">Login</button>
                <div class="signUp-link">
                    <p>Don't have an account? <a href="#" class="signUpBtn-link">sign Up</a></p>
                </div>
            </form>
        </div>


        <?php
        if (isset($_POST["submit"])) {
            $Username = $_POST["Username"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $error = array();

            if (empty($Username) or empty($email) or empty($password)) {
                array_push($error, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($email, "Email is not Valid");
            }
            if (strlen($password) < 8) {
                array_push($error, "pssword must be at 8 character long");
            }

            require_once "databases.php";
            $sql = "SELECT * FROM account WHERE Username = '$Username'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                array_push($error, "Username already exists");
            }
            if (count($error) > 0) {
                foreach ($error as $error) {
                    echo "<div class'alert alert-danger'>$error</div>";
                }
            } else {
                if (count($error) > 0) {
                    foreach ($error as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                } else {
                    require_once "databases.php";
                    $sql = "INSERT INTO account (Username,email,password) VALUE(?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($prepareStmt) {
                        mysqli_stmt_bind_param($stmt, "sss", $Username, $email, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'>You are register successfully.</div>";
                    } else {
                        die("Something went wrong");
                    }
                }
            }
        }
        ?>
        <div class="form-wrapper sign-up">

            <form action="register.php" method="post">
                <h2>sign Up</h2>
                <div class="input-group">
                    <input type="text" required name="Username">
                    <label for="">Username</label>
                </div>
                <div class="input-group">
                    <input type="email" required name="email">
                    <label for="">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" required name="password">
                    <label for="">password</label>
                </div>
                <div class="remember">
                    <label for=""><input type="checkbox">I agree to the term & conditions</label>
                </div>
                <button type="submit" name="submit">Sign Up</button>
                <div class="signUp-link">
                    <p>Already have an account? <a href="#" class="signInBtn-link">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="register.js"></script>
</body>

</html>