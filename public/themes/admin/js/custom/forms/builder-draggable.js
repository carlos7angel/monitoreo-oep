"use strict";

var KTFormsDraggableCreate = function () {

    var _handleDragulaSort = function () {

        var drake = dragula({
            isContainer: function (el) {
                return el.classList.contains('dragula-container');
            },
            moves: function (el, container, handle) {
                return handle.classList.contains('dragula-handle');
            }
        })
            .on('drop', function (el, target, source, sibling) {
                let data = _dragulaToArray(el, target, source);
                _handleSubmit(data);

                //Review an element is empty for dashed
                if (source.childElementCount <= 0) {
                    source.classList.add("box-items-empty");
                    source.classList.remove("box-items");
                }

                if (target !== source) {
                    if (target.childElementCount > 0) {
                        target.classList.add("box-items");
                        target.classList.remove("box-items-empty");
                    }
                }

            });
    };

    var _dragulaToArray = function (el, target, source) {

        var data = [];

        let ids = [];
        for (var item of source.children) {
            ids.push(parseInt(item.getAttribute("data-item-id")));
        }

        data.push({
            id: parseInt(source.getAttribute("data-form-id")),
            items: ids
        });


        if (target !== source) {
            let ids = [];
            for (var item of target.children) {
                ids.push(parseInt(item.getAttribute("data-item-id")));
            }

            data.push({
                id: parseInt(target.getAttribute("data-form-id")),
                items: ids
            });
        }

        return ({
            forms: data,
            element_id: parseInt(el.getAttribute("data-item-id")),
            form_id: parseInt(target.getAttribute("data-form-id")),
        });
    };

    var _handleSubmit = function (data) {

        let submitUrl = $('.dragula-container').data("url");
        var blockUI = new KTBlockUI(document.querySelector('#kt_content')); //kt_wrapper

        $.ajax({
            type: 'POST',
            url: submitUrl,
            dataType: 'json',
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            beforeSend: function (response) {
                blockUI.block();
            },
            success: function (response) {
                if (!response.success) {
                    toastr.warning(response.message, "Ocurrio un problema, no se pudieron actualizar los elementos.");
                }
            },
            complete: function (response) {
                blockUI.release();
                blockUI.destroy();
            },
            error: function (response) {
                toastr.error(response.hasOwnProperty('responseJSON') ? response.responseJSON.message : "", "Ocurrió un problema");
            }
        });

    };

    return {
        init: function () {
            _handleDragulaSort();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTFormsDraggableCreate.init();
});
