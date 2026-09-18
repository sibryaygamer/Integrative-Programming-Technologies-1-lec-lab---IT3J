<?php

$groupName = "Group 5";

$membersJson = @file_get_contents(__DIR__ . "/data/members_data.json");
$teamMembers = [];

if ($membersJson !== false) {
    $decodedMembers = json_decode($membersJson, true);
    if (is_array($decodedMembers)) {
        $teamMembers = $decodedMembers;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $groupName; ?> | Team</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- Navigation -->
    <header class="header">

        <div class="header-content">

            <a href="index.php" class="logo">
                <?php echo $groupName; ?>
            </a>

            <nav class="navigation">
                <a href="#home">Home</a>
                <a href="#team">Our Team</a>
                <a href="#about">About</a>
                <a href="messages.php">Message Us</a>
            </nav>

        </div>

    </header>


    <!-- Hero Section -->
    <section class="hero" id="home">

        <div class="hero-content">

            <p class="small-title">WELCOME TO</p>

            <h1><?php echo $groupName; ?></h1>

            <p class="hero-description">
                We are a group of Information Technology students
                working together, learning together, and building
                our skills through programming.
            </p>

            <a href="#team" class="hero-button">
                Meet Our Team
            </a>

        </div>

    </section>

    <!-- Team Section -->
    <main>

        <section class="team-section" id="team">

            <div class="section-heading">

                <p class="small-title">GET TO KNOW US</p>

                <h2>Meet Our Team</h2>

                <p>
                    Click on a member to view their profile.
                </p>

            </div>


            <div class="team-grid">

                <?php foreach ($teamMembers as $member): ?>
                <div class="member-card">

                    <div class="member-image">

                        <img src="<?php echo $member["image"]; ?>" alt="<?php echo $member["name"]; ?>">

                    </div>

                    <div class="member-info">

                        <h3>
                            <?php echo $member["name"]; ?>
                        </h3>

                        <p>
                            <?php echo $member["role"]; ?>
                        </p>

                        <a href="member.php?id=<?php echo $member["id"]; ?>" class="view-button">
                            View Profile
                        </a>

                    </div>

                </div>
                <?php endforeach; ?>

            </div>

        </section>

        <section class="project-banner">
            <div class="project-banner-inner">
                <p class="small-title">PROJECTS</p>
                <h2>Pending</h2>
                <p>Group - 5 website</p>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section" id="about">

            <div class="about-box">

                <p class="small-title">ABOUT US</p>

                <h2>Who We Are</h2>

                <p>
                    <?php echo $groupName; ?> is a team of Information
                    Technology students who work together on academic
                    activities and programming projects.
                </p>
                <p>
                    This website introduces our members and provides
                    basic information about each member of the team.
                </p>

            </div>

        </section>

    </main>


    <!-- Footer -->
    <footer class="footer">

        <h3><?php 

        
        echo $groupName; ?></h3>

        <p>IT3J - Integrated Programming</p>

        <p>
            © <?php echo date("Y"); ?> <?php echo $groupName; ?>
        </p>

    </footer>

    <script src="assets/js/system.js"></script>
</body>

</html>