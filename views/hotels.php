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

// Inclusione della vista
include 'views/hotels.php';
?>
