
let deleteAddress = document.getElementById('deleteAddress').value;


document.getElementById('delete').addEventListener('click', deleteMaster);
 
function deleteMaster() {

    let ID = document.getElementById('delete').value;

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "get",
        url: deleteAddress,
        data: {
            'ID' : ID
        },
        dataType: "JSON",
        success: function (response) {

            let [status, message] = response;
            
            toastr.options.closeButton = true;
            toastr.options.closeMethod = 'fadeOut';
            toastr.options.closeDuration = 150;
            toastr.success(message);
            location.reload();
                    
        }
    });
      setTimeout(function () {
            dataTable.ajax.reload();
        }, 1000);
}

 