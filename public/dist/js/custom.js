  
$(document).ready(function(){





	//////// Start Create Student Here //
	

	//----------< START >----------//
	//-> live image preview 

	function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function(e) {
	      $('#read-img').attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(input.files[0]);
	  }
	}

	$("#st_photo").change(function() {
	  readURL(this);
	});
	//----------< END >----------//



	//----------< START >----------//
	//->when change class then get section for this
	$('#st_class').change(function(){
		var value = $(this).val();
		var _token = $('input[name="_token"]').val();
		// console.log(_token);
		$.ajax({
			type:'post',
			url:'/section/check-section',
			data:{value:value,_token:_token},
			success:function(response){
				// console.log(response)
				// document.getElementById('subject_section').value = response
				$('#st_section').html(response.data)
			}
		});
	});	
	//----------< END >----------//


	//----------< START >----------//
	//-> When change exam session then get exam
	$('#exam_session').change(function(){
		
		var stclass = $('#st_class').val();
		var value = $(this).val();
		var _token = $('input[name="_token"]').val();
		// console.log(stclass);
		$.ajax({
			type:'post',
			url:'/exam/check-exam',
			data:{value:value,_token:_token,stclass:stclass},
			success:function(response){
				// console.log(response)
				// document.getElementById('subject_section').value = response
				$('#st_exam').html(response.data)
			}
		});
	});
	//----------< END >----------//

	//----------< START >----------//
	//->student addform submit
	$('#studentAddForm').on('submit',function(e){
	    e.preventDefault();
	    $('#addStudentModal').modal('hide');
	    var formData = $('#studentAddForm');
	    //console.log(formData)
	    
	    $.ajax({
	        type:"POST",
	        url:'/student',
	        data: new FormData(this),
	        contentType: false,
	        cache:false,
	        processData:false,
	        dataType:"json",
	        success:function(response){
				if(response.error == false){
			    	swal({
					  title: response.headingMsg,
					  text: response.successMsg,
					  icon: response.iconMsg,  
					});
			    	setTimeout(location.reload.bind(location),150)
			    	
				}
				else if(response.error == true){
			    	swal({
					  title: response.headingMsg,
					  text: response.errorMsg,
					  icon: response.iconMsg,  
					});
					$('#addStudentModal').modal('show');
				}
	        },
	        error:function(error){
	        	var errors = error.responseJSON.errors
	        	var firstError = Object.keys(errors)[0];
	        	var firstErrorMsg = errors[firstError][0];
	        	var DOM = document.getElementById(firstError);


	        	var formControls = document.querySelectorAll('.form-control')
	        	formControls.forEach((element)=> element.classList.remove('warningBorder'))
	        	DOM.classList.add('warningBorder');
	        	swal({
				    title: "Warning!",
				    text: firstErrorMsg,
				    icon: "warning",  
				});
	    		$('#addStudentModal').modal('show');

	        }
	    });
	});
	//----------< END >----------//


  	//////// Start Update Student Here //
	$(document).on('click','.edit', function(){
		var id = $(this).attr("id");
	

			var class_id = $(this).attr('data');
			var selected_section = $(this).attr('name');
			var _token = $('input[name="_token"]').val()
			console.log(selected_section)
			$.ajax({
				type:'post',
				url:'/section/update/check-section',
				data:{class_id:class_id,_token:_token,id:id,selected_section:selected_section},
				success:function(response){
					// console.log(response.data)
					// document.getElementById('subject_section').value = response
					$('#st_section_update'+id).html(response.data);
				},
				error:function(error){
					console.log(error)
				}
			});


			$('#st_class_update'+id).change(function(){
				if($(this).val() != ''){
					var value = $(this).val();
					var _token = $('input[name="_token"]').val();
					// console.log(_token);
					$.ajax({
						type:'post',
						url:'/section/check-section',
						data:{value:value,_token:_token},
						success:function(response){
							// console.log(response.data)
							// document.getElementById('subject_section').value = response
							$('#st_section_update'+id).html(response.data)
						}
					});
				}
			});


			$('#single-edit'+id).modal('show')


	    $('#studentUpdateForm'+id).on('submit',function(e){
	    	e.preventDefault();
			$('#single-edit'+id).modal('hide');

		    $.ajax({
		        type:"POST",
		        url:'/student/update',
		        data: new FormData(this),
		        contentType: false,
		        cache:false,
		        processData:false,
		        dataType:"json",
		        success:function(response){
		        	if(response.error == false){
				    	swal({
						  title: response.headingMsg,
						  text: response.successMsg,
						  icon: response.iconMsg,  
						});
				    	setTimeout(location.reload.bind(location),150)
				    	
					}
					else if(response.error == true){
				    	swal({
						  title: response.headingMsg,
						  text: response.errorMsg,
						  icon: response.iconMsg,  
						});
						$('#single-edit'+id).modal('show');
					}
		          	// console.log(response)
		        },
		        error:function(error){
		        	console.log(error)
		        	var errors = error.responseJSON.errors
		        	var firstError = Object.keys(errors)[0];
		        	var firstErrorMsg = errors[firstError][0];
		        	var DOM = document.getElementById(firstError);


		        	var formControls = document.querySelectorAll('.form-control')
		        	formControls.forEach((element)=> element.classList.remove('warningBorder'))
		        	DOM.classList.add('warningBorder');
		        	swal({
						  title: "Warning!",
						  text: firstErrorMsg,
						  icon: "warning",  
						});
					$('#single-edit'+id).modal('show')
		        }
		    });

		});
	
	});
	// End Update Student Here //////////////


	/////////// Start Delete Student Here //
	$(document).on('click', '.st-delete-btn', function(){
		var id = $(this).attr('id')
		var st_name = $(this).attr('data')
		// console.log(id)
		// console.log(st_name)
		swal({
		  title: "Are you sure?",
		  text: '\"'+st_name+"\" will be delete !",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
			    $.ajax({
					type:"GET",
					url:"/student/deleteid/"+id,
					data:id,
					success:function(response){
						console.log(response)
						swal(response.successMsg, {
						    icon: response.iconMsg,
						});	
			    		setTimeout(location.reload.bind(location),160);
					},
					error:function(error){
						console.log(error)
					}
				});
				
			}
		});	
	});
	// End Delete Student Here /////////////









	/////////// Start Create Class Here //

	$('#addClasFrom').on('submit',function(e){
		e.preventDefault()
		$('#addClassModal').modal('hide');
		formData = $('#addClasFrom');
		// console.log(formData);

		$.ajax({
			type: "post",
			url: "/class",
			data: new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			dataType:'json',
			success: function(response){
				if(response.error == false){
			    	swal({
					  title: response.headingMsg,
					  text: response.successMsg,
					  icon: response.iconMsg,  
					});
			    	setTimeout(location.reload.bind(location),150)
			    	
				}
				else if(response.error == true){
			    	swal({
					  title: response.headingMsg,
					  text: response.errorMsg,
					  icon: response.iconMsg,  
					});
					$('#addClassModal').modal('show');
				}
			},
			error:function(error){
				var error = error.responseJSON.errors;
				var firstError = Object.keys(error)[0]
				var firstErrorMsg = error[firstError][0];
				var DOM = document.getElementById(firstError);


		        var formControls = document.querySelectorAll('.form-control')
		        formControls.forEach((element)=> element.classList.remove('warningBorder'))
		        DOM.classList.add('warningBorder');
	    		swal({
				  title: "Warning!",
				  text: firstErrorMsg,
				  icon: "warning",  
				});
				$('#addClassModal').modal('show');

			}
		});
	}); 
	// End Create Class Here //////////////



	/////////////// Start Update Class Here //

	$(document).on('click','.class-edit-btn',function(){
		var id = $(this).attr('id')
		$('#addClassModal'+id).modal('show')
		console.log(id)
		$('#addClassFrom'+id).on('submit',function(e){
			e.preventDefault()
			$('#addClassModal'+id).modal('hide')

			$.ajax({
				type:'post',
				url:'/class/update',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				dataType:'json',
				success:function(response){
		        	if(response.error == false){
				    	swal({
						  title: response.headingMsg,
						  text: response.successMsg,
						  icon: response.iconMsg,  
						});
				    	setTimeout(location.reload.bind(location),150)
				    	
					}
					else if(response.error == true){
				    	swal({
						  title: response.headingMsg,
						  text: response.errorMsg,
						  icon: response.iconMsg,  
						});
						$('#addClassModal'+id).modal('show');
					}
				},
				error:function(error){
					var error = error.responseJSON.errors;
					var firstError = Object.keys(error)[0]
					var firstErrorMsg = error[firstError][0];
					swal({
					  title: "Warning!",
					  text: firstErrorMsg,
					  icon: "warning",  
					});
					$('#addClassModal'+id).modal('show')

				}
			})
		});
	});

	// End Update Class Here //////////////



	//////////// Start Delete Class Here //

	$(document).on('click','.class-delete-btn',function(){
		var id = $(this).attr('id')
		var name = $(this).attr('data')
		// console.log(name)

		swal({
			  title: "Are you sure?",
			  text: "Class \""+name+"\" will be delete!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$.ajax({
					type:'get',
					url:'/class/delete/'+id,
					data:id,
					contentType:false,
					cache:false,
					processData:false,
					dataType:'json',
					success:function(response){
						if(response.error == false){
							// console.log(response)
							swal("Data Delete Successfully", {
						      icon: "success",
						    });
							setTimeout(location.reload.bind(location),160)
						}
						else if(response.error == true){
							swal(response.errorMsg, {
						      icon:response.iconMsg,
						    });
						}
					},
					error:function(error){
						console.log(error)
					}
				});

			}
		});
	
	});
	// End Delete Class Here //////////////




	/////////// START SUBJECT SCRIPT HERE //

	$(document).on('click','#add-subject-modal-btn',function(){
		$('#add-subject-modal').modal('show')

		////// check section input Droupdown //
			$('#section-items').hide()
			$('.check_section').on('click', function(){
				var check_section = document.querySelector('input[name="check_section"]:checked').value;
				if(check_section == 1){
					$('#section-items').show()
				}
				else{
					$('#section-items').hide()
					document.getElementById('subject_section').value = ''
				}
			});



		$('.subject_class').change(function(){
			if($(this).val() != ''){
				var value = $(this).val();
				var dataName = $(this).attr('name');
				var _token = $('input[name="_token"]').val();
				// console.log(_token);
				$.ajax({
					type:'post',
					url:'/section/check-section',
					data:{value:value,_token:_token},
					success:function(response){
						// console.log(response.data)
						// document.getElementById('subject_section').value = response
						$('#subject_section').html(response.data)
					}
				});
			}
		});


		//////// Add Subject Submit //
		$('#addSubjectForm').on('submit',function(e){
			e.preventDefault()
			$('#add-subject-modal').modal('hide')
			formData = $('#addSubjectForm');
			// console.log(formData);
			$.ajax({
				type: "post",
				url: "/subject",
				data: new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				dataType:'json',
				success: function(response){
					if(response.error == false){
				    	swal({
						  title: response.headingMsg,
						  text: response.successMsg,
						  icon: response.iconMsg,  
						});
				    	setTimeout(location.reload.bind(location),150)
				    	
					}
					else if(response.error == true){
				    	swal({
						  title: response.headingMsg,
						  text: response.errorMsg,
						  icon: response.iconMsg,  
						});
						$('#add-subject-modal').modal('show');
					}
				},
				error:function(error){
					var error = error.responseJSON.errors;
					var firstError = Object.keys(error)[0]
					var firstErrorMsg = error[firstError][0];
					var DOM = document.getElementById(firstError);

			        var formControls = document.querySelectorAll('.form-control')
			        formControls.forEach((element)=> element.classList.remove('warningBorder'))
			        DOM.classList.add('warningBorder');
		    		swal({
					  title: "Warning!",
					  text: firstErrorMsg,
					  icon: "warning",  
					});
					$('#add-subject-modal').modal('show');

				}
			});
		}); 
	
	});

	// End Create Subject Here //////////////




	/////////////// Start Update Subject Here //

		$(document).on('click','.subject-edit-btn',function(){
			id = $(this).attr('id')
			// console.log(id)
			$('#update-subject-modal'+id).modal('show')


			var class_id = $(this).attr('data');
			var selected_section = $(this).attr('name');
			var _token = $('input[name="_token"]').val()
			console.log(selected_section)
			$.ajax({
				type:'post',
				url:'/section/update/check-section',
				data:{class_id:class_id,_token:_token,id:id,selected_section:selected_section},
				success:function(response){
					// console.log(response.data)
					// document.getElementById('subject_section').value = response
					$('#subject_section_update'+id).html(response.data);
				},
				error:function(error){
					console.log(error)
				}
			});



			$('#subject_class'+id).change(function(){
				if($(this).val() != ''){
					var value = $(this).val();
					var _token = $('input[name="_token"]').val();
					// console.log(_token);
					$.ajax({
						type:'post',
						url:'/section/check-section',
						data:{value:value,_token:_token},
						success:function(response){
							// console.log(response.data)
							// document.getElementById('subject_section').value = response
							$('#subject_section_update'+id).html(response.data)
						}
					});
				}
			});




			$('#updateSubjectForm'+id).on('submit',function(e){
				e.preventDefault()
				$('#update-subject-modal'+id).modal('hide')
				//formData = $(#updateSubjectForm'+id);
				// console.log(formData);
				var x = $('#updateSubjectForm'+id).serialize();
				console.log(x)
				$.ajax({
					type: "post",
					url: "/subject/update",
					data: new FormData(this),
					contentType:false,
					cache:false,
					processData:false,
					dataType:'json',
					success: function(response){
						if(response.error == false){
					    	swal({
							  title: response.headingMsg,
							  text: response.successMsg,
							  icon: response.iconMsg,  
							});
					    	setTimeout(location.reload.bind(location),150)
					    	
						}
						else if(response.error == true){
					    	swal({
							  title: response.headingMsg,
							  text: response.errorMsg,
							  icon: response.iconMsg,  
							});
							$('#update-subject-modal'+id).modal('show');
						}
					},
					error:function(error){
						var error = error.responseJSON.errors;
						var firstError = Object.keys(error)[0]
						var firstErrorMsg = error[firstError][0];
						var DOM = document.getElementById(firstError);


				        var formControls = document.querySelectorAll('.form-control')
				        formControls.forEach((element)=> element.classList.remove('warningBorder'))
				        DOM.classList.add('warningBorder');
			    		swal({
						  title: "Warning!",
						  text: firstErrorMsg,
						  icon: "warning",  
						});
						$('#update-subject-modal'+id).modal('show');

					}
				});
			}); 
		});

	// End Update Subject Here //////////////



	//////////// Start Delete Subject Here //

	$(document).on('click','.subject-delete-btn',function(){
		var id = $(this).attr('id')
		var name = $(this).attr('data')
		// console.log(name)

		swal({
			  title: "Are you sure?",
			  text: "Class \""+name+"\" will be delete!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$.ajax({
					type:'get',
					url:'/subject/delete/'+id,
					data:id,
					contentType:false,
					cache:false,
					processData:false,
					dataType:'json',
					success:function(response){
						// console.log(response)
						swal(response.successMsg, {
					      icon: response.iconMsg,
					    });
						setTimeout(location.reload.bind(location),160)
					},
					error:function(error){
						console.log(error)
						swal({
						  title: "Warning!",
						  text: firstErrorMsg,
						  icon: "warning",  
						});
					}
				});
			    
			}
		});
	
	});
	// End Delete Subject Here //////////////








