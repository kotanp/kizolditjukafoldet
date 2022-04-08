<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content=<?php $token=csrf_token(); echo $token;?>>
    <title>KP</title>
</head>
<body>
    <main>
        <form id="form" method="POST" action=<?php $route=route('reset.password'); echo $route?>>
            <fieldset>
                <legend>Jelszó Módosítás</legend>
                <input type="hidden" name="_token" value=<?php $token=csrf_token(); echo $token;?>>
                <label for="newpwd">Új jelszó:</label><br>
                <input type="password" id="newpwd" name="newpwd"><br>
                <p id="newpwderror">
                    <?php if(session('errors')!==null) { $error=session('errors')->first('newpwd'); if ($error!==''){echo $error; echo "<br>";}} ?>
                </p>
                <label for="confirmpwd">Jelszó megerősítése:</label><br>               
                <input type="password" id="confirmpwd" name="confirmpwd"><br>
                <p id="confirmpwderror">
                    <?php if(session('errors')!==null) { $error=session('errors')->first('confirmpwd'); if ($error!==''){echo $error; echo "<br>";}} ?>
                </p>
                <button id="submit">OK</button>         
            </fieldset> 
        </form>
    </main>
</body>
</html>