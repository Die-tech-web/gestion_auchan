<?php
  namespace App\Config\Core;

class Session
{
   private  static null |Session $session=null;

   public function start(){
    session_start();
   }

   public static function set($key, $data)
   {
       $_SESSION[$key] = $data;

   }

   public static function unset($key)
   {
       if (isset($_SESSION[$key])) {
           unset($_SESSION[$key]);
       }
   }

   public static function isset($key)
   {
       return isset($_SESSION[$key]);
   }

   public static function get($key)
   {
       if (isset($_SESSION[$key])) {
           return $_SESSION[$key];
       }
       return null;
   }
   public static function destroy($key)
    {
        session_destroy();
    }

   public static function getInstance(){
  
        
       if (self::$session === null) {
           self::$session = new Session();
       }
       return self::$session;
   }
  

  
}

