<?php
class Nightswatch {
	private $members;
	public function recruit($person){
		$this->members[] = $person;
		return ;
	}
	public function fight()	{
		foreach($this->members as $fighter)
			if($fighter instanceof IFighter)
				$fighter->fight();
	}
}
?>