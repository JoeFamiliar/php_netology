<?php 
class News 
{
	private $author;
	private $title;
	private $text;
	private $createdAt;
	private $newsId
	private static $newsCount = 0;

	public function __construct($author, $title, $text){
		$this->author = $author;
		$this->title = $title;
		$this->text = $text;
		$this->createdAt = date("m.d.y");
		self::$newsCount++;
		$this->newsId = self::$newsCount;
	}

	public function getAuthor() {
		return $this->author;
	}
	public function getTitle() {
		return $this->title;
	}
	public function getText() {
		return $this->text;
	}
	public function getDate() {
		return $this->createdAt;
	}

	public function getComments($arr_comments){
		if(!empty($arr_comments)){
			$comments = [];
			foreach ($arr_comments as $comment) {
				$comments[] = $comment->commentText;
			}
			return $comments;
		}
	}
}

class Comments 
{
	private $commentText;
	private $idNews;
	private $comments = [];

	public function __construct($comment, $idNews){
		$this->commentText = $comment;
		$this->idNews = $idNews;
	}
}

$arr_comments[] = new Comment('comment', 'idNews'); // не знаю, как лучше его передать в класс News, обратиться через global? сами значения будут заполняться при нажатии пользователем кнопки "отправить", где comment это набранный юзером текст, а idNews из скрытого поля самой новости, который берётся из объекта News->newsId
$news[] = new News('Author', 'Title', 'Text'); 
?>
<html>
	<head>
		<meta content="text/html; charset=utf-8">
	</head>
	<body>
	<?php 
	// тут останется перебирать массив объектов $news и вытягивать значения переменных для заполнения соответствующих полей каждого нового облака новости, состоящего из h1 getHeader(), самой новости getText(), автора статьи/новости getAuthor() и даты getDate() и ниже все комментарии к этой новости, которые берутся из массива объектов arr_comments при выборе совпадающих идентификаторов $newsId и $idNews
	?>
	</body>
</html>