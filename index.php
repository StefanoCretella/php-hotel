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
                    <option value="">Tutti</option>
                    <option value="1">Sì</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="col">
                <label for="vote">Voto minimo:</label>
                <select name="vote" id="vote" class="form-control">
                    <option value="0">Tutti</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary mt-4">Filtra</button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Parcheggio</th>
                <th>Voto</th>
                <th>Distanza dal Centro (km)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filteredHotels as $hotel) { ?>
                <tr>
                    <td><?php echo $hotel['name']; ?></td>
                    <td><?php echo $hotel['description']; ?></td>
                    <td><?php echo $hotel['parking'] ? 'Sì' : 'No'; ?></td>
                    <td><?php echo $hotel['vote']; ?></td>
                    <td><?php echo $hotel['distance_to_center']; ?> km</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
