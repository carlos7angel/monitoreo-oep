"use strict";

var KTMonitoringData = function () {

    var _getMonitoringData = function (election_id) {

        var url = '/admin/monitoreo/dashboard/json/monitoreo-medios/' + election_id;
        // var blockUI = new KTBlockUI(document.querySelector('#kt_content'));

        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            data: {},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            beforeSend: function (response) {
                // blockUI.block();
            },
            success: function (response) {
                if (response.success) {

                    $('#kt_data_monitoring_media_total').text(
                        response.data.tv + response.data.radio + response.data.print + response.data.digital + response.data.rrss);
                    $('#kt_data_monitoring_media_tv').text(response.data.tv);
                    $('#kt_data_monitoring_media_radio').text(response.data.radio);
                    $('#kt_data_monitoring_media_print').text(response.data.print);
                    $('#kt_data_monitoring_media_digital').text(response.data.digital + response.data.rrss);

                } else {
                    toastr.error(response.message, "Ocurrio un problema");
                }
            },
            complete: function (response) {
                // blockUI.release();
                // blockUI.destroy();
            },
            error: function (response) {
                toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
            }
        });
    }

    var _handleMonitoringData = function () {
        $(document).on('change', '#kt_select_election', function () {
            var election_id = $(this).val();
            if (! election_id) {
                return;
            }
            _getMonitoringData(election_id);
        });
    };

    var _initMonitoringData = function () {
        var election_id = $('#kt_select_election').val();
        if (! election_id) {
            return;
        }
        _getMonitoringData(election_id);
    };

    return {
        init: function () {
            _handleMonitoringData();
            _initMonitoringData();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTMonitoringData.init();
});
