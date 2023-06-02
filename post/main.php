<?php
include 'config.php';
if (isset($_POST['post_comment'])) {

    $name = $_POST['name'];
    $message = $_POST['message'];

    $sql = "INSERT INTO post (name, message)
VALUES ('$name', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code ex</title>
    <link rel="stylesheet" href="comment.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="container">
        <!----------------left sidebar------------->
        <div class="left-sidebar">
            <div class="imp-links">
                <a href="/main.html"><img src="home.png"> Home </a>
                <a href="https://www.programiz.com/java-programming/online-compiler/"><img src="compiler.png"> Compiler </a>
                <a href="../info/image/Archive.html"><img src="library.png"> Archive </a>

            </div>
            <div class="shortcut-links">
                <p> Mini Library </p>
                <a href="https://www.javatpoint.com/java-tutorial?fbclid=IwAR13tuETq_h4Cuj5XZa5SiceV_apcGgdcZ3Vl69i_ozS8iPwwEfQQtKYF34"><img src="jtp_logo.png"> jtp</a>
                <a href="https://emeritus.org/blog/coding-learn-java-programming/?fbclid=IwAR13tuETq_h4Cuj5XZa5SiceV_apcGgdcZ3Vl69i_ozS8iPwwEfQQtKYF34"><img src="Emeritus-logo.png"> Emeritus</a>
                <a href="https://blog.zuitt.co/demand-for-programmers-in-the-philippines/?fbclid=IwAR0O5xe7lmayy8xwQn4hSHlK39GYkXbcoGHc7p7hHr5Vk3yOT70Gzb7VLCg"><img src="zuit.png">zuit</a>
                <a href="https://www.w3schools.com/"><img src="w3school.png">w3school</a>
                <a href="../info/image/Archive.html"> See More </a>
            </div>
        </div>

        <!---------------main content--------------->
        <div class="main-container">

            <div class="wrapper">
                <form action="" method="post" class="form">
                    <input type="text" class="name" name="name" placeholder="Name">
                    <br>
                    <textarea name="message" id="" cols="30" rows="10" class="message" placeholder="message"></textarea>
                    <br>
                    <button type="submit" class="btn" name="post_comment">Post Comment</button>
                </form>
            </div>
            <div class="Content1">
                <?php
                $sql = "SELECT * FROM post";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {

                ?>
                        <p>-------------------------------------</p>
                        <h3><?php echo $row['Name']; ?></h3>
                        <p><?php echo $row['message']; ?> </p>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <th> <input type="submit" name="delete" class="btn btn-danger" value="Delete"></th>
                        </form>
                        <p>-------------------------------------</p>
                <?php }
                } ?>
            </div>


        </div>

        <div class="loader-container">
            <img src="../info/image/loader.gif" class="loader">
        </div>

        <!-----------------------right sidebar------->
        <div class="right-sidebar">
            <div class="sidebar-title">
                <h4>Events</h4>
                <a href="#">See All</a>
            </div>
            <div class="event">
                <div class="left-event">
                    <h3>02</h3>
                    <span>June</span>
                </div>
                <div class="right-event">
                    <h4>No event</h4>
                    <p> </p>
                    <a href="#">updating</a>

                </div>
            </div>
            <div class="sidebar-title">
                <h4>Advertisement</h4>
                <a href="#">Close</a>
            </div>
            <img src="advertise.jpg" class="sidebar-ads">

            <div class="sidebar-title">
                <h4>Extension</h4>
                <a href="#">Hide</a>
            </div>

            <div class="Extension-list">
                <div class="extension">
                    <a href="https://chat.openai.com/chat">
                        <img src="chatgpt.png">
                    </a>
                </div>
                <p>Chatgpt</p>
            </div>

            <div class="Extension-list">
                <div class="extension">
                    <a href="https://quillbot.com/">
                        <img src="quilbot.jpg">
                    </a>
                </div>
                <p>quilbot</p>
            </div>

            <div class="Extension-list">
                <div class="extension">
                    <a href="https://www.canva.com/">
                        <img src="canva.jpg">
                    </a>
                </div>
                <p>Canva</p>
            </div>




        </div>
    </div>



</body>
<script>
    fadeOut();

    function loader() {
        document.querySelector('.loader-container').classList.add('active');
    }

    function fadeOut() {
        setTimeout(loader, 1500);
    }
</script>

</html>