<?php
$file = __DIR__ . "/data/messages.json";
$messages = json_decode(@file_get_contents($file), true);
$messages = is_array($messages) ? $messages : [];


$changed = false;
foreach ($messages as &$comment) {
    if (empty($comment["id"])) {
        $comment["id"] = uniqid();
        $changed = true;
    }
}
unset($comment);
if ($changed) file_put_contents($file, json_encode($messages, JSON_PRETTY_PRINT), LOCK_EX);


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])) {
    $action = $_POST["action"];
    $id = $_POST["id"] ?? "";
    $name = trim($_POST["name"] ?? "");
    $message = trim($_POST["message"] ?? "");
    $success = true;
    $reply = "";

    if ($action === "add") {
        if ($name === "" || $message === "") {
            $success = false;
            $reply = "Enter both your name and message.";
        } else {
            $messages[] = ["id" => uniqid(), "name" => $name, "message" => $message];
            $reply = "Message added.";
        }
    }

    if ($action === "edit") {
        foreach ($messages as &$comment) {
            if ($comment["id"] === $id) {
                $comment["name"] = $name;
                $comment["message"] = $message;
                $reply = "Message updated.";
                break;
            }
        }
        unset($comment);
    }

    if ($action === "delete") {
        $messages = array_values(array_filter($messages, fn($comment) => $comment["id"] !== $id));
        $reply = "Message deleted.";
    }

    if ($success) file_put_contents($file, json_encode($messages, JSON_PRETTY_PRINT), LOCK_EX);

    header("Content-Type: application/json");
    echo json_encode(["success" => $success, "reply" => $reply, "messages" => $messages]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Us | Group 5</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="header">
        <div class="header-content">
            <a href="index.php" class="logo">Group 5</a>
            <nav class="navigation">
                <a href="index.php">Home</a>
                <a href="index.php#team">Our Team</a>
                <a href="messages.php">Message Us</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="message-section">
            <a href="index.php" class="back-button">← Back to Home</a>

            <div class="message-form-card">
                <h1>Message Us</h1>
                <form id="simple-message-form">
                    <label for="simple-name">Name</label>
                    <input type="text" id="simple-name" name="name" placeholder="Enter your name" required>

                    <label for="simple-message">Message</label>
                    <textarea id="simple-message" name="message" placeholder="Write your message..."
                        required></textarea>

                    <button type="submit">Send Message</button>
                </form>
            </div>

            <p id="status" class="comment-status" aria-live="polite"></p>
            <div id="messages-list"></div>
        </section>
    </main>

    <script id="initial-messages" type="application/json"><?php echo json_encode($messages, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?></script>
    <script src="assets/js/system.js"></script>
</body>

</html>
