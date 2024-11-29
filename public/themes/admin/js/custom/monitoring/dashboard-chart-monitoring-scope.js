"use strict";

var KTMonitoringDashboard = function () {

    var element;
    var root;
    var chart;
    var colors;
    var xAxis;
    var yAxis;
    var series;

    var _initAnalysisChart = function () {

        if (typeof am5 === "undefined") { return; }
        element = document.getElementById("kt_chart_monitoring_by_scope");
        if (!element) { return; }

        var init = function() {
            root = am5.Root.new(element);
            root.setThemes([am5themes_Animated.new(root)]);
            chart = root.container.children.push(
                am5xy.XYChart.new(root, {
                    panX: false,
                    panY: false,
                    //wheelX: "panX",
                    //wheelY: "zoomX",
                    layout: root.verticalLayout,
                })
            );
            colors = chart.get("colors");

            xAxis = chart.xAxes.push(
                am5xy.CategoryAxis.new(root, {
                    categoryField: "state",
                    renderer: am5xy.AxisRendererX.new(root, {
                        minGridDistance: 30,
                    }),
                    bullet: function (root, axis, dataItem) {
                        return am5xy.AxisBullet.new(root, {
                            location: 0.5,
                            sprite: am5.Picture.new(root, {
                                width: 24,
                                height: 24,
                                centerY: am5.p50,
                                centerX: am5.p50,
                                src: dataItem.dataContext.icon,
                            }),
                        });
                    },
                })
            );

            xAxis.get("renderer").labels.template.setAll({
                paddingTop: 20,
                fontWeight: "400",
                fontSize: 10,
                rotation: -25,
                fill: am5.color(KTUtil.getCssVariableValue('--bs-gray-500'))
            });

            xAxis.get("renderer").grid.template.setAll({
                disabled: true,
                strokeOpacity: 0
            });

            yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root, {
                    renderer: am5xy.AxisRendererY.new(root, {}),
                })
            );

            yAxis.get("renderer").grid.template.setAll({
                stroke: am5.color(KTUtil.getCssVariableValue('--bs-gray-300')),
                strokeWidth: 1,
                strokeOpacity: 1,
                strokeDasharray: [3]
            });

            yAxis.get("renderer").labels.template.setAll({
                fontWeight: "400",
                fontSize: 10,
                fill: am5.color(KTUtil.getCssVariableValue('--bs-gray-500'))
            });

            series = chart.series.push(
                am5xy.ColumnSeries.new(root, {
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "total",
                    categoryXField: "state"
                })
            );

            series.columns.template.setAll({
                tooltipText: "{categoryX}: {valueY}",
                tooltipY: 0,
                strokeOpacity: 0,
                // templateField: "columnSettings",
            });

            series.columns.template.setAll({
                strokeOpacity: 0,
                cornerRadiusBR: 0,
                cornerRadiusTR: 6,
                cornerRadiusBL: 0,
                cornerRadiusTL: 6,
            });

            series.appear();
            chart.appear(1000, 100);
        }

        am5.ready(function () {
            init();
        });


        $(document).on('change', '#kt_select_election', function () {
            var election_id = $(this).val();
            root.dispose();
            init();
            loadData(election_id);
        });

    };

    var loadData = function(election_id) {
        var url = '/admin/monitoreo/dashboard/json/monitoreo-scope/' + election_id;
        am5.net.load(url).then(function(result) {
            var data = am5.JSONParser.parse(result.response);
            data = data.data;
            xAxis.data.setAll(data);
            series.data.setAll(data);
        }).catch(function(result) {
            console.log("Error loading " + result.xhr.responseURL);
        });
    }

    var _initializeSelect = function () {
        var election_id = $('#kt_select_election').val();
        loadData(election_id);
    };

    return {

        init: function () {
            _initAnalysisChart();
            _initializeSelect();
        }
    }
}();


KTUtil.onDOMContentLoaded(function () {
    KTMonitoringDashboard.init();
});
