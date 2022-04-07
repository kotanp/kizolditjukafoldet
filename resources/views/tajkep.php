<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="\css\tajkep.css" />
    <link rel="stylesheet" href="/css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="\js\tajkep.js"></script>
    <script src="\js\ajax.js"></script>
    <script src="\js\bejegyzes.js"></script>
    <script src="\js\script.js"></script>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
    />
    <title>Document</title>
  </head>
    <button class="navopen">Menu</button>
    <div class="nav" >
    
    <main>
    <button class="navclose">X</button>
        <nav>
        <a href="/login" class="aut">Log in</a>
        <a href="/register" class="aut">Register</a>
        <a href="/admin" class="aut">Admin</a>
        </nav>
        
        <h1 class="title1">Kizöldítjük a Földet! </h1>
        <section>
            <form id="form" method="POST">
                    <fieldset>
                    <legend>Mit tettél ma a Földért?</legend>
                    <div class="selectek">
                    <select id="osztaly"  class="form-select form-select-sm">
                        <option value="" disabled selected hidden>Válassz osztályt</option>
                    </select>
                    <select id="tevekenyseg" class="form-select form-select-sm">
                        <option value="" disabled selected hidden >Válassz tevékenységet</option>
                    </select>
                    </div>  
                    <input type="button" id="submit" value="Küld" class="btn btn-success">
                </fieldset> 
            </form>
        </section>
        <div id="chart_div"></div>
          <section class="rendezo">
                  <label for="rendezes">Pont szerint rendezés:</label><br>
                  <select name="rendezes" id="rendezes" class="form-select form-select-sm">
                      <option value="" disabled selected hidden>Válassz rendezést</option>
                      <option value="novekvo">Növekvő</option>
                      <option value="csokkeno">Csökkenő</option>                   
                    </select>
          </section>
        <section id="tablazat" class="table">

        </section>
        
        
    </main>
    </div>
    <div  class="menu">
    
      <button class="colorOnce" title="Egyesével szinezi az elemeket">Színez <span class="badge">0</span></button>
      <div class="progress-bar1">
        <div class="progress1"></div>
      </div>
    </div>
 
    <div class="loading">
   
    <div class="loading-title">
        <div class="szamalk"><span class="main"><span class="main-alt">Számalk</span>-Szalézi</span><span class="alt">Technikum és Szakgimnázium</span></div>
        
    </div>
    <img class="szamalk-logo" src="kepek/banner.png" alt="logo">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
    </div>
  <body>
    <div class="tajkep">
      <div class="sun-container">
        <div class="cloud clouds"></div>
        <div class="cloud cloud-1 clouds"></div>
        <div class="sun"></div>
      </div>
      <div class="cloud clouds"></div>
      <div class="cloud cloud-1 clouds"></div>
    </div>
      <div class="mezo">
        <div class="fa-container">
            <img src="kepek/tree_in__autumn.svg"  class="fa fa1"/>
            <img src="kepek/tree_in_summer.svg"  class="fa fa2"/>
            <img src="kepek/tree_palm.svg"  class="fa fa3"/>

            <img src="kepek/tree_in__autumn.svg"  class="fa fa1 fa-jobbra"/>
            <img src="kepek/tree_in_summer.svg"  class="fa fa2 fa-jobbra"/>
            <img src="kepek/tree_palm.svg"  class="fa fa3 fa-jobbra"/>

            <img src="kepek/bush (2).svg"  class="bokor bokor1"/> 
            <img src="kepek/bush (2).svg"  class="bokor bokor2"/> 
            
             

        </div>
        <div class="fu-container">
          <img  src="kepek/grass (1).svg" class="fu fu1 fu-balra"/>
          <img  src="kepek/grass (1).svg" class="fu fu2 fu-balra"/>
          <img  src="kepek/grass (1).svg" class="fu fu3 fu-balra"/>
          <img  src="kepek/grass (1).svg" class="fu fu4 fu-balra"/>
          <img  src="kepek/grass (1).svg" class="fu fu5 fu-balra"/>
          
          <img  src="kepek/grass (1).svg" class="fu fu1 fu-lent"/>
          <img  src="kepek/grass (1).svg" class="fu fu2 fu-lent"/>
          <img  src="kepek/grass (1).svg" class="fu fu3 fu-lent"/>
          <img  src="kepek/grass (1).svg" class="fu fu4 fu-lent"/>
          <img  src="kepek/grass (1).svg" class="fu fu5 fu-lent"/>
          
          <img  src="kepek/grass (1).svg" class="fu fu6 fu-jobbra"/>
          <img  src="kepek/grass (1).svg" class="fu fu7 fu-jobbra"/>
          <img  src="kepek/grass (1).svg" class="fu fu8 fu-jobbra"/>
          <img  src="kepek/grass (1).svg" class="fu fu9 fu-jobbra"/>
          <img  src="kepek/grass (1).svg" class="fu fu10 fu-jobbra"/>

          <img  src="kepek/grass (1).svg" class="fu fu6 fu-jobbra fu-lent"/>
          <img  src="kepek/grass (1).svg" class="fu fu7 fu-jobbra fu-lent"/>
          <img  src="kepek/grass (1).svg" class="fu fu8 fu-jobbra fu-lent"/>
          <img  src="kepek/grass (1).svg" class="fu fu9 fu-jobbra fu-lent"/>
          <img  src="kepek/grass (1).svg" class="fu fu10 fu-jobbra fu-lent"/>

        </div>
      
        <div class="hegy-container">
          <img class="hegy" src="kepek/mountain.svg" />
        </div>
        <div class="hegy-container">
          <img class="hegy2" src="kepek/mountain.svg" />
        </div>
        <div class="oz-container">
          <img src="kepek/Male-Deer.svg" class="oz" />
        </div>
      </div>
      <div class="vizpart">
        <img src="kepek/fish (1).svg" class="fish1 fishes" />
        <img src="kepek/fish (2).svg" class="fish2 fish fishes" />
        <img src="kepek/fish (2).svg" class="fish2 fish3 fishes" />
        <img src="kepek/fish (3).svg" class="fish2 fish4 fishes" />

        <img src="kepek/tavirozsa1.svg" class="tavirozsa tavirozsa1"/>
        <img src="kepek/tavirozsa1.svg" class="tavirozsa tavirozsa4"/>
        <img src="kepek/tavirozsa2.svg" class="tavirozsa tavirozsa2"/>
        <img src="kepek/tavirozsa2.svg" class="tavirozsa tavirozsa3"/>
        
      </div>

      <div class="lights">
        <div class="light"></div>
        <div class="light light-1"></div>
        <div class="light light-2"></div>
        <div class="light light-3"></div>
        <div class="light light-4"></div>
        <div class="light light-5"></div>
        <div class="light light-6"></div>
        <div class="light light-7"></div>
      </div>

      <div class="splashes">
        <div class="splash"></div>
        <div class="splash delay-1"></div>
        <div class="splash delay-2"></div>
        <div class="splash splash-4 delay-2"></div>
        <div class="splash splash-4 delay-3"></div>
        <div class="splash splash-4 delay-4"></div>
        <div class="splash splash-stone delay-3"></div>
        <div class="splash splash-stone splash-4"></div>
        <div class="splash splash-stone splash-5"></div>
    </div>
    
      <div class="tabla">
        <img src="kepek/holzschild.svg" class="osztaly-tabla"/>

        <div class="osztaly-tabla felirat">
          NSZFA
        </div>
      </div>
      
    </div>
  </body>
</html>