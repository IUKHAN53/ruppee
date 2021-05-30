@extends('layouts.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard, Admin</h4>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Inbox</h6>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="#" class="d-flex align-items-center border-bottom pb-3">
                            <div class="mr-3">
                                <img src="{{ url('https://via.placeholder.com/35x35') }}" class="rounded-circle wd-35" alt="user">
                            </div>
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="text-body mb-2">Leonardo Payne</h6>
                                    <p class="text-muted tx-12">12.30 PM</p>
                                </div>
                                <p class="text-muted tx-13">Hey! there I'm available...</p>
                            </div>
                        </a>
                        <a href="#" class="d-flex align-items-center border-bottom py-3">
                            <div class="mr-3">
                                <img src="{{ url('https://via.placeholder.com/35x35') }}" class="rounded-circle wd-35" alt="user">
                            </div>
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="text-body mb-2">Carl Henson</h6>
                                    <p class="text-muted tx-12">02.14 AM</p>
                                </div>
                                <p class="text-muted tx-13">I've finished it! See you so..</p>
                            </div>
                        </a>
                        <a href="#" class="d-flex align-items-center border-bottom py-3">
                            <div class="mr-3">
                                <img src="{{ url('https://via.placeholder.com/35x35') }}" class="rounded-circle wd-35" alt="user">
                            </div>
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="text-body mb-2">Jensen Combs</h6>
                                    <p class="text-muted tx-12">08.22 PM</p>
                                </div>
                                <p class="text-muted tx-13">This template is awesome!</p>
                            </div>
                        </a>
                        <a href="#" class="d-flex align-items-center border-bottom py-3">
                            <div class="mr-3">
                                <img src="{{ url('https://via.placeholder.com/35x35') }}" class="rounded-circle wd-35" alt="user">
                            </div>
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="text-body mb-2">Amiah Burton</h6>
                                    <p class="text-muted tx-12">05.49 AM</p>
                                </div>
                                <p class="text-muted tx-13">Nice to meet you</p>
                            </div>
                        </a>
                        <a href="#" class="d-flex align-items-center border-bottom py-3">
                            <div class="mr-3">
                                <img src="{{ url('https://via.placeholder.com/35x35') }}" class="rounded-circle wd-35" alt="user">
                            </div>
                            <div class="w-100">
                                <div class="d-flex justify-content-between">
                                    <h6 class="text-body mb-2">Yaretzi Mayo</h6>
                                    <p class="text-muted tx-12">01.19 AM</p>
                                </div>
                                <p class="text-muted tx-13">Hey! there I'm available...</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 col-xl-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Projects</h6>
                        <div class="dropdown mb-2">
                            <button class="btn p-0" type="button" id="dropdownMenuButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th class="pt-0">#</th>
                                <th class="pt-0">Project Name</th>
                                <th class="pt-0">Start Date</th>
                                <th class="pt-0">Due Date</th>
                                <th class="pt-0">Status</th>
                                <th class="pt-0">Assign</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>NobleUI jQuery</td>
                                <td>01/01/2021</td>
                                <td>26/04/2021</td>
                                <td><span class="badge badge-danger">Released</span></td>
                                <td>Leonardo Payne</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>NobleUI Angular</td>
                                <td>01/01/2021</td>
                                <td>26/04/2021</td>
                                <td><span class="badge badge-success">Review</span></td>
                                <td>Carl Henson</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>NobleUI ReactJs</td>
                                <td>01/05/2021</td>
                                <td>10/09/2021</td>
                                <td><span class="badge badge-info-muted">Pending</span></td>
                                <td>Jensen Combs</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>NobleUI VueJs</td>
                                <td>01/01/2021</td>
                                <td>31/11/2021</td>
                                <td><span class="badge badge-warning">Work in Progress</span>
                                </td>
                                <td>Amiah Burton</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>NobleUI Laravel</td>
                                <td>01/01/2021</td>
                                <td>31/12/2021</td>
                                <td><span class="badge badge-danger-muted text-white">Coming soon</span></td>
                                <td>Yaretzi Mayo</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>NobleUI NodeJs</td>
                                <td>01/01/2021</td>
                                <td>31/12/2021</td>
                                <td><span class="badge badge-primary">Coming soon</span></td>
                                <td>Carl Henson</td>
                            </tr>
                            <tr>
                                <td class="border-bottom">3</td>
                                <td class="border-bottom">NobleUI EmberJs</td>
                                <td class="border-bottom">01/05/2021</td>
                                <td class="border-bottom">10/11/2021</td>
                                <td class="border-bottom"><span class="badge badge-info-muted">Pending</span></td>
                                <td class="border-bottom">Jensen Combs</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush
