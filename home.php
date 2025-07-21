<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | PG Life</title>

    <?php
    include "include/head_links.php";
    ?>
    <link href="css/home1.css" rel="stylesheet" />
</head>

<body>
    <?php
    include "include/header.php";
    ?>

    <div class="banner-container">
        <h2 class="pb-3 text-white">Happiness per Square Foot</h2>

        <form id="search-form" action="property_list.php" method="GET">
            <div class="input-group city-search">
                <input type="text" class="form-control input-city" id='city' name='city' placeholder="Enter your city to search for PGs" />
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="page-container">
        <h1 class="city-heading">
            Major Cities
        </h1>
        <div class="city-container">
            <div class="row">
                <div class="city-card-container col-md">
                    <a href="property_list.php?city=Delhi">
                        <div class="city-card rounded-circle">
                            <img src="img/delhi.png" class="city-img" />
                        </div>
                    </a>
                </div>

                <div class="city-card-container col-md">
                    <a href="property_list.php?city=Mumbai">
                        <div class="city-card rounded-circle">
                            <img src="img/mumbai.png" class="city-img" />
                        </div>
                    </a>
                </div>

                <div class="city-card-container col-md">
                    <a href="property_list.php?city=Bengaluru">
                        <div class="city-card rounded-circle">
                            <img src="img/bangalore.png" class="city-img" />
                        </div>
                    </a>
                </div>

                <div class="city-card-container col-md">
                    <a href="property_list.php?city=Hyderabad">
                        <div class="city-card rounded-circle">
                            <img src="img/hyderabad.png" class="city-img" />
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
        

    <?php
    include "include/signup_modal.php";
    include "include/login_modal.php";
    include "include/footer.php";
    ?>
</body>

</html>
