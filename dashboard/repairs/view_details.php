


<script>
    $(function(){
        $('#delete_data').click(function(){
			_conf("Are you sure to delete <b><?= $code ?>\'s</b> from repair permanently?","delete_repair",['<?= $id ?>'])
		})
    })
    function delete_repair($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_repair",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.replace('./?page=repairs');
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>