jQuery(document).ready(function(){
    var base = jQuery('base').attr('href');
 
	jQuery("#syxform").on("submit",function(e){
		e.stopPropagation();
		var datax=jQuery(this).serialize();
		var uri=jQuery(this).attr('data-uri');
		jQuery.ajax({
			url: uri,
			type: 'POST',
			data: datax,
			dataType: 'json',
			beforeSend: function() {
				/* swal({
					title:'Please wait..',
					text:"Harap sabar menunggu.",
					type:'warning',
					closeOnConfirm: false
				},
				function() {
					swal.disableButtons(); //untuk menampilkan proses
				});*/
				$('#btnSubmit').attr('disabled','disabled');
				console.log('LOADING...'); 
			},
			afterSend: function(){
				$('#btnSubmit').removeAttr('disabled');
				console.log('Success...');
			},
			success: function(data) {
				//alert(data.message);
				if(data.hasil==1){
					alert(data.message);
					window.location.href=data.backurl;
				} else {
					alert(data.message);
					$('#btnSubmit').removeAttr('disabled');
				}
			 }
		});	
		return false;
	}); 
	jQuery(document.body).on('click','#delpos',function(e){
		var url=$(this).attr('data-uri');
		var caleg_id=$(this).attr('data-id');
		swal({
            title: 'yakin ingin menghapus pendaftaran ini?',
            //text: 'Anda hanya dapat melakukan penghapusan!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            closeOnConfirm: false
        },
        function() {
			$.post(url,{caleg_id:caleg_id},function(e){
				if(e){
					swal(
					  'Berhasil Dihapus!',
					  'Data Pendaftaran caleg berhasil dihapus.',
					  'success'
					);
					window.location.href='pdip/dashboard';
				} else {
					swal(
					  'Gagal Dihapus!',
					  'Data Pendaftaran caleg gagal dihapus.',
					  'danger'
					);
				}
			});
        });
	});	
	
	jQuery(document.body).on('click','#ikut_test',function(e){
		var uri=$(this).attr('data-uri');
		swal({
            title: '<h3>Yakin ingin melakukan test sekarang?</h3>',
            text: '<h4>Dianjurkan untuk melakukan test secara serentak pada DPC masing-masing wilayah.</h4>(Hindari mengerjakan soal pada tengah malam)',
            type: 'warning',
			html: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, saya yakin!',
            closeOnConfirm: false
        },
        function() {
			window.location.href=uri;
        });
	});	
});

function syxCopy(teks){
	var el = document.createElement('textarea');
	el.value = teks;
	el.setAttribute('readonly', '');
	el.style.position = 'absolute';
	el.style.left = '-9999px';
	document.body.appendChild(el);
	el.select();
	document.execCommand('copy');
	document.body.removeChild(el);
	swal("Berhasil disalin : " + teks);
	return false;
}
function printx(url) {
	window.open(url,'msg','height=600,width=600,resizable=no,scrollbars=0,location=0,status=0;');
}