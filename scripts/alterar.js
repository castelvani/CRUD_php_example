jQuery(document).ready(function () {
    const id_item = getParameterByName("id")
    carregar_item(id_item);

    jQuery("#alterar_item").on("click", function () {
        const titulo = jQuery("#titulo_item").val();
        const id_categoria = jQuery("#categoria_item").val();
        const descricao = jQuery("#descricao_item").val();
        if (titulo.length > 0 && descricao.length > 0) {
            alterar_item(titulo, id_categoria, descricao, id_item);
        } else {
            avisar('Campos obrigatórios estão vazios!');
        }
    })
});

function carregar_item(id_item) {
    jQuery.ajax({
        type: "POST",
        url: 'controller/controle_item.php',
        data: {
            opcao: 'consultar_por_id',
            id_item: id_item
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
                    var item = Obj;
                    item.map(item => {
                        jQuery("#titulo_item").val(item.titulo);
                        jQuery("#descricao_item").val(item.descricao);
                        setInterval(function () {
                            jQuery('select[name="categoria_item"]').find(`option:contains("${item.categoria}")`).attr("selected", true);
                        }, 1);
                    })
                } else {
                }
            } else {
            }
        }
    });
}

function alterar_item(titulo, id_categoria, descricao, id_item) {
    jQuery.ajax({
        type: "POST",
        url: 'controller/controle_item.php',
        data: {
            opcao: 'alterar',
            titulo: titulo,
            id_categoria: id_categoria,
            descricao: descricao,
            id_item: id_item
        },
        complete: function (e, xhr, result) {
            if (e.readyState == 4 && e.status == 200) {
                try {
                    var msg = (e.responseText);
                } catch (err) {
                    console.log("Erro na conversão do objeto JSON em Javascript!!!");
                    console.log(err);
                }
                avisar(msg);
            } else {
                console.log("erro " + e.status);
            }
        }
    });
}

function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}