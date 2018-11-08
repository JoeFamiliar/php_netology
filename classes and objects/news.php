<?php 
class News 
{
    private $author;
    private $title;
    private $newsText;
    private $createdAt;
    private $newsId
    private static $newsCount = 0;

    public function __construct()
    {
        $this->createdAt = date("m.d.y");
        self::$newsCount++;
        $this->newsId = self::$newsCount;
    }

    public function setAuthor(string $author)
    {
        $this->author = $author;
    }
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    public function setNewsText(string $newsText)
    {
        $this->newsText = $newsText;
    }

    public function addComment(string $text)
    {
        
    }

    public function getAuthor()
    {
        return $this->author;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getNewsText()
    {
        return $this->newsText;
    }
    public function getCreationDate()
    {
        return $this->createdAt;
    }

    public function getComments($arrComments)
    {
        if(!empty($arrComments)){
            $comments = [];
            foreach ($arrComments as $comment) 
            {
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
    private $commentsArr = [];

    public function __construct($comment, $idNews)
    {
        $this->commentText = $comment;
        $this->idNews = $idNews;
        $this->commentsArr[] = $comment;
    }
}

$newComment = new Comment('comment', 'idNews'); // не знаю, как лучше его передать в класс News, обратиться через global? сами значения будут заполняться при нажатии пользователем кнопки "отправить", где comment это набранный юзером текст, а idNews из скрытого поля самой новости, который берётся из объекта News->newsId
$news[] = new News('Author', 'Title', 'Text'); // где данные будут передаваться из полей формы добавления новости
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