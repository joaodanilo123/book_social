<?php
  

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta nome="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/Estilo.css">
        <title>SORVIL</title>
    </head>
    <body>
        <div class="nome text-center">
            <h1>SORVIL</h1>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light cor1">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">SORVIL</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Livros</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                      Opçoes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="#emprendedorismo">Emprendedorismo</a></li>
                      <li><a class="dropdown-item" href="#manga">Mangas</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#programa">Programação</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Plano</a>
                  </li>
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>

          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img/12.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/16.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/13.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

        <div class="conteiner text-light" id="emprendedorismo">
            <h2>LIVROS EMPRENDEDORISMO</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="img/sorte.jpg" class="img-fluid" alt="...">
                </div>
                <div class="col-md-3">
                    <img src="img/milhao.jpg" class="img-fluid" alt="...">
                </div>
                <div class="col-md-3">
                    <img src="img/pai rico.jpg" class="img-fluid" alt="...">
                </div>
                <div class="col-md-3">
                    <img src="img/mindset.jpg" class="img-fluid" alt="...">
                </div>

            </div>

        </div>

        <br><br>

        <div class="conteiner text-light" id="manga">
            <h2>LIVROS MANGAS</h2>
        </div>
        

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="img/nanatsu.jpg" class="img-fluid" alt="...">
                </div>
                <div class="col-md-3">
                    <img src="img/naruto.jpg" class="img-fluid" alt="...">
                </div>
                <div class="col-md-3">
                    <img src="img/dbz.jpg" class="img-fluid" alt="...">
                </div>
                <div class="col-md-3">
                    <img src="img/one.jpg" class="img-fluid" alt="...">
                </div>
            
        </div>
        </div>

        <br><br>

        <div class="conteiner text-light" id="programa">
            <h2>LIVROS COMPUTAÇÃO</h2>
        </div>
       

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="img/css.jpg" class="img-fluid" alt="...">
                </div>
                <div class="col-md-3">
                    <img src="img/html.jpg" class="img-fluid" alt="...">
                </div>
                <div class="col-md-3">
                    <img src="img/java.jpg" class="img-fluid" alt="...">
                </div>
                <div class="col-md-3">
                    <img src="img/WEB.jpg" class="img-fluid" alt="...">
                </div>
            
        </div>
        </div>

    </body>
</html>