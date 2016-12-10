function displayCheck(){
    function showModal(check_id){
        var modal = $('#checkModal');
        var url = '/admin/check-info/'+check_id
        modal.off('show.bs.modal');
        modal.on('show.bs.modal', function (e) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(result, status){
                    modal.find('.modal-body').html(result.html);
                    var imgCheck = $("#viewer").find('img').attr('src');
                    $("#viewer").find('img').remove();
                    var iv1 = $("#viewer").iviewer({
                        src: imgCheck,
                        zoom: 50
                    });
                }
            });
        })
        modal.modal();
    }
    $('html').on('click', '[role="showCheck"]', function(e){
        e.preventDefault();
        showModal($(this).attr('check_id'));
    });
}
function declineCheck(){
    $('html').off('click', '[role="declineCheck"]');
    $('html').on('click', '[role="declineCheck"]', function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        var decline_reason = $(this).parents('.modal-footer').find('[name="decline_reason"]').val();
        if(null != decline_reason){
            $.ajax({
                url: url,
                data: {
                    decline_reason: decline_reason
                },
                type: 'GET',
                success: function(result, status){
                    if(true == result.success){
                        location.reload();
                    }else{
                        alert('Вы не указали причину отклонения чека');
                    }
                }
            });
        }else{
            alert('Укажите причину отклонения чека');
        }
    });
}

function setDatePicker(){
    $('.datePicker').datepicker({
        language: 'ru',
        format: 'yyyy-mm-dd',
        startDate: '2016-09-01',
        endDate: '2016-12-31',
        todayHighlight: true,
        autoclose: true
    });
}

function autocompleteFio(){
    console.log($(this));
    $('#regConfirmChoice').autocomplete({
        serviceUrl: '/autocomplete/fio',
        onSelect: function (suggestion) {
            $('input[name="userId"]').val(suggestion.data);
        },
        noCache: true,
        preventBadQueries: true
    });
}

$(document).ready(function() {
    displayCheck();
    declineCheck();
    setDatePicker();
    autocompleteFio();
});