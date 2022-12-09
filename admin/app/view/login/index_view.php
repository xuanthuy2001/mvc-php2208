<?php  if(!defined('ADMIN_APP_PATH')){exit("can not found ");}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=  $title ?? null ?></title>
    <link rel="stylesheet" href="<?=  asset('css/bootstrap.css',true) ?>">
</head>
<body>
        <?php  if(!empty($message)): ?>
          <p class="text-center text-danger" > <?= $message  ?> </p>
        <?php  endIf; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <form class="mt-3" method="POST" action="<?=route('login','handleLogin') ?>" >
                        <div class="mb-3">
                          <label class="form-label">Email address</label>
                          <input type="text" name="email" class="form-control" >text
                        </div>
                        <div class="mb-3">
                          <label class="form-label">password</label>
                          <input name="password" type="password" class="form-control" >
                        </div>
                        <button type="submit" name="btnLogin" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
</body>
</html>

