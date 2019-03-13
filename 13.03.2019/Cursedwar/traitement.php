<?php
  session_start();

  require_once('includes/config.php');

  $email = isset($_POST['email'])?$_POST['email']:'';
  $emailPseudo = isset($_POST['emailPseudo'])?$_POST['emailPseudo']:'';
  $pseudo = isset($_POST['pseudo'])?$_POST['pseudo']:'';
  $password = isset($_POST['password'])?$_POST['password']:'';
  $confirmPassword = isset($_POST['confirmPassword'])?$_POST['confirmPassword']:'';
  $encryptedpassword = md5($password);
  $level = 'stdrUsr';
  $message = isset($_POST['message'])?$_POST['message']:'';
  $answer = isset($_POST['answer'])?$_POST['answer']:'';

  if(isset($_POST['signIn'])){
    try
    {

      // préparation de la requete préparée (Prepared Statment)

      $emailcheck = $db->prepare("SELECT *  FROM compte WHERE email=:email");
      $emailcheck->bindParam(":email", $email);
      $emailcheck->execute();

      $usernamecheck = $db->prepare("SELECT * FROM compte WHERE pseudo=:pseudo");
      $usernamecheck->bindParam(":pseudo", $pseudo);
      $usernamecheck->execute();
      //$stmt = $db->query("SELECT password FROM compte WHERE password = '$encryptedpassword'");

      if ($emailcheck->rowCount() > 0){
        header('location:index.php?error=emailtaken');
      }
      elseif ($usernamecheck->rowCount() > 0){
        header('location:index.php?error=pseudotaken');
      }elseif ($password != $confirmPassword){
        header('location:index.php?error=passwordNonSimilaire');
      }else{
        $createAccount = $db->prepare("INSERT INTO compte (email, pseudo, password, level) VALUES (:email, :pseudo, :password, :level)" );

        $createAccount->bindParam(":email", $email);
        $createAccount->bindParam(":pseudo", $pseudo);
        $createAccount->bindParam(":password", $encryptedpassword);
        $createAccount->bindParam(":level", $level);
        $createAccount->execute();

        $select = $db->prepare("SELECT id_compte FROM compte WHERE pseudo=:pseudo");
        $select->bindParam(":pseudo", $pseudo);
        $select->execute();
        $selectIdCompte = $select->fetch(PDO::FETCH_OBJ);

        $id_compte = $selectIdCompte->id_compte;
        $points = 0;

        $newPlayer = $db->prepare("INSERT INTO points ( points, id_compte) VALUES (:points, :id_compte)" );
      	$newPlayer->bindParam(':points', $points);
        $newPlayer->bindParam(':id_compte', $id_compte);

        $newPlayer->execute();
        header('location:index.php');
      }

    }
    catch(PDOException $e){
      die('Une erreur est survenue ! ' . $e->getMessage());
    }
  }

  if(isset($_POST['login']))
  {
    try
    {
    	// préparation de la requete préparée (Prepared Statment)
    	$requete = "SELECT * FROM compte WHERE (pseudo=? OR email=?) AND password=?";
    	$stmt = $db->prepare($requete);
    	$stmt->bindParam(1, $emailPseudo);
      $stmt->bindParam(2, $emailPseudo);
    	$stmt->bindParam(3, $encryptedpassword);   // ATTENTION on bind en convertissant en MD5 ce qui est reçu

    	$stmt->execute();

    	if ($stmt->rowCount() > 0) {
    		// login effectué avec succès ! on a trouvé un utilisateur correspondant
    		// mise en session
    		$curUsr = $stmt->fetch(PDO::FETCH_OBJ);
        $_SESSION['level'] = $curUsr->level;
    		$_SESSION['id_compte'] = $curUsr->id_compte;
    		$_SESSION['email'] = $curUsr->email;
    		$_SESSION['pseudo'] = $curUsr->pseudo;
    		$_SESSION['password'] = $curUsr->password;

        header('location:session.php');
    	}
    	else
    	{
    		header('location:index.php?error=badPassword');
    	}
    }
    catch(PDOException $e)
    {
    	die('Une erreur est survenue ! ' . $e->getMessage());
    }
  }

  if(isset($_POST['sendChat'])){
    try
    {
      $id_compte =  $_SESSION['id_compte'];

      $sendChat = $db->prepare("INSERT INTO chat (message, id_compte) VALUES (:message, :id_compte)");
      $sendChat->bindParam(":message", $message);
      $sendChat->bindParam(":id_compte", $id_compte);
      $sendChat->execute();

    }
    catch(PDOException $e){
      die('Une erreur est survenue ! ' . $e->getMessage());
    }
  }

  if (isset($_POST['compareAnswer']))
    {
      try
        {
          $id_compte =  $_SESSION['id_compte'];
          $imageName = $_SESSION['imageName'];

          if ($answer == $imageName) {
            $getPoints = $db->prepare("SELECT points FROM points WHERE id_compte=:id_compte");
            $getPoints->bindParam(":id_compte", $id_compte);
            $getPoints->execute();
            $curPnts = $getPoints->fetch(PDO::FETCH_OBJ);
            $curentPoints = $curPnts ->points;
            $curentPoints += 10;

            $updatePoints = $db->prepare("UPDATE points SET points=:points WHERE id_compte=:id_compte");
            $updatePoints->bindParam(":points", $curentPoints);
            $updatePoints->bindParam(":id_compte", $id_compte);
            $updatePoints->execute();
            echo "$imageName $answer ";
          }

      }
      catch(PDOException $e){
        die('Une erreur est survenue ! ' . $e->getMessage());
      }
    }

  if (isset($_POST['loadImage']))
    {
      try
        {
        $numeroImage = rand (1, 10);

        $loadImage = $db->prepare("SELECT * FROM images WHERE id_image=:id_image");
        $loadImage->bindParam(":id_image", $numeroImage);
        $loadImage->execute();

        $curImg = $loadImage->fetch(PDO::FETCH_OBJ);

        $imageId = $curImg->id_image;
        $imageName = $curImg->nom;
        $imageUrl = $curImg->url;

        $_SESSION['imageName'] = $imageName;

        echo "<img src='$imageUrl'>";
      }
      catch(PDOException $e){
        die('Une erreur est survenue ! ' . $e->getMessage());
      }
    }

    if (isset($_POST['disconnect']))
      {
        session_destroy();
        $_SESSION= array();

        header('location:index.php');
      }
?>
