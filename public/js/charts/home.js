//
// Orders chart
//

$(function () {
	var $chart = $('#chart-orders');

	function initChart($chart) {

		var ordersChart = new Chart($chart, {
			type: 'bar',
			options: {
				scales: {
					yAxes: [{
						ticks: {
							callback: function(value) {
								if (!(value % 10)) {
									//return '$' + value + 'k'
									return value
								}
							}
						}
					}]
				},
				tooltips: {
					callbacks: {
						label: function(item, data) {
							var label = data.datasets[item.datasetIndex].label || '';
							var yLabel = item.yLabel;
							var content = '';

							if (data.datasets.length > 1) {
								content += '<span class="popover-body-label mr-auto">' + label + '</span>';
							}

							content += '<span class="popover-body-value">' + yLabel + '</span>';
							
							return content;
						}
					}
				}
			},
			data: {
				labels: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
				datasets: [{
					label: 'Citas médicas',
					data: appointmentsByDay
				}]
			}
		});

		// Save to jQuery object
		$chart.data('chart', ordersChart);
	}

	// Init chart
	if ($chart.length)
		initChart($chart);
});
