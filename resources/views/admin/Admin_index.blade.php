<html>

<head>
    <title>Connexion administrateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/Login/bootstrap/css/bootstrap.min.css">
    
</head>

<body style=" display: flex;
    align-items: center;
    justify-content: center;">

    <div class="login-container" style="width:300px;border: 2px solid black;
    border-radius: 10px;
    padding: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;">

        <div class="image-holder" style="background: url(&quot;assets/Login/img/RH.jpg;&quot;);"></div>
        <form action="{{url('/log_admin')}}" method="post">
            {{ csrf_field() }}
            <h2 class="text-center" style="margin-top: 25%;"><strong>Connexion Admin</strong></h2>
            <div class="form-group mb-3"><input class="form-control" type="text" name="mail" value="tita@gmail.com" required placeholder="Email"></div>
            <div class="form-group mb-3"><input class="form-control" type="password" id="password" name="mdp" value="tita" placeholder="Mot de passe"></div>

            <div id="passwordsError" style="display: none;margin-bottom: 16.5px;"><span id="errorMessage" class="text-danger" style="font-size:13px;"></span></div>
            <div class="form-group mb-3"><button class="btn btn-primary d-block" id="submitButton" type="submit" style="color: rgb(255,255,255);font-weight: bold;">SE CONNECTER</button></div>
            @IF (isset($erreur))
            <div class="alert alert-success flash animated" role="alert" style="background: rgb(255,255,255);text-align: center;border-style:none;"><span style="color: var(--bs-red);"><i class="fas fa-exclamation"></i><strong>&nbsp;</strong>{{$erreur}}</span></div>
            @ENDIF
        </form>
        <a href="{{ url('/vers_user') }}">Front Office</a>

    </div>

    <script src="assets/Login/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/Login/js/bs-init.js"></script>

</body>

</html>