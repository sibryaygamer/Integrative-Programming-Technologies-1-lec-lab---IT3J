<?php

$teamMembers = [

    [
        "id" => "bryan-camayang",
        "name" => "Bryan Camayang",
        "image" => "images/bryan.jpg",
        "age" => "21 Years Old",
        "birthdate" => "August 02, 2005",
        "address" => "Muntinlupa City",
        "motto" => "Strive for excellence in everything you do.",
        "phone" => "+639530440570",
        "facebook" => "https://www.facebook.com/bryan.bonula",
        "email" => "bryancamayang01@gmail.com",
        "role" => "null",
        "about" => "I live at Muntinlupa City, I was born on August 02 2005 my favorite to do is fixings thing and i love food."
    ],

    [
        "id" => "renzo-sheen",
        "name" => "Renzo Sheen U. Malillin",
        "image" => "images/renzo.jpg",
        "age" => "22 Years Old",
        "birthdate" => "May 22, 2004",
        "address" => "Paranaque City",
        "motto" => "Di man magwagi ang mahalaga nakibahagi",
        "phone" => "+639070807240",
        "facebook" => "https://www.facebook.com/re.nzo.56884",
        "email" => "malillinrenzosheen_bsit@plmun.edu.ph",
        "role" => "Developer" 
    ],

    [
        "id" => "jerson-santos",
        "name" => "Jerson Santos Turcolas",
        "image" => "images/jerson.jpg",
        "age" => "20 Years Old",
        "birthdate" => "June 06, 2006",
        "address" => "San Pedro Laguna",
        "motto" => "Time is GOLD",
        "phone" => "+63605771882",
        "facebook" => "https://www.facebook.com/Jerson03Santos",
        "email" => "turcolasjerson_bsit@plmun.edu.ph",
        "role" => "Developer",
        "about" => "I live in San Pedro, Laguna. I was born on June 3, 2006. My hobbies are playing instruments, playing online games, exploring the web and watching anime." 
    ],

    [
        "id" => "kingfroiland-paor",
        "name" => "Kingfroiland Paor",
        "image" => "images/king.png",
        "age" => "20 Years Old",
        "birthdate" => "November 24, 2005",
        "address" => "Muntinlupa City",
        "motto" => "Strive for excellence in everything you do.",
        "phone" => "+639500447923",
        "facebook" => "https://www.facebook.com/kingfroiland.paor.9",
        "email" => "paorkingfroiland_bsit@plmun.edu.ph",
        "role" => "null",
        "about" => "I’m King Froiland Paor, 20 years old, born on November 24, 2005. I’m from Sto. Niño Village, Tunasan. My hobbies are playing video games, playing guitar, and listening to music. And i enjoy spending my free time to gaming and exploring different kinds of music."
    ],

    [
        "id" => "mary-estoque",
        "name" => "Mary Estoque",
        "image" => "images/mary.jpg",
        "age" => "19 Years Old",
        "birthdate" => "August 27, 2006",
        "address" => "Muntinlupa City",
        "motto" => "Everything happens for a reason.",
        "phone" => "+639938210763",
        "facebook" => "https://www.facebook.com/maryjoy.estoque.161",
        "email" => "maryjoyestoque06@gmail.com",
        "role" => "null",
        "about" => "I am the eldest of two siblings. I love cooking, and I dream of becoming a chef. And I also love playing bad Minton"
    ],

    [
        "id" => "princess-famor",
        "name" => "Princess Ann Famor",
        "image" => "images/princess.jpg",
        "age" => "20 Years Old",
        "birthdate" => "October 24, 2005",
        "address" => "Muntinlupa City",
        "motto" => "Your future is built by what you do today.",
        "phone" => "+639926319599",
        "facebook" => "https://www.facebook.com/princessann.famor.1",
        "email" => "famorprincessann_bsit@plmun.edu.ph",
        "role" => "bull",
        "about" => "I am a working student who loves baking, watching horror movies, and anime. I enjoy learning new things, improving myself, and balancing my studies with work. I am determined to achieve my goals and build a better future."
    ],

    [
        "id" => "johndel",
        "name" => "Johndel",
        "image" => "images/johndel.jpg",
        "age" => "21 Years Old",
        "birthdate" => "August 02, 2005",
        "address" => "Putatan",
        "motto" => "Walk your own path, even when no footprints exist.",
        "phone" => "+639502839123",
        "facebook" => "https://www.facebook.com/",
        "email" => "dorigjohndel_bsit@plmun.edu.ph",
        "role" => "null",
        "about" => "I live at tunasan, I was born on December 9 2005 my favorite food is bicol express my hobbies are playing basketball and online games"
    ]

];

$selectedMember = null;

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    foreach ($teamMembers as $member) {

        if ($member["id"] === $id) {

            $selectedMember = $member;

            break;
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

    <link rel="stylesheet" href="style.css">

</head>

<body>


    <header class="header">

        <div class="header-content">

            <a href="index.php" class="logo">
                GROUP-4
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

        <h3>GROUP-4</h3>

        <p>IT3J - Integrated Programming</p>

        <p>
            © <?php echo date("Y"); ?> GROUP-4
        </p>

    </footer>


</body>

</html>
```
