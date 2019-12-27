$(document).ready(function(){
    $('.page-link').each(function(){
        $(this).attr("href", $(this).attr('href') + "#articles");
    });
});