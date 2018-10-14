$(function() {
	
    $('#search').keyup(function() {
			
        $.ajax({
            type: "GET",
            url: "/search_product/",
            data: {
                'search_text' : $('#search').val(),
            },
            success: searchSuccess,
            dataType: 'html'
        });
    });
	
});

function searchSuccess(data, textStatus, jqXHR)
{	
    $('#search-resultsss').html(data)
}