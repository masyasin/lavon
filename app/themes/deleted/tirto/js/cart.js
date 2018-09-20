$(function() {
    Highcharts.theme = {
        colors: ['#ff0000', '#33cc66', '#e0e0e0', '#00ccff'],
        chart: {
            backgroundColor: 'rgba(255, 255, 255, 0)',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '',
            style: {
                color: '#4e5a62',
                font: '16px "gotham_bookregular", Verdana, sans-serif'
            }
        },
        subtitle: {
            style: {
                color: '#4e5a62',
                font: '10px "gotham_bookregular", Verdana, sans-serif'
            }
        },
        tooltip: {
            pointFormat: '{series.name}: {point.percentage:.1f}%'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                slicedOffset: 3,
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    useHTML: true,
                    distance: -35,
                    style: {
                        TextAlign: 'center',
                        fontWeight: 'normal',
                        fontSize: '9px',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    },
                    format: '{point.name}<br><strong>{point.percentage} %</strong>',
                },
                showInLegend: false
            }
        },
        legend: {
            itemStyle: {
                font: '9px "gotham_bookregular", Verdana, sans-serif',
                color: '#4e5a62'
            },
            itemHoverStyle: {
                color: '#0098da'
            }
        },
        credits: {
            enabled: false
        },
    };
    Highcharts.setOptions(Highcharts.theme);
    $('.comment-pie-cart').highcharts({
        series: [{
            name: 'Komentar',
            colorByPoint: true,
            data: [{
                name: 'Negatif',
                y: 30,
                sliced: true
            }, {
                name: 'Positif',
                y: 60,
                sliced: true
            }, {
                name: 'Netral',
                y: 10,
                sliced: true
            }]
        }]
    });
    $('.popular-artikel-pie-cart').highcharts({
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: false
                }
            }
        },
        series: [{
            name: 'Komentar',
            colorByPoint: true,
            data: [{
                name: 'Negatif',
                y: 30,
                sliced: true
            }, {
                name: 'Positif',
                y: 60,
                sliced: true
            }, {
                name: 'Netral',
                y: 10,
                sliced: true
            }]
        }]
    });
    $('.media-online-pie-cart').highcharts({
        series: [{
            name: 'Persepsi Media Online',
            colorByPoint: true,
            data: [{
                name: 'Negatif',
                y: 30,
                sliced: true
            }, {
                name: 'Positif',
                y: 60,
                sliced: true
            }, {
                name: 'Netral',
                y: 10,
                sliced: true
            }]
        }]
    });
    $('.kompas-pie-cart').highcharts({
        tooltip: {
            enabled: false
        },
        plotOptions: {
            pie: {
                slicedOffset: 1
            },
            series: {
                dataLabels: {
                    enabled: false
                }
            }
        },
        series: [{
            name: 'Persepsi Kompas',
            colorByPoint: true,
            states: {
                hover: {
                    enabled: false
                }
            },
            data: [{
                name: 'Negatif',
                y: 30,
                sliced: true
            }, {
                name: 'Positif',
                y: 40,
                sliced: true
            }, {
                name: 'Netral',
                y: 30,
                sliced: true
            }]
        }]
    });
    $('.viva-pie-cart').highcharts({
        tooltip: {
            enabled: false
        },
        plotOptions: {
            pie: {
                slicedOffset: 1
            },
            series: {
                dataLabels: {
                    enabled: false
                }
            }
        },
        series: [{
            name: 'Persepsi Viva',
            colorByPoint: true,
            states: {
                hover: {
                    enabled: false
                }
            },
            data: [{
                name: 'Negatif',
                y: 50,
                sliced: true
            }, {
                name: 'Positif',
                y: 10,
                sliced: true
            }, {
                name: 'Netral',
                y: 40,
                sliced: true
            }]
        }]
    });
    $('.merdeka-pie-cart').highcharts({
        tooltip: {
            enabled: false
        },
        plotOptions: {
            pie: {
                slicedOffset: 1
            },
            series: {
                dataLabels: {
                    enabled: false
                }
            }
        },
        series: [{
            name: 'Persepsi Merdeka',
            colorByPoint: true,
            states: {
                hover: {
                    enabled: false
                }
            },
            data: [{
                name: 'Negatif',
                y: 10,
                sliced: true
            }, {
                name: 'Positif',
                y: 20,
                sliced: true
            }, {
                name: 'Netral',
                y: 70,
                sliced: true
            }]
        }]
    });
    $('.republika-pie-cart').highcharts({
        tooltip: {
            enabled: false
        },
        plotOptions: {
            pie: {
                slicedOffset: 1
            },
            series: {
                dataLabels: {
                    enabled: false
                }
            }
        },
        series: [{
            name: 'Persepsi Republika Online',
            colorByPoint: true,
            states: {
                hover: {
                    enabled: false
                }
            },
            data: [{
                name: 'Negatif',
                y: 40,
                sliced: true
            }, {
                name: 'Positif',
                y: 10,
                sliced: true
            }, {
                name: 'Netral',
                y: 50,
                sliced: true
            }]
        }]
    });
    $('.detik-pie-cart').highcharts({
        tooltip: {
            enabled: false
        },
        plotOptions: {
            pie: {
                slicedOffset: 1
            },
            series: {
                dataLabels: {
                    enabled: false
                }
            }
        },
        series: [{
            name: 'Persepsi Detik',
            colorByPoint: true,
            states: {
                hover: {
                    enabled: false
                }
            },
            data: [{
                name: 'Negatif',
                y: 40,
                sliced: true
            }, {
                name: 'Positif',
                y: 40,
                sliced: true
            }, {
                name: 'Netral',
                y: 20,
                sliced: true
            }]
        }]
    });
    $('.publik-pie-cart').highcharts({
        series: [{
            name: 'Persepsi Publik',
            colorByPoint: true,
            data: [{
                name: 'Negatif',
                y: 25,
                sliced: true
            }, {
                name: 'Positif',
                y: 35,
                sliced: true
            }, {
                name: 'Netral',
                y: 40,
                sliced: true
            }]
        }]
    });
    $('.facebook-pie-cart').highcharts({
        tooltip: {
            enabled: false
        },
        plotOptions: {
            pie: {
                slicedOffset: 1
            },
            series: {
                dataLabels: {
                    enabled: false
                }
            }
        },
        series: [{
            name: 'Facebook',
            colorByPoint: true,
            states: {
                hover: {
                    enabled: false
                }
            },
            data: [{
                name: 'Negatif',
                y: 15,
                sliced: true
            }, {
                name: 'Positif',
                y: 45,
                sliced: true
            }, {
                name: 'Netral',
                y: 40,
                sliced: true
            }]
        }]
    });
    $('.twitter-pie-cart').highcharts({
        tooltip: {
            enabled: false
        },
        plotOptions: {
            pie: {
                slicedOffset: 1
            },
            series: {
                dataLabels: {
                    enabled: false
                }
            }
        },
        series: [{
            name: 'Twitter',
            colorByPoint: true,
            states: {
                hover: {
                    enabled: false
                }
            },
            data: [{
                name: 'Negatif',
                y: 20,
                sliced: true
            }, {
                name: 'Positif',
                y: 55,
                sliced: true
            }, {
                name: 'Netral',
                y: 25,
                sliced: true
            }]
        }]
    });
    $('.top-newsmaker-pie-cart').highcharts({
        colors: ['#ff0000', '#33cc66', '#e0e0e0', '#007eb4', '#0098da', '#00ccff'],
        chart: {
            backgroundColor: '#999999'
        },
        tooltip: {
            enabled: true
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    distance: 20
                }
            }
        },
        series: [{
            name: 'Top Newsmaker',
            colorByPoint: true,
            states: {
                hover: {
                    enabled: false
                }
            },
            data: [{
                name: 'Angelina Sondakh',
                y: 2,
                sliced: true
            }, {
                name: 'Ruhut <br>Sitompul',
                y: 8,
                sliced: true
            }, {
                name: 'Tri <br>Rismaharini',
                y: 10,
                sliced: true
            }, {
                name: 'Abraham <br>Lunggana',
                y: 12,
                sliced: true
            }, {
                name: 'Ir. Basuki <br>Tjahaja <br>Purnama',
                y: 68,
                sliced: true
            }]
        }]
    });
    $('.keyword-pie-cart').highcharts({
        chart: {
            width: 140,
            height: 170
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: false
                }
            }
        },
        series: [{
            name: 'Komentar',
            colorByPoint: true,
            data: [{
                name: 'Negatif',
                y: 30,
                sliced: true
            }, {
                name: 'Positif',
                y: 60,
                sliced: true
            }, {
                name: 'Netral',
                y: 10,
                sliced: true
            }]
        }]
    });
})