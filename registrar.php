<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Teste</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="./public/js/jquery.js"></script>
    <link rel="stylesheet" href="./public/css/login.css">
</head>

<body>
    <div class="content">
        <div class="form-area-registro">
            <div class="login-content">
                <h1>REGISTRAR</h1>
            </div>
            <div class="form">
                <form id="registroForm" action="./controllers/RegistroController.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="sobrenome" class="form-label">Sobrenome</label>
                        <input type="text" class="form-control" id="sobrenome" name="sobrenome" aria-describedby="sobrenome">
                    </div>
                    <div class=" mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" aria-describedby="senha" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Registrar-se" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <h5><a href="login.php">Login</a></h5>
    </div>
</body>

</html>