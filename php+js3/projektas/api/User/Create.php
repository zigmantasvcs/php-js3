<?php
  require_once "loader.php";

  $userService = new UserService();
  $user=get_user($_POST); // perduodam asociatyvini masyva
  echo $userService->create($user);
  exit(0);
  
  function get_user($post)
  {
    if(!isset($post["usernames"])){
      return null;
    }
    if(!isset($post["passwords"])){
      return null;
    }
    if(!isset($post["names"])){
      return null;
    }
    if(!isset($post["surnames"])){
      return null;
    }
    if(!isset($post["birthdays"])){
      return null;
    }

    return new User(
      $post["name"],
      $post["surname"],
      $post["username"],
      $post["password"],
      $post["birthday"]
    );
  }

 ?>
