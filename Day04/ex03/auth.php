<?php
   function auth($login, $passwd) {
       $db = unserialize(file_get_contents("../private/passwd"));
       for ($i = 0; $db[$i]; $i++)
           if ($db[$i]['login'] == $login)
               $indb = $i + 1;
       $dbhashedpw = $db[$indb - 1]['passwd'];
       $hashedpasswd = hash('whirlpool', $passwd);
       if (!$indb || ($hashedpasswd != $dbhashedpw))
           return (0);
       return (1);
   }
?>