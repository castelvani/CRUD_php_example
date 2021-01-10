jQuery(document).ready(function () {

    jQuery("#cadastrar_categoria").on("click", function () {
        const nome_categoria = jQuery("#nome_categoria").val();
        if (nome_categoria.length > 0) {
            cadastrar_categoria(nome_categoria);
        } else {
            alert('Campos obrigatórios estão vazios!');
        }
    });
});

function cadastrar_categoria(nome_categoria) {
    jQuery.ajax({
        type: "POST",
        url: 'controller/controle_categoria.php',
        data: {
            opcao: 'cadastrar',
            nome_categoria: nome_categoria
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