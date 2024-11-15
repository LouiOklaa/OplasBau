@extends('layouts.master')
@section('title')
    LouiSoft Admin
@endsection
@section('contents')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4>Dienste hinzugefügt</h4>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h3 class="mb-0">{{number_format($servicesCount)}}</h3>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"><span style="color: #00D25B; font-size: 25px">&nbsp ↗</span></p>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Gesamtzahl</h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-library-books text-primary ms-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4>Projekte hinzugefügt</h4>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h3 class="mb-0">{{number_format($projectsCount)}}</h3>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"><span style="color: #00D25B; font-size: 25px">&nbsp ↗</span></p>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Gesamtzahl</h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-collage text-info ms-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4>Abschnitte hinzugefügt</h4>
                            <div class="row">
                                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                    <div class="d-flex d-sm-block d-md-flex align-items-center">
                                        <h3 class="mb-0">{{number_format($servicesSectionsCount )}}</h3>
                                        <p class="text-success ms-2 mb-0 font-weight-medium"><span style="color: #00D25B; font-size: 25px">&nbsp ↗</span></p>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Gesamtzahl</h6>
                                </div>
                                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                    <i class="icon-lg mdi mdi-format-list-bulleted-type text-success ms-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h6 class="card-title mb-1">Aktivitäten Diagramm</h6>
                            </div>
                            <p class="text-muted mb-1">Der Status Ihres Aktivitäten</p>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="activityChart" style="height:230px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h4 class="card-title">Nachrichten</h4>
                                <a href="{{route('show_all_messages')}}" class="text-muted mb-1 small">Alle anzeigen</a>
                            </div>
                            <div class="preview-list">
                                @foreach($latestEmails as $one)
                                    <div class="preview-item border-bottom">
                                        <div class="preview-thumbnail">
                                            <img src="assets/img/testimonials/testimonials-2.jpg" alt="image" class="rounded-circle"/>
                                        </div>
                                        <div class="preview-item-content d-flex flex-grow">
                                            <div class="flex-grow">
                                                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                    <h6 class="preview-subject">{{$one->name}}</h6>
                                                    <p class="text-muted text-small">{{$one->sent_at_formatted}}</p>
                                                </div>
                                                <p class="text-muted">{{$one->email}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
@endsection
@section('JS')

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('activityChart').getContext('2d');
                const activityChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Dienste', 'Projekte', 'Abschnitte'],
                        datasets: [{
                            label: 'Anzahl der Aktivitäten',
                            data: [{{ $servicesCount }}, {{ $projectsCount }}, {{ $servicesSectionsCount }}],
                            backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                            borderColor: ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
@endsection
