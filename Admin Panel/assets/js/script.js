

//var httpHost = window.location.origin+'/'+window.location.pathname.split('/')[1]+"/members";


function login()
{
      $('#loginForm').on('submit',function(e){
         e.preventDefault();
		  httpHost = $(this).attr('action');
         $.ajax({
              type : 'POST',
              url  :  httpHost+'/core/api/auth/log/login',
              data : $(this).serialize(),
              dataType : 'json',
              beforeSend : function (response)
              {
				$('#resp').html("<img src='assets/images/typing.svg'>");
              },
              success : function(response){
				  console.log(response);
                if(response.status =="success") 
                {
                  $('#resp').html("<h3 style='color:green;'>"+response.message+"</h3>");
                  setTimeout(function(){
					location.reload();
				   },3000);
                  
                }
                else
                {
                  $('#resp').html("<h5 style='color:red;'>"+response.message+"</h5>");
                }
              }

         })
		 $(this).unbind('submit');
      })
}




function logoff(httpHost)
{
 

   $.ajax({
      type : 'POST',
      url  : httpHost+'/core/api/auth/log/signout',
      success : function(response){
          location.href = httpHost;
      }
   })

}
$(document).ready(function() {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatars').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    
     
    $(".file-upload").on('change', function(){
        readURL(this);
    });
});

function upstatus(id,type,httpHost){
	
	$.ajax({
		type     : 'POST',
		url      : httpHost+'/core/api/0/'+type+'/active',
		data: 'id='+id,
		success: function(result){
		if (result == "success") {
			$.notify({
			title: "<strong>Success:</strong> ",
			icon: 'glyphicon glyphicon-user',
			message: "updated successfully"
		
			},{animate:{
			enter: "animated fadeInUp",
			exit: "animated fadeOutDown"
			},type:'success'});
			setInterval(function () {
			location.reload();
			 }, 1000);
		}else{
			$.notify({
			title: "<strong>Failed:</strong> ",
			icon: 'glyphicon glyphicon-user',
			message: "Failed to update"
		
			},{animate:{
			enter: "animated fadeInUp",
			exit: "animated fadeOutDown"
			},type:'danger'});
		}
		//$("#loads").load(" #loads");
	  }
	  });
}


function Save(type,httpHost){
			var events = $("#signupForm" );
			$( "#signupForm" ).validate( {
				rules: {
					name: "required",
					appname: "required",
					status: "required",
					radio_stream: "required",
					whatsapp: {
						required: false,
						number: true
					},
				},
				submitHandler: function (form) {
				   $.ajax({
					type     : 'POST',
					url      : httpHost+'/core/api/0/'+type+'/add',
					data     : new FormData($(form)[0]),
					mimeType : "multipart/form-data",
				    success: function(result){
					console.log(result);
					if (result == "success") {
						$.notify({
						title: "<strong>Success:</strong> ",
						icon: 'glyphicon glyphicon-user',
						message: type+" created successfully"
					
						},{animate:{
						enter: "animated fadeInUp",
						exit: "animated fadeOutDown"
						},type:'success'});
						setInterval(function () {
						location.reload();
						 }, 3000);
						events[0].reset();
					}else{
						$.notify({
						title: "<strong>Failed:</strong> ",
						icon: 'glyphicon glyphicon-user',
						message: "Failed to create "+type
					
						},{animate:{
						enter: "animated fadeInUp",
						exit: "animated fadeOutDown"
						},type:'danger'});
					}
				  },
				  cache: false,
				  contentType: false,
			      processData: false
				  
				  });
				$(this).unbind('submit');
			
				},
				messages: {
					name: "This field is required.",
					appname: "This field is required.",
					description: "This field is required.",
					tv_stream: "This field is required.",
					themename: "This field is required.",
					grad_start_color: "This field is required.",
					grad_end_color: "This field is required.",
					grad_orientation: "This field is required.",
					radio_stream: "This field is required.",
					title: "This field is required.",
					website: "This field is required.",
					facebook: "This field is required.",
					youtube: "This field is required.",
					whatsapp: {
						required: "This field is required.",
						number: "Please enter a valid number."
					},
					
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "file" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".colsm" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".colsm" ).addClass( "has-success" ).removeClass( "has-error" );
				}
				
			} );
			
} 

