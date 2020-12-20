<?php
require_once('ui/header.php');
require_once('ui/footer.php');
?>

<body>
    <link rel="stylesheet" href="./styles/cadastro.css">
    <div class="conteudo_principal">
        <div class="bloco_1">
            <section>
                <h1 class="titulo">Cadastrar <i class="fas fa-list-alt"></i></h1>
            </section>
        </div>
        <div class="bloco_2">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="container card card_custom">
                            <div class="card-body">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link custom_nav_link active" data-toggle="pill" href="#item">Item</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link custom_nav_link" data-toggle="pill" href="#categoria">Categoria</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="item" class="tab-pane active"><br>
                                        <h3>Cadastro item</h3>
                                        <form class="container form-group" action="">
                                            <h4><label for="titulo_item">Titulo item</label></h4>
                                            <input class="form-control" id="titulo_item" type="text" name="titulo_item">
                                            <br>
                                            <h4>
                                                <label for="categoria_item">Categoria item
                                                    <a class="tooltip_custom" href="#" data-toggle="tooltip" title="A categoria deve ser cadastrada para aparecer no cadastro de item.">
                                                        <i class="fas fa-question-circle"></i>
                                                    </a>
                                                </label>
                                            </h4>
                                            <select class="form-control" name="categoria_item" id="categoria_item">
                                                <option value="na">N/A</option>
                                            </select>
                                            <br>
                                            <h4><label for="descricao_item">Descrição item</label></h4>
                                            <textarea class="form-control" name="" id="descricao_item" cols="30" rows="10"></textarea>
                                            <br>
                                            <input class="btn submit_custom" type="submit" value="Cadastrar item">
                                        </form>
                                    </div>
                                    <div id="categoria" class="tab-pane fade"><br>
                                        <h3>Cadastro categoria</h3>
                                        <form class="container form-group" action="">
                                            <h4><label for="nome_categoria">Nome categoria</label></h4>
                                            <input class="form-control" id="nome_categoria" type="text" name="nome_categoria">
                                            <br>
                                            <input class="btn submit_custom" type="submit" value="Cadastrar categoria">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>