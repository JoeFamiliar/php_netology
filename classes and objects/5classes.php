<?php 
class Car {
	public $mark;
	public $type;
	public $color;
	public $speed;
	public $transmission;

	public function __construct($mark, $type, $color, $transmission, $speed){
		$this->mark = $mark;
		$this->type = $type;
		$this->color = $speed;
		$this->transmission = $transmission;
		$this->speed = $speed;
	}
	public function view() {
		echo "Ваше авто марки ".$mark." цвета ".$color." и типом кузова ".$type." c коробкой передач типа ".$transmission." способно разгоняться до ".$speed." км/ч.";
	}
}

$nissan = new Car('Nissan', 'седан', 'красный', 'автомат', '200');
$nissan->view();

$toyota = new Car('Toyota', 'минивэн', 'синий', 'автомат', '220');
$toyota->view();



class Tv {
	public $mark;
	public $size;
	public $type;
	public $price;

	public function __construct($mark, $size, $type, $price){
		$this->mark = $mark;
		$this->type = $type;
		$this->size = $size;
		$this->price = $price;
	}
	public function getPrice() {
		echo "Телевизор марки ".$mark." с диагональю ".$size." дюймов и типом экрана ".$type." cтоит ".$price." рублей."
	}
}

$samsung = new TV('Samsung', '38', 'плазма', '20000');
$samsung->getPrice();

$lg = new TV('LG', '51', 'LCD', '23000');
$lg->getPrice();


class Pen {
	public $mark;
	public $material;
	public $color;
	public $type;

	public function __construct($mark, $material, $type){
		$this->mark = $mark;
		$this->material = $material;
		$this->type = $type;
	}
	public function getColor() {
		echo ($this->type === 'одноразовая') ? ("К сожалению, Ваша ручка марки ".$mark." сделанная из материала ".$material." может писать только цветом, который идёт в комплектации, т.к. она одноразовая") : ("Мы рады Вам сообщить, что Вы можете заменить пасту в Вашей ручке марки ".$mark." сделанной из материала ".$material." на любую, т.к. она ".$type);
	}
}

$parker = new Pen('Parker', 'металл', 'многоразовая');
$parker->getColor();

$senator = new Pen('Senator', 'пластик', 'одноразовая');
$senator->getColor();
?>