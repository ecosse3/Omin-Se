<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1E88E5" />
    <!-- Apple manifest-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" href="img/ominse.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/ominse-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/ominse-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/ominse-152.png">
    <link rel="apple-touch-startup-image" href="img/ominse.png">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="omin-se">
    <title>Omin-se</title>
    <link rel="manifest" href="manifest.json">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/bottom-nav.min.css" rel="stylesheet">

</head>

<body>
<nav class="navbar fixed-bottom navbar-dark grey">
    <!-- Map Nav -->
    <a class="no-labels-nav__action" href="index.html">
        <svg class="no-labels-nav__icon" viewBox="0 0 20 20">
            <path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM15 19l-6-2.11V5l6 2.11V19z"></path>
        </svg>
    </a>

    <!-- Events Nav -->
    <a class="no-labels-nav__action active" href="#">
        <svg class="no-labels-nav__icon" viewBox="0 0 20 20">
            <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2zm-2 1H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6z"></path>
        </svg>
    </a>

    <a class="no-labels-nav__action" href="add.html">
        <svg class="no-labels-nav__icon" viewBox="0 0 20 20">
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
        </svg>
    </a>


    <a class="no-labels-nav__action" href="settings.html">
        <svg class="no-labels-nav__icon" viewBox="0 0 20 20">
            <path d="M15.95 10.78c.03-.25.05-.51.05-.78s-.02-.53-.06-.78l1.69-1.32c.15-.12.19-.34.1-.51l-1.6-2.77c-.1-.18-.31-.24-.49-.18l-1.99.8c-.42-.32-.86-.58-1.35-.78L12 2.34c-.03-.2-.2-.34-.4-.34H8.4c-.2 0-.36.14-.39.34l-.3 2.12c-.49.2-.94.47-1.35.78l-1.99-.8c-.18-.07-.39 0-.49.18l-1.6 2.77c-.1.18-.06.39.1.51l1.69 1.32c-.04.25-.07.52-.07.78s.02.53.06.78L2.37 12.1c-.15.12-.19.34-.1.51l1.6 2.77c.1.18.31.24.49.18l1.99-.8c.42.32.86.58 1.35.78l.3 2.12c.04.2.2.34.4.34h3.2c.2 0 .37-.14.39-.34l.3-2.12c.49-.2.94-.47 1.35-.78l1.99.8c.18.07.39 0 .49-.18l1.6-2.77c.1-.18.06-.39-.1-.51l-1.67-1.32zM10 13c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"></path>
        </svg>
    </a>
</nav>

<!-- Content -->
<main>
    <section>
        <div class="container">

            <div class="row mt-5 mb-6">

                <?php
                require_once("php/config.php");

                $query = mysqli_query($conn, "Select id, description, edate from events order by edate desc");
                while ($record = mysqli_fetch_array($query))
                {
                    $eid = $record['id'];
                    $eds = $record['description'];
                    $edate = $record['edate'];

                    echo '
    <div class="col-lg-12 col-12 mx-lg-4">
            <div class="row pb-3">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body mobile-centered mx-4">

                    <div class="row my-3">

                      <div class="col-md-6">

                        <p class="card-title"><i class="fas fa-tags mr-2"></i>';
                    $q2 = mysqli_query($conn, "Select tags.name as tag from tags inner join evetag on evetag.fk_id_tag = tags.id where evetag.fk_id_event = '$eid'");
                    while ($r2 = mysqli_fetch_array($q2))
                    {
                        echo $r2['tag']." | ";
                    }
                    echo'</p>
                        <p class="card-text">'.$eds.'</p>
                        <div class="flex-row">
                          <a class="card-link"><i class="far fa-clock mr-1"></i>'.$edate.'</a>
                          <a class="card-link"><i class="fas fa-route mr-1"></i> '.rand(10, 50).' m od Ciebie</a>
                        </div>
                      </div>

                      <div class="col-md-6 vote-buttons">

                        <a href="#"><img src="img/negative-vote.png" alt="Zagłosuj przeciwko" class="vote-icon negative"></a>
                        <a href="#"><img src="img/positive-vote.png" alt="Zagłosuj za" class="vote-icon positive"></a>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>
    ';


                }

                ?>

            </div>

        </div>


    </section>
</main>

<!-- Snackbar update -->
<div id="snackbar">Nowa wersja aplikacji jest dostępna. <a id="reload">Kliknij tutaj aby zaktualizować.</a></div>

<!-- SCRIPTS -->
<script src="https://www.gstatic.com/firebasejs/5.9.0/firebase.js"></script>
<script src="token.js"></script>
<script src="app.js"></script>
<!-- JQuery -->
<script src="js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap tooltips -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script src="js/mdb.js"></script>
<!-- Snackbar -->
<script src="js/snackbar.js"></script>
<!-- /SCRIPTS -->
<script>
    $(function() {
        $('.vote-buttons .vote-icon').click(function() {
            $(this).attr('src', "img/checked-vote.png");
            $(this).css('transform', "rotate(0deg)");
            $(this).parent().prev().css("display","none");
            $(this).parent().next().css("display","none");
            return false;
        });
    });
</script>
</body>

</html>
