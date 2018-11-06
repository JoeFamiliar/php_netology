<?php 
class News {
	private $author;
	private $newsheader;
	private $text;
	private $date;
	private $newsId;

	public function __construct($author, $newsheader, $text){
		$this->author = $author;
		$this->newsheader = $newsheader;
		$this->text = $text;
		$this->date = date("m.d.y");

		$this->newsId = count($news)+1; //при условии, что $news нужно сделать доступным вездем, т.е. глобальным или что-то в этом роде
	}

	public function getAuthor() {
		return $this->author;
	}
	public function getHeader() {
		return $this->newsheader;
	}
	public function getText() {
		return $this->text;
	}
	public function getDate() {
		return $this->date;
	}

	public function getComments($arr_comments){
		if(!empty($arr_comments)){
			$comments = [];
			foreach ($arr_comments as $comment) {
				$comments[] = $comment->comment;
			}
			return $comments;
		}
	}
}

class Comment {
	private $comment;
	private $idNews;

	public function __construct($comment, $idNews){
		$this->comment = $comment;
		$this->idNews = $idNews;
	}
}

$arr_comments[] = new Comment('comment', 'idNews'); // не знаю, как лучше его передать в класс News, обратиться через global? сами значения будут заполняться при нажатии пользователем кнопки "отправить", где comment это набранный юзером текст, а idNews из скрытого поля самой новости, который берётся из объекта News->newsId
$news[] = new News('Author', 'HeaderNews', 'Text'); 
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