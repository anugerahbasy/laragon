@extends('main')

@section('content')
    {{-- ambil dari highchart.js --}}

    {{-- html --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/themes/adaptive.js"></script>

    {{-- <figure class="highcharts-figure"> --}}
        <div class="row">
            <div id="container" class="col"></div>
            <div id="container1" class="col"></div>
        </div>
        <div class="row">
            <div id="container2" class="col"></div>
        </div>
    {{-- </figure> --}}

    {{-- css --}}
    <style>
        body {
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                "Apple Color Emoji",
                "Segoe UI Emoji",
                "Segoe UI Symbol",
                sans-serif;
            background: var(--highcharts-background-color);
            color: var(--highcharts-neutral-color-100);
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid var(--highcharts-neutral-color-10, #e6e6e6);
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: var(--highcharts-neutral-color-60, #666);
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tbody tr:nth-child(even) {
            background: var(--highcharts-neutral-color-3, #f7f7f7);
        }

        .highcharts-description {
            margin: 0.3rem 10px;
        }
    </style>

    {{-- js --}}
    <script>
        // column chart => jumlah mahasiswa per prodi
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Jumlah Mahasiswa UMDP per Program Studi'
            },
            subtitle: {
                text:
                    'Source: Aplikasi SIMPONI'
            },
            xAxis: {
                categories: [
                    @foreach ($grafikmhs as $data)
                        '{{ $data->nama_prodi }}',
                    @endforeach
                ],
                crosshair: true,
                accessibility: {
                    description: 'Program Studi'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Mahasiswa'
                }
            },
            tooltip: {
                valueSuffix: ' (orang)'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
                {
                    name: 'Mahasiswa',
                    data: [
                        @foreach ($grafikmhs as $data)
                            {{ $data->jumlah_mhs }},
                        @endforeach
                    ]
                }
            ]
        });

        // column chart => jumlah mahasiswa per tahun 
        Highcharts.chart('container1', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Jumlah Mahasiswa UMDP per Tahun Angkatan'
            },
            subtitle: {
                text:
                    'Source: Aplikasi SIMPONI'
            },
            xAxis: {
                categories: [
                    @foreach ($grafikmhspertahun as $data)
                        '{{ $data->tahun_angkatan }}',
                    @endforeach
                ],
                crosshair: true,
                accessibility: {
                    description: 'Program Studi'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Mahasiswa'
                }
            },
            tooltip: {
                valueSuffix: ' (orang)'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
                {
                    name: 'Mahasiswa',
                    data: [
                        @foreach ($grafikmhspertahun as $data)
                            {{ $data->jumlah_mhs }},
                        @endforeach
                    ]
                }
            ]
        });

        // JS line chart => trend jumlah mahasiswa per tahun
        Highcharts.chart('container2', {

            title: {
                text: 'Tren Jumlah Mahasiswa per Tahun ',
                align: 'center'
            },

            subtitle: {
                text: 'Aplikasi Penerimaan Mahasiswa Baru',
                align: 'center'
            },

            yAxis: {
                title: {
                    text: 'Jumlah Mahasiswa '
                }
            },

            xAxis: {
                accessibility: {
                    rangeDescription: 'Range: 2023 to 2025'
                }
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2023
                }
            },

            series: [
                    @foreach ($grafiktrenmahasiswa as $data)
                        {
                            name: '{{ $data->nama_prodi }}',
                            data: [
                                {{ $data->jmhs_2023 }}, {{ $data->jmhs_2024 }}, {{ $data->jmhs_2025 }}, 
                            ]
                        },
                    @endforeach
                ],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });


    </script>
@endsection