<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content=<?php $token=csrf_token(); echo $token;?>>
    <script src="\js\ajax.js"></script>
    <script src="\js\bejegyzes.js"></script>
    <script src="\js\scriptAdmin.js"></script>
    <link rel="stylesheet" href="/css/admin.css">
    <title>KP</title>
</head>
<body>
    <main>
        <section id="tablazat">

        </section>
    </main>
</body>
</html>