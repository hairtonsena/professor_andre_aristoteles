<div class="row posicao_conteiner conteiner_smartphone ">

    <div  class="col-md-7 row sem_margen_pading">
        <div class="titulos">Publicações</div>
        <div class="col-md-12 linha">
            <?php
            foreach ($noticia as $nt) {
                echo $nt->conteudo_noticia;
            }
            ?>
        </div>
    </div>