/////////// START SECTION SCRIPT HERE //

	$(document).on('click','#addSectionBtn',function(){
		$('#addSectionModal').modal('show')

		//////// Add section Submit //
		$('#addSectionForm').on('submit',function(e){
			e.preventDefault()
			$('#addSectionModal').modal('hide')
			formData = $('#addSectionForm');
			// console.log(formData);
			$.ajax({
				type: "post",
				url: "/section",
				data: new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				dataType:'json',
				success: function(response){
					// console.log(response)
					if(response.error == false){
				    	swal({
						  title: response.headingMsg,
						  text: response.successMsg,
						  icon: response.iconMsg,  
						});
				    	setTimeout(location.reload.bind(location),150)
				    	
					}
					else if(response.error == true){
				    	swal({
						  title: response.headingMsg,
						  text: response.errorMsg,
						  icon: response.iconMsg,  
						});
						$('addSectionModal').modal('show');
					}

				},
				error:function(error){
					// console.log(error)
					var error = error.responseJSON.errors;
					var firstError = Object.keys(error)[0]
					var firstErrorMsg = error[firstError][0];
					var DOM = document.getElementById(firstError);


			        var formControls = document.querySelectorAll('.form-control')
			        formControls.forEach((element)=> element.classList.remove('warningBorder'))
			        DOM.classList.add('warningBorder');
		    		swal({
					  title: "Warning!",
					  text: firstErrorMsg,
					  icon: "warning",  
					});
					$('#addSectionModal').modal('show');
					
				}
			});
		}); 
	
	});

	// End Create Secton Here //////////////




	/////////////// Start Update Secton Here //

		$(document).on('click','.section-edit-btn',function(){
			id = $(this).attr('id')
			console.log(id)
			$('#updateSectionModal'+id).modal('show')
			
			$('#updateSectionForm'+id).on('submit',function(e){
				e.preventDefault()
				$('#updateSectionModal'+id).modal('hide')
				//formData = $(#updateSubjectForm'+id);
				// console.log(formData);
				$.ajax({
					type: "post",
					url: "/section/update",
					data: new FormData(this),
					contentType:false,
					cache:false,
					processData:false,
					dataType:'json',
					success: function(response){
						if(response.error == false){
					    	swal({
							  title: response.headingMsg,
							  text: response.successMsg,
							  icon: response.iconMsg,  
							});
					    	setTimeout(location.reload.bind(location),150)
					    	
						}
						else if(response.error == true){
					    	swal({
							  title: response.headingMsg,
							  text: response.errorMsg,
							  icon: response.iconMsg,  
							});
							$('addSectionModal').modal('show');
						}
					},
					error:function(error){
						var error = error.responseJSON.errors;
						var firstError = Object.keys(error)[0]
						var firstErrorMsg = error[firstError][0];
						var DOM = document.getElementById(firstError);


				        var formControls = document.querySelectorAll('.form-control')
				        formControls.forEach((element)=> element.classList.remove('warningBorder'))
				        DOM.classList.add('warningBorder');
			    		swal({
						  title: "Warning!",
						  text: firstErrorMsg,
						  icon: "warning",  
						});
						$('#updateSectionModal'+id).modal('show');

					}
				});
			}); 
		});

	// End Update Secton Here //////////////



	//////////// Start Delete Secton Here //

	$(document).on('click','.section-delete-btn',function(){
		var id = $(this).attr('id')
		var name = $(this).attr('data')
		// console.log(name)

		swal({
			  title: "Are you sure?",
			  text: "Class \""+name+"\" will be delete!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$.ajax({
					type:'get',
					url:'/section/delete/'+id,
					data:id,
					contentType:false,
					cache:false,
					processData:false,
					dataType:'json',
					success:function(response){
						// console.log(response)
						if(response.error == false){
							swal("Data Delete Successfully", {
						      icon: "success",
						    });
							setTimeout(location.reload.bind(location),150)
						}
						else if(response.error == true){
							swal(response.errorMsg, {
						      icon: response.iconMsg,
						    });
						}
					},
					error:function(error){
						console.log(error)
						swal({
						  title: "Warning!",
						  text: "Opps! Can\'t Delete",
						  icon: "error",  
						});
					}
				});
			    
			}
		});
	
	});
	// End Delete Section Here //////////////





