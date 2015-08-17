<br/>
<div class="container bs-docs-container">

    <div class="row" >
        <div class="col-md-9" role="main">
			<div class="bs-docs-section">
			
				<div class="panel panel-default" ng-show="NsnInfo">
					<div class="panel-heading">National Stock Number Information</div>
					<div class="panel-body">
				
				<TABLE class="table" style="border-spacing:0; border-collapse:collapse; width:100%;">
				<tr>
					<th>NSN</th>
					<th>FSC</th>
					<th>NIIN</th>
					<th>Shelf</th>
					<th>Hazmat</th>
					<th>DEMIL</th>
					
				</tr>
	
				<tr>
					<td rowspan="3">{{names.product_nsn}}<br><br>
					<i>Item Description:</i><br>
					<b> {{product_data.product_description}}</b>
					</td>
					
					<td>{{names.product_fsc}}</td>
					<td>{{names.product_niin}}</td>
					<td>{{names.product_shelf}}</td>
					<td>{{names.product_hazmat}}</td>
					<td>{{names.product_demil}}</td>
					
				</tr>
				<tr>
					<th>CIIC </th>
					<th>HCC </th>
					<th>ESD </th>
					<th>PMIC </th>
					<th>Critical </th>
					
				</tr>
				<tr>				
					<td>{{names.product_ciic}}</td>
					<td>{{names.product_hcc}}</td>
					<td>{{names.product_esd}}</td>
					<td>{{names.product_pmic}}</td>
					<td>{{names.product_critical}}</td>
				</tr>
				
			</table>

					
					</div>
				</div>
				<!-- panel start-->
				<div class="panel panel-default" ng-show="ProductInfo">
					<div class="panel-heading">Product Information</div>
					<div class="panel-body">	
					  	 	 	 	 	 	 	 	 	
					<table  class="table">
					
						<th>PRODUCT NAME</th>
						<th>PRODUCT DESCRIPTION</th>
						
						<tr>
							<td>{{product_data.product_name}}</td>
							<td>{{product_data.product_description}}</td>
							
						</tr>
					</table>
					
					</div>
				</div>
				<!-- panel end-->		
  
			</div>
		</div>
		
		<div class="col-md-3">
			
			<div class="panel panel-default">
					<div class="panel-heading">Need Pricing and delivering?</div>
					<div class="panel-body">
					
						<form role="form" class="ajax-form" method="post" ng-submit="submitEmail()" action="<?php echo base_url(); ?>dashboard/send_email_customer">
						
							<div class="alert alert-success hide">
							<i class="fa fa-check"></i><span class="success_message">&nbsp;</span>
							</div> 
  
							<div class="form-group">
								<label for="exampleInputPartno">Part :</label>
								<input type="text" class="form-control" id="part_id" placeholder="Enter Part No" name="part_no" ng-model="formData.part_no">
								<span class="text-red error_message part_no_error_msg error"><?php echo form_error('part_no'); ?></span>  
							</div>
							
							<div class="form-group">
								<label for="exampleInputQuantity">Quantity : </label>
								<input type="text" class="form-control" id="" placeholder="Quntity" name="quantity" ng-model="formData.quantity">
								<span class="text-red error_message quantity_error_msg error"><?php echo form_error('quantity'); ?></span> 
							</div>
							
							<div class="form-group">
								<label for="exampleInputEmail">Email :</label>
								<input type="text" class="form-control" id="" placeholder="Enter Email" name="email" ng-model="formData.email">
								<span class="text-red error_message email_error_msg error"><?php echo form_error('email'); ?></span> 
							</div>
  
							<button type="submit" class="btn btn-success">Get a Quote</button>
							
						</form>
	
					
					</div>
				</div>
			
		</div>
		

	</div>
</div>

	
<script>
var app = angular.module('myApp', []);

app.controller('customersCrtl', function ($scope, $http, $timeout) {
	
	$scope.formData = {};
	$scope.submission = false;

	var param = function(data) {
        var returnString = '';
        for (d in data){
            if (data.hasOwnProperty(d))
               returnString += d + '=' + data[d] + '&';
        }
        // Remove last ampersand and return
        return returnString.slice( 0, returnString.length - 1 );
	};
 
	$scope.submitForm = function () {

		    $http({
			method  : 'POST',
			url     : '<?php echo base_url(); ?>dashboard/get_product_information',
			data    : param($scope.formData),  // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
			})
		    .success(function(response) {
					    
					if(response.status == 0){	
					$scope.NsnInfo = false;
					$scope.ProductInfo = false;
					}else{
					$scope.names = response.product_nsn;
					$scope.product_data = response.product_info;
					$scope.NsnInfo = true;
					$scope.ProductInfo = true;	
					}
					
				
				
			});
		   
	  }
	
	/*
	 $scope.submitEmail = function () {

		    $http({
			method  : 'POST',
			url     : '<?php echo base_url(); ?>dashboard/send_email_customer',
			data    : param($scope.formData),  // pass in data as strings
			headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
			})
		    .success(function(response) {
				
				
				if ( ! response.status) {
				
				$.each( response.errors, function( index, value ){
					$form.find('.'+index+'_error_msg').html(value);
				});
		
			} else {
	
				// ALL GOOD! just show the success message!
				$form.find('.success_message').html(response.message).parents('.alert-success').removeClass('hide');
				window.location.reload();
	
			}
					
				
			});
		   
	  }
	
	*/
	
	
});
</script>
<script>
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
				//window.location.reload();
	
			}
			// here we will handle errors and validation messages
		});
		
		// stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
	});
	
});

</script>


  </body>
</html>