<?php
include 'FootballData.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Futebol</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<div data-bs-theme="dark" class="text-body bg-body">
<?php // Create instance of API class
// Create instance of API class
?>$api = new FootballData(); ?>

<div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
            <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
    </div>
</div>
<div class="site-mobile-menu-body"></div>

<div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 ml-auto">
                <div id="date-countdown"></div>
                    <p>
                    </p>  
            </div>
        </div>
    </div>
</div>

        <ul class="nav nav-tabs justify-content-center"  id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                    Home
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pl-tab" data-bs-toggle="tab" data-bs-target="#pl-tab-pane" type="button" role="tab" aria-controls="pl-tab-pane" aria-selected="false">
                    Premier League
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="bsa-tab" data-bs-toggle="tab" data-bs-target="#bsa-tab-pane" type="button" role="tab" aria-controls="bsa-tab-pane" aria-selected="true">
                    Brasil Séria A
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ppl-tab" data-bs-toggle="tab" data-bs-target="#ppl-tab-pane" type="button" role="tab" aria-controls="ppl-tab-pane" aria-selected="true">
                    Portugal Primeira Liga
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ded-tab" data-bs-toggle="tab" data-bs-target="#ded-tab-pane" type="button" role="tab" aria-controls="ded-tab-pane" aria-selected="true">
                    Eredivisie
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="bl1-tab" data-bs-toggle="tab" data-bs-target="#bl1-tab-pane" type="button" role="tab" aria-controls="bl1-tab-pane" aria-selected="true">
                    Bundesliga
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="fl1-tab" data-bs-toggle="tab" data-bs-target="#fl1-tab-pane" type="button" role="tab" aria-controls="fl1-tab-pane" aria-selected="true">
                    França Ligue 1
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="sa-tab" data-bs-toggle="tab" data-bs-target="#sa-tab-pane" type="button" role="tab" aria-controls="sa-tab-pane" aria-selected="true">
                    Italy Serie A
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pd-tab" data-bs-toggle="tab" data-bs-target="#pd-tab-pane" type="button" role="tab" aria-controls="pd-tab-pane" aria-selected="true">
                    Spanish La Liga
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="elc-tab" data-bs-toggle="tab" data-bs-target="#elc-tab-pane" type="button" role="tab" aria-controls="elc-tab-pane" aria-selected="true">
                    Championship
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cli-tab" data-bs-toggle="tab" data-bs-target="#cli-tab-pane" type="button" role="tab" aria-controls="cli-tab-pane" aria-selected="true">
                    Copa Libertadores
                </button>
            </li>
        </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="container col-12">
                <br>
                    <h2 class="text-white text-center">
                        Upcoming matches within the next 3 days                    
                    </h2>
                <br>
                <table class="table custom-table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">HomeTeam</th>
                            <th scope="col">AwayTeam</th>
                            <th scope="col">Result</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $now = new DateTime();
                    $end = new DateTime();
                    $end->add(new DateInterval('P3D'));
                    $response = $api->findMatchesForDateRange($now->format('Y-m-d'), $end->format('Y-m-d'));
                    ?>
                    <?php foreach ($response->matches as $match) { ?>
                    <tr>
                        <td><?php echo $match->homeTeam->name; ?></td>
                        <td><?php echo $match->awayTeam->name; ?></td>
                        <td><?php echo $match->score->fullTime->home; ?></td>
                        <td><?php echo $match->score->fullTime->away; ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
            <div class="tab-pane fade" id="pl-tab-pane" role="tabpanel" aria-labelledby="pl-tab" tabindex="0">
                <div class="container col-12">
                <br>
                    <h2 class="text-white text-center">Current Standings Competition Premier League</h2>
                <br>
                <table class="table custom-table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Position</th>
                            <th scope="col">TeamName</th>
                            <th scope="col">GoalDifference</th>
                            <th scope="col">Points</th>
                        </tr>
                    </thead>
                            <?php foreach ($api->findStandingsByCompetition("PL")->standings as $standing) {
                                if ($standing->type == 'TOTAL') {
                                    foreach ($standing->table as $standingRow) { ?>
                            <tr>
                                <td><?php echo $standingRow->position; ?></td>
                                <td><?php echo $standingRow->team->name; ?></td>
                                <td><?php echo $standingRow->goalDifference; ?></td>
                                <td><?php echo $standingRow->points; ?></td>
                            </tr>
                            <?php }
                                }
                            } ?>
                            <tr>
                            </tr>
                        </table>
            </div>
        </div>
        <div class="tab-pane fade" id="bsa-tab-pane" role="tabpanel" aria-labelledby="bsa-tab" tabindex="0">
            <div class="container col-12">
                <br>
                    <h2 class="text-white text-center">Current Standings Competition Brasil Série A</h2>
                <br>
                <table class="table custom-table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Position</th>
                            <th scope="col">TeamName</th>
                            <th scope="col">GoalDifference</th>
                            <th scope="col">Points</th>
                        </tr>
                    </thead>
                    <?php foreach ($api->findStandingsByCompetition("BSA")->standings as $standing) {
                        if ($standing->type == 'TOTAL') {
                            foreach ($standing->table as $standingRow) { ?>
                    <tr>
                        <td><?php echo $standingRow->position; ?></td>
                        <td><?php echo $standingRow->team->name; ?></td>
                        <td><?php echo $standingRow->goalDifference; ?></td>
                        <td><?php echo $standingRow->points; ?></td>
                    </tr>
                    <?php }
                        }
                    } ?>
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="ppl-tab-pane" role="tabpanel" aria-labelledby="ppl-tab" tabindex="0">
            <div class="container col-12">
                <br>
                    <h2 class="text-white text-center">
                        Current Standings Competition PRIMEIRA LIGA Portugal
                    </h2>
                <br>
                <table class="table custom-table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Position</th>
                            <th scope="col">TeamName</th>
                            <th scope="col">GoalDifference</th>
                            <th scope="col">Points</th>
                        </tr>
                    </thead>
                    <?php foreach ($api->findStandingsByCompetition("PPL")->standings as $standing) {
                        if ($standing->type == 'TOTAL') {
                            foreach ($standing->table as $standingRow) { ?>
                    <tr>
                        <td><?php echo $standingRow->position; ?></td>
                        <td><?php echo $standingRow->team->name; ?></td>
                        <td><?php echo $standingRow->goalDifference; ?></td>
                        <td><?php echo $standingRow->points; ?></td>
                    </tr>
                    <?php }
                        }
                    } ?>
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="tab-pane fade" id="ded-tab-pane" role="tabpanel" aria-labelledby="ded-tab" tabindex="0">
        <div class="container col-12">
            <br>
                <h2 class="text-white text-center">
                    Current Standings Competition Eredivisie
                </h2>
            <br>
            <table class="table custom-table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Position</th>
                        <th scope="col">TeamName</th>
                        <th scope="col">GoalDifference</th>
                        <th scope="col">Points</th>
                    </tr>
                </thead>
                        <?php foreach ($api->findStandingsByCompetition("DED")->standings as $standing) {
                            if ($standing->type == 'TOTAL') {
                                foreach ($standing->table as $standingRow) { ?>
                        <tr>
                            <td><?php echo $standingRow->position; ?></td>
                            <td><?php echo $standingRow->team->name; ?></td>
                            <td><?php echo $standingRow->goalDifference; ?></td>
                            <td><?php echo $standingRow->points; ?></td>
                        </tr>
                        <?php }
                            }
                        } ?>
                        <tr>
                        </tr>
                    </table>
            </div>
        </div>
        
        <div class="tab-pane fade" id="bl1-tab-pane" role="tabpanel" aria-labelledby="bl1-tab" tabindex="0">
            <div class="container col-12">
                <br>
                    <h2 class="text-white text-center">
                        Current Standings Competition Bundesliga
                    </h2>
                <br>
                <table class="table custom-table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Position</th>
                            <th scope="col">TeamName</th>
                            <th scope="col">GoalDifference</th>
                            <th scope="col">Points</th>
                        </tr>
                    </thead>
                    <?php foreach ($api->findStandingsByCompetition("BL1")->standings as $standing) {
                        if ($standing->type == 'TOTAL') {
                            foreach ($standing->table as $standingRow) { ?>
                    <tr>
                        <td><?php echo $standingRow->position; ?></td>
                        <td><?php echo $standingRow->team->name; ?></td>
                        <td><?php echo $standingRow->goalDifference; ?></td>
                        <td><?php echo $standingRow->points; ?></td>
                    </tr>
                    <?php }
                        }
                    } ?>
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="tab-pane fade" id="fl1-tab-pane" role="tabpanel" aria-labelledby="fl1-tab" tabindex="0">
            <div class="container col-12">
                <br>
                    <h2 class="text-white text-center">
                        Current Standings Competition Ligue 1 França
                    </h2>
                <br>
                <table class="table custom-table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Position</th>
                            <th scope="col">TeamName</th>
                            <th scope="col">GoalDifference</th>
                            <th scope="col">Points</th>
                        </tr>
                    </thead>
                    <?php foreach ($api->findStandingsByCompetition("FL1")->standings as $standing) {
                        if ($standing->type == 'TOTAL') {
                            foreach ($standing->table as $standingRow) { ?>
                    <tr>
                        <td><?php echo $standingRow->position; ?></td>
                        <td><?php echo $standingRow->team->name; ?></td>
                        <td><?php echo $standingRow->goalDifference; ?></td>
                        <td><?php echo $standingRow->points; ?></td>
                    </tr>
                    <?php }
                        }
                    } ?>
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="tab-pane fade" id="sa-tab-pane" role="tabpanel" aria-labelledby="sa-tab" tabindex="0">
            <div class="container col-12">
                <br>
                    <h2 class="text-white text-center">
                        Current Standings Competition Italy Serie A
                    </h2>
                <br>
                <table class="table custom-table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Position</th>
                            <th scope="col">TeamName</th>
                            <th scope="col">GoalDifference</th>
                            <th scope="col">Points</th>
                        </tr>
                    </thead>
                    <?php foreach ($api->findStandingsByCompetition("SA")->standings as $standing) {
                        if ($standing->type == 'TOTAL') {
                            foreach ($standing->table as $standingRow) { ?>
                    <tr>
                        <td><?php echo $standingRow->position; ?></td>
                        <td><?php echo $standingRow->team->name; ?></td>
                        <td><?php echo $standingRow->goalDifference; ?></td>
                        <td><?php echo $standingRow->points; ?></td>
                    </tr>
                    <?php }
                        }
                    } ?>
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="tab-pane fade" id="pd-tab-pane" role="tabpanel" aria-labelledby="pd-tab" tabindex="0">
            <div class="container col-12">
                <br>
                    <h2 class="text-white text-center">
                        Current Standings Competition Spanish La Liga
                    </h2>
                <br>
                <table class="table custom-table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Position</th>
                            <th scope="col">TeamName</th>
                            <th scope="col">GoalDifference</th>
                            <th scope="col">Points</th>
                        </tr>
                    </thead>
                    <?php foreach ($api->findStandingsByCompetition("PD")->standings as $standing) {
                        if ($standing->type == 'TOTAL') {
                            foreach ($standing->table as $standingRow) { ?>
                    <tr>
                        <td><?php echo $standingRow->position; ?></td>
                        <td><?php echo $standingRow->team->name; ?></td>
                        <td><?php echo $standingRow->goalDifference; ?></td>
                        <td><?php echo $standingRow->points; ?></td>
                    </tr>
                    <?php }
                        }
                    } ?>
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="tab-pane fade" id="elc-tab-pane" role="tabpanel" aria-labelledby="elc-tab" tabindex="0">
            <div class="container col-12">
                <br>
                    <h2 class="text-white text-center">
                        Current Standings Competition Championship
                    </h2>
                <br>
                <table class="table custom-table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Position</th>
                            <th scope="col">TeamName</th>
                            <th scope="col">GoalDifference</th>
                            <th scope="col">Points</th>
                        </tr>
                    </thead>
                    <?php foreach ($api->findStandingsByCompetition("ELC")->standings as $standing) {
                        if ($standing->type == 'TOTAL') {
                            foreach ($standing->table as $standingRow) { ?>
                    <tr>
                        <td><?php echo $standingRow->position; ?></td>
                        <td><?php echo $standingRow->team->name; ?></td>
                        <td><?php echo $standingRow->goalDifference; ?></td>
                        <td><?php echo $standingRow->points; ?></td>
                    </tr>
                    <?php }
                        }
                    } ?>
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="tab-pane fade" id="cli-tab-pane" role="tabpanel" aria-labelledby="cli-tab" tabindex="0">
            <div class="container col-12">
                <br>
                    <h2 class="text-white text-center">
                        Current Standings Competition Copa Libertadores
                    </h2>
                <br>
                <table class="table custom-table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Position</th>
                            <th scope="col">TeamName</th>
                            <th scope="col">GoalDifference</th>
                            <th scope="col">Points</th>
                        </tr>
                    </thead>
                    <?php foreach ($api->findStandingsByCompetition("CLI")->standings as $standing) {
                        if ($standing->type == 'TOTAL') {
                            foreach ($standing->table as $standingRow) { ?>
                    <tr>
                        <td><?php echo $standingRow->position; ?></td>
                        <td><?php echo $standingRow->team->name; ?></td>
                        <td><?php echo $standingRow->goalDifference; ?></td>
                        <td><?php echo $standingRow->points; ?></td>
                    </tr>
                    <?php }
                        }
                    } ?>
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
