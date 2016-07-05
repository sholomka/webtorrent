<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>βTorrent<span class="version ng-binding"> v0.15</span></h1>

</header>


<div style="width: 115px;">
    <label class="file_upload">
        <span class="button">Seed files</span>
        <mark>Файл не выбран</mark>
        <input type="file" name="myfile" id="myfile">
    </label>
</div>




<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Size</th>
        </tr>
        </thead>
       <tbody>
       
       </tbody>
    </table>
</div>


<!--    <form name="upload">-->
<!---->
<!--        <label class="file_upload btn btn-info">-->
<!--            <span class="button">Seed files</span>-->
<!--            <mark>Файл не выбран</mark>-->
<!--            <input type="file" name="myfile" multiple="multiple">-->
<!--        </label>-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--    </form>-->

<script src="webtorrent.min.js"></script>
<script src="app.js"></script>
<script src="main.js"></script>

</body>
</html>


