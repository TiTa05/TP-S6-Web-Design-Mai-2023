<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Accueil</title>
  <link rel="stylesheet" href="assets/Acc_Admin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
  <link rel="stylesheet" href="assets/Acc_Admin/fonts/fontawesome-all.min.css">
  <link rel="stylesheet" href="assets/Acc_Admin/css/checkbox.css">
  <link rel="stylesheet" href="assets/Acc_Admin/css/style.css">
  <link rel="stylesheet" href="assets/Login/js/test.css">
</head>

<body id="page-top">
  <div id="wrapper">
    @include('admin.SideBar')
    <div class="d-flex flex-column" id="content-wrapper">
      <div id="content">
        @include('admin.Header')
        <div class="container-fluid">

          <h2>Ajouter un article </h2>

          <div class="modal-body">

            <form action="{{ url('/insererArticle') }}" method="post">

              {{ csrf_field() }}

              <label for="article_title">Titre de l'article:</label><br>
              <input Style="width: 50%;" type="text" id="article_title" name="titre"><br><br>


              <label for="article_summary">Description:</label><br>
              <textarea style="width: 100%;height: 200px;" id="article_summary" name="description"></textarea><br><br>

              <p>image :
                <input class="form-control" type="file" class="form-control" id="selectImage">
                <input type="hidden" name="image" id="imageCode">
              </p>

              <div><button class="btn btn-primary d-block" type="submit" style="background: var(--bs-green);border-style: none;">Ajouter Article</button></div>
            </form>


            <hr>

            <!-- List -->
            <div class="main">

              <h2>Liste des articles publié</h2>

              <div id="myBtnContainer">
                <button class="btn active" onclick="filterSelection('all')"> Tout</button>
                <button class="btn" onclick="filterSelection('admin')">Par l'admin</button>
                <button class="btn" onclick="filterSelection('user')"> Par l'user</button>
              </div>

              <!-- Portfolio Gallery Grid -->
              <div class="row">
                <?php $i = 0; ?>
                @foreach ($listeAdminArticle as $article)
                <div class="column admin">
                  <div class="content">
                    <div class="image-frame">
                      <img src="{{ $article->image }}" alt="Mountains">
                    </div>
                    <h4>{{ $article->titre }}</h4>
                    <p>{{ $article->resumer }}</p>
                    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$i}}">
                      voir plus
                    </button>
                  </div>
                </div>

                <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $article->titre }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        {{ $article->description }}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php $i++; ?>
                @endforeach

                @foreach ($listeUserArticle as $article)
                <div class="column user">
                  <div class="content">
                    <div class="image-frame">
                      <img src="{{ $article->image }}" alt="Mountains">
                    </div>
                    <h4>{{ $article->titre }}</h4>
                    <p>{{ $article->resumer }}</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$i}}">
                      voir plus
                    </button>
                  </div>
                </div>

                <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $article->titre }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        {{ $article->description }}
                      </div>
                      <div class="modal-footer">
                      <p>Auteur: {{$article->auteur}}</p>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php $i++; ?>
                @endforeach
                <!-- END GRID -->
              </div>

              <!-- END MAIN -->
            </div>
            <hr>

            <!-- recherche -->
            <div class="input-article">
              <form action="{{ url('/addArticle') }}" method="get">
                <h4>Rechercher un article:</h4>
                <input type="text" id="recherche" name="recherche"><br><br>
                <button class="btn btn-primary" type="submit">rechercher</button>
              </form>

              <!-- resultat recherche -->

              @if($recherche != null)
              <div class="row">
                @foreach ($recherche as $article)
                <div class="column user">
                  <div class="content">
                    <div class="image-frame">
                      <img src="{{ $article->image }}" alt="Mountains">
                    </div>
                    <h4>{{ $article->titre }}</h4>
                    <p>{{ $article->resumer }}</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$i}}">
                      voir plus
                    </button>
                  </div>
                </div>

                <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $article->titre }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        {{ $article->description }}
                      </div>
                      <div class="modal-footer">
                        @if($article->auteur!=null)
                      <p>Auteur: {{$article->auteur}}</p>
                      @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
                      </div>
                    </div>
                  </div>
                </div>
                <?php $i++; ?>
                @endforeach
              </div>
              @endif
            </div>

            <script src="Utile/uploadImg.js') ?>"></script>
            <script>
              filterSelection("all")

              function filterSelection(c) {
                var x, i;
                x = document.getElementsByClassName("column");
                if (c == "all") c = "";
                for (i = 0; i < x.length; i++) {
                  removeClass(x[i], "show");
                  if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
                }
              }

              function addClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                  if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                  }
                }
              }

              function removeClass(element, name) {
                var i, arr1, arr2;
                arr1 = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                  while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                  }
                }
                element.className = arr1.join(" ");
              }


              // Add active class to the current button (highlight it)
              var btnContainer = document.getElementById("myBtnContainer");
              var btns = btnContainer.getElementsByClassName("btn");
              for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function() {
                  var current = document.getElementsByClassName("active");
                  current[0].className = current[0].className.replace(" active", "");
                  this.className += " active";
                });
              }
            </script>
       


          </div>

        </div>
      </div>
    </div>



  </div>
  <footer class="bg-white sticky-footer">
    <div class="container my-auto">
      <div class="text-center my-auto copyright"><span>Rakotonindraina Steven Ritchie ETU001606</span></div>
    </div>
  </footer>
  </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
  </div>

 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>


</html>