/////////// START EXAM SCRIPT HERE //

	$(document).on('click','#addExamBtn',function(){
		$('#addExamModal').modal('show')

		//////// Add Exam Submit //
		$('#addExamForm').on('submit',function(e){
			e.preventDefault()
			$('#addExamModal').modal('hide')
			// formData = $('#addExamForm');
			// console.log(formData);
			$.ajax({
				type: "post",
				url: "/exam",
				data: new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				dataType:'json',
				success: function(response){
					// console.log(response)
					if(response.error == false){
				    	swal({
						  title: response.headingMsg,
						  text: response.successMsg,
						  icon: response.iconMsg,  
						});
				    	setTimeout(location.reload.bind(location),150)
				    	
					}
					else if(response.error == true){
				    	swal({
						  title: response.headingMsg,
						  text: response.errorMsg,
						  icon: response.iconMsg,  
						});
						$('addExamModal').modal('show');
					}

				},
				error:function(error){
					console.log(error)
					var error = error.responseJSON.errors;
					var firstError = Object.keys(error)[0]
					var firstErrorMsg = error[firstError][0];
					var DOM = document.getElementById(firstError);


			        var formControls = document.querySelectorAll('.form-control')
			        formControls.forEach((element)=> element.classList.remove('warningBorder'))
			        DOM.classList.add('warningBorder');
		    		swal({
					  title: "Warning!",
					  text: firstErrorMsg,
					  icon: "warning",  
					});
					$('#addExamModal').modal('show');
					
				}
			});
		}); 
	
	});

	// End Create Exam Here //////////////




	/////////////// Start Update Exam Here //

		$(document).on('click','.exam-edit-btn',function(){
			id = $(this).attr('id')
			console.log(id)
			$('#updateExamModal'+id).modal('show')
			
			$('#updateExamForm'+id).on('submit',function(e){
				e.preventDefault()
				$('#updateExamModal'+id).modal('hide')
				// formData = $('#updateExamForm'+id).serialize();
				// console.log(formData);
				$.ajax({
					type: "post",
					url: "/exam/update",
					data: new FormData(this),
					contentType:false,
					cache:false,
					processData:false,
					dataType:'json',
					success: function(response){
						if(response.error == false){
					    	swal({
							  title: response.headingMsg,
							  text: response.successMsg,
							  icon: response.iconMsg,  
							});
					    	setTimeout(location.reload.bind(location),150)
					    	
						}
						else if(response.error == true){
					    	swal({
							  title: response.headingMsg,
							  text: response.errorMsg,
							  icon: response.iconMsg,  
							});
							$('#updateExamModal'+id).modal('show');
						}
					},
					error:function(error){
						console.log(error)
						var error = error.responseJSON.errors;
						var firstError = Object.keys(error)[0]
						var firstErrorMsg = error[firstError][0];
						var DOM = document.getElementById(firstError);


				        var formControls = document.querySelectorAll('.form-control')
				        formControls.forEach((element)=> element.classList.remove('warningBorder'))
				        DOM.classList.add('warningBorder');
			    		swal({
						  title: "Warning!",
						  text: firstErrorMsg,
						  icon: "warning",  
						});
						$('#updateExamModal'+id).modal('show');

					}
				});
			}); 
		});

	// End Update Exam Here //////////////



	//////////// Start Delete Exam Here //

	$(document).on('click','.exam-delete-btn',function(){
		var id = $(this).attr('id')
		var name = $(this).attr('data')
		// console.log(name)

		swal({
			  title: "Are you sure?",
			  text: "Class \""+name+"\" will be delete!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$.ajax({
					type:'get',
					url:'/exam/delete/'+id,
					data:id,
					contentType:false,
					cache:false,
					processData:false,
					dataType:'json',
					success:function(response){
						// console.log(response)
						if(response.error == false){
							swal("Data Delete Successfully", {
						      icon: "success",
						    });
							setTimeout(location.reload.bind(location),150)
						}
						else if(response.error == true){
							swal(response.errorMsg, {
						      icon: response.iconMsg,
						    });
						}
					},
					error:function(error){
						console.log(error)
						swal({
						  title: "Warning!",
						  text: "Opps! Can\'t Delete",
						  icon: "error",  
						});
					}
				});
			    
			}
		});
	
	});
	// End Delete Exam Here //////////////














