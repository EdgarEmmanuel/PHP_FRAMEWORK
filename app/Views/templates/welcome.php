<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $this->asset("app/Views/assets".'/css/welcome.css')?>" />
    <title> HOME | ACCUEIL </title>
</head>
<body>
    <header class="header" id="navigation-menu">
        <nav class="navbar">
            <a href="#navigation-menu" class="nav-logo js-anchor-link">Title</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#navigation-menu" class="nav-link js-anchor-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#myskillstext" class="nav-link js-anchor-link">Skills</a>
                </li>
                <li class="nav-item">
                    <a href="#myservices" class="nav-link js-anchor-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link js-anchor-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=login" class="nav-link js-anchor-link">login</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>





    <script type="text/javascript" src="<?= $this->asset("app/Views/assets".'/js/welcome.js')?>"></script>
</body>
</html>