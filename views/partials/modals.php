<!-- Modal Sucesso -->
<div class="modal" tabindex="-1" id="modalSucesso">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sucesso!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Sucesso.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="fecharModalSucesso" onclick="window.location.reload()">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Atenção -->
<div class="modal" tabindex="-1" id="modalAtencao">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Atenção!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Deseja mesmo realizar esta ação?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger" id="btnExcluir">Sim</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Usuarios-->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalUsuario" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> -- MODAL --</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formUsuario">
                <div class=" modal-body">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" aria-describedby="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="sobrenome" class="form-label">Sobrenome</label>
                        <input type="text" class="form-control" id="sobrenome" aria-describedby="sobrenome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">senha</label>
                        <input type="password" class="form-control" id="senha" aria-describedby="senha" required>
                    </div>
                    <div class="mb-3">
                        <label for="cargo" class="form-label">Cargo</label>
                        <select class="form-select" id="cargo" aria-describedby="cargo" required>
                            <?php if (isset($cargos)) {
                                foreach ($cargos as $cargo) { ?>
                                    <option value="<?php echo $cargo['id'] ?>">
                                        <?php echo $cargo['nome'] ?>
                                    </option>
                            <?php
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="departamento" class="form-label">Departamento</label>
                        <select class="form-select" id="departamento" aria-describedby="departamento" required>
                            <?php if (isset($departamentos)) {
                                foreach ($departamentos as $departamento) { ?>
                                    <option value="<?php echo $departamento['id'] ?>">
                                        <?php echo $departamento['nome'] ?>
                                    </option>
                            <?php
                                }
                            } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="centro_custo" class="form-label">Centro de custo</label>
                        <select class="form-select" id="centro_custo" aria-describedby="centro_custo" required>
                            <?php if (isset($centroCustos)) {
                                foreach ($centroCustos as $centroCusto) { ?>
                                    <option value="<?php echo $centroCusto['id'] ?>">
                                        <?php echo $centroCusto['nome'] ?>
                                    </option>
                            <?php
                                }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Departamentos-->
<div class="modal fade" id="modalDepartamento" tabindex="-1" aria-labelledby="modalDepartamento" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> -- MODAL --</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formDepartamento">
                <div class=" modal-body">
                    <div class="mb-3">
                        <label for="dp_nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="dp_nome" aria-describedby="dp_nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="dp_centro_custo" class="form-label">Centro de custo</label>
                        <select class="form-select" id="dp_centro_custo" aria-describedby="dp_centro_custo" required>
                            <?php if (isset($centroCustos)) {
                                foreach ($centroCustos as $centroCusto) { ?>
                                    <option value="<?php echo $centroCusto['id'] ?>">
                                        <?php echo $centroCusto['nome'] ?>
                                    </option>
                            <?php
                                }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Cargo-->
<div class="modal fade" id="modalCargo" tabindex="-1" aria-labelledby="modalCargo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> -- MODAL --</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formCargo">
                <div class=" modal-body">
                    <div class="mb-3">
                        <label for="cs_nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="cs_nome" aria-describedby="cs_nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="cs_id_departamento" class="form-label">Departamentos</label>
                        <select class="form-select" id="cs_id_departamento" aria-describedby="cs_id_departamento" required>
                            <?php if (isset($departamentos)) {
                                foreach ($departamentos as $departamento) { ?>
                                    <option value="<?php echo $departamento['id'] ?>">
                                        <?php echo $departamento['nome'] ?>
                                    </option>
                            <?php
                                }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Centro Custos -->
<div class="modal fade" id="modalCentroCusto" tabindex="-1" aria-labelledby="modalCentroCusto" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> -- MODAL --</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formCentroCusto">
                <div class=" modal-body">
                    <div class="mb-3">
                        <label for="cc_nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="cc_nome" aria-describedby="cc_nome" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>