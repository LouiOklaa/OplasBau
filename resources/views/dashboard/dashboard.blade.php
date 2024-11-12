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

                    </div>
                </div>
                <div class="col-sm-4 grid-margin">
                    <div class="card">

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h4 class="card-title">Messages</h4>
                                <p class="text-muted mb-1 small">View all</p>
                            </div>
                            <div class="preview-list">
                                <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                        <img src="assets/images/faces/face6.jpg" alt="image" class="rounded-circle"/>
                                    </div>
                                    <div class="preview-item-content d-flex flex-grow">
                                        <div class="flex-grow">
                                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                <h6 class="preview-subject">Leonard</h6>
                                                <p class="text-muted text-small">5 minutes ago</p>
                                            </div>
                                            <p class="text-muted">Well, it seems to be working now.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h4 class="card-title mb-1">Handys Diagramm</h4>
                                <p class="text-muted mb-1">Der Status Ihres Geräts</p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="bar_Chart" style="height:230px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
@endsection
@section('JS')


@endsection
