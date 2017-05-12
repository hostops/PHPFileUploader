<?php
$files = glob('uploads/');
$afiles = array();
if ($handle = opendir('uploads')) {
    while (false !== ($entry = readdir($handle))) {
        $time = filemtime("uploads/$entry");
        array_push($afiles, array('title' => "$entry", 'date' => $time));
    }
    closedir($handle);
}
foreach ($afiles as $key => $row) {
    $title[$key] = $row['title'];
    $date[$key] = $row['date'];
}
array_multisort($date, SORT_DESC, $title, SORT_ASC, $afiles);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="keywords" content="Datoteke, Za, Prenos, Jakob, Hostnik, net, 23, free, zastonj">
        <meta name="description" content="Prenašanje javnih datotek na server brezplačno.">
        <meta name="author" content="Jakob Hostnik">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Naloži datoteke</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="styles/site.css" rel="stylesheet">
        <script src="scripts/jquery-1.12.0.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="scripts/site.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">Nalaganje datotek</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <!-- upload files-->
            <div class="panel panel-default">
                <div class="panel-heading">Naloži datoteko</div>
                <div class="panel-body">
                    <div class="row">
                        <input class="col-sm-7 col-xs-7 col-md-3  visible-xs-block visible-sm-inline-block visible-md-inline visible-lg-inline" value="Back" type="button"  onClick="window.history.go(-2);" />&nbsp
                        <input class="col-sm-7 col-xs-7 col-md-3  visible-xs-block visible-sm-inline-block visible-md-inline visible-lg-inline" value="Open in new window" type="button"  onClick="var win = window.open(location.href, '_blank'); win.focus();" />
                    </div>
                    <br/>
                    <form class="row" id="uploadForum" action="upload.php" method="post" enctype="multipart/form-data">
                        <input class="col-sm-7 col-xs-7 col-md-3  visible-xs-block visible-sm-inline-block visible-md-inline visible-lg-inline" type="file" name="fileToUpload" id="fileToUpload" required/>&nbsp
                    </form>
                </div>
            </div>
            <!-- show-->
            <div class="panel panel-default">
                <div class="panel-heading">Datoteke</div>
                <div class="list-group">
                    <?php
                    foreach ($afiles as $file) {
                        if ($file["title"] == '.' || $file["title"] == "..") {
                            continue;
                        }
                        printf('<a class="list-group-item" href="uploads/%1$s" target="blank"><span class="badge">%2$s</span>%1$s</a>', $file["title"], date('F d Y, H:i:s', $file["date"]));
                    }
                    ?>
                </div>
            </div>
            <!--end-->
            <p><span class="label label-info">info</span>Spletno aplikacijo je izdelal Jakob Hostnik <a href="mailto:jakob.hostnik@gmail.com">jakob.hostnik@gmail.com</a> </p>
            <div id="loginDiv">
                <div class="container">
                    <div class="input-group">
                        <input id="passwordNumber" type="number" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                    </div>
                    <div class="btn-group btn-group-justified" role="toolbar" aria-label="...">
                        <div class="btn-group" role="group"><button type="button" class="btn btn-default">1</button></div>
                        <div class="btn-group" role="group"><button type="button" class="btn btn-default">2</button></div>
                        <div class="btn-group" role="group"><button type="button" class="btn btn-default">3</button></div>
                    </div>
                    <div class="btn-group btn-group-justified" role="toolbar" aria-label="...">
                        <div class="btn-group" role="group"><button type="button" class="btn btn-default">4</button></div>
                        <div class="btn-group" role="group"><button type="button" class="btn btn-default">5</button></div>
                        <div class="btn-group" role="group"><button type="button" class="btn btn-default">6</button></div>
                    </div>
                    <div class="btn-group btn-group-justified" role="toolbar" aria-label="...">
                        <div class="btn-group" role="group"><button type="button" class="btn btn-default">7</button></div>
                        <div class="btn-group" role="group"><button type="button" class="btn btn-default">8</button></div>
                        <div class="btn-group" role="group"><button type="button" class="btn btn-default">9</button></div>
                    </div>
                    <div class="btn-group btn-group-justified" role="toolbar" aria-label="...">
                        <div class="btn-group" role="group"><button type="button" class="btn btn-default">0</button></div>
                    </div>
                    <div class="btn-group btn-group-justified" role="toolbar" aria-label="...">
                        <div class="btn-group" role="group"><button type="button" class="btn btn-default">Delete</button></div>
                    </div>
                    <div class="btn-group btn-group-justified" role="toolbar" aria-label="...">
                        <div class="btn-group" role="group"><button type="button" class="btn btn-default">Submit</button></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
