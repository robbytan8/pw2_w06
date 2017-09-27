<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP Form Upload</title>
        <link rel="stylesheet" type="text/css" href="css/datatables.css">
        <link rel="stylesheet" type="text/css" href="css/web_style.css">
        <script type="text/javascript" src="js/functional_js.js"></script>
        <script type="text/javascript" src="js/datatables.js"></script>
    </head>
    <body>
        <!--Tag for header-->
        <header>
            <h1>Pemrograman Web 2</h1>
        </header>
        <!--Tag for navigation-->
        <nav>
            <ul>
                <li><a href="?navito=home">Home</a></li>
                <li><a href="?navito=page_upload">Upload Demo</a></li>
                <li><a href="?navito=about">About</a></li>
            </ul>
        </nav>
        <!--Tag for content-->
        <main>
            <?php
            $nav = filter_input(INPUT_GET, "navito");
            switch ($nav) {
                case 'home':
                    include_once './home.php';
                    break;
                case 'page_upload':
                    include_once './page_upload.php';
                    break;
                case 'about':
                    include_once './about.php';
                    break;
                default:
                    include_once './home.php';
                    break;
            }
            ?>
        </main>
        <!--Tag for footer-->
        <footer>
            Created by Robby Tan
        </footer>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#tableId').DataTable();
            });
        </script>
    </body>
</html>
