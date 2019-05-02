function inicio() {
    $.ajax({
        type: "POST",
        url: "view/inicio.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function gerenciarFuncionario() {
    $.ajax({
        type: "POST",
        url: "view/funcionario/gerenciar.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function funcionario(){
    $.ajax({
        type: "POST",
        url: "view/funcionario/listaFuncionario.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function cadastrarFunc(){
    $.ajax({
        type: "POST",
        url: "view/funcionario/funcionario.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function nivel(){
    $.ajax({
        type: "POST",
        url: "view/nivel/listaNiveis.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function cadastrarNivel(id){
    let link;
    if(id){
        link = `view/nivel/nivel.php?id=${id}`;
    }else{
        link = `view/nivel/nivel.php`;
    }
    $.ajax({
        type: "POST",
        url: link,
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function emailMarketing() {
    $.ajax({
        type: "POST",
        url: "view/email/email.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function historicoLocacao() {
    $.ajax({
        type: "POST",
        url: "view/historico/listaHistorico.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function historicoAbrir(){
    $.ajax({
        type: "POST",
        url: "view/historico/historico.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function admPaginas() {
    $.ajax({
        type: "POST",
        url: "view/administrarPaginas/admPaginas.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function aprovacao() {
    $.ajax({
        type: "POST",
        url: "view/aprovacao/gerenciar.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function aprovacaoUsuario() {
    $.ajax({
        type: "POST",
        url: "view/aprovacao/listaPendenteUser.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function aprovacaoVeiculo() {
    $.ajax({
        type: "POST",
        url: "view/aprovacao/listaPendenteVeic.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function pendenciaUsuario() {
    $.ajax({
        type: "POST",
        url: "view/aprovacao/aprovacaoUsuario.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function pendenciaVeiculo() {
    $.ajax({
        type: "POST",
        url: "view/aprovacao/aprovacaoVeiculo.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function verCadastro() {
    $.ajax({
        type: "POST",
        url: "view/aprovacao/aprovacaoCadastro.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function faleConosco() {
    $.ajax({
        type: "POST",
        url: "view/faleConosco/listaFale.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function verFaleConosco() {
    $.ajax({
        type: "POST",
        url: "view/faleConosco/faleConosco.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function relatorio() {
    $.ajax({
        type: "POST",
        url: "view/relatorio/listaRelatorio.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function relatorioAbrir() {
    $.ajax({
        type: "POST",
        url: "view/relatorio/relatorio.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function marcaModelo() {
    $.ajax({
        type: "POST",
        url: "view/marcasemodelos/listarmarcasmodelos.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function listaMarcas() {
    $.ajax({
        type: "POST",
        url: "view/marcasemodelos/listarmarcas.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function marcas() {
    $.ajax({
        type: "POST",
        url: "view/marcasemodelos/marcas.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function listaModelos() {
    $.ajax({
        type: "POST",
        url: "view/marcasemodelos/listarmodelos.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function modelos() {
    $.ajax({
        type: "POST",
        url: "view/marcasemodelos/modelos.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}


function termo() {
    $.ajax({
        type: "POST",
        url: "view/termos/listaTermos.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function atualizarTermo() {
    $.ajax({
        type: "POST",
        url: "view/termos/termos.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function duvida() {
    $.ajax({
        type: "POST",
        url: "view/duvidasFrequentes/listaDuvida.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function cadastrarDuvida() {
    $.ajax({
        type: "POST",
        url: "view/duvidasFrequentes/duvidas.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function parceiro() {
    $.ajax({
        type: "POST",
        url: "view/parceiro/listaParceiro.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function cadastrarParceiro() {
    $.ajax({
        type: "POST",
        url: "view/parceiro/parceiro.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function comoFunciona() {
    $.ajax({
        type: "POST",
        url: "view/comoFunciona/listaComoFunciona.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function cadastrarComoFunciona() {
    $.ajax({
        type: "POST",
        url: "view/comoFunciona/comoFunciona.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function banner() {
    $.ajax({
        type: "POST",
        url: "view/banner/listaBanner.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function cadastroBanner() {
    $.ajax({
        type: "POST",
        url: "view/banner/banner.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function aprovacaoCancelamento() {
    $.ajax({
        type: "POST",
        url: "view/aprovacaoCancelamento/listCancelamento.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function cancelamento() {
    $.ajax({
        type: "POST",
        url: "view/aprovacaoCancelamento/listCancelamento.php",
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

//Essa função pega o controller e o modo e passa o form pro router realizar as acoes de insert e update
function router(controller, modo, id){

    let form = document.getElementById("form");
    let checkForm = form.reportValidity();
    let data = new FormData(form);
    if(checkForm){
        
        $('#form').submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                processData: false,
                contentType: false,
                cache: false,
                url: `router.php?controller=${controller}&modo=${modo}&id=${id}`,
                data: data,
                success: function (data) {                    
                    
                    $("#informacao").html(data);
                }
            });
        });
    }
}

//Função para buscar o objeto para edição e exclusão
function selectRouter(controller, modo, id){
    
    $.ajax({
        type: "POST",
        url: `router.php?controller=${controller}&modo=${modo}&id=${id}`,
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

//Função para logar
function logar(){
    let form = $('#form');
    checkForm = document.getElementById("form").reportValidity();
    if(checkForm){
        $('#form').submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: `router.php?controller=funcionarios&modo=logar`,
                data: form.serialize(),
                success: function (dados) {
                    $("body").html(dados);
                }
            });
        });
    }
}

function envio(){
    let form = document.getElementById("form");
    let checkForm = form.reportValidity();
    let data = new FormData(form);
    if(checkForm){
        
        $('#form').submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                processData: false,
                contentType: false,
                cache: false,
                url: `envio.php`,
                data: data,
                success: function (data) {
                    
                    $("#informacao").html(data);
                }
            });
        });
    }
}


function preview(imagem) {
    console.log(imagem.value)
    if(imagem.value){
        let reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("prev").src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(imagem.files[0]);
    }else{
        document.getElementById("prev").src = "";
    }
}