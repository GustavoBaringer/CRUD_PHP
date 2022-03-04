/**
 * INPUTS FORM EDITAR CARGOS
 */

let id;
let action;
let cs_nome = document.querySelector("#modalCargo #cs_nome");
let cs_id_departamento = document.querySelector(
  "#modalCargo #cs_id_departamento"
);

/**
 * PREENCHE OS DADOS DO MODAL PARA EDITAR CARGOS
 */

let btnEditarCargo = document.querySelectorAll(".btnEditarCargo");
btnEditarCargo.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();

    document.querySelector("#modalCargo .modal-title").innerText =
      "Editar Cargo";

    let selectedRow = btn.parentNode.parentNode.children;

    id = selectedRow[0].innerText;
    cs_nome.value = selectedRow[1].innerText;
    cs_id_departamento.value = selectedRow[2].dataset.id;
    action = "atualizarCargo";
  });
});

let btnAdicionarCargo = document.querySelector("#btnAdicionarCargo");
btnAdicionarCargo.addEventListener("click", (e) => {
  e.preventDefault();

  document.querySelector("#modalCargo .modal-title").innerText = "Editar Cargo";

  id = null;
  cs_nome.value = null;
  cs_id_departamento.value = null;
  action = "adicionarCargo";
});

let btnExcluirCargo = document.querySelectorAll(".btnExcluirCargo");
btnExcluirCargo.forEach((item) => {
  item.addEventListener("click", (e) => {
    e.preventDefault();

    let selectedRow = item.parentNode.parentNode.children;

    id = selectedRow[0].innerText;
    action = "excluirCargo";
  });
});

/**
 * CHAMA FUNÇÃO PARA EDITAR CARGOS
 */

let formCargo = document.querySelector("#formCargo");
formCargo.addEventListener("submit", (e) => {
  e.preventDefault();

  $.post({
    type: "POST",
    url: `../routes/routes.php`,
    data: {
      id: id,
      nome: cs_nome.value,
      id_departamento: cs_id_departamento.value,
      action: action,
    },
    success: function (data) {
      $("#modalCargo").modal("hide");
      $("#modalSucesso").modal("show");
    },
  });
});

let btnExcluir = document.querySelector("#btnExcluir");
btnExcluir.addEventListener("click", (e) => {
  e.preventDefault();

  $.post({
    type: "POST",
    url: `../routes/routes.php`,
    data: {
      id: id,
      action: action,
    },
    success: function (data) {
      $("#modalAtencao").modal("hide");
      $("#modalSucesso").modal("show");
    },
  });
});
