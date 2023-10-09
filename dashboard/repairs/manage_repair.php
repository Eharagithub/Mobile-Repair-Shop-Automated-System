

                          
                                               
                            </div>
                        </fieldset>
                        
                        <hr class="bg-navy">
                        <center>
                            <button class="btn btn-sm bg-primary btn-flat mx-2 col-3">Save</button>
                            <?php if(isset($id)): ?>
                                <a class="btn btn-sm btn-light border btn-flat mx-2 col-3" href="./?page=repairs/view_details&id=<?= $id ?>">Cancel</a>
                            <?php else: ?>
                                <a class="btn btn-sm btn-light border btn-flat mx-2 col-3" href="./?page=repairs">Cancel</a>
                            <?php endif; ?>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var service_list  = $.parseJSON('<?= json_encode(isset($service_list) ? $service_list : []) ?>')
    var material_list  = $.parseJSON('<?= json_encode(isset($material_list) ? $material_list : []) ?>')
    var services = $.parseJSON('<?= json_encode($service_arr) ?>')
    function submit_entry(){
        var _this = $("#entry-form")
            $('.pop-msg').remove()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_repair",
				data: new FormData($("#entry-form")[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
                success:function(resp){
                    if(resp.status == 'success'){
                        location.href="./?page=repairs/view_details&id="+resp.id;
                    }else if(!!resp.msg){
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    }else{
                        el.addClass("alert-danger")
                        el.text("An error occurred due to unknown reason.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    $('html, body').animate({scrollTop:0},'fast')
                    end_loader();
                }
            })
    }
    function calc_total(){
        var total = 0;
        $('#service_list tbody tr').each(function(){
            cost = $(this).find('td:nth-child(3)').text().trim()
            cost = cost.replace(/\,/gi,'')
            total += parseFloat(cost)
        })
        $('#material_list tbody tr').each(function(){
            cost = $(this).find('td:nth-child(3)').text().trim()
            cost = cost.replace(/\,/gi,'')
            total += parseFloat(cost)
        })
        $('#total_amount').text(parseFloat(total).toLocaleString('en-US',{style:"decimal",maximumFractionDigits:2, minimumFractionDigits:2}))
        $('input[name="total_amount"]').val(parseFloat(total))
    }
    function add_service(id,fee=''){
        if(!!services[id]){
            fee = fee == '' ? services[id].cost : fee;
            var tr = $('<tr>')
            tr.append('<td class="px-2 py-1 text-center"><input type="hidden" name="service_id[]" value="'+id+'"/><input type="hidden" name="fee[]" value="'+fee+'"/> <button class="btn btn-remove btn-rounded btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>')
            tr.attr('data-id',id)
            tr.append("<td class='px-2 py-1'>"+services[id].service+"</td>")
            tr.append("<td class='px-2 py-1 text-right'>"+(parseFloat(fee).toLocaleString('en-US',{style:'decimal', maximumFractionFigits:2, minimumFractionDigits:2}))+"</td>")
            $('#service_list tbody').append(tr)
            tr.find('.btn-remove').click(function(){
                tr.remove();
            })
            $('#service').val('').trigger('change')
            $('#cost').val('0.00')
            calc_total()
        }
    }
    function add_material(material,cost){
        var tr = $('<tr>')
        tr.append('<td class="px-2 py-1 text-center"><input type="hidden" name="material[]" value="'+material+'"/><input type="hidden" name="mcost[]" value="'+cost+'"/> <button class="btn btn-remove btn-rounded btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>')
        tr.append("<td class='px-2 py-1'>"+material+"</td>")
        tr.append("<td class='px-2 py-1 text-right'>"+(parseFloat(cost).toLocaleString('en-US',{style:'decimal', maximumFractionFigits:2, minimumFractionDigits:2}))+"</td>")
        $('#material_list tbody').append(tr)
        tr.find('.btn-remove').click(function(){
            tr.remove();
        })
        $('#material').val('')
        $('#mcost').val('0.00')
        $('#material').focus()
        calc_total()
    }
    $(function(){
        if(Object.keys(service_list).length > 0){
            Object.keys(service_list).map(k=>{
                add_service(service_list[k].service_id,service_list[k].fee)
            })
        }
        if(Object.keys(material_list).length > 0){
            Object.keys(material_list).map(k=>{
                add_material(material_list[k].material,material_list[k].cost)
            })
        }
        $('#service').change(function(){
            var id = $(this).val()
            if(!!services[id]){
                $('#cost').val(parseFloat(services[id].cost).toLocaleString('en-US',{style:'decimal', maximumFractionFigits:2, minimumFractionDigits:2}));
            }
        })
        $('#add_service').click(function(){
            var id = $('#service').val()
            if($('#service_list tbody tr[data-id="'+id+'"]').length > 0){
                alert_toast(" Service already listed.",'warning')
                return false;
            }
            add_service(id)
            
        })
        $('#add_material').click(function(){
            var material = $('#material').val()
            var cost = $('#mcost').val()
            add_material(material,cost)
        })
        $('.select2').each(function(){
            var _this = $(this)
            _this.select2({
                placeholder:_this.attr('data-placeholder') || 'Please Select Here',
                width:'100%'
            })
        })
        $('#entry-form').submit(function(e){
            e.preventDefault()
            _conf("Please make sure that you have reviewed the form before you continue to save the entry details.","submit_entry",[])
            
        })
    })
</script>