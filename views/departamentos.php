<?php
require_once('./partials/header.php');

require_once('../controllers/DepartamentoController.php');
require_once('../controllers/CentroCustosController.php');

$DepartamentoController = new DepartamentoController();
$departamentos = $DepartamentoController->getDepartamentos();

$CentroCustosController = new CentroCustosController();
$centroCustos = $CentroCustosController->getCentroCustos();
?>

<h1>DEPARTAMENTOS</h1>

<div style="width: 100%">
    <button id="btnAdicionarDepartamento" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalDepartamento">
        <i class="bi bi-plus-lg"></i>
        <span>Adicionar</span>
    </button>
</div>

<table class="table table-hover" id="departamentos-table">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Centro de custo</th>
        <th>Total de usuários</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php if (isset($departamentos)) {
            foreach ($departamentos as $departamento) { ?>
                <tr>
                    <td><strong><?php echo $departamento['id'] ?></strong></td>
                    <td><?php echo $departamento['nome'] ?></td>
                    <td data-id="<?php echo $departamento['id_centro_custo'] ?>">
                        <?php echo $departamento['centro_custo'] ?>
                    </td>
                    <td><?php echo $departamento['total_usuarios'] ?></td>
                    <td>
                        <button class="btn btn-primary btnEditarDepartamento" data-bs-toggle="modal" data-bs-target="#modalDepartamento">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <button class="btn btn-danger btnExcluirDepartamento" data-bs-toggle="modal" data-bs-target="#modalAtencao">
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

<script src="../public/js/departamentos.js"></script>