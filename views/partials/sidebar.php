<?php
$uri = $_SERVER['REQUEST_URI'];
?>

<div class="sidebar">
    <div class="items-wrapper">
        <a href="./usuarios.php">
            <i class="bi bi-person <?php echo strpos($uri, 'usuarios') ? 'active' : '' ?>"></i>
        </a>
        <a href="./departamentos.php">
            <i class="bi bi-building <?php echo strpos($uri, 'departamentos') ? 'active' : '' ?>"></i>
        </a>
        <a href="./cargos.php">
            <i class="bi bi-briefcase <?php echo strpos($uri, 'cargos') ? 'active' : '' ?>"></i>
        </a>
        <a href="./centro_custos.php">
            <i class="bi bi-cash-coin <?php echo strpos($uri, 'centro_custos') ? 'active' : '' ?>"></i>
        </a>
        <a style="margin-top: 30px" href="../logout.php">
            <i class="bi bi-box-arrow-left"></i>
        </a>
    </div>
</div>