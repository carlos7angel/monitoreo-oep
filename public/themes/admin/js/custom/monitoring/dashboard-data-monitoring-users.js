"use strict";

var KTMonitoringUsersData = function () {

    var _getMonitoringUserData = function (election_id) {

        var url = '/admin/monitoreo/dashboard/json/monitoreo-usuarios/' + election_id;
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

                    _populateTable(response.data);

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

    var _populateTable = function (data) {

        var table = $('#monitoring_table_users');
        table.html('');
        data.forEach(function(element, index) {
            table.append(`<tr>
                            <td class="ps-4">
                                <span class="text-muted fw-semibold text-muted d-block fs-7">${element.name}</span>
                            </td>
                            <td>
                                <span class="text-muted fw-semibold text-muted d-block fs-7">${element.type} ${element.department}</span>
                            </td>
                            <td class="pe-4 text-end">
                                <span class="text-muted fw-semibold text-muted d-block fs-7">${element.total_rows}</span>
                            </td>
                        </tr>`);
        });

    }

    var _handleMonitoringData = function () {
        $(document).on('change', '#kt_select_election', function () {
            var election_id = $(this).val();
            _getMonitoringUserData(election_id);
        });
    };

    var _initMonitoringData = function () {
        var election_id = $('#kt_select_election').val();
        _getMonitoringUserData(election_id);
    };

    return {
        init: function () {
            _handleMonitoringData();
            _initMonitoringData();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTMonitoringUsersData.init();
});