/////////// Start Create Income Category Here //

	$('#addIncomeCatForm').on('submit',function(e){
		e.preventDefault()
		$('#addIncomeModal').modal('hide');
		formData = $('#addClasFrom');
		// console.log(formData);

		$.ajax({
			type: "post",
			url: "/account/income/add-category",
			data: new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			dataType:'json',
			success: function(response){
				if(response.error == false){
			    	swal({
					  title: response.headingMsg,
					  text: response.successMsg,
					  icon: response.iconMsg,  
					});
			    	setTimeout(location.reload.bind(location),150)
			    	
				}
				else if(response.error == true){
			    	swal({
					  title: response.headingMsg,
					  text: response.errorMsg,
					  icon: response.iconMsg,  
					});
					$('#addIncomeModal').modal('show');
				}
			},
			error:function(error){
				console.log(error)
				var error = error.responseJSON.errors;
				var firstError = Object.keys(error)[0]
				var firstErrorMsg = error[firstError][0];
				var DOM = document.getElementById(firstError);


		        var formControls = document.querySelectorAll('.form-control')
		        formControls.forEach((element)=> element.classList.remove('warningBorder'))
		        DOM.classList.add('warningBorder');
	    		swal({
				  title: "Warning!",
				  text: firstErrorMsg,
				  icon: "warning",  
				});
				$('#addIncomeModal').modal('show');

			}
		});
	}); 
	// End Create Income Category Here //////////////



	/////////////// Start Update  Income Category Here //

	$(document).on('click','.income-cat-edit-btn',function(){
		var id = $(this).attr('id')
		$('#incomeCatModal'+id).modal('show')
		console.log(id)
		$('#updateIncomeCatForm'+id).on('submit',function(e){
			e.preventDefault()
			$('#incomeCatModal'+id).modal('hide')

			$.ajax({
				type:'post',
				url:'/account/income/update-category',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				dataType:'json',
				success:function(response){
		        	if(response.error == false){
				    	swal({
						  title: response.headingMsg,
						  text: response.successMsg,
						  icon: response.iconMsg,  
						});
				    	setTimeout(location.reload.bind(location),150)
				    	
					}
					else if(response.error == true){
				    	swal({
						  title: response.headingMsg,
						  text: response.errorMsg,
						  icon: response.iconMsg,  
						});
						$('#incomeCatModal'+id).modal('show');
					}
				},
				error:function(error){
					var error = error.responseJSON.errors;
					var firstError = Object.keys(error)[0]
					var firstErrorMsg = error[firstError][0];
					swal({
					  title: "Warning!",
					  text: firstErrorMsg,
					  icon: "warning",  
					});
					$('#incomeCatModal'+id).modal('show')

				}
			})
		});
	});

	// End Update  Income Category Here //////////////



	//////////// Start Delete  Income Category Here //

	$(document).on('click','.income-cat-delete-btn',function(){
		var id = $(this).attr('id')
		var name = $(this).attr('data')
		// console.log(name)

		swal({
			  title: "Are you sure?",
			  text: "Category \""+name+"\" will be delete!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$.ajax({
					type:'get',
					url:'/account/income/delete-category/'+id,
					data:id,
					contentType:false,
					cache:false,
					processData:false,
					dataType:'json',
					success:function(response){
						if(response.error == false){
							// console.log(response)
							swal("Data Delete Successfully", {
						      icon: "success",
						    });
							setTimeout(location.reload.bind(location),160)
						}
						else if(response.error == true){
							swal(response.errorMsg, {
						      icon:response.iconMsg,
						    });
						}
					},
					error:function(error){
						console.log(error)
					}
				});

			}
		});
	
	});
	// End Delete  Income Category Here //////////////









