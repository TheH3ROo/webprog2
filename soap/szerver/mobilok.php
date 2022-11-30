<?php
class Mobilok {
  
  /**
    *  @return Markak
    */
  public function getmarkak(){
  
	$eredmeny = array("hibakod" => 0,
					  "uzenet" => "",
					  "markak" => Array());
	
	try {
	  $dbh = new PDO('mysql:host=localhost;dbname=mobilok','root', '',
					array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	  $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
  
	  $sql = "select markakod, markanev from markak order by markakod";
	  $sth = $dbh->prepare($sql);
	  $sth->execute(array());
	  $eredmeny['markak'] = $sth->fetchAll(PDO::FETCH_ASSOC);
	}
	catch (PDOException $e) {
	  $eredmeny["hibakod"] = 1;
	  $eredmeny["uzenet"] = $e->getMessage();
	}
	
	return $eredmeny;
  }

  /**
    *  @param string $markakod
    *  @return Modellek
    */
  function getmodellek($markakod){
  
	$eredmeny = array("hibakod" => 0,
					  "uzenet" => "",
					  "markakod" => "",
					  "markanev" => "",
					  "modellek" => Array());
	
	try {
	  $dbh = new PDO('mysql:host=localhost;dbname=mobilok','root', '',
					array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	  $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
  
	  $eredmeny["markakod"] = $markakod;
  
	  $sql = "select markaid, markanev from markak where markakod = :markakod";
	  $sth = $dbh->prepare($sql);
	  $sth->execute(array(":markakod" => $markakod));
	  $marka = $sth->fetch(PDO::FETCH_ASSOC);
	  $markaid = $marka["markaid"];
	  $eredmeny["markanev"] = $marka["markanev"];
  
	  $sql = "select modellkod, modellnev from modellek where markaid = :markaid order by modellkod";
	  $sth = $dbh->prepare($sql);
	  $sth->execute(array(":markaid" => $markaid));
	  $eredmeny['modellek'] = $sth->fetchAll(PDO::FETCH_ASSOC);
	}
	catch (PDOException $e) {
	  $eredmeny["hibakod"] = 1;
	  $eredmeny["uzenet"] = $e->getMessage();
	}
	
	return $eredmeny;
  }
}


class Marka {
  /**
   * @var string
   */
  public $markakod;

  /**
   * @var string
   */
  public $markanev;  
}

class Markak {
  /**
   * @var integer
   */
  public $hibakod;

  /**
   * @var string
   */
  public $uzenet;  

  /**
   * @var Marka[]
   */
  public $markak;  
}

class Modell {
  /**
   * @var string
   */
  public $modellkod;

  /**
   * @var string
   */
  public $modellnev;  
}

class Modellek {
  /**
   * @var integer
   */
  public $hibakod;

  /**
   * @var string
   */
  public $uzenet;  

  /**
   * @var string
   */
  public $markakod;

  /**
   * @var string
   */
  public $markanev;  

  /**
   * @var Modell[]
   */
  public $modellek;  
}
?>