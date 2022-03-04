<?php
require_once('./partials/header.php');

require_once('../controllers/CargoController.php');
require_once('../controllers/DepartamentoController.php');

$CargoController = new CargoController();
$cargos = $CargoController->getCargos();

$DepartamentoController = new DepartamentoController();
$departamentos = $DepartamentoController->getDepartamentos();
?>

<h1>CARGOS</h1>

<div style="width: 100%">
    <button id="btnAdicionarCargo" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCargo">
        <i class="bi bi-plus-lg"></i>
        <span>Adicionar</span>
    </button>
</div>

<table class="table table-hover" id="cargos-table">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Departamento</th>
        <th>Total de usuários</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php if (isset($cargos)) {
            foreach ($cargos as $cargo) { ?>
                <tr>
                    <td><strong><?php echo $cargo['id'] ?></strong></td>
                    <td><?php echo $cargo['nome'] ?></td>
                    <td data-id="<?php echo $cargo['id_departamento'] ?>"><?php echo $cargo['departamento'] ?></td>
                    <td><?php echo $cargo['total_usuarios'] ?></td>
                    <td>
                        <button class="btn btn-primary btnEditarCargo" data-bs-toggle="modal" data-bs-target="#modalCargo">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <button class="btn btn-danger btnExcluirCargo" data-bs-toggle="modal" data-bs-target="#modalAtencao">
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

<script src="../public/js/cargos.js"></script>