/////////// Start Create Income Sub Category Here //

	$('#addIncomeSubCatForm').on('submit',function(e){
		e.preventDefault()
		$('#addIncomeSubCatModal').modal('hide');

		$.ajax({
			type: "post",
			url: "/account/income/add-sub-category",
			data: new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			dataType:'json',
			success: function(response){
				if(response.error == false){
			    	swal({
					  title: response.headingMsg,
					  text: response.successMsg,
					  icon: response.iconMsg,  
					});
			    	setTimeout(location.reload.bind(location),150)
			    	
				}
				else if(response.error == true){
			    	swal({
					  title: response.headingMsg,
					  text: response.errorMsg,
					  icon: response.iconMsg,  
					});
					$('#addIncomeSubCatModal').modal('show');
				}
			},
			error:function(error){
				console.log(error)
				var error = error.responseJSON.errors;
				var firstError = Object.keys(error)[0]
				var firstErrorMsg = error[firstError][0];
				var DOM = document.getElementById(firstError);


		        var formControls = document.querySelectorAll('.form-control')
		        formControls.forEach((element)=> element.classList.remove('warningBorder'))
		        DOM.classList.add('warningBorder');
	    		swal({
				  title: "Warning!",
				  text: firstErrorMsg,
				  icon: "warning",  
				});
				$('#addIncomeSubCatModal').modal('show');

			}
		});
	}); 
	// End Create Income Sub Category Here //////////////



	/////////////// Start Update  Income Sub Category Here //

	$(document).on('click','.income-sub-cat-edit-btn',function(){
		var id = $(this).attr('id')
		$('#incomeSubCatModal'+id).modal('show')
		console.log(id)
		$('#updateIncomeSubCatForm'+id).on('submit',function(e){
			e.preventDefault()
			$('#incomeSubCatModal'+id).modal('hide')

			$.ajax({
				type:'post',
				url:'/account/income/update-sub-category',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				dataType:'json',
				success:function(response){
		        	if(response.error == false){
				    	swal({
						  title: response.headingMsg,
						  text: response.successMsg,
						  icon: response.iconMsg,  
						});
				    	setTimeout(location.reload.bind(location),150)
				    	
					}
					else if(response.error == true){
				    	swal({
						  title: response.headingMsg,
						  text: response.errorMsg,
						  icon: response.iconMsg,  
						});
						$('#incomeSubCatModal'+id).modal('show');
					}
				},
				error:function(error){
					console.log(error)
					var error = error.responseJSON.errors;
					var firstError = Object.keys(error)[0]
					var firstErrorMsg = error[firstError][0];
					swal({
					  title: "Warning!",
					  text: firstErrorMsg,
					  icon: "warning",  
					});
					$('#incomeSubCatModal'+id).modal('show')

				}
			})
		});
	});

	// End Update  Income Sub Category Here //////////////



	//////////// Start Delete  Income Sub Category Here //

	$(document).on('click','.income-sub-cat-delete-btn',function(){
		var id = $(this).attr('id')
		var name = $(this).attr('data')
		// console.log(name)

		swal({
			  title: "Are you sure?",
			  text: "Sub Category \""+name+"\" will be delete!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$.ajax({
					type:'get',
					url:'/account/income/delete-sub-category/'+id,
					data:id,
					contentType:false,
					cache:false,
					processData:false,
					dataType:'json',
					success:function(response){
						if(response.error == false){
							// console.log(response)
							swal("Data Delete Successfully", {
						      icon: "success",
						    });
							setTimeout(location.reload.bind(location),160)
						}
						else if(response.error == true){
							swal(response.errorMsg, {
						      icon:response.iconMsg,
						    });
						}
					},
					error:function(error){
						console.log(error)
					}
				});

			}
		});
	
	});
	// End Delete  Income Sub Category Here //////////////



















