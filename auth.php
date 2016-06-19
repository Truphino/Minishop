<?php
session_start();
function auth($login, $passwd)
{
  if (!file_exists("./private/passwd"))
    return FALSE;
  $str = file_get_contents("./private/passwd");
  $check = unserialize($str);
  $passwd = hash("whirlpool", $passwd);
  foreach ($check as $key => $value)
  {
    if ($check[$key]['passwd'] === $passwd)
    {
      $_SESSION['login'] = $login;
      return TRUE;
    }
  }
  return FALSE;
}
?>
