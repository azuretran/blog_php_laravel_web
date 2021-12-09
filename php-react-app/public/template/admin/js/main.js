$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function removeRow(id,url) {
    if(confirm('Are you sure you want to remove?')){
        $.ajax({
            type:'delete',
            dataType:'json',
            data: {id},
            url:url,
            success: function(result){
                if(result.error==false){
                    alert(result.message);
                }
                else
                      {
                        alert('please try again');
                    }

            }
        });
    }
 }
/*uploaded files*/
$('#upload').change(function(){
    const form= new FormData();
    form.append('file',$(this)[0].files[0]);
    $.ajax({
        processData:false,
        contentType:false,
        type: 'POST',
        datatype: 'JSON',
        data: form,
        url:'/admin/upload/services',
        success:function(results){

              $('#file').val(results.url);
              console.log(results.url);
           

        },
        error:function(xhr){
            console.log(xhr);
        }
    });

});
