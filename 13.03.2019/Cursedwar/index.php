<?php
    /*
    Page name : index.php
      Description : main page of the website
      Author : Luca Prudente
      */
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>CURSEDWAR - HOMEPAGE</title>
      <meta name="description" content="Description de la page" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="assets/scss/main.css">
      <link href="https://fonts.googleapis.com/css?family=Cabin+Sketch" rel="stylesheet">
      <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
      <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    </head>
    <body>
      <!--mainPage-->
        <div class="page-homepage">
          <!--header-->
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="images/doodle_war_logo.png" alt="logo CURSEDWAR" id="logo" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pageTitle">
                                <h1>CURSEDWAR</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <!--/header-->
          <!--introduction-->
            <div class="introduction">
                <div class="container">
                    <div class="row">
                        <p>Welcome to <a href="#">CURSEDWAR </a>!</p> <br>
                        <p>Please Login or Sign-in</p>
                        <div class="connexion">
                          <div class="tab">
                            <button class="onglet" onclick="openTab(event, 'onglet1')" id="default">sign-in</button>
                            <button class="onglet" onclick="openTab(event, 'onglet2')">login</button>
                          </div>
                          <!-- #collumn -->
                          <div class="col-md-4">
                          </div>
                          <div class="col-md-4">
                            <div class="onglet">
                              <!-- #collumn -->
                              <div id="onglet1" class="content">
                                    <h2>Sign-in</h2><br>
                                    <form id="Sign-inForm" action="traitement.php" method="post">
                                      <input type="text" name="signIn" value="1" hidden >
                                      <label for="email">Adresse mail:</label><br>
                                      <input type="email" id="emailSignin" name="email" value=""><br><br>
                                      <label for="pseudo">Pseudo:</label><br>
                                      <input type="text" id="pseudoSignin" name="pseudo" value=""><br><br>
                                      <label for="password">Mot de passe :</label><br>
                                      <input type="password" id="passwordSignin" name="password" value=""><br><br>
                                      <label for="confirmPassword">Confirmez mot de passe :</label><br>
                                      <input type="password" id="confirmPasswordSignin" name="confirmPassword"><br><br>
                                      <input type="button" onclick="checkFieldsSingin()" value="Sign-in">
                                    </form>
                                    <p id="signinFormFalse" style="display:none; color:red;">Please fill all the fields !</p>
                              </div>
                            <!-- /collumn -->
                            <!-- #collumn -->
                              <div id="onglet2" class="content">
                                    <h2>login</h2><br>
                                    <form id="LoginForm" action="traitement.php" method="post">
                                      <label for="emailPseudo">Adresse mail ou pseudo :</label><br>
                                      <input type="text" id="emailPseudo" name="emailPseudo" value=""><br><br>
                                      <label for="password">Mot de passe :</label><br>
                                      <input type="password" id="password" name="password" value=""><br><br>
                                      <input type="button" onclick="checkFieldsLogin()" value="Login">
                                      <input type="number" name="login" value="1" hidden>
                                    </form>
                                    <p id="loginFormFalse" style="display:none; color:red;">Please fill all the fields !</p>
                              </div>
                            <!-- /collumn -->
                            </div>
                          </div>
                          <div class="col-md-4">
                          </div>
                        </div>
                    </div>
                </div>
            </div>
          <!--/introduction-->

          <!--alert-->
          <div class="alert">
              <?php
              $error = isset($_GET['error'])?$_GET['error']:'';

              if($error != ''){
                if($error == "emailtaken"){
                  echo '<div class="container" id="emailalert">
                          <div class="row">
                            <div class="alert alert-danger" class"alignMiddle" role="alert">
                              <div class="col-md-2">
                              </div>
                              <div class="col-md-8">
                                  <p>This email is already taken ! Please chose another one or try to login with it !</p>
                              </div>
                              <div class="col-md-2">
                                <button type="button" id="emailalert" onclick="hideEmailAlert()">x</button>
                              </div>
                            </div>
                          </div>
                        </div>';
                }
                elseif ($error == "pseudotaken"){
                  echo '<div class="container" id="pseudoalert">
                          <div class="row">
                            <div class="alert alert-danger" class"alignMiddle" role="alert">
                              <div class="col-md-2">
                              </div>
                              <div class="col-md-8">
                                  <p>This pseudo is already taken ! Please chose another one !</p>
                              </div>
                              <div class="col-md-2">
                                <button type="button" id="pseudoalert" onclick="hidePseudoAlert()">x</button>
                              </div>
                            </div>
                          </div>
                        </div>';
                }
                elseif ($error == 'passwordNonSimilaire'){
                  echo "<div class='container' id='passwordalert'>
                          <div class='row'>
                            <div class='alert alert-danger' class'alignMiddle' role='alert'>
                              <div class='col-md-2'>
                              </div>
                              <div class='col-md-8'>
                                  <p>The given passwords don't match! Please make sure they do!</p>
                              </div>
                              <div class='col-md-2'>
                                <button type='button' id='passwordalert' onclick='hidePasswordAlert()'>x</button>
                              </div>
                            </div>
                          </div>
                        </div>";
                }
                elseif ($error == 'badPassword'){
                  echo "<div class='container' id='badPasswordalert'>
                          <div class='row'>
                            <div class='alert alert-danger' class'alignMiddle' role='alert'>
                              <div class='col-md-2'>
                              </div>
                              <div class='col-md-8'>
                                  <p>The given passwords is wrong! Please try again!</p>
                              </div>
                              <div class='col-md-2'>
                                <button type='button' id='badPasswordalert' onclick='hideBadPasswordAlert()'>x</button>
                              </div>
                            </div>
                          </div>
                        </div>";
                }
              }
              ?>
          </div>
          <!--/alert-->
          <!--content-->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>
          <!--/content-->
          <!-- #footer -->
          <div class="footer">
              <div class="container">
                  <div class="row">
                      <!--#collumn-->
                      <div class="col-md-2">
                          <a href="index.html"><img class="logo_footer" src="images/doodle_war_logo.png"></a>
                      </div>
                      <!--/collumn-->

                      <!--#collumn-->
                      <div class="col-md-8">
                        <div class="footerCenter">
                          <p>CURSEDWAR</p>
                        </div>
                      </div>
                      <!--#collumn-->
                      <div class="col-md-2" id="right_logo_footer">
                          <a href="index.html"><img class="logo_footer" src="images/doodle_war_logo.png"></a>
                      </div>
                      <!--/collumn-->

                  </div>
              </div>
          </div>
          <!-- /footer -->
        </div>
      <!--/mainPage-->
      <!--scripts-->
      <script>
    		// fonction javascript qui permet de recevoir un id, mettre à jour le champs du formulaire de suppression
    		// et poster le formulaire de suppression
    		function checkFieldsLogin()
    		{
    			var formCheck = true;
          var colorFalse = '#f2dede'
    			if (document.getElementById('emailPseudo').value == '') {
    				document.getElementById('emailPseudo').style.backgroundColor = colorFalse;
    				formCheck = false;
    			}

    			if (document.getElementById('password').value == '') {
    				document.getElementById('password').style.backgroundColor = colorFalse;
    				formCheck = false;
    			}

    			if (formCheck) {
    				document.getElementById('LoginForm').submit();
    			}else
          {
            document.getElementById('loginFormFalse').style.display = "block";
          }
    		}

        function checkFieldsSingin()
    		{
    			var formCheck = true;
          var colorFalse = '#f2dede'

    			if (document.getElementById('emailSignin').value == '') {
    				document.getElementById('emailSignin').style.backgroundColor = colorFalse;
    				formCheck = false;
    			}

          if (document.getElementById('pseudoSignin').value == '') {
    				document.getElementById('pseudoSignin').style.backgroundColor = colorFalse;
    				formCheck = false;
    			}

    			if (document.getElementById('passwordSignin').value == '') {
    				document.getElementById('passwordSignin').style.backgroundColor = colorFalse;
    				formCheck = false;
    			}

    			if (document.getElementById('confirmPasswordSignin').value == '') {
    				document.getElementById('confirmPasswordSignin').style.backgroundColor = colorFalse;
    				formCheck = false;
    			}

    			if (formCheck) {
    				document.getElementById('Sign-inForm').submit();
    			}
          else
          {
            document.getElementById('signinFormFalse').style.display = "block";
          }
    		}

        function hideEmailAlert(){
          document.getElementById('emailalert').style.display ="none";
        }

        function hidePseudoAlert(){
          document.getElementById('pseudoalert').style.display ="none";
        }

        function hidePasswordAlert(){
          document.getElementById('passwordalert').style.display ="none";
        }

        function hideBadPasswordAlert(){
          document.getElementById('badPasswordalert').style.display ="none";
        }

        function openTab(evt, onglet) {
          var i, content, tab;
          content = document.getElementsByClassName("content");
          for (i = 0; i < content.length; i++) {
              content[i].style.display = "none";
          }
          tab = document.getElementsByClassName("onglet");
          for (i = 0; i < tab.length; i++) {
              tab[i].className = tab[i].className.replace(" active", "");
          }
          document.getElementById(onglet).style.display = "block";
          evt.currentTarget.className += " active";
        }

          document.getElementById("default").click();

      </script>

    </body>
</html>
