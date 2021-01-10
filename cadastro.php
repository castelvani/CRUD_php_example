<?php
require_once('ui/header.php');
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
                                        <h3>Cadastro de item</h3>
                                        <form class="container form-group" action="" method="POST">
                                            <h4><label for="titulo_item">Titulo do item *</label></h4>
                                            <input class="form-control" id="titulo_item" type="text" name="titulo_item" required>
                                            <br>
                                            <h4>
                                                <label for="categoria_item">Categoria do item *
                                                    <a class="tooltip_custom" href="#" data-toggle="tooltip" title="A categoria deve ser cadastrada para aparecer no cadastro de item.">
                                                        <i class="fas fa-question-circle"></i>
                                                    </a>
                                                </label>
                                            </h4>
                                            <select class="form-control" name="categoria_item" id="categoria_item" required>
                                                <option value="na">N/A</option>
                                            </select>
                                            <br>
                                            <h4><label for="descricao_item">Descrição do item *</label></h4>
                                            <textarea class="form-control" name="" id="descricao_item" cols="30" rows="10" required></textarea>
                                            <br>
                                            <input class="btn submit_custom" id="cadastrar_item" type="submit" value="Cadastrar item">
                                        </form>
                                    </div>
                                    <div id="categoria" class="tab-pane fade"><br>
                                        <h3>Cadastro de categoria</h3>
                                        <form class="container form-group" action="" method="POST">
                                            <h4><label for="nome_categoria">Nome da categoria *</label></h4>
                                            <input class="form-control" id="nome_categoria" type="text" name="nome_categoria" required>
                                            <br>
                                            <input class="btn submit_custom" id="cadastrar_categoria" type="submit" value="Cadastrar categoria">
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

<?php
require_once('ui/footer.php');
?>

<script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="scripts/cadastrar_item.js" type="text/javascript"></script>
<script src="scripts/cadastrar_categoria.js" type="text/javascript"></script>
<script src="js/tooltip.js" type="text/javascript"></script>