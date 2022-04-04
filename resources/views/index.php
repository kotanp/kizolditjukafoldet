<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="csrf-token" content=<?php $token=csrf_token(); echo $token;?>>
    <script src="\js\ajax.js"></script>
    <script src="\js\bejegyzes.js"></script>
    <script src="\js\script.js"></script>
    <link rel="stylesheet" href="/css/index.css">
    <title>KP</title>
</head>
<body>
    <main>
        <section>
            <form id="form" method="POST">
                    <fieldset>
                    <legend>Mit tettél ma a Földért?</legend>
                    <select id="osztaly">
                        <option value="" disabled selected hidden>Válassz osztályt</option>
                    </select>
                    <select id="tevekenyseg">
                        <option value="" disabled selected hidden>Válassz tevékenységet</option>
                    </select>
                    <input type="button" id="submit" value="Küld">
                </fieldset> 
            </form>
        </section>
        <div id="chart_div"></div>
        <section id="tablazat">

        </section>
        <section>
                <label for="rendezes">Pont szerint rendezés:</label><br>
                <select name="rendezes" id="rendezes">
                    <option value="" disabled selected hidden>Válassz rendezést</option>
                    <option value="novekvo">Növekvő</option>
                    <option value="csokkeno">Csökkenő</option>                   
                  </select>
        </section>
        
    </main>
</body>
</html>