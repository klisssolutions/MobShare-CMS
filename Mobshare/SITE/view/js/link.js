function cadastrarVenda() {
    location.href = "cadastrarVeicVenda.php";
}

function cadastrarAluguel() {
    location.href = "cadastrarVeicAluguel.php";
}

function veiculo() {
    location.href = "usuarioVeiculo.php";
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
                url: `router.php?controller=${controller}&modo=${modo}&id=${id}`,
                data: data,
                success: function (data) {                    
                    
                    $("#informacao").html(data);
                }
            });
        });
    }
}
