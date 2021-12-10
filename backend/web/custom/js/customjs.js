$(function(){
    ///MODAL CUSTOMER
    $('#modalButton').click(function(){
        $('#modalCustomer')
        .modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
    })
})