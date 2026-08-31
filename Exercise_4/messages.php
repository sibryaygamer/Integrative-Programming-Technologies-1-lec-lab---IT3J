<?php

$name = "";
$message = "";
$alert = "";
$alertType = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $message === ""){
        $alert = "Please fill in all fields.";
        $alertType = "error";
    }
    else{
        $alert = "Message sent successfully!";
        $alertType = "success";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Message Us | GROUP-4</title>

    <link rel="stylesheet" href="style.css">



</head>

<body>


    <?php if ($alert !== ""): ?>

    <div class="message-alert <?php echo $alertType; ?>">

        <span>
            <?php echo htmlspecialchars($alert); ?>
        </span>

        <button type="button" class="alert-close">
            &times;
        </button>

    </div>

    <?php endif; ?>

    <main>

        <section class="message-section">

            <div class="message-form-card">

                <h1>Message Us</h1>

                <form action="messages.php" method="POST">

                    <label for="name">
                        Name
                    </label>

                    <input type="text" id="name" name="name" placeholder="Enter your name" required>

                    <label for="message">
                        Message
                    </label>

                    <textarea id="message" name="message" placeholder="Write your message..." required></textarea>

                    <button type="submit">
                        Send Message
                    </button>

                </form>

            </div>


            <?php if ($name !== "" && $message !== ""): ?>

            <div class="message-card">

                <div class="message-user">

                    <div class="user-avatar">
                        <?php echo strtoupper(substr($name, 0, 1)); ?>
                    </div>

                    <div>
                        <h3>

                            <?php echo htmlspecialchars($name); ?>
                        </h3>

                        <span>
                            Just now
                        </span>
                    </div>

                </div>

                <div class="message-content">
                    <p>
                        <?php echo nl2br(htmlspecialchars($message)); ?>
                    </p>
                </div>

            </div>

            <?php endif; ?>

        </section>

    </main>


    <script src="system.js">
    </script>
</body>



</html>
