<?php 
class Car 
{
	public $mark;
	public $type;
	public $color;
	public $speed;
	public $transmission;

	public function __construct($mark, $type, $color, $transmission, $speed) 
	{
		$this->mark = $mark;
		$this->type = $type;
		$this->color = $speed;
		$this->transmission = $transmission;
		$this->speed = $speed;
	}
	public function view() 
	{
		echo "Ваше авто марки ".$this->mark." цвета ".$this->color." и типом кузова ".$this->type." c коробкой передач типа ".$this->transmission." способно разгоняться до ".$this->speed." км/ч.<br>";
	}
}

$nissan = new Car('Nissan', 'седан', 'красный', 'автомат', '200');
$nissan->view();

$toyota = new Car('Toyota', 'минивэн', 'синий', 'автомат', '220');
$toyota->view();



class Tv 
{
	public $mark;
	public $size;
	public $type;
	public $price;

	public function __construct($mark, $size, $type, $price) 
	{
		$this->mark = $mark;
		$this->type = $type;
		$this->size = $size;
		$this->price = $price;
	}
	public function getPrice() 
	{
		echo "Телевизор марки ".$this->mark." с диагональю ".$this->size." дюймов и типом экрана ".$this->type." cтоит ".$this->price." рублей.<br>";
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

	public function __construct($mark, $material, $type)
	{
		$this->mark = $mark;
		$this->material = $material;
		$this->type = $type;
	}
	public function getColor() 
	{
		echo ($this->type === 'одноразовая') ? ("К сожалению, Ваша ручка марки ".$this->mark." сделанная из материала ".$this->material." может писать только цветом, который идёт в комплектации, т.к. она одноразовая<br>") : ("Мы рады Вам сообщить, что Вы можете заменить пасту в Вашей ручке марки ".$this->mark." сделанной из материала ".$this->material." на любую, т.к. она ".$this->type."<br>");
	}
}

$parker = new Pen('Parker', 'металл', 'многоразовая');
$parker->getColor();

$senator = new Pen('Senator', 'пластик', 'одноразовая');
$senator->getColor();
?>