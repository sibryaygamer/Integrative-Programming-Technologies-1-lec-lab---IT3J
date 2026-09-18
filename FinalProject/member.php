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

$selectedMember = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    foreach ($teamMembers as $member) {
        if (($member["id"] ?? "") === $id) {
            $selectedMember = $member;
            break;
        }
    }
}

$memberSkills = [];
if (is_array($selectedMember)) {
    $ignoredSkillKeys = [
        "id",
        "name",
        "image",
        "age",
        "birthdate",
        "address",
        "motto",
        "phone",
        "facebook",
        "email",
        "role",
        "about"
    ];

    foreach ($selectedMember as $key => $value) {
        if (in_array($key, $ignoredSkillKeys, true)) {
            continue;
        }

        if (is_numeric($value)) {
            $memberSkills[$key] = (int) $value;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php
        echo $selectedMember
            ? $selectedMember["name"]
            : "Member Not Found";
        ?>
    </title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>


    <header class="header">

        <div class="header-content">

            <a href="index.php" class="logo">
                <?php echo $groupName; ?>
            </a>

            <nav class="navigation">

                <a href="index.php">
                    Home
                </a>

                <a href="index.php#team">
                    Our Team
                </a>

            </nav>

        </div>

    </header>


    <main>

        <?php if ($selectedMember): ?>

        <section class="profile-section">

            <a href="index.php" class="back-button">
                ← Back to Team
            </a>


            <div class="profile-card">

                <div class="profile-image">

                    <img src="<?php echo $selectedMember["image"]; ?>" alt="<?php echo $selectedMember["name"]; ?>">

                </div>


                <div class="profile-content">

                    <p class="small-title">
                        TEAM MEMBER
                    </p>

                    <h1>
                        <?php echo $selectedMember["name"]; ?>
                    </h1>


                    <p class="profile-role">
                        <?php echo $selectedMember["role"];?>
                    </p>


                    <div class="profile-details">

                        <div>
                            <span>Age</span>
                            <strong>
                                <?php echo $selectedMember["age"]; ?>
                            </strong>
                        </div>


                        <div>
                            <span>Birthdate</span>
                            <strong>
                                <?php echo $selectedMember["birthdate"]; ?>
                            </strong>
                        </div>


                        <div>
                            <span>Address</span>
                            <strong>
                                <?php echo $selectedMember["address"]; ?>
                            </strong>
                        </div>

                    </div>

                    <div class="about">
                        <span>ABOUT ME</span>
                        <p>
                            <?php echo $selectedMember["about"];?>
                        </p>
                    </div>

                    <div class="motto">

                        <span>MOTTO</span>

                        <p>
                            "<?php echo $selectedMember["motto"]; ?>"
                        </p>

                    </div>


                    <div class="profile-contact">

                        <a href="<?php echo $selectedMember["facebook"]; ?>" target="_blank">
                            Facebook
                        </a>

                        <a href="mailto:<?php echo $selectedMember["email"]; ?>">
                            Email
                        </a>

                    </div>

                </div>

            </div>

            <div class="skills-card">

                <div class="skills-header">
                    <div>
                        <p class="skills-label">TECHNICAL ABILITIES</p>
                        <h3>Skills</h3>
                    </div>

                    <span class="skills-count">
                        <?php echo count($memberSkills); ?> Skills
                    </span>
                </div>

                <?php if (!empty($memberSkills)): ?>

                <div class="skills-list">

                    <?php foreach ($memberSkills as $skill => $rating): ?>

                    <div class="skill-row">

                        <div class="skill-meta">

                            <span>
                                <?php echo htmlspecialchars(ucfirst((string) $skill)); ?>
                            </span>

                            <strong>
                                <?php echo (int) $rating; ?>/10
                            </strong>

                        </div>

                        <div class="skill-bar">

                            <div class="skill-progress" style="width: <?php echo ((int) $rating * 10); ?>%;">
                            </div>

                        </div>

                    </div>

                    <?php endforeach; ?>

                </div>

                <?php else: ?>

                <p class="no-skills">
                    No skills added yet.
                </p>

                <?php endif; ?>

            </div>

        </section>


        <?php else: ?>

        <section class="not-found">

            <h1>Member Not Found</h1>

            <p>
                The member you are looking for does not exist.
            </p>

            <a href="index.php" class="view-button">
                Back to Home
            </a>

        </section>

        <?php endif; ?>

    </main>


    <footer class="footer">

        <h3><?php echo $groupName; ?></h3>

        <p>IT3J - Integrated Programming</p>

        <p>
            © <?php echo date("Y"); ?> <?php echo $groupName; ?>
        </p>

    </footer>

    <script src="assets/js/system.js"></script>

</body>

</html>