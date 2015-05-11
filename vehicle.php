<?php
 class Vehicle {
	protected $size;//габариты ТС
	protected $weight;//вес ТС
	protected $fullWeight;//вес ТС с полной загрузкой
	protected $volume;//обьем двигателя
	protected $fuel; //вид топлива
    protected $tax; //дорожный налог
    const RATE = 0.1; //константа для расчета налога
	
    public function __construct($size, $weight, $fullWeight, $volume, $fuel){
		$this->size = $size;
		$this->weight = $weight;
        $this->fullWeight = $fullWeight;
        $this->volume = $volume;
        $this->fuel = $fuel;
}
    public function roadTax() {
        $this->tax = ($this->volume*$this::PRICE)+($this->weight*$this::RATE);
		
          
}
    public function Info () {
        echo "Габариты ТС: {$this -> size} м". "<br>";   
        echo "Вес ТС: {$this -> weight} кг"." <br>";
        echo "Вес ТС с полной загрузкой: {$this -> fullWeight} кг"."<br>";
        echo "Обьем двигателя: {$this -> volume} л"."<br>";
        echo "Вид топлива: {$this -> fuel}<br>";
    }
   
}
class Car extends Vehicle {
    protected $gearbox;//тип коробки передач
	protected $numPassenger;//количество пассажиров
	protected $carcass;//тип кузова
	
    public function __construct($size, $weight, $fullWeight, $volume, $fuel, $gearbox, $numPassenger, $carcass){
        parent::__construct($size, $weight, $fullWeight, $volume, $fuel);
        $this->gearbox = $gearbox;
	    $this->numPassenger= $numPassenger;
        $this->carcass = $carcass;
	}
    public function roadTax() {
        return parent::roadTax();
	}
    public function CarInfo (){
        Vehicle::Info();
        echo "Тип коробки передач: {$this -> gearbox}<br>";
        echo "Количество пассажиров: {$this -> numPassenger} чел"."<br>";    
        echo "Тип кузова: {$this -> carcass}<br>";   
        } 

}
class Truck extends Vehicle {
    protected $trailerWeight;//допустимый вес прицепа
	protected $axis;//количество осей

    public function __construct($size, $weight, $fullWeight, $volume, $fuel, $trailerWeight, $axis){
        parent::__construct($size, $weight, $fullWeight, $volume, $fuel);
        $this->trailerWeight = $trailerWeight;
		$this->axis = $axis;      
	}
    public function TruckInfo (){
        Vehicle::Info();
        echo "Допустимый вес прицепа {$this -> trailerWeight} кг"."<br>";
        echo "Количество осей: {$this -> axis}<br>";  
        }

}
class Compact extends Car {
    const PRICE = 10;
    public function __construct($size, $weight, $fullWeight, $volume, $fuel, $gearbox, $numPassenger, $carcass ){
        parent::__construct($size, $weight, $fullWeight, $volume, $fuel, $gearbox, $numPassenger, $carcass );
 	}
    public function getWeight(){
        if ($this->weight < 1300) {
            $this->tax = $this->roadTax();
        } else {
            $this->tax = "Неверные  данные";
        }
		return $this->tax;
    }

    public function CarCompactInfo() {
        Car::CarInfo();  
        echo "Дорожный налог: {$this ->tax} грн"."<br>";
}
}
class Business extends Car {
    const PRICE = 15;

    public function __construct($size, $weight, $fullWeight, $volume, $fuel, $gearbox, $numPassenger, $carcass ){
        parent::__construct($size, $weight, $fullWeight, $volume, $fuel,$gearbox, $numPassenger, $carcass );
      
	}
    public function getWeight(){
        if ($this->weight < 1700) {
            $this->tax=$this->roadTax();
        } else {
            $this->tax = "Неверные данные";
        }
		return $this->tax;
    }
    public function CarBusinessInfo() {
        Car::CarInfo();  
        echo "Дорожный налог: {$this ->tax} грн"."<br>";
}
}
class SUV extends Car {
    const PRICE = 20;
    public function __construct($size, $weight, $fullWeight, $volume, $fuel, $gearbox, $numPassenger, $carcass ){
        parent::__construct($size, $weight, $fullWeight, $volume, $fuel,$gearbox, $numPassenger, $carcass );
        
	}
    public function getWeight(){
        if ($this->weight <= 2700) {
            $this->roadTax();
        } else {
            $this->tax = "Неверные данные";
        }
		return $this->tax;
    }
    public function CarSUVInfo() {
        Car::CarInfo();  
        echo "Дорожный налог: {$this ->tax} грн"."<br>";
}
}
class Light extends Truck {
    const PRICE = 25;
    public function __construct($size, $weight, $fullWeight, $volume, $fuel, $trailerWeight, $axis){
        parent::__construct($size, $weight, $fullWeight, $volume, $fuel, $trailerWeight,$axis );
          
	}
    public function getWeight(){
        if ($this->fullWeight < 5000) {
            $this->roadTax();
        } else {
            $this->tax = "Неверные данные";
        }
		return $this->tax;
    }
    public function TruckLightInfo() {
        Truck::TruckInfo();  
        echo "Дорожный налог: {$this ->tax} грн"."<br>";
}

}
class Heavy extends Truck {
    const PRICE = 30;
    public function __construct($size, $weight, $fullWeight, $volume, $fuel, $trailerWeight, $axis){
        parent::__construct($size, $weight, $fullWeight, $volume, $fuel, $trailerWeight,$axis );
          
	}
    public function getWeight(){
        if ($this->fullWeight > 5000 && $this->fullWeight < 22000) {
            $this->roadTax();
        } else {
            $this->tax = "Неверные данные";
		 }
		 return $this->tax;
    }
    public function TruckHeavyInfo() {
        Truck::TruckInfo();  
        echo "Дорожный налог: {$this ->tax} грн"."<br>";
}

}

?>

