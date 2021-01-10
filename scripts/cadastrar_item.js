jQuery(document).ready(function () {
    carregar_categorias();
    jQuery("#cadastrar_item").on("click", function () {
        const titulo = jQuery("#titulo_item").val();
        const categoria = jQuery("#categoria_item").val();
        const descricao = jQuery("#descricao_item").val();
        if((titulo.length & descricao.length) > 0){
            cadastrar_item(titulo, categoria, descricao);
        }else{
            alert('Campos obrigatórios estão vazios!');
        }
        
    })
});

function cadastrar_item(titulo, categoria, descricao) {
    jQuery.ajax({
        type: "POST",
        url: 'controller/controle_item.php',
        data: {
            opcao: 'cadastrar',
            titulo: titulo,
            categoria: categoria,
            descricao: descricao
        },
        complete: function (e, xhr, result) {
            if (e.readyState == 4 && e.status == 200) {
                try {
                    var msg = (e.responseText);
                    mensagem = msg;
                } catch (err) {
                    console.log(err);
                }

            } else {
                console.log("erro " + e.status);
            }
        },
        success: function (e) {
            alert("Item cadastrado com sucesso!");
        }
    });
}

function carregar_categorias() {

    jQuery.ajax({
        type: "POST",
        url: 'controller/controle_categoria.php',
        data: {
            opcao: 'consultar'
        },
        beforeSend: function () {
            jQuery("#categoria_item").html('');
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
                    var categorias = Obj;

                    categorias.map(categorias => {
                        jQuery("#categoria_item").append(`
                        <option value="${categorias.id}">${categorias.nome}</option>
                        `);
                    })

                if(categorias.length == 0){
                    jQuery("#categoria_item").append(`
                        <option value="na">N/A</option>
                    `);
                }

                } else {
                }
            } else {
            }
        }
    });
}