<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner</title>
    <style>
        .header2 {
            height: 10%;
            background-color: #F0F0F0;
        }

        .header2.button-container {
            display: flex;
            flex-direction: row;
        }

        .button-h2 {
            font-size: 17px;
            padding: 6px;
            margin: 20px;
            background-color: transparent;
            color: 0C0B0B;
            border: none;
            cursor: pointer;
        }

        .button-h2:hover {
            background-color: #DCCACA;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="header2">
        <div class="button-container">
            <button class="button-h2"><a href="birthday_party.php" style="text-decoration: none;">Birthday Party-></a></button>
            <button class="button-h2"><a href="wedding_party.php" style="text-decoration: none;">Wedding Party-></a></button>
            <button class="button-h2"><a href="corporate_party.php" style="text-decoration: none;">Corporate Party-></a></button>
            <button class="button-h2"><a href="surprise_party.php" style="text-decoration: none;">Surprise Party-></a></button>
            <button class="button-h2"><a href="home_party.php" style="text-decoration: none;">Home Party-></a></button>
            <button class="button-h2"><a href="customized_party.php" style="text-decoration: none;">Customized Party-></a></button>
        </div>
    </div>
</body>

</html>