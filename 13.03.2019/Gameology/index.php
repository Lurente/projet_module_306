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
      <title>Gameology - HOMEPAGE</title>
      <meta name="description" content="Description de la page" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="assets/scss/main.css">
      <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Russo+One" rel="stylesheet">
    </head>
    <body>
      <!--mainPage-->
        <div class="page-homepage">
          <!--header-->
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="images/Gameology_logo.png" alt="logo Gameology" id="logo" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pageTitle">
                                <h1>GAMEOLOGY</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="nav">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="#" id="current" title="GAMEOLOGY homepage">HOME</a>
                                    </li>
                                    <li>
                                        <a href="news.php" title="news and update notes">NEWS</a>
                                    </li>
                                    <li>
                                        <a href="aboutme.php" title="Infos">ABOUT ME</a>
                                    </li>
                                    <li>
                                        <a href="games.php" title="Game list">GAMES</a>
                                    </li>
                                    <li>
                                        <a href="contact.php" title="Contact me !">CONTACT</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
          <!--/header-->
          <!--introduction-->
            <div class="introduction">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Welcome to <a href="#">GAMEOLOGY </a>!</p> <br>
                            <p>Last games added :</p>
                        </div>
                    </div>
                </div>
            </div>
          <!--/introduction-->
          <!--content-->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="gameCarousel" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#gameCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#gameCarousel" data-slide-to="1"></li>
                                    <li data-target="#gameCarousel" data-slide-to="2"></li>
                                </ol>

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="images/gallery_10.jpg" alt="">
                                    </div>

                                    <div class="item">
                                        <img src="images/gallery-8.jpg" alt="">
                                    </div>

                                    <div class="item">
                                        <img src="images/gallery_7.jpg" alt="">
                                    </div>
                                </div>

                                <!-- controls -->
                                <a class="left carousel-control" href="#gameCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#gameCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
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
                      <div class="col-md-3">
                          <a href="index.html"><img class="logo_footer" src="images/Gameology_logo.png"></a>
                      </div>
                      <!--/collumn-->

                      <!--#collumn-->
                      <div class="col-md-9">
                        <div class="foot_nav">
                          <ul>
                              <li>
                                  <a href="#" id="current" title="GAMEOLOGY homepage">HOME</a>
                              </li>
                              <li>
                                  <a href="news.php" title="news and update notes">NEWS</a>
                              </li>
                              <li>
                                  <a href="aboutme.php" title="Infos">ABOUT ME</a>
                              </li>
                              <li>
                                  <a href="games.php" title="Game list">GAMES</a>
                              </li>
                              <li>
                                  <a href="contact.php" title="Contact me !">CONTACT</a>
                              </li>
                          </ul>
                        </div>
                      </div>

                  </div>
              </div>
          </div>
          <!-- /footer -->
        </div>
      <!--/mainPage-->
    </body>
</html>
