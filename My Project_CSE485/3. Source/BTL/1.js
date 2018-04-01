 $(function(){
 	// Xử lý thêm dữ liệu	
 	$('.themdulieu').click(function(event) {
 		if($('#tenchuyenmuc').val() == ''){
 			alert('Input can not be left blank');
 		}
 		$.ajax({
 			url: 'add_dir',
 			type: 'POST',
 			dataType: 'json',
 			data: {
 				tenchuyenmuc: $('#tenchuyenmuc').val()
 			},
 		})
 		.done(function() {
 			console.log("success");
				// Thêm nội dung bằng hàm Append
			})
 		.fail(function() {
 			console.log("error");
 		})
 		.always(function() {
 			console.log("complete");
 			noidung='<li class="list-group-item">'+ $('#tenchuyenmuc').val()+'<a href="<?php echo base_url(); ?>" class="btn btn-outline-success">'+'<i class="fas fa-pencil-alt"></i></a>'+'<a href="<?php echo base_url(); ?>" class="btn btn-outline-danger">'+'<i class="fas fa-trash-alt"></i></a>'+'</li>';
 			$('.ds_dir_admin').append(noidung);
 			$('#tenchuyenmuc').val('');
 		});
 	});
 })  
 