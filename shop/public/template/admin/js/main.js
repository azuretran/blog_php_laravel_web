$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function removeRow(id,url) {
    if(confirm('Are you sure you want to remove?')){
        
    }
 }
