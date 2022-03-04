/**
 * INPUTS FORM EDITAR CENTRO DE CUSTOS
 */

let id;
let action;
let cc_nome = document.querySelector("#modalCentroCusto #cc_nome");

/**
 * PREENCHE OS DADOS DO MODAL PARA EDITAR CENTRO DE CUSTOS
 */

let btnEditarCentroCusto = document.querySelectorAll(".btnEditarCentroCusto");
btnEditarCentroCusto.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();

    document.querySelector("#modalCentroCusto .modal-title").innerText =
      "Editar Centro de Custo";

    let selectedRow = btn.parentNode.parentNode.children;

    id = selectedRow[0].innerText;
    cc_nome.value = selectedRow[1].innerText;
    action = "atualizarCentroCusto";
  });
});

let btnAdicionarCentroCusto = document.querySelector(
  "#btnAdicionarCentroCusto"
);
btnAdicionarCentroCusto.addEventListener("click", (e) => {
  e.preventDefault();

  document.querySelector("#modalCentroCusto .modal-title").innerText =
    "Editar Centro de Custo";

  id = null;
  cc_nome.value = null;
  action = "adicionarCentroCusto";
});

let btnExcluirCentroCusto = document.querySelectorAll(".btnExcluirCentroCusto");
btnExcluirCentroCusto.forEach((item) => {
  item.addEventListener("click", (e) => {
    e.preventDefault();

    let selectedRow = item.parentNode.parentNode.children;

    id = selectedRow[0].innerText;
    action = "excluirCentroCusto";
  });
});

/**
 * CHAMA FUNÇÃO PARA EDITAR CENTRO DE CUSTO
 */

let formCentroCusto = document.querySelector("#formCentroCusto");
formCentroCusto.addEventListener("submit", (e) => {
  e.preventDefault();

  $.post({
    type: "POST",
    url: `../routes/routes.php`,
    data: {
      id: id,
      nome: cc_nome.value,
      action: action,
    },
    success: function (data) {
      $("#modalCentroCusto").modal("hide");
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
