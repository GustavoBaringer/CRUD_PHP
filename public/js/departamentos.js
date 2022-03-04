/**
 * INPUTS FORM EDITAR DEPARTAMENTO
 */

let id;
let action;
let dp_nome = document.querySelector("#modalDepartamento #dp_nome");
let dp_id_centro_custo = document.querySelector(
  "#modalDepartamento #dp_centro_custo"
);

/**
 * PREENCHE OS DADOS DO MODAL PARA EDITAR DEPARTAMENTO
 */

let btnEditarDepartamento = document.querySelectorAll(".btnEditarDepartamento");
btnEditarDepartamento.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();

    let selectedRow = btn.parentNode.parentNode.children;

    document.querySelector("#modalDepartamento .modal-title").innerText =
      "Editar Departamento";

    id = selectedRow[0].innerText;
    dp_nome.value = selectedRow[1].innerText;
    dp_id_centro_custo.value = selectedRow[2].dataset.id;
    action = "atualizarDepartamento";
  });
});

let btnAdicionarDepartamento = document.querySelector(
  "#btnAdicionarDepartamento"
);
btnAdicionarDepartamento.addEventListener("click", (e) => {
  e.preventDefault();

  document.querySelector("#modalDepartamento .modal-title").innerText =
    "Editar Departamento";

  id = null;
  dp_nome.value = null;
  dp_id_centro_custo.value = null;
  action = "adicionarDepartamento";
});

let btnExcluirDepartamento = document.querySelectorAll(
  ".btnExcluirDepartamento"
);
btnExcluirDepartamento.forEach((item) => {
  item.addEventListener("click", (e) => {
    e.preventDefault();

    let selectedRow = item.parentNode.parentNode.children;

    id = selectedRow[0].innerText;
    action = "excluirDepartamento";
  });
});

/**
 * CHAMA FUNÇÃO PARA EDITAR DEPARTAMENTO
 */

let formDepartamento = document.querySelector("#formDepartamento");
formDepartamento.addEventListener("submit", (e) => {
  e.preventDefault();

  $.post({
    type: "POST",
    url: `../routes/routes.php`,
    data: {
      id: id,
      nome: dp_nome.value,
      id_centro_custo: dp_id_centro_custo.value,
      action: action,
    },
    success: function (data) {
      $("#modalDepartamento").modal("hide");
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
