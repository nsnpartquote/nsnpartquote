// JavaScript Document

$(function(){
	$( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
});

$(function(){
	$('.DeleteAction').click(function(){
		if(confirm('Are you sure you want to Delete?')){
			
			location.href = base_url + $(this).attr('rel');
			
		}
	});
});

$(document).ready(function() {
	
	$('.ajax-form').submit(function(event){
		
		var $form = $(this);
		
		$form.find('.error_message').html('');
		
		// process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : $form.attr('action'), // the url where we want to POST
            data        : $form.serialize(), // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true
        })
		// using the done promise callback
		.done(function(data) {

			// log data to the console so we can see
			//console.log(data); 
			
			// here we will handle errors and validation messages
			if ( ! data.status) {
				
				$.each( data.errors, function( index, value ){
					$form.find('.'+index+'_error_msg').html(value);
				});
		
			} else {
	
				// ALL GOOD! just show the success message!
				$form.find('.success_message').html(data.message).parents('.alert-success').removeClass('hide');
				window.location.reload();
	
			}
			// here we will handle errors and validation messages
		});
		
		// stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
	});
	
});



	
$(document).ready(function (e) {
$("form.ajax-form-file").on('submit',(function(e) {
	var $form = $(this);
        e.preventDefault();
        $.ajax({
            url: $form.attr('action'),
            type: "POST",
            data:  new FormData(this),
			dataType: 'json',
            contentType: false,
            cache: false,
            processData:false, 		          
       })
	   
	   // using the done promise callback
		.done(function(data) {
			// log data to the console so we can see
			//console.log(data);
			
			// here we will handle errors and validation messages
			if ( ! data.status) {
				
				$.each( data.errors, function( index, value ){
					
					$form.find('.'+index+'_error_msg').html(value);
				});
		
			} else {
	
				// ALL GOOD! just show the success message!
				$form.find('.success_message').html(data.message).parents('.alert-success').removeClass('hide');
				window.location.reload();
	
			}
			// here we will handle errors and validation messages
		});
		
		// stop the form from submitting the normal way and refreshing the page
        e.preventDefault();
	    
	   
    }));
});