/////////// Start Create Income  Here //

	$('#addIncomeForm').on('submit',function(e){
		e.preventDefault()
		$('#addIncomeModal').modal('hide');

		$.ajax({
			type: "post",
			url: "/account/income/add-income",
			data: new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			dataType:'json',
			success: function(response){
				if(response.error == false){
			    	swal({
					  title: response.headingMsg,
					  text: response.successMsg,
					  icon: response.iconMsg,  
					});
			    	setTimeout(location.reload.bind(location),150)
			    	
				}
				else if(response.error == true){
			    	swal({
					  title: response.headingMsg,
					  text: response.errorMsg,
					  icon: response.iconMsg,  
					});
					$('#addIncomeModal').modal('show');
				}
			},
			error:function(error){
				console.log(error)
				var error = error.responseJSON.errors;
				var firstError = Object.keys(error)[0]
				var firstErrorMsg = error[firstError][0];
				var DOM = document.getElementById(firstError);


		        var formControls = document.querySelectorAll('.form-control')
		        formControls.forEach((element)=> element.classList.remove('warningBorder'))
		        DOM.classList.add('warningBorder');
	    		swal({
				  title: "Warning!",
				  text: firstErrorMsg,
				  icon: "warning",  
				});
				$('#addIncomeModal').modal('show');

			}
		});
	}); 
	// End Create Income Here //////////////



	/////////////// Start Update  Income  Here //

	$(document).on('click','.income-sub-cat-edit-btn',function(){
		var id = $(this).attr('id')
		$('#incomeSubCatModal'+id).modal('show')
		console.log(id)
		$('#updateIncomeSubCatForm'+id).on('submit',function(e){
			e.preventDefault()
			$('#incomeSubCatModal'+id).modal('hide')

			$.ajax({
				type:'post',
				url:'/account/income/update-sub-category',
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				dataType:'json',
				success:function(response){
		        	if(response.error == false){
				    	swal({
						  title: response.headingMsg,
						  text: response.successMsg,
						  icon: response.iconMsg,  
						});
				    	setTimeout(location.reload.bind(location),150)
				    	
					}
					else if(response.error == true){
				    	swal({
						  title: response.headingMsg,
						  text: response.errorMsg,
						  icon: response.iconMsg,  
						});
						$('#incomeSubCatModal'+id).modal('show');
					}
				},
				error:function(error){
					console.log(error)
					var error = error.responseJSON.errors;
					var firstError = Object.keys(error)[0]
					var firstErrorMsg = error[firstError][0];
					swal({
					  title: "Warning!",
					  text: firstErrorMsg,
					  icon: "warning",  
					});
					$('#incomeSubCatModal'+id).modal('show')

				}
			})
		});
	});

	// End Update  Income  Here //////////////



	//////////// Start Delete  Income  Here //

	$(document).on('click','.income-sub-cat-delete-btn',function(){
		var id = $(this).attr('id')
		var name = $(this).attr('data')
		// console.log(name)

		swal({
			  title: "Are you sure?",
			  text: "Sub Category \""+name+"\" will be delete!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
			  	$.ajax({
					type:'get',
					url:'/account/income/delete-sub-category/'+id,
					data:id,
					contentType:false,
					cache:false,
					processData:false,
					dataType:'json',
					success:function(response){
						if(response.error == false){
							// console.log(response)
							swal("Data Delete Successfully", {
						      icon: "success",
						    });
							setTimeout(location.reload.bind(location),160)
						}
						else if(response.error == true){
							swal(response.errorMsg, {
						      icon:response.iconMsg,
						    });
						}
					},
					error:function(error){
						console.log(error)
					}
				});

			}
		});
	
	});
	// End Delete  Income  Here //////////////







});
