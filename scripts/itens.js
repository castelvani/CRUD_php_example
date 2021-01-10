jQuery(document).ready(function () {
    consultar_item();
    
});

function consultar_item() {
    jQuery.ajax({
        type: "POST",
        url: 'controller/controle_item.php',
        data: {
            opcao: 'consultar'
        },
        complete: function (e, xhr, result) {
            if (e.readyState == 4 && e.status == 200) {
                try {
                    var Obj = JSON.parse(e.responseText);
                } catch (err) {
                    console.log("Erro na conversão do objeto JSON em Javascript!!!");
                    console.log(err);
                }
                if (Obj != null) {
                    var itens = Obj;

                    itens.map(itens => {
                        jQuery(".itens_mostrados").append(`
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="card card_custom">
                                    <div class="card-body">
                                        <h5 class="card-title titulo_custom">${itens.titulo}</h5>
                                        <p class="card-text">${itens.descricao}</p>
                                        <input type="hidden" class="id_item" name="id_item" value="${itens.id}">
                                        <div class="row">
                                            <div class="col-xl-8 mb-1">
                                                <input type="submit" class="btn btn-primary altera_btn id_${itens.id}" value="Alterar">
                                            </div>
                                            <div class="col-xl-4">
                                                <input type="submit" class="btn btn-danger remove_custom id_${itens.id}" value="Remover">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`);
                        
                        jQuery(`.id_${itens.id}`).on("click", function () {
                            remover_item(itens.id);
                        })
                    })
                } else {
                }
            } else {
            }
        }
    });
}

function remover_item(id_item) {
    jQuery.ajax({
        type: "POST",
        url: 'controller/controle_item.php',
        data: {
            opcao: 'remover',
            id_item: id_item
        },
        complete: function (e, xhr, result) {
            if (e.readyState == 4 && e.status == 200) {
                try {
                    var msg = (e.responseText);
                } catch (err) {
                    console.log(err);
                }

            } else {
                console.log("erro " + e.status);
            }
        }
    });
}