function del(id,type,httpHost){
	if(confirm("Are you sure to delete this ?")){
	$.ajax({
		type     : 'POST',
		url      : httpHost+'/core/api/0/'+type+'/delete',
		data: 'id='+id,
		success: function(result){
		if (result == "success") {
			$.notify({
			title: "<strong>Success:</strong> ",
			icon: 'glyphicon glyphicon-user',
			message: "deleted successfully"
		
			},{animate:{
			enter: "animated fadeInUp",
			exit: "animated fadeOutDown"
			},type:'success'});
			setInterval(function () {
			location.reload();
			 }, 2000);
		}else{
			$.notify({
			title: "<strong>Failed:</strong> ",
			icon: 'glyphicon glyphicon-user',
			message: "Failed to delete"
		
			},{animate:{
			enter: "animated fadeInUp",
			exit: "animated fadeOutDown"
			},type:'danger'});
		}
		//$("#loads").load(" #loads");
	  }
	  });		
	
	}
}

function update(type,httpHost)
{
  //$('#updateForms').on('submit',function(e){
  $(document).on('submit','#updateForms',function(e){
	 e.preventDefault();
	  var events = $(this);
	 $.ajax({
		type     : 'POST',
		url      : httpHost+'/core/api/0/'+type+'/update',
		data     : new FormData($(this)[0]),
		mimeType : "multipart/form-data",
		success: function(result){
		console.log(result);
		$('.modal').modal('hide');
		if (result == "success") {
			$.notify({
			title: "<strong>Success:</strong> ",
			icon: 'glyphicon glyphicon-user',
			message: type+" updated successfully"
		
			},{animate:{
			enter: "animated fadeInUp",
			exit: "animated fadeOutDown"
			},type:'success'});
			setInterval(function () {
			location.reload();
			}, 3000);
			events[0].reset();
		}else{
			$.notify({
			title: "<strong>Failed:</strong> ",
			icon: 'glyphicon glyphicon-user',
			message: "Failed to update "+type
		
			},{animate:{
			enter: "animated fadeInUp",
			exit: "animated fadeOutDown"
			},type:'danger'});
		}
	  },
	  cache: false,
	  contentType: false,
	  processData: false
	  
	  });
  });
}

function forgetpass(httpHost){
	$(document).on('submit','#forgetForm',function(e){
	 e.preventDefault();
	  var events = $(this);
	  $.ajax({
              type : 'POST',
              url  :  httpHost+'/core/ajax.php',
              data : $(this).serialize(),
              dataType : 'text',
              beforeSend : function (response)
              {
				$('#response').html("<img src='assets/images/loader.gif'>");
              },
              success : function(response){
				  //console.log(response);
			  $('#response').html(response);
			  events[0].reset();
              }

         })
	  $(this).unbind('submit');
	});
	
	
}

$(document).ready(function() {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatars').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    
     
    $(".file-upload").on('change', function(){
        readURL(this);
    });
});



