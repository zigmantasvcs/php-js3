<?php
  /**
   *
   */
  class UserService implements iOperations
  {
    function __construct()
    {
      # code...
    }

    public function create($user)
    {
      if($user == null){
        $response = new Response(3, "User parametras null", null);
        return json_encode($response);
      }

      $conn = ConnectionFactory::GetConnection();

      if($conn == null){
        $response = new Response(4, "conn null", null);
        return json_encode($response);
      }

      if($stmt = $conn->prepare("INSERT INTO users (username, password, name, surname, birthday, created, updated) VALUES (?, ?, ?, ?, ?, NOW(), NOW())")){

        $stmt->bind_param("sssss",
          $username,
          $password,
          $name,
          $surname,
          $birthday
        );

        $username = $user->username;
        $password = $user->password;
        $name = $user->name;
        $surname = $user->surname;
        $birthday = $user->birthday;

        if($stmt->execute()){
          $response = new Response(0, "OK", null);
          return json_encode($response);
        }
        else{
          $response = new Response(1, "Problemos paleidžiant skriptą", null);
          return json_encode($response);
        }
      }
      else{
        $response = new Response(2, "MySQL sintaksės klaida", null);
        return json_encode($response);
      }
    }

    public function read($username=null)
    {
      # code...prisijungimo prie db logika ir nuskaitymas
    }

    public function update($user)
    {
      # code...prisijungimo prie db logika ir atnaujinimas
    }

    public function delete($username)
    {
      # code...prisijungimo prie db logika ir panaikinimas
    }

  }

 ?>
