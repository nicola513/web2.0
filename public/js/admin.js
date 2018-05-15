function getDeleteData(stuId){
				var student_id = stuId
				 if (confirm("Do you want to delete "+stuId+" student data?"))
				    {
				        $.ajax({
				            url: 'delete',
				            type: 'POST', // Or any HTTP method you like
				            data: {data: stuId}
				        });
				    }
				};

				$(document).ajaxStop(function(){
    				window.location.reload();
				});
$.ajaxSetup({
			   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});