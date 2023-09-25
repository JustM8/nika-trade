import './bootstrap';

$(document).on('click', 'add-to-cart', function (e){
    e.preventDefault();
    let $btn = $(this);
console.log($btn);
    // $.ajax({
    //     url: $btn.data('route'),
    //     type: 'DELETE',
    //     dataType: 'json',
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
    //     success: function (data){
    //         console.log('data',data);
    //         $btn.parent().remove();
    //     },
    //     error: function (data){
    //         console.log('Error:',data);
    //     }
    // })

});
