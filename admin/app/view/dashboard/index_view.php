<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body>
    <form method="POST" action="<?=  route("role","store"); ?>">
        <div>
            <label for="">Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">description</label>
            <textarea name="description" ></textarea>
        </div>
        <button type="submit" name = "save"  >Lưu</button>
    </form>
    <form action="<?=  route("login","logout" ) ?>" method="POST" >
        <button type="submit" name="logout" >logout</button>
    </form>
</body>
</html>