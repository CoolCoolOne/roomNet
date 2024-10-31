<?php

class MessageSend
{
    // Объявление свойства
    private $text = 'пустое сообщение';
    private $connectOBJ;
    private $idUser;

    // конструктор
    public function __construct(string $text, object $pdo, int $idUser)
    {
        $this->text = $text;
        $this->connectOBJ = $pdo;
        $this->idUser = $idUser;
    }

    // Объявление метода
    public function displayObject()
    {
        var_dump($this->text);
        echo "<br>";
        print_r($this->connectOBJ);
        echo "<br>";
    }

    public function emptymsgIF()
    {
        if (strlen($this->text) === 0) {
            $this->text = "я отправил без ввода текста =(";
        }
    }

    public function addToDb()
    {
        $sql = "INSERT INTO chat (author_id, text) VALUES ('$this->idUser', '$this->text')";
        $this->connectOBJ->exec($sql);
    }
}

class msgObj
	{
		public $text;
		public $author;
	}


class ChatContent
{
    // Объявление свойства
    private $connectOBJ;
    private $messages;


    // конструктор
    public function __construct(object $pdo)
    {
        $this->connectOBJ = $pdo;
    }

    // Объявление метода
    public function displayObject()
    {
        print_r($this->connectOBJ);
        echo "<br>";
    }

    public function selectFromDb()
    {
        $allMSG = $this->connectOBJ->query("SELECT * FROM chat ORDER BY date ASC ")->fetchAll();
        $this->messages = $allMSG;
        return $this->messages;
    }

    private function loadForeign($msg)
    {
        $author_id = $msg['author_id'];
        $sql = "SELECT login FROM chat INNER JOIN users ON users.id = $author_id";
        $usersTab = $this->connectOBJ->query($sql);
        $usersTab = $usersTab->fetch(PDO::FETCH_ASSOC);
        return $usersTab['login'];
    }


    public function showEach()
    {
        foreach ($this->messages as $msg) {

            $login = $this->loadForeign($msg);

            echo "<div class='mes'>
                    <div class='ava'>";
      
            echo $login.": </div>
                    <div class='text'>";



            echo $msg['text'] . "
                    </div>
                    <hr>
                  </div>";
        }
    }

    public function getArrayMessages()
    {
        $i = 0;
        $ArrayMessages = [];
        foreach ($this->messages as $msg) {
            $login = $this->loadForeign($msg);
            $msgBody = $msg['text'];

            $ArrayMessages[$i]= new msgObj;
            $ArrayMessages[$i]->text = $msgBody;
            $ArrayMessages[$i]->author = $login;

            $i++;

        }

        return $ArrayMessages = json_encode($ArrayMessages, JSON_UNESCAPED_UNICODE);
    }
}
