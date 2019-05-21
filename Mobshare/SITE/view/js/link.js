function cadastrarVenda() {
    location.href = "cadastrarVeicVenda.php";
}

function cadastrarAluguel() {
    location.href = "cadastrarVeicAluguel.php";
}

function veiculo() {
    location.href = "usuarioVeiculo.php";
}

function endereco(){
    location.href = "cadastroEndereco.php";
}

function cadastrarImagemVeiculo(categoria, idVeiculo) {
    $.ajax({
        type: "POST",
        url: `cadastroImagem.php?id=${categoria}&idVeiculo=${idVeiculo}`,
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function acessorio() {
    $.ajax({
        type: "POST",
        url: `cadastroAcessorio.php`,
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function paginaInicial(){
    $.ajax({
        type: "POST",
        url: `usuario-inicio/inicioUsuario.php`,
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
}

function cadastrarEndereco(){
    $.ajax({
        type: "POST",
        url: `enderecoUsuario.php`,
        success: function (dados) {
            $(".content").html(dados);
        }
    });
}

function rota(controller, modo, id){

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
                url: `../../router.php?controller=${controller}&modo=${modo}&id=${id}`,
                data: data,
                success: function (data) {                    
                    
                    $(".content").html(data);
                }
            });
        });
    }
}

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
                url: `../../router.php?controller=${controller}&modo=${modo}&id=${id}`,
                data: data,
                success: function (data) {                    
                    
                    $("#informacao").html(data);
                }
            });
        });
    }
}

function selectRouter(controller, modo, id){
    
    $.ajax({
        type: "POST",
        url: `../../router.php?controller=${controller}&modo=${modo}&id=${id}`,
        success: function (dados) {
            $("#informacao").html(dados);
        }
    });
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