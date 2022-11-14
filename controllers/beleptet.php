<?php

class Beleptet_Controller
{
	public $baseName = 'beleptet';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		if(isset($vars['vezeteknev'])){
			$regisztralModel = new Regisztral_Model;  //az oszt�lyhoz tartoz� modell
			//a modellben bel�pteti a felhaszn�l�t
			$retData = $regisztralModel->register_user($vars);
			if($retData['eredmeny'] == "ERROR")
				$this->baseName = "belepes";
			//bet�ltj�k a n�zetet
			$view = new View_Loader($this->baseName.'_main');
			//�tadjuk a lek�rdezett adatokat a n�zetnek
			foreach($retData as $name => $value)
				$view->assign($name, $value);
		}
		else{
			$beleptetModel = new Beleptet_Model;  //az oszt�lyhoz tartoz� modell
			//a modellben bel�pteti a felhaszn�l�t
			$retData = $beleptetModel->get_data($vars);
			if($retData['eredmeny'] == "ERROR")
				$this->baseName = "belepes";
			//bet�ltj�k a n�zetet
			$view = new View_Loader($this->baseName.'_main');
			//�tadjuk a lek�rdezett adatokat a n�zetnek
			foreach($retData as $name => $value)
				$view->assign($name, $value);
		}
	}
}

?>