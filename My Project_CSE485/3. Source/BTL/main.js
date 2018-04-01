 $(function(){
 	// Xử lý thêm dữ liệu	
 $('.themdulieu').click(function(event) {
			$.ajax({
				url: 'admin/add_sach',
				type: 'POST',
				dataType: 'json',
				data: {
					tensach: $('#tensach').val(),
					tacgia: $('#tacgia').val(),
					tenchuyenmuc: $('#tenchuyenmuc').val(),
					trichdan: $('#trichdan').val(),
					gioithieu: $('#gioithieu').val(),
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
				noidung='<li class="list-group-item">'+'<img class="anh_ds_sach" src="#" />' + $('#tensach').val()+'<a href="<?php echo base_url(); ?>" class="btn btn-outline-success">'+'<i class="fas fa-pencil-alt"></i></a>'+'<a href="<?php echo base_url(); ?>" class="btn btn-outline-danger">'+'<i class="fas fa-trash-alt"></i></a>'+'</li>';
				$('.ds_sach_admin').append(noidung);
				$('#tensach').val('');
					$('#tacgia').val('');
					$('#tenchuyenmuc').val('');
					$('#trichdan').val('');
					$('#gioithieu').val('');
			});
		});
})  
 