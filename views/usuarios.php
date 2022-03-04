<?php
require_once('./partials/header.php');

require_once('../controllers/UsuarioController.php');
require_once('../controllers/CargoController.php');
require_once('../controllers/DepartamentoController.php');
require_once('../controllers/CentroCustosController.php');

$UsuarioController = new UsuarioController();
$usuarios = $UsuarioController->getUsuarios();

$CargoController = new CargoController();
$cargos = $CargoController->getCargos();

$DepartamentoController = new DepartamentoController();
$departamentos = $DepartamentoController->getDepartamentos();

$CentroCustosController = new CentroCustosController();
$centroCustos = $CentroCustosController->getCentroCustos();
?>

<h1>USUÁRIOS</h1>

<div style="width: 100%">
    <button id="btnAdicionarUsuario" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUsuario">
        <i class="bi bi-plus-lg"></i>
        <span>Adicionar</span>
    </button>
</div>

<table class="table table-hover" id="usuarios-table">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>E-mail</th>
        <th>Cargo</th>
        <th>Departamento</th>
        <th>Centro de custo</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php if (isset($usuarios)) {
            foreach ($usuarios as $usuario) { ?>
                <tr>
                    <td><strong><?php echo $usuario['id'] ?></strong></td>
                    <td><?php echo $usuario['nome'] ?></td>
                    <td><?php echo $usuario['sobrenome'] ?></td>
                    <td><?php echo $usuario['email'] ?></td>
                    <td data-id="<?php echo $usuario['id_cargo'] ?>">
                        <?php echo $usuario['cargo'] ?>
                    </td>
                    <td data-id="<?php echo $usuario['id_departamento'] ?>">
                        <?php echo $usuario['departamento'] ?>
                    </td>
                    <td data-id="<?php echo $usuario['id_centro_custo'] ?>">
                        <?php echo $usuario['centro_custo'] ?>
                    </td>
                    <td>
                        <button class="btn btn-primary btnEditarUsuario" data-bs-toggle="modal" data-bs-target="#modalUsuario">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <button class="btn btn-danger btnExcluirUsuario" data-bs-toggle="modal" data-bs-target="#modalAtencao">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>
        <?php }
        } ?>
    </tbody>
</table>

<?php
require_once('./partials/footer.php');
?>

<script src="../public/js/usuarios.js"></script>