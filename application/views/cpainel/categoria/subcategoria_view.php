<div class="row col-lg-12">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("cpainel/") ?>">cpainel</a></li>
        <li><a href="<?php echo base_url("cpainel/categoria") ?>">Categoria</a></li>
        <li class="active">Subcategoria</li>       
    </ol>
    <div class="col-lg-4">
        <div>
            <h4 class="text-primary">Categoria</h4>
            <h2>
                <?php
                $idcategoriaLink;
                foreach ($categoria as $ct) {
                    ?>
                    <?php
                    echo $ct->nome_categoria;
                    $idcategoriaLink = $ct->id_categoria;
                    ?>
                    <?php
                }
                ?>
            </h2>
        </div>
    </div>
    <div class="col-lg-8">
        <a  href="<?php echo base_url("cpainel/categoria/nova_subcategoria/".$idcategoriaLink) ?>" class="btn btn-primary" id="btnNovaCategoria">Nova subcategoria</a>
        <a href="#" class="pull-right btn btn-default" >Mover</a>
        <div>
            <table class="table table-bordered" id="tabelaCategoria">
                <thead>
                    <tr>
                        <td class="col-lg-9"> Subcategoria </td>
                        <td class="col-lg-1 center"> Alterar </td>
                        <td class="col-lg-1 center"> Excluir </td>
                        <td class="col-lg-1 center"> sub </td>
                        <td class="col-lg-1 center"> status </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($subcategorias as $sc) {
                        if (0 == 0) {
                            ?>
                            <tr id="">
                                <td ><a href="javascript:void(0)" ><span id="nome_<?php echo $sc->id_sub_categoria ?>"> <?php echo $sc->nome_sub_categoria; ?></span></td>
                                <td class="text-center"><span id="btnEditarCategoria_<?php echo $sc->id_sub_categoria ?>"><a href="<?php echo base_url('cpainel/categoria/alterar_subcategoria/' . $sc->id_sub_categoria) ?>"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></span></td>
                                <td class="text-center"><span id="btnExcluirCategoria_<?php echo $sc->id_sub_categoria ?>"><a href="javascript:void(0)" data-toggle="modal" data-target=".bs-example-modal-sm" data-categoria="<?php echo $sc->id_sub_categoria ?>"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </a></span></td>
                                <td class="text-center"><span id="btnAddSubcategoria_<?php echo $sc->id_sub_categoria ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </span></td>
                                <td class="text-center"><span id="btnAtivarCategoria_<?php echo $sc->id_sub_categoria ?>"><a href="javascript:void(0)" onclick="Categoria.ativar_desativar_categoria('<?php echo $sc->id_sub_categoria ?>')"> <span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span> </a></span></td>
                            </tr>
                        <?php } else {
                            ?>
                            <tr id="">
                                <td><span id="nome_<?php echo $ct->id_categoria ?>"><?php echo $ct->nome_categoria; ?></span></td>
                                <td class="text-center"><span id="btnEditarCategoria_<?php echo $ct->id_categoria ?>"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </span></td>
                                <td class="text-center"><span id="btnExcluirCategoria_<?php echo $ct->id_categoria ?>"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </span></td>
                                <td class="text-center"> <span id="btnAddSubcategoria_<?php echo $ct->id_categoria ?>"> <a href="<?php echo base_url('cpainel/categoria/subcategoria/' . $ct->id_categoria) ?>" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </a></span></td>
                                <td class="text-center"><span id="btnAtivarCategoria_<?php echo $ct->id_categoria ?>"> <a href="javascript:void(0)" onclick="Categoria.ativar_desativar_categoria('<?php echo $ct->id_categoria ?>')"> <span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> </a></span></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!--Comfimação de exclusão-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Excluir categoria</h4>
            </div>
            <div class="modal-body">
                <p>Você realmente deseja excluir está categoria? </p>
                <input type="hidden" id="categoria_excluir" value="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                <button type="button" class="btn btn-primary" onclick="Categoria.excluir_categoria()">Sim</button>
            </div>
        </div>
    </div>
</div>
<!--Final de confirmação-->
