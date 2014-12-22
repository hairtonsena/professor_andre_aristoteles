<?php
$nome_disciplina;
$id_disciplina;
$nome_turma;
$id_turma;
foreach ($turma_disciplina as $td) {
    $nome_disciplina = $td->nome_disciplina;
    $id_disciplina = $td->id_disciplina;
    $nome_turma = $td->nome_turma;
    $id_turma = $td->id_turma;
}
?>
<div class="row col-lg-12">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("cpainel/") ?>">cpainel</a></li>
        <li><a href="<?php echo base_url("cpainel/disciplina") ?>">Disciplina</a></li>
        <li><a href="<?php echo base_url("cpainel/turma?disciplina=" . $id_disciplina) ?>">Turma</a></li>
        <li class="active">Alunos </li>       
    </ol>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Disciplina: <?php echo $nome_disciplina ?></div>
        <ul class="list-group">
            <li class="list-group-item text-danger">Turma: <?php echo $nome_turma ?></li>
        </ul>
        <div class="panel-body">
            <div class="col-lg-12 semMargem">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#">Alunos</a></li>
                    <li role="presentation"><a href="#">Avaliações</a></li>
                    <li role="presentation"><a href="#">Trabalhos</a></li>
                </ul>
                <div class="col-lg-12 semMargem" style="border-left: 1px solid #ddd;border-right: 1px solid #ddd; border-bottom: 1px solid #ddd; ">
                    <div class="col-lg-12" style="padding-top: 5px;">
                        <a class="btn btn-primary" href="<?php echo base_url("cpainel/aluno/novo/" . $id_turma); ?>">Novo Aluno</a>
                        <div style="margin-top: 5px">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> Nome </th>
                                        <th class="col-lg-1 center"> Alterar </th>
                                        <th class="col-lg-1 center"> Excluir </th>
                                        <th class="col-lg-1 center"> Selecionar </th>
                                        <th class="col-lg-1 center"> status </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($turma as $tm) {
                                        if ($tm->status_turma == 0) {
                                            ?>
                                            <tr id="linha_<?php echo $tm->id_turma ?>">
                                                <td><?php echo $tm->nome_turma; ?></td>
                                                <td class="text-center"><span id="btnEditarTurma_<?php echo $tm->id_turma ?>"><a href="<?php echo base_url('cpainel/turma/alterar/' . $tm->id_turma) ?>"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a></span></td>
                                                <td class="text-center"><span id="btnExcluirTurma_<?php echo $tm->id_turma ?>"><a href="javascript:void(0)" data-toggle="modal" data-target="#modelExcluirTurma" data-turma="<?php echo $tm->id_turma ?>"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </a></span></td>
                                                <td class="text-center"><span id="btnAddTurma_<?php echo $tm->id_turma ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </span></td>
                                                <td class="text-center"><span id="btnAtivarTurma_<?php echo $tm->id_turma ?>"><a href="javascript:void(0)" onclick="Turma.ativar_desativar_turma('<?php echo $tm->id_turma ?>')"> <span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span> </a></span></td>
                                            </tr>
                                        <?php } else { ?>
                                            <tr id="linha_<?php echo $tm->id_turma ?>">
                                                <td> <?php echo $tm->nome_turma; ?> </td>
                                                <td class="text-center"><span id="btnEditarTurma_<?php echo $tm->id_turma ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span></td>
                                                <td class="text-center"><span id="btnExcluirTurma_<?php echo $tm->id_turma ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span></td>
                                                <td class="text-center"><span id="btnAddTurma_<?php echo $tm->id_turma ?>"><a href="<?php echo base_url('cpainel/turma/alunos/' . $tm->id_turma) ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </span></td>
                                                <td class="text-center"><span id="btnAtivarTurma_<?php echo $tm->id_turma ?>"><a href="javascript:void(0)" onclick="Turma.ativar_desativar_turma('<?php echo $tm->id_turma ?>')"> <span class="glyphicon glyphicon-collapse-up" aria-hidden="true"></span> </a></span></td>
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
            </div>
        </div>
    </div>
</div>
<!--Comfimação de exclusão-->
<div class="modal fade" id="modelExcluirTurma" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Excluir turma</h4>
            </div>
            <div class="modal-body">
                <p>Você realmente deseja excluir está turma? </p>
                <input type="hidden" id="turma_excluir" value="" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                <button type="button" class="btn btn-primary" onclick="Turma.excluir_turma()">Sim</button>
            </div>
        </div>
    </div>
</div>
<!--Final de confirmação-->