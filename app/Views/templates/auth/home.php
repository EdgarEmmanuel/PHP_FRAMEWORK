<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?= $this->asset("app/Views/assets".'/css/auth.css')?>" />
    <title>Login</title>
</head>
<body>
    <div class="box">
        <h2>Login</h2>
        <form action="index.php?page=login" method="post">
            <div class="inputBox">
                <input type="text" name="username" required>
                <label for="">Username</label>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required>
                <label for="">Password</label>
            </div>
          <a href="/login3/bes.html"><input type="submit" name="" id="" value="Submit"></a>
        </form>
    </div>
    <!-- RESPONSİVE TASARIM YAPILMAMIŞTIR... -->
</body>
</html>