<?php
class Sorsolasok {
  
  /**
    *  @return Huzasok
    */
  public function gethuzasok(){
  
	$eredmeny = array("hibakod" => 0,
					  "uzenet" => "",
					  "huzasok" => Array());
	
	try {
	  $dbh = new PDO('mysql:host=localhost;dbname=web2','root', '',
					array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	  $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
  
	  $sql = "select ev, het from huzas order by ev, het";
	  $sth = $dbh->prepare($sql);
	  $sth->execute(array());
	  $eredmeny['huzasok'] = $sth->fetchAll(PDO::FETCH_ASSOC);
	}
	catch (PDOException $e) {
	  $eredmeny["hibakod"] = 1;
	  $eredmeny["uzenet"] = $e->getMessage();
	}
	
	return $eredmeny;
  }

  /**
    *  @param string $ev
    *  @return Huzottak
    */
  function gethuzottak($id){
  
	$eredmeny = array("hibakod" => 0,
					  "uzenet" => "",
					  "ev" => "",
					  "het" => "",
					  "huzottak" => Array());
	
	try {
	  $dbh = new PDO('mysql:host=localhost;dbname=web2','root', '',
					array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	  $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
  
	  $eredmeny["id"] = $id;
  
	  $sql = "select szam from huzott where huzasid = :id";
	  $sth = $dbh->prepare($sql);
	  $sth->execute(array(":id" => $id));
	  $huzas = $sth->fetch(PDO::FETCH_ASSOC);
	  $eredmeny["szam"] = $huzas["szam"];
  
	  $sql = "select talalat, darab, ertek from nyeremeny where huzasid = :id";
	  $sth = $dbh->prepare($sql);
	  $sth->execute(array(":id" => $id));
	  $eredmeny['huzottak'] = $sth->fetchAll(PDO::FETCH_ASSOC);
	}
	catch (PDOException $e) {
	  $eredmeny["hibakod"] = 1;
	  $eredmeny["uzenet"] = $e->getMessage();
	}
	
	return $eredmeny;
  }
}


class Huzas {
  /**
   * @var string
   */
  public $ev;

  /**
   * @var string
   */
  public $het;  
}

class Huzasok {
  /**
   * @var integer
   */
  public $hibakod;

  /**
   * @var string
   */
  public $uzenet;  

  /**
   * @var Huzas[]
   */
  public $huzasok;  
}

class Huzott {
  /**
   * @var string
   */
  public $huzasid;

  /**
   * @var string
   */
  public $szam;  
}

class Huzottak {
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
  public $huzasid;

  /**
   * @var string
   */
  public $szam;  

  /**
   * @var Huzott[]
   */
  public $huzottak;  
}
?>