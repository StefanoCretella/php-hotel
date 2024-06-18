<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h1 class="my-4">Lista degli Hotel</h1>

    <form method="GET" class="mb-4">
        <div class="form-row">
            <div class="col">
                <label for="parking">Parcheggio:</label>
                <select name="parking" id="parking" class="form-control">
                    <option value="" <?php if (!isset($_GET['parking']) || $_GET['parking'] === '') echo 'selected'; ?>>Tutti</option>
                    <option value="1" <?php if (isset($_GET['parking']) && $_GET['parking'] === '1') echo 'selected'; ?>>Sì</option>
                    <option value="0" <?php if (isset($_GET['parking']) && $_GET['parking'] === '0') echo 'selected'; ?>>No</option>
                </select>
            </div>
            <div class="col">
                <label for="vote">Voto minimo:</label>
                <select name="vote" id="vote" class="form-control">
                    <option value="0" <?php if (!isset($_GET['vote']) || $_GET['vote'] === '0') echo 'selected'; ?>>Tutti</option>
                    <option value="1" <?php if (isset($_GET['vote']) && $_GET['vote'] === '1') echo 'selected'; ?>>1</option>
                    <option value="2" <?php if (isset($_GET['vote']) && $_GET['vote'] === '2') echo 'selected'; ?>>2</option>
                    <option value="3" <?php if (isset($_GET['vote']) && $_GET['vote'] === '3') echo 'selected'; ?>>3</option>
                    <option value="4" <?php if (isset($_GET['vote']) && $_GET['vote'] === '4') echo 'selected'; ?>>4</option>
                    <option value="5" <?php if (isset($_GET['vote']) && $_GET['vote'] === '5') echo 'selected'; ?>>5</option>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary mt-4">Filtra</button>
            </div>
        </div>
    </form>

    <?php
    // Array di hotel
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];

    // Funzione per filtrare gli hotel
    function filterHotels($hotels) {
        $parking = isset($_GET['parking']) ? $_GET['parking'] : '';
        $vote = isset($_GET['vote']) ? $_GET['vote'] : 0;

        return array_filter($hotels, function ($hotel) use ($parking, $vote) {
            $parkingFilter = ($parking === '') || ($hotel['parking'] == $parking);
            $voteFilter = $hotel['vote'] >= $vote;
            return $parkingFilter && $voteFilter;
        });
    }

    $filteredHotels = filterHotels($hotels);
    ?>

    <div class="row">
        <?php foreach ($filteredHotels as $hotel): ?>
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 1.5rem;"><?= $hotel['name'] ?></h5>
                        <p class="card-text" style="font-size: 1.2rem;"><?= $hotel['description'] ?></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="font-size: 1.1rem;">Parcheggio: <?= $hotel['parking'] ? 'Sì' : 'No' ?></li>
                            <li class="list-group-item" style="font-size: 1.1rem;">Voto: <?= $hotel['vote'] ?></li>
                            <li class="list-group-item" style="font-size: 1.1rem;">Distanza dal Centro: <?= $hotel['distance_to_center'] ?> km</li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
