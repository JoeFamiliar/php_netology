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
?>