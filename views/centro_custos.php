<?php
require_once('./partials/header.php');

require_once('../controllers/CentroCustosController.php');

$CentroCustosController = new CentroCustosController();
$centroCustos = $CentroCustosController->getCentroCustos();
?>

<h1>CENTRO DE CUSTOS</h1>

<div style="width: 100%">
    <button id="btnAdicionarCentroCusto" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCentroCusto">
        <i class="bi bi-plus-lg"></i>
        <span>Adicionar</span>
    </button>
</div>

<table class="table table-hover" id="centro_custos-table">
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Total departamentos</th>
        <th>Total cargos</th>
        <th>Total de usuários</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php if (isset($centroCustos)) {
            foreach ($centroCustos as $centroCusto) { ?>
                <tr>
                    <td><strong><?php echo $centroCusto['id'] ?></strong></td>
                    <td><?php echo $centroCusto['nome'] ?></td>
                    <td><?php echo $centroCusto['total_departamentos'] ?></td>
                    <td><?php echo $centroCusto['total_cargos'] ?></td>
                    <td><?php echo $centroCusto['total_usuarios'] ?></td>
                    <td>
                        <button class="btn btn-primary btnEditarCentroCusto" data-bs-toggle="modal" data-bs-target="#modalCentroCusto">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
                        <button class="btn btn-danger btnExcluirCentroCusto" data-bs-toggle="modal" data-bs-target="#modalAtencao">
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

<script src="../public/js/centro_custos.js"></script>