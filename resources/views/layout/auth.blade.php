<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="./css/style_sign.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign</title>
</head>
<body>
    <div class="container d-flex str_void">
        <div class="before_fluid"></div>
        <div class="fluid"></div>
        <div class="void_sign">
            <div class="d_user_icon">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="sign_form">
                @yield('form')
            </div>
        </div>
    </div>
</body>
</html>