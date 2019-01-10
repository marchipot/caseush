<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/> 
     <!-- Load an icon library -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
     crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
     crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!--Link to bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Link to my CSS-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $section = "privateArea";
        include './inc/header.php';
    ?>
    <div class="container-fluid">
        <div class="jumbotron">
            <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">שם הלקוח</th> 
                    <th scope="col">מספר תיק משרדי</th>
                    <th scope="col">עילת התביעה</th>
                    <th scope="col">תאריך קרות האירוע</th> 
                    <th scope="col">תאריך התיישנות</th> 
                    <th scope="col">מצב תיק</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>

    <footer>
    <?php
      include './inc/footer.php';
    ?>
    </footer>
</body>
</html>
