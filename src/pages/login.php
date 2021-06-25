<!--
    Author: Mark Schuurmans
    Date: 2956-2021
    File: pages/login.php

    Project Thema 4
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Foodz is an small catering industry based in the Netherlands. We help students make the best catering events possible." />
    <meta name="keywords" content="Foodz, Food, Horeca, Catering, Login, Log in, Inloggen" />
    <meta name="author" content="Mark Schuurmans" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/faviconx32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/faviconx16.png">
    <script src="../scripts/script.js" defer></script>
    <title data-lang="loginTitle"></title>
</head>
<body>
    <?php
        // Het starten van een sessie om alle data te kunnen gebruiken
        session_start();
        $loginpage = true;
        include "../includes/header.php";
        require "../includes/db_functions.php";

        if (isset($_GET["logout"]))
        {
            unset($_POST["username"]);
            unset($_POST["password"]);
            unset($_SESSION["studentNr"]);
            session_destroy();
        }

        $username = isset($_POST["username"]) ? $_POST["username"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        $query = "SELECT * FROM [User] WHERE UserName = '$username' AND Password = '$password'";
        $result = executeQuery($query);
        $user = $result->fetch (PDO::FETCH_ASSOC);
        $error = "";

        if($user)
        {
            $role = $user["Role"];
            $_SESSION["studentNr"] = $user["StudentNr"];

            if ($role == "Editor")
            {
                header("Location: editor.php");
            } else
                {
                header("Location: events.php");
            }
        } else {
            if ($username && $password)
            {
                $error = "<div class='login-message'>
                                    <svg viewBox='0 0 576 512'>
                                        <path opacity='0.3' d='M569.52 440L329.58 24c-18.44-32-64.69-32-83.16 0L6.48 440c-18.42 31.94 4.64 72 41.57 72h479.89c36.87 0 60.06-40 41.58-72zM288 448a32 32 0 1 1 32-32 32 32 0 0 1-32 32zm38.24-238.41l-12.8 128A16 16 0 0 1 297.52 352h-19a16 16 0 0 1-15.92-14.41l-12.8-128A16 16 0 0 1 265.68 192h44.64a16 16 0 0 1 15.92 17.59z'></path>
                                        <path d='M310.32 192h-44.64a16 16 0 0 0-15.92 17.59l12.8 128A16 16 0 0 0 278.48 352h19a16 16 0 0 0 15.92-14.41l12.8-128A16 16 0 0 0 310.32 192zM288 384a32 32 0 1 0 32 32 32 32 0 0 0-32-32z'></path>
                                    </svg>
                                    <p>Foute gebruikersnaam en/of wachtwoord</p>
                                </div>";
            }
        }
    ?>

    <main>
        <section>
            <article>
                <svg viewBox="0 0 769.92356 727.77804">
                    <!-- Person -->
                    <path d="M888.00011,428.99257a11.01956,11.01956,0,0,1-2.15469,16.2265l-53.77008,36.91677-23.677,15.78467a6.50932,6.50932,0,0,1-8.64865-1.29413h0a6.50932,6.50932,0,0,1,1.76937-9.75113l22.93281-13.31582L864.47515,435.442l-25.72926-27.63513,19.05871-14.294Z" transform="translate(-215.03822 -86.11098)" fill="#a0616a"/>
                    <polygon points="546.52 690.482 533.367 690.482 525.555 581.847 558.908 580.894 546.52 690.482" fill="#a0616a"/>
                    <path d="M762.51106,811.85147c-3.5071,1.60062-6.44475-11.36747-9.403-8.4603-8.27476,8.13174-20.94589,9.90248-31.99089,6.35216l3.86555-.04321a5.17261,5.17261,0,0,1-3.26034-6.74068h0a5.17263,5.17263,0,0,1,3.58872-3.20194l8.8002-2.2,13.81756-24.29985,14.10577-.95294h0a33.70033,33.70033,0,0,1,6.23289,28.749C766.98747,806.27826,765.01135,810.71036,762.51106,811.85147Z" transform="translate(-215.03822 -86.11098)" fill="#2f2e41"/>
                    <polygon points="634.096 690.482 620.943 690.482 613.131 581.847 647.437 575.177 634.096 690.482" fill="#a0616a"/>
                    <path d="M850.087,811.85147c-3.5071,1.60062-6.44476-11.36747-9.40305-8.4603-8.27475,8.13174-20.94589,9.90248-31.99089,6.35216l3.86555-.04321a5.17261,5.17261,0,0,1-3.26034-6.74068h0a5.17264,5.17264,0,0,1,3.58873-3.20194l8.80019-2.2,13.81757-24.29985,15.0587-1.90587.38035.622a38.82707,38.82707,0,0,1,4.1608,31.74873C853.85228,807.73507,852.14766,810.911,850.087,811.85147Z" transform="translate(-215.03822 -86.11098)" fill="#2f2e41"/>
                    <path d="M864.04754,395.97018c-12.09554,1.68292-20.4694,8.307-23.8799,21.521l-22.23309-41.05a12.15492,12.15492,0,0,1,3.87324-15.43663h0a12.15493,12.15493,0,0,1,16.51068,2.41678Z" transform="translate(-215.03822 -86.11098)" fill="#6c63ff"/>
                    <path d="M887.34559,656.523C833.28768,680.4412,777.965,683.38434,721.53484,667.95823c20.60644-79.92158,44.93779-152.18824,44.788-211.55165l55.27025-4.76467,8.50989,13.49128A299.3077,299.3077,0,0,1,871.1746,569.89266Z" transform="translate(-215.03822 -86.11098)" fill="#2f2e41"/>
                    <circle cx="581.77851" cy="218.77888" r="28.58806" fill="#a0616a"/>
                    <path d="M824.45186,456.40658l-38.62727,1.0881-19.50179,2.72364c-9.57274-31.62118-17.63171-63.16988,1.90587-89.57592L791.09912,347.772l34.30568-.95293.45443.25967a27.62567,27.62567,0,0,1,12.657,32.13956C830.003,406.88285,824.53468,433.007,824.45186,456.40658Z" transform="translate(-215.03822 -86.11098)" fill="#6c63ff"/>
                    <path d="M765.36987,545.02957l-2.39609,32.74648a7.29408,7.29408,0,0,1-6.78945,6.74565h0a7.29408,7.29408,0,0,1-7.77722-7.45156l.76287-32.04057,23.82338-90.52886.95294-55.27025,26.68219-.95293-1.90587,63.84667Z" transform="translate(-215.03822 -86.11098)" fill="#a0616a"/>
                    <path d="M803.48728,403.0422c-11.31253-4.6001-21.8779-3.05952-31.44686,6.67055l1.31094-46.66577a12.15493,12.15493,0,0,1,11.08252-11.42232h0a12.15493,12.15493,0,0,1,13.08133,10.35965Z" transform="translate(-215.03822 -86.11098)" fill="#6c63ff"/>
                    <path d="M857.32813,432.10673h-87.67c20.45167-54.1569,27.04681-104.53868,0-147.705.46431-12.96516,17.09344-24.20477,30.00735-22.96305h0c15.25177,1.46651,35.74679,12.67435,38.60394,27.72772Z" transform="translate(-215.03822 -86.11098)" fill="#2f2e41"/>
                    <!-- Mobile -->
                    <path d="M577.92754,259.05823h-3.99878V149.51291A63.40186,63.40186,0,0,0,510.52671,86.111H278.44027a63.40186,63.40186,0,0,0-63.402,63.40193V750.48709A63.40186,63.40186,0,0,0,278.44027,813.889H510.52671a63.40186,63.40186,0,0,0,63.40205-63.40193V337.03445h3.99878Z" transform="translate(-215.03822 -86.11098)" fill="#3f3d56"/>
                    <path d="M513.085,102.606h-30.295a22.49485,22.49485,0,0,1-20.82715,30.99055H329.00345A22.49483,22.49483,0,0,1,308.1763,102.606H279.88073a47.3478,47.3478,0,0,0-47.34786,47.34774V750.04623a47.34781,47.34781,0,0,0,47.34786,47.3478H513.085a47.34781,47.34781,0,0,0,47.34787-47.3478V149.95371A47.3478,47.3478,0,0,0,513.085,102.606Z" transform="translate(-215.03822 -86.11098)" fill="#fff"/>
                    <rect x="58.44466" y="110.2337" width="246" height="211" fill="#e6e6e6"/>
                    <circle cx="131.44466" cy="347.2337" r="18" fill="#6c63ff"/>
                    <polygon points="140.445 345.734 132.945 345.734 132.945 338.234 129.945 338.234 129.945 345.734 122.445 345.734 122.445 348.734 129.945 348.734 129.945 356.234 132.945 356.234 132.945 348.734 140.445 348.734 140.445 345.734" fill="#fff"/>
                    <circle cx="226.44466" cy="347.2337" r="18" fill="#6c63ff"/>
                    <rect x="439.98288" y="424.34468" width="3" height="18" transform="translate(659.78934 -94.24918) rotate(90)" fill="#fff"/>
                    <path d="M405.6577,222.65953H386.2175a2.57738,2.57738,0,0,0-2.57738,2.57738v8.53288a2.57738,2.57738,0,0,0,2.57738,2.57738H389.439v12.78518h12.99715V236.34717h3.22152a2.57738,2.57738,0,0,0,2.57738-2.57738v-8.53288A2.57738,2.57738,0,0,0,405.6577,222.65953Z" transform="translate(-215.03822 -86.11098)" fill="#6c63ff"/>
                    <path d="M425.12915,300.75246a99.945,99.945,0,0,1-17.38745-59.25632,2.10788,2.10788,0,0,0-1.64531-2.10349v-3.687H385.56494v3.63579h-.2829a2.1067,2.1067,0,0,0-2.104,2.10944q.00009.07676.00578.15334,2.42627,33.82122-16.3857,60.66044a5.80592,5.80592,0,0,0-1.05076,3.51846l2.245,69.4446a6.01162,6.01162,0,0,0,5.96021,5.80216h46.439a6.01372,6.01372,0,0,0,5.9638-5.90449l.86514-67.425A12.16847,12.16847,0,0,0,425.12915,300.75246Z" transform="translate(-215.03822 -86.11098)" fill="#3f3d56"/>
                    <path d="M401.60513,225.43986a5.5606,5.5606,0,1,1-11.1212,0" transform="translate(-215.03822 -86.11098)" opacity="0.2" style="isolation:isolate"/>
                    <path d="M417.77775,323.81976h-5.62341a14.75938,14.75938,0,0,0-29.17437,0h-5.62378a4.15,4.15,0,0,0-4.10174,4.781l6.10828,39.70382H414.4373l7.41937-39.57005a4.15007,4.15007,0,0,0-4.07892-4.9148Z" transform="translate(-215.03822 -86.11098)" fill="#6c63ff"/>
                    <rect x="58.44466" y="407.2337" width="246" height="211" fill="#e6e6e6"/>
                    <circle cx="131.44466" cy="644.2337" r="18" fill="#6c63ff"/>
                    <polygon points="140.445 642.734 132.945 642.734 132.945 635.234 129.945 635.234 129.945 642.734 122.445 642.734 122.445 645.734 129.945 645.734 129.945 653.234 132.945 653.234 132.945 645.734 140.445 645.734 140.445 642.734" fill="#fff"/>
                    <circle cx="226.44466" cy="644.2337" r="18" fill="#6c63ff"/>
                    <rect x="439.98288" y="721.34468" width="3" height="18" transform="translate(956.78934 202.75082) rotate(90)" fill="#fff"/>
                    <path d="M444.91088,643.24243l.1358.0001a23.0403,23.0403,0,0,0,21.57285-14.45016A75.41617,75.41617,0,1,0,366.154,670.10246a22.84324,22.84324,0,0,0,25.37-4.7044A75.16747,75.16747,0,0,1,444.91088,643.24243Z" transform="translate(-215.03822 -86.11098)" fill="#fff"/>
                    <circle cx="191.13" cy="509.39493" r="24.906" fill="#f9a825"/>
                </svg>
            </article>
            <article>
                <h4 data-lang="loginWelcome"></h4>
                <h1 data-lang="signIn"></h1>
                <form action="login.php" method="POST">
                    <label data-lang="usernameLabel" for="username"></label>
                    <input name="username" id="username" type="text" autocomplete="off" required>

                    <label data-lang="passwordLabel" for="password"></label>
                    <input name="password" id="password" type="password" autocomplete="current-password" required>
                    <?php
                        echo $error;

                        if (isset($_SESSION["studentNr"]))
                        {
                            $query = "SELECT * FROM [User] WHERE StudentNr = '" . $_SESSION["studentNr"] . "'";
                            $result = executeQuery($query);
                            $user = $result->fetch (PDO::FETCH_ASSOC);

                            // De gebruiker wordt altijd naar editor.php gestuurd omdat deze checkt welke permissions de gebruiker heeft.
                            echo "<div class='login-message'>
                                    <svg viewBox='0 0 576 512'>
                                        <path opacity='0.3' d='M569.52 440L329.58 24c-18.44-32-64.69-32-83.16 0L6.48 440c-18.42 31.94 4.64 72 41.57 72h479.89c36.87 0 60.06-40 41.58-72zM288 448a32 32 0 1 1 32-32 32 32 0 0 1-32 32zm38.24-238.41l-12.8 128A16 16 0 0 1 297.52 352h-19a16 16 0 0 1-15.92-14.41l-12.8-128A16 16 0 0 1 265.68 192h44.64a16 16 0 0 1 15.92 17.59z'></path>
                                        <path d='M310.32 192h-44.64a16 16 0 0 0-15.92 17.59l12.8 128A16 16 0 0 0 278.48 352h19a16 16 0 0 0 15.92-14.41l12.8-128A16 16 0 0 0 310.32 192zM288 384a32 32 0 1 0 32 32 32 32 0 0 0-32-32z'></path>
                                    </svg>
                                    <p>U bent al ingelogt. <a href='editor.php'>Doorgaan als " . $user["UserName"] . "?</a></p>
                                  </div>";
                        }
                    ?>
                    <button type="submit" data-lang="signInBtn"></button>
                </form>
            </article>
        </section>
    </main>
</body>
</html>

