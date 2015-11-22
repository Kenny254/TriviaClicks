$(document).ready(function () {
										 
											var graphData = [{
													// Returning Visits
													data: [ [6, 50], [7, 80], [8, 150], [9, 300], ],
													color: '#59676B',
													points: { radius: 4, fillColor: '#59676B' }
												}
											];
										 
											$.plot($('#graph-lines'), graphData, {
												series: {
													points: {
														show: true,
														radius: 1
													},
													lines: {
														show: true
													},
													shadowSize: 0
												},
												grid: {
													color: '#59676B',
													borderColor: 'transparent',
													borderWidth: 10,
													hoverable: true
												},
												xaxis: {
													tickColor: 'transparent',
													tickDecimals: false
												},
												yaxis: {
													tickSize: 50
												}
											});
										
											$.plot($('#graph-bars'), graphData, {
												series: {
													bars: {
														show: true,
														barWidth: .9,
														align: 'center'
													},
													shadowSize: 0
												},
												grid: {
													color: '#fff',
													borderColor: 'transparent',
													borderWidth: 20,
													hoverable: true
												},
												xaxis: {
													tickColor: 'transparent',
													tickDecimals: 2
												},
												yaxis: {
													tickSize: 1000
												}
											});
										
											$('#graph-bars').hide();
										
											$('#lines').on('click', function (e) {
												$('#bars').removeClass('active');
												$('#graph-bars').fadeOut();
												$(this).addClass('active');
												$('#graph-lines').fadeIn();
												e.preventDefault();
											});
										
											$('#bars').on('click', function (e) {
												$('#lines').removeClass('active');
												$('#graph-lines').fadeOut();
												$(this).addClass('active');
												$('#graph-bars').fadeIn().removeClass('hidden');
												e.preventDefault();
											});
										
											function showTooltip(x, y, contents) {
												$('<div id="tooltip">' + contents + '</div>').css({
													top: y - 16,
													left: x + 20
												}).appendTo('body').fadeIn();
											}
										
											var previousPoint = null;
										
											$('#graph-lines, #graph-bars').bind('plothover', function (event, pos, item) {
												if (item) {
													if (previousPoint != item.dataIndex) {
														previousPoint = item.dataIndex;
														$('#tooltip').remove();
														var x = item.datapoint[0],
															y = item.datapoint[1];
															showTooltip(item.pageX, item.pageY, y+ x );
													}
												} else {
													$('#tooltip').remove();
													previousPoint = null;
												}
											});
										
										});