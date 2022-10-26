// Detecta cliques nas div dos artigos:
$('.artbox').click(goArticle);

// Processa os clicks:
function goArticle() {
    location.href = $(this).attr('data-link');
}