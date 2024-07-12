$(document).ready(function(){
    //Atualizando flag favorito para true ou false
    $('.flagFavoritoContato').click(function(){
        var idContato = $(this).prop("id");
        var titulo= $(this).prop("title");

        if(titulo === "Favorito"){
            $(this).html('<i class="bi bi-star"></i>').prop("title","Não Favorito")
            $.getJSON('./paginas/contatos/atualizaFavoritoContato.php?idContato='+idContato+'&flagFavoritoContato=0')
        }else{
            $(this).html('<i class="bi bi-star-fill"></i>').prop("title","Não Favorito")
            $.getJSON('./paginas/contatos/atualizaFavoritoContato.php?idContato='+idContato+'&flagFavoritoContato=1')
        }
    })
})