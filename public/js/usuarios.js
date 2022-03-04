/**
 * INPUTS FORM EDITAR USUARIO
 */

let id_usuario;
let nome = document.querySelector("#formUsuario #nome");
let sobrenome = document.querySelector("#formUsuario #sobrenome");
let email = document.querySelector("#formUsuario #email");
let senha = document.querySelector("#formUsuario #senha");
let id_cargo = document.querySelector("#formUsuario #cargo");
let id_departamento = document.querySelector("#formUsuario #departamento");
let id_centro_custo = document.querySelector("#formUsuario #centro_custo");
let action;

/**
 * PREENCHE OS DADOS DO MODAL PARA EDITAR USUÁRIO
 */

let btnEditarUsuario = document.querySelectorAll(".btnEditarUsuario");
btnEditarUsuario.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    e.preventDefault();

    let selectedRow = btn.parentNode.parentNode.children;

    document.querySelector("#modalUsuario .modal-title").innerText =
      "Editar Usuario";

    id_usuario = selectedRow[0].innerText;
    nome.value = selectedRow[1].innerText;
    sobrenome.value = selectedRow[2].innerText;
    email.disabled = true;
    id_cargo.value = selectedRow[4].dataset.id;
    id_departamento.value = selectedRow[5].dataset.id;
    id_centro_custo.value = selectedRow[6].dataset.id;
    action = "atualizaUsuario";

    if (id_usuario == idUsuarioLogado) {
      senha.disabled = false;
    } else {
      senha.disabled = true;
    }
  });
});

let btnAdicionarUsuario = document.querySelector("#btnAdicionarUsuario");
btnAdicionarUsuario.addEventListener("click", (e) => {
  e.preventDefault();

  document.querySelector("#modalUsuario .modal-title").innerText =
    "Adicionar Usuario";

  id_usuario = null;
  nome.value = null;
  sobrenome.value = null;
  email.disabled = false;
  senha.disabled = false;
  id_cargo.value = null;
  id_departamento.value = null;
  id_centro_custo.value = null;
  action = "adicionarUsuario";
});

let btnExcluirUsuario = document.querySelectorAll(".btnExcluirUsuario");
btnExcluirUsuario.forEach((item) => {
  item.addEventListener("click", (e) => {
    e.preventDefault();

    let selectedRow = item.parentNode.parentNode.children;

    id_usuario = selectedRow[0].innerText;
    action = "excluirUsuario";
  });
});

/**
 * CHAMA FUNÇÃO PARA EDITAR USUÁRIO
 */

let formUsuario = document.querySelector("#formUsuario");
formUsuario.addEventListener("submit", (e) => {
  e.preventDefault();

  $.post({
    type: "POST",
    url: `../routes/routes.php`,
    data: {
      id: id_usuario,
      nome: nome.value,
      sobrenome: sobrenome.value,
      email: email.value,
      senha: senha.value,
      id_cargo: id_cargo.value,
      id_departamento: id_departamento.value,
      id_centro_custo: id_centro_custo.value,
      action: action,
    },
    success: function (data) {
      $("#modalUsuario").modal("hide");
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
      id: id_usuario,
      action: action,
    },
    success: function (data) {
      $("#modalAtencao").modal("hide");
      $("#modalSucesso").modal("show");
    },
  });
});
