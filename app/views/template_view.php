<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= Route::get_root_folder() ?>/css/style.css">
    <link rel="stylesheet" href="<?= Route::get_root_folder() ?>/css/job2.css">
	<title>Задачи от Ingate 1-3 | Главная</title>
</head>
<body>
    <div id="content">
        <div id="header">
            
        </div>
        <div id="center">
            <img src="<?= Route::get_root_folder() ?>/images/ingate.jpg" alt="фотография">
            <div id="box_text">
                <?php include 'app/views/'.$content_view; ?>
            </div>
        </div>
    </div>
    
    <div id="footer">Copyright © 2019 <a href="http://mydevelopersway.com/" target="_blank">Mydevelopersway.com</a></div>
</body>
</html>