function updatepass(type,httpHost)
{
   $('#updateForms').on('submit',function(e){ 
    //alert(httpHost+"/"+$(this).attr('action'));   
        e.preventDefault();
          var events = $(this);
	 $.ajax({
		type     : 'POST',
		url      : httpHost+'/core/api/0/'+type+'/update',
		data     : new FormData($(this)[0]),
		mimeType : "multipart/form-data",
		dataType : 'json',
		success: function(result){
		$('.modal').modal('hide');
		//console.log();
		if (result.status == "success") {
			$.notify({
			title: "<strong>Success:</strong> ",
			icon: 'glyphicon glyphicon-user',
			message: type+" updated successfully"
		
			},{animate:{
			enter: "animated fadeInUp",
			exit: "animated fadeOutDown"
			},type:'success'});
			setInterval(function () {
			location.reload();
			}, 3000);
			events[0].reset();
		}else if (result.status == "notmatch") {
			$.notify({
			title: "<strong>Success:</strong> ",
			icon: 'glyphicon glyphicon-user',
			message: "Confirm password not match"
		
			},{animate:{
			enter: "animated fadeInUp",
			exit: "animated fadeOutDown"
			},type:'warning'});
			setInterval(function () {
			location.reload();
			}, 3000);
			events[0].reset();
		}else{
			$.notify({
			title: "<strong>Failed:</strong> ",
			icon: 'glyphicon glyphicon-user',
			message: "Failed to update "+type
		
			},{animate:{
			enter: "animated fadeInUp",
			exit: "animated fadeOutDown"
			},type:'danger'});
		}
	  },
	  cache: false,
	  contentType: false,
	  processData: false
	  
	  });
        $(this).unbind('submit');
   }) 
}

function updateServerkey(type,httpHost)
{
   $('#updateFormskey').on('submit',function(e){ 
    //alert(httpHost+"/"+$(this).attr('action'));   
        e.preventDefault();
          var events = $(this);
	 $.ajax({
		type     : 'POST',
		url      : httpHost+'/core/api/0/'+type+'/updateserver',
		data     : new FormData($(this)[0]),
		mimeType : "multipart/form-data",
		dataType : 'json',
		success: function(result){
		$('.modal').modal('hide');
		//console.log();
		if (result.status == "success") {
			$.notify({
			title: "<strong>Success:</strong> ",
			icon: 'glyphicon glyphicon-user',
			message: type+" updated successfully"
		
			},{animate:{
			enter: "animated fadeInUp",
			exit: "animated fadeOutDown"
			},type:'success'});
			setInterval(function () {
			location.reload();
			}, 3000);
			events[0].reset();
		}else{
			$.notify({
			title: "<strong>Failed:</strong> ",
			icon: 'glyphicon glyphicon-user',
			message: "Failed to update "+type
		
			},{animate:{
			enter: "animated fadeInUp",
			exit: "animated fadeOutDown"
			},type:'danger'});
		}
	  },
	  cache: false,
	  contentType: false,
	  processData: false
	  
	  });
        $(this).unbind('submit');
   }) 
}

/************save notification************/
function SaveNotify(type,httpHost){
			var events = $("#signupForm" );
			$( "#signupForm" ).validate( {
				rules: {
					title: "required",
					message: "required",
					appname: "required",
				},
				submitHandler: function (form) {
				httpHost = $(form).attr('action');
				   $.ajax({
					type     : 'POST',
					url      : httpHost+'/core/api/0/'+type+'/add',
					data     : new FormData($(form)[0]),
					mimeType : "multipart/form-data",
				    success: function(result){
					console.log(result);
					if (result == "success") {
            			$.notify({
            			title: "<strong>Success:</strong> ",
            			icon: 'glyphicon glyphicon-user',
            			message: type+"sent successfully!"
            		},{animate:{
            			enter: "animated fadeInUp",
            			exit: "animated fadeOutDown"
            			},type:'success'});
            			setInterval(function () {
            			location.reload();
            			 }, 3000);
            		}else{
            			$.notify({
            			title: "<strong>Failed:</strong> ",
            			icon: 'glyphicon glyphicon-user',
            			message: "Failed to send"
            		},{animate:{
            			enter: "animated fadeInUp",
            			exit: "animated fadeOutDown"
            			},type:'danger'});
            		}
				  },
				  cache: false,
				  contentType: false,
			      processData: false
				  
				  });
				$(this).unbind('submit');
			
				},
				messages: {
					name: "This field is required.",
					title: "This field is required.",
					message: "This field is required.",
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "file" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".colsm" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".colsm" ).addClass( "has-success" ).removeClass( "has-error" );
				}
				
			} );
			
}