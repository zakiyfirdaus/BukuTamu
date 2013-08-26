<!--halaman utama buku tamu-->
<!DOCTYPE html>
<html>
    <head>
        <title>Buku Tamu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS yang digunakan -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />

    </head>
    <body style="background-color: #282829">
        <div class="container" >
            <a name="awal" id="awal">
                <!--menu dan navigasi-->
                <nav class="navbar navbar-default" role="navigation" id="awal-nav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="">Buku Tamu</a>
                    </div>
                    <!--navigasi scroll-->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li><a id="scroll-isi">Isi Buku Tamu</a></li>
                            <li><a id="scroll-bukutamu">Lihat Buku Tamu</a></li>

                        </ul>
                    </div>
                </nav>
            </a>

            <a name="isi" id="isi" value="">
                <div class="jumbotron" id="isi-div">
                    <!--bagian form pengisian buku tamu-->
                    <?php require 'form.php'; ?>
                </div>
            </a>
            <a  name="bukutamu" id="bukutamu">
                <div class="jumbotron" >
                    <!--bagian tampilan buku tamu-->
                    <div id="bukutamu-div" value="">
                        <?php require 'guestbook.php'; ?>
                    </div>
                    <!--navigasi ke atas-->
                    <div id="bottom-nav">
                        <a id="scroll-awal"><button class="btn btn-primary" style="width: 100% " onclick="ajax('guestbook.php')">Kembali</button></a>
                    </div>
                </div>
            </a>
            <br>
            <br>
            <div id="bottom-name">zfa</div>
        </div>    
        
        <!--script-script yang digunakan-->
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/util.js" charset="utf-8"></script>
    </body>

</html>