

var buttons = document.getElementsByTagName("button");
var buttonsCount = buttons.length;



for (var i = 0; i <= buttonsCount; i += 1) {
    buttons[i].onclick = function(e) {

		if (document.getElementById(this.id).innerHTML == 'Subscribe')
			{

			document.getElementById(this.id).innerHTML = 'Subscribed';
			
	
		
			var univ_id = document.getElementById(this.id).id;
			var user_id = document.getElementById(this.id).value;
			
			var postData = {
                'univ_id' : univ_id,
                'user_id' : user_id
        };
		 alert(postData)
		  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

			$.ajax({
            method: "POST",
            url: "/yes_subscription/",
            data: postData,
			
			});
			
			
			}
			
		else if(document.getElementById(this.id).innerHTML == 'Subscribed')
			{
				
			document.getElementById(this.id).innerHTML = 'Subscribe';
				
			var product_id = document.getElementById(this.id).id;

			$.ajax({
            type: "GET",
            url: "/no_subscription/",
            data: {
                'univ_id' : univ_id,
				'user_id' : user_id,
            },
            dataType: 'html',
			
			});
				
			}
    };
}

function searchSuccess2(data, textStatus, jqXHR)
{	


}









