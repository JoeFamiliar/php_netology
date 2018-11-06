<?php 
class News {
	private $author;
	private $newsheader;
	private $text;
	private $date;

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

	public function __construct($comment){
		$this->comment = $comment;
	}
}

$arr_comments[] = new Comment('blah blah');
$news[] = new News(); //но тут тоже нужно через констракт и передавать данные для каждого нового элемента
?>
<html>
	<head>
		<meta content="text/html; charset=utf-8">
	</head>
	<body>
	<?php 
	// тут останется перебирать массив объектов $news и вытягивать значения переменных для заполнения соответствующих полей каждого нового облака новости, состоящего из h1 getHeader(), самой новости getText(), автора статьи/новости getAuthor() и даты getDate() ( которая при констракте должна браться текущей через функцию date()) и ниже все комментарии к этой новости. Плюс нужно будет делать для каждой новости свой массив объектов комментариев, а то будет общий для каждой новости. Нужно доработать этот момент
	?>
	</body>
</html>