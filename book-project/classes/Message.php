<?php
class Message
{
  private $username;
  private $message;
  private $date;
  const LIMIT_USERNAME =3;
  const LIMIT_MESSAGE=10;
        public function __construct(string $username,string $message,?DateTime $date=null)
        {
          $this->username=$username;
          $this->message=$message;
          $this->date=$date?:new DateTime();

        }
        public function isValid()
        {
           return empty($this->getErrors());
        }
        public function getErrors():array
        {
          $errors=[];
              if (strlen($this->username) < self::LIMIT_USERNAME) {
                  $errors['username']="Votre pseudo est tros court";
              }
              if (strlen($this->message) <self::LIMIT_MESSAGE) {
                $errors['message']="Votre message est assez court pour etre pris en compte";
              }
              return$errors;
        }
        public function toHTML()
        {
          $username=htmlentities($this->username);
          $message=htmlentities($this->message);
          $date=$this->date->format('d/m/Y à H:i');
          return <<<HTML
  <p>
            <strong>{$username}</strong><em>le {$date}</em>{$message}
  </p>
HTML;
        }
        public function toJason():string
        {
           return  json_encode ([
                                                  'username'=>$this->username,
                                                  'message'=>$this->message,
                                                  'date'=>$this->date->getTimestamp()
                                           ]);
        }

}

?>