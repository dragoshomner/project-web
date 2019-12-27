$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
    $(document).on('click', '.view-article', {}, function(){
        let index = $(this).parent().parent().index();
        let articleId = $(this).data('article_id');
        let articleDiv = '.article-content:eq(' + (index) + ')';
        let articleText = articleDiv + ' .card-text';

        if($(articleText).length == 0){
            $.get(getContentUrl.replace('id', articleId))
                .then((response) => {
                    $(articleDiv).append('<pre class="card-text">' + response + '</pre>');
                    $(this).text('Ascunde articolul');
                });
        }
        else{
            $(articleText).remove();
            $(this).text('Vezi articolul');
        }
    });

    $(document).on('click', '.delete-article', {}, function(){
        let index = $(this).parent().parent().index();
        let articleId = $(this).data('article_id');
        let cardDiv = '.card:eq(' + (index) + ')';
        
        let confirmDelete = confirm("Esti sigur ca vrei sa stergi articolul?");

        if(confirmDelete){
            $.ajax({
                url: destroyArticleUrl.replace('id', articleId),
                type: 'DELETE',
                success: function() {
                    $(cardDiv).remove();
                }
            });
        }
    });

    $(document).on('click', '.approve-article', {}, function(){
        let articleId = $(this).data('article_id');
        let approveLink = $(this);

        let confirmApprove = confirm("Esti sigur ca vrei sa aprobi articolul?");
        if(confirmApprove){
            $.ajax({
                url: approveArticleUrl.replace('id', articleId),
                type: 'PUT',
                success: function(){
                    approveLink.remove();
                }
            });
        }
    });

    $('#form-create-article').submit(function(e){
        e.preventDefault();
        let title = $('#title').val();
        let content = $('#content').val();
        let form = $(this);

        $.ajax({
            url: createArticleUrl,
            type: 'POST',
            data: {title: title, content: content},
            success: function(response){
                form.find("input[type=text], textarea").val("");
                let card = '<div class="card mt-3"> <div class="card-body"><h5 class="card-title">' + title + '</h5><a class="card-link text-primary font-weight-bold view-article" data-article_id="'+ response +'">Vezi articolul</a><a class="card-link text-danger font-weight-bold delete-article" data-article_id="'+ response +'">Sterge</a><div class="article-content"></div></div></div>';     
        
                $('#articles-container').append(card);
            }
        });
    });
});