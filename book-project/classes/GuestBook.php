<?php
require_once "Message.php";
class GuestBook
{
  private $file;
  public function __construct(string $file)
  {
    $directory=dirname($file);
        if (!is_dir($directory)) 
        {
          mkdir($directory,0777,true);
        }
        if (file_exists($file))
        {
          touch($file);
        }
      $this->file=$file;
  }
  public function addMessage(Message $message):void
  {
        file_put_contents($this->file,$message->toJason().PHP_EOL,FILE_APPEND);
  }
  public function getMessage():array
  {
         $contents = trim($contents=file_get_contents($this->file));
         $lines = explode(PHP_EOL,$contents);
         $data=[];
         $message=[];
         foreach($lines as $line){
                $data=json_decode($line,true);
              $message[]=new Message($data['username'],$data['message'],new DateTime("@".$data['date']));
         }

        return array_reverse( $message);
  }

}

?>