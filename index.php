<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sud Ouest - Le compte à rebours des Jeux Olympiques 2024</title>

    <link rel="canonical" href="https://infographie.sudouest.fr/Compte-a-rebours-des-Jeux-Olympiques-Paris-2024/index.php?competition=JO2024">

    <meta name="description" content="Le compte à rebours des Jeux Olympiques 2024 à Paris" />

    <meta property="og:url" content="https://infographie.sudouest.fr/Compte-a-rebours-des-Jeux-Olympiques-Paris-2024/index.php?competition=JO2024" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Le compte à rebours des Jeux Olympiques 2024 à Paris" />
    <meta property="og:site_name" content="SudOuest.fr" />
    <meta property="og:description" content="Le compte à rebours des Jeux Olympiques 2024 à Paris" />
    <!-- <meta property="og:image" content="https://media.sudouest.fr/18057507/1000x500/calendrierjo.jpg?v=1704722515" /> -->

    <meta name="twitter:card" content="summary">
    <meta name="twitter:creator" content="@sudouest">
    <meta name="twitter:site" content="@sudouest">
    <!-- <meta name="twitter:site:id" content="27412519"> -->
    <meta name="twitter:url" content="https://infographie.sudouest.fr/Compte-a-rebours-des-Jeux-Olympiques-Paris-2024/index.php?competition=JO2024">
    <meta name="twitter:title" content="Le compte à rebours des Jeux Olympiques 2024 à Paris">
    <meta name="twitter:description" content="Le compte à rebours des Jeux Olympiques 2024 à Paris">
    <!-- <meta name="twitter:image" content="https://media.sudouest.fr/18057507/1000x500/calendrierjo.jpg?v=1704722515"> -->

    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/styles<?php echo $_GET['competition']; ?>.css">
</head>

<body>
    <?php
    function changeTxt($x)
    {
        if ($x == 'JO2024') {
            return "les Jeux Olympiques de Paris 2024 dans";
        }
        if ($x == 'CM2023') {
            return "la Coupe du Monde de rugby 2023 dans";
        }
    };
    ?>

    <input type="text" value="<?php echo $_GET['competition']; ?>" id="competition" style="display:none;">
    <section class="section">
        <!-- <img id="brand" src="images/FondDeskJO_600x120 .png" alt=""> -->
        <!-- <h4 id="enonce">Avec</h4>
        <h4 id="enonce"><?php echo changeTxt($_GET['competition']) ?></h4> -->

        <div class="flex compteur">
            <div class="space">
                <div id="days" class="time"></div>
                <div class="timeLib">jour</div>
            </div>
            <div class="space">
                <div id="hours" class="time"></div>
                <div class="timeLib">heure</div>
            </div>
            <div class="space">
                <div id="mins" class="time"></div>
                <div class="timeLib">min.</div>
            </div>
            <div class="space">
                <div id="sec" class="time"></div>
                <div class="timeLib">sec.</div>
            </div>
        </div>
    </section>
    <p id="Compte" class='echeance'></p>
</body>
<script>
    var Affiche = document.getElementById("Compte");

    var days = document.getElementById("days");
    var hours = document.getElementById("hours");
    var mins = document.getElementById("mins");
    var secs = document.getElementById("sec");



    var competition = document.getElementById("competition").value;
    console.log(competition);

    function compette(x) {
        if (x === 'JO2024') {
            return "Jul 26 2024 19:30:00";
            console.log("Jul 26 2024 19:30:00")
        }
        if (x === 'CM2023') {
            return "Sep 08 2023 20:00:00";
            // console.log("Fri 26 2023 20:00:00")
        }
    }

    function Rebour() {
        var date1 = new Date();
        var date2 = new Date(compette(competition)); // Date et heure de l'événement
        // var date2 = new Date("Jul 26 2024 20:00:00"); // Date et heure de l'événement
        console.log(date1);
        console.log(date2);
        var sec = (date2 - date1) / 1000; // Temps donné en millièmes de seconde
        var n = 24 * 3600; // nombre de secondes dans un jour
        if (sec > 0) {
            var j = Math.floor(sec / n);
            var h = Math.floor((sec - (j * n)) / 3600);
            var mn = Math.floor((sec - ((j * n + h * 3600))) / 60);
            sec = Math.floor(sec - ((j * n + h * 3600 + mn * 60)));

            days.innerHTML = j;
            hours.innerHTML = h;
            mins.innerHTML = mn;
            secs.innerHTML = sec;

            // Affiche.innerHTML = j + " jour(s), " + h + " h " + mn + " min " + sec + " sec";
            window.status = "Il vous reste " + j + " jour(s), " + h + " h " + mn + " min " + sec + " sec pour voter.";
        } else {
            days.innerHTML = 0;
            hours.innerHTML = 0;
            mins.innerHTML = 0;
            secs.innerHTML = 0;
        }

        var legends = document.querySelectorAll('.timeLib');
        // console.log(legends[0].innerHTML);
        var x = 0;
        // Utiliser une boucle for pour itérer sur chaque élément
        if (j < 2) {
            legends[0].innerHTML = "jour";
            console.log(x);
        }
        if (h < 2) {
            legends[1].innerHTML = "heure";
        }

        setTimeout(Rebour, 1000);
    }


    Rebour();
</script>

</html>