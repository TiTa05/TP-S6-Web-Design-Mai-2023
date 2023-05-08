<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />


    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="description" content="Cet article présente les dernières avancées en matière d'intelligence artificielle et explore les différentes applications de l'IA dans divers domaines.">
    <meta name="keywords" content="intelligence artificielle, IA, avancées, applications">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">


    <title>Affichage complet d'un article sur l'IA</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="assets2/assets/css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&amp;display=swap" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="assets2/assets/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="assets2/assets/css/responsive.css" rel="stylesheet" />
</head>

<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('user.Header')
    <!-- end header section -->
  </div>
  <h1 style="text-decoration: underline">Voici les detailles complet de l'article consulter</h1>
  <h2>{{$article->titre}}</h2>
  <div style=" width: 100%;
    height: 200px;
    overflow: hidden;">
  <img  src="{{$article->image}}">
  </div>
  <h3>Description: </h3>
  <p>{{$article->description}}</p>
</body>
</html>