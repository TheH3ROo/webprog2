<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <title>MOBILOK</title>
  </head>

  <?php 
  $client = new SoapClient('http://localhost/web2/soap/szerver/mobilok.wsdl');
  $markak = $client->getmarkak();
  if(isset($_POST['marka']) && trim($_POST['marka']) != "")
    $modellek = $client->getmodellek($_POST['marka']);
  ?>
    
  <body>
    <h1>MOBILOK</h1>
    <form name="markaselect" method="POST">
      <select name="marka" onchange="javascript:markaselect.submit();">
        <option value="">Válasszon ...</option>
        <?php
          foreach($markak->markak as $marka)
          {
            echo '<option value="'.$marka['markakod'].'">'.$marka['markanev'].'</option>';
          }
        ?>
      </select>
        <?php
          if(isset($modellek))
          {
            echo "<fieldset>";
            echo '<legend>'.$modellek->markanev.'('.$modellek->markakod.') modelljei:</legend>';
            foreach($modellek->modellek as $modell)
            {
              echo $modell['modellkod'].' - '.$modell['modellnev']."<br>";
            }
            echo "</fieldset>";
          }
        ?>
    </form>
  </body>                                                          
</html>