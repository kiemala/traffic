<?php

require('vehicle.php');
 
 if(isset($_POST['ew']) && isset($_POST['fw']) && isset($_POST['vl']))
    {
        $weight = $_POST['ew'];
        $fullWeight = $_POST['fw'];
        $volume = $_POST['vl'];
    }

    $tax = 0;

	if($weight <= 1300)
    {
        $myCarCompact = new Compact(" ", $weight, $fullWeight, $volume," "," ", 0," ");
        $tax=$myCarCompact->getWeight();
    }
	else if($weight >1300 && $weight <= 1700)
	{
		$myCarBusiness = new Business(" ",$weight, $fullWeight, $volume," "," ",0," ");
        $tax=$myCarBusiness->getWeight();
	}
	else if ($weight > 1700 && $weight <= 2700)
	{
		$myCarSUV = new SUV(" ", $weight, $fullWeight, $volume," "," ",0," ");
        $tax=$myCarSUV->getWeight();
	}
	else echo "Вес не может быть больше 2700! ";
	
	if($fullWeight < 5000)
    {
        $myTruckLight = new Light(" ",$weight,$fullWeight,$volume," ",0,0);
        $tax=$myTruckLight->getWeight();
    }
	else if($fullWeight > 5000 && $fullWeight <= 22000)
	{
		$myTruckHeavy = new Heavy(" ",$weight,$fullWeight,$volume," "," ",0," ");
        $tax=$myTruckHeavy->getWeight();
	}
	else echo "Вес не может быть больше 22000! ";
	
echo $tax;



?>