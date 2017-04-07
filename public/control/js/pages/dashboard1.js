'use strict';
//  Author: ThemeREX.com
//  index.html scripts
//

(function($) {

    $(document).ready(function() {

        "use strict";

        // Init Demo JS
        Demo.init();


        // Init Theme Core
        Core.init();

        // Init AllCP Panels
        $('.allcp-panels').allcppanel({
            grid: '.allcp-grid',
            draggable: true,
            preserveGrid: true,
            onStart: function() {},
            onFinish: function() {
                $('.allcp-panels').addClass('animated fadeIn').removeClass('fade-onload');
                demoHighCharts.init();
                runVectorMaps();
            },
            onSave: function() {
                $(window).trigger('resize');
            }
        });

        // Init ".task-widget" plugins
        var taskWidget = $('div.task-widget');
        var taskItems = taskWidget.find('li.task-item');

        // Init TaskWidget Sortable
        taskWidget.sortable({
            items: taskItems,
            handle: '.task-menu',
            axis: 'y',
            scroll: false,
            connectWith: ".task-list",
            update: function( event, ui ) {
                var Item = ui.item;
                var ParentList = Item.parent();

                // If checked - move it to the "current items list"
                if (ParentList.hasClass('task-current')) {
                    Item.removeClass('item-checked').find('input[type="checkbox"]').prop('checked', false);
                }
                if (ParentList.hasClass('task-completed')) {
                    Item.addClass('item-checked').find('input[type="checkbox"]').prop('checked', true);
                }

            }
        });

        // Handle filter behavior
        taskItems.on('click', function(e) {
            e.preventDefault();
            var This = $(this);
            var Target = $(e.target);

            if (Target.is('.task-menu') && Target.parents('.task-completed').length) {
                This.remove();
                return;
            }

            if (Target.parents('.task-handle').length) {
                // If checked - move it to the "current items list"
                if (This.hasClass('item-checked')) {
                    This.removeClass('item-checked').find('input[type="checkbox"]').prop('checked', false);
                }
                // Otherwise - move it to the "completed items list"
                else {
                    This.addClass('item-checked').find('input[type="checkbox"]').prop('checked', true);
                }
            }

        });


        var highColors = [bgSystem, bgSuccess, bgWarning, bgPrimary];


        var ecomChart = $('#sales_chart1');
        if (ecomChart.length) {
            ecomChart.highcharts({
                credits: false,
                colors: highColors,
                chart: {
                    backgroundColor: 'transparent',
                    className: '',
                    type: 'line',
                    zoomType: 'x',
                    panning: true,
                    panKey: 'shift',
                    marginTop: 45,
                    marginRight: 1
                },
                title: {
                    text: null
                },
                xAxis: {
                    gridLineColor: '#EEE',
                    lineColor: '#EEE',
                    tickColor: '#EEE',
                    categories: ['Jan', 'Feb', 'Mar', 'Apr',
                        'May', 'Jun', 'Jul', 'Aug',
                        'Sep', 'Oct', 'Nov', 'Dec'
                    ]
                },
                yAxis: {
                    min: 0,
                    tickInterval: 5,
                    gridLineColor: '#EEE',
                    title: {
                        text: null
                    }
                },
                plotOptions: {
                    spline: {
                        lineWidth: 3
                    },
                    area: {
                        fillOpacity: 0.2
                    }
                },
                legend: {
                    enabled: true,
                    floating: false,
                    align: 'right',
                    verticalAlign: 'top',
                    x: -15
                },
                series: seriesData
            });
        }

        // Widget VectorMap
        function runVectorMaps() {

            // Jvector Map Plugin
            var runJvectorMap = function() {
                // Set data
                var mapData = [900, 700, 350, 500];
                // Init Jvector Map
                $('#WidgetMap').vectorMap({
                    map: 'us_lcc_en',
                    backgroundColor: 'transparent',
                    series: {
                        markers: [{
                            attribute: 'r',
                            scale: [3, 7],
                            values: mapData
                        }]
                    },
                    regionStyle: {
                        initial: {
                            fill: '#cfdce2'
                        },
                        hover: {
                            "fill-opacity": 0.3
                        }
                    }
                    // markers: [{
                    //     latLng: [47.036359, -109.262568],
                    //     name: 'Montana,MT'
                    // },{
                    //     latLng: [30, -100],
                    //     name: 'Texas,TX'
                    // }, {
                    //     latLng: [27, -81],
                    //     name: 'Florida,Fl'
                    // }],
                    // markerStyle: {
                    //     initial: {
                    //         fill: '#a288d5',
                    //         stroke: '#b49ae0',
                    //         "fill-opacity": 1,
                    //         "stroke-width": 10,
                    //         "stroke-opacity": 0.3,
                    //         r: 3
                    //     },
                    //     hover: {
                    //         stroke: 'black',
                    //         "stroke-width": 2
                    //     },
                    //     selected: {
                    //         fill: 'blue'
                    //     },
                    //     selectedHover: {}
                    // }
                });
                // Set States
                var states = ['US-MT', 'US-NV', 'US-IA'];
                var colors = [bgInfo, bgPrimaryL, bgSystemL];
                // var colors2 = [bgSuccess, bgWarning, bgPrimary];
                $.each(states, function(i, e) {
                    $("#WidgetMap path[data-code=" + e + "]").css({
                        fill: colors[i]
                    });
                });
                // $('#WidgetMap').find('.jvectormap-marker')
                //     .each(function(i, e) {
                //         $(e).css({
                //             fill: colors2[i],
                //             stroke: colors2[i]
                //         });
                //     });
            };

            if ($('#WidgetMap').length) {
                runJvectorMap();
            }
        }

        // Init FullCalendar external events
        $('#external-events .fc-event').each(function() {
            $(this).data('event', {
                title: $.trim($(this).text()), // element's text = event title
                stick: true,
                className: 'fc-event-' + $(this).attr('data-event')
            });

            // make event draggable
            $(this).draggable({
                zIndex: 999,
                revert: true,
                revertDuration: 0
            });

        });

        var Calendar = $('#calendar');
        var Picker = $('.inline-mp');

          // Init Calendar Modal
        $('#compose-event-btn').magnificPopup({
            removalDelay: 500,
            callbacks: {
                beforeOpen: function(e) {
                    // Indicate active overlay with class
                    $('body').addClass('mfp-bg-open');
                    this.st.mainClass = this.st.el.attr('data-effect');
                },
                afterClose: function(e) {
                    $('body').removeClass('mfp-bg-open');
                }
            },
            midClick: true
        });

        // Init Date picker
        $("#eventDate").datepicker({
            numberOfMonths: 1,
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            showButtonPanel: false,
            beforeShow: function(input, inst) {
                var newclass = 'allcp-form';
                var themeClass = $(this).parents('.allcp-form').attr('class');
                var smartpikr = inst.dpDiv.parent();
                if (!smartpikr.hasClass(themeClass)) {
                    inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
                }
            }

        });

    });

})(jQuery);
