<?php
    class Jaime extends Lannister{
        public function sleepWith($person){
            if (get_class($person) == 'Cersei'){
                echo "With pleasure, but only in a tower in Winterfell, then.\n";
            }
            else 
                echo parent::sleepWith($person);
        }
    }
    
?>