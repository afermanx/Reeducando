@extends('themes.Admin.adminLayout')
@section('titleAdmin','Reeducando | Painel')

@section('content')
    <!-- Start -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box">
                    <i class='bx bx-bar-chart'></i>
                </div>
                <span class="sub-title">Conversion Rate</span>
                <h3>5.45% <span class="badge"><i class='bx bx-up-arrow-alt'></i> 56.9%</span></h3>

                <div class="progress-list">
                    <div class="bar-inner">
                        <div class="bar progress-line" data-width="56.9"></div>
                    </div>

                    <p>Ratio website’s visitors</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box">
                    <i class='bx bx-bar-chart-square'></i>
                </div>
                <span class="sub-title">Conversion Value</span>
                <h3>4.75% <span class="badge"><i class='bx bx-up-arrow-alt'></i> 32.1%</span></h3>

                <div class="progress-list">
                    <div class="bar-inner">
                        <div class="bar progress-line" data-width="32.1"></div>
                    </div>

                    <p>Ratio website’s visitors</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box">
                    <i class='bx bx-bar-chart-alt'></i>
                </div>
                <span class="sub-title">Conversion Order</span>
                <h3>6.47% <span class="badge badge-red"><i class='bx bx-down-arrow-alt'></i> 45.5%</span></h3>

                <div class="progress-list">
                    <div class="bar-inner">
                        <div class="bar progress-line" data-width="45.5"></div>
                    </div>

                    <p>Ratio website’s visitors</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box">
                    <i class='bx bx-paper-plane'></i>
                </div>
                <span class="sub-title">Subscribers Gained</span>
                <h3>92.6% <span class="badge"><i class='bx bx-up-arrow-alt'></i> 26.0%</span></h3>

                <div class="progress-list">
                    <div class="bar-inner">
                        <div class="bar progress-line" data-width="26.0"></div>
                    </div>

                    <p>Subscribe in month</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Start -->
    <div class="row">
        <div class="col-lg-7 col-md-12">
            <!-- Website Website Analytics -->
            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Website Analytics</h3>

                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-show'></i> View
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-edit-alt'></i> Edit
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-trash'></i> Delete
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-printer'></i> Print
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-download'></i> Download
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="website-analytics-chart" class="extra-margin"></div>
                </div>
            </div>
            <!-- End Website Analytics -->
        </div>

        <div class="col-lg-5 col-md-12">
            <!-- Email Send Chart -->
            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Email Send</h3>

                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-show'></i> View
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-edit-alt'></i> Edit
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-trash'></i> Delete
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-printer'></i> Print
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-download'></i> Download
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="emailSend-chart" class="extra-margin"></div>
                </div>
            </div>
            <!-- End Email Send Chart -->
        </div>
    </div>
    <!-- End -->

    <!-- Start -->
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <div class="card mb-30 pt-2">
                <div class="card-body activity-timeline-chart-box">
                    <div id="activity-timeline-chart"></div>

                    <div class="activity-timeline-content">
                        <div class="card-header">
                            <h3>Activity Timeline</h3>
                        </div>

                        <ul>
                            <li>
                                <i class='bx bx-check-double'></i>
                                <span>Organic Search</span>
                                2,862 0.7%
                            </li>

                            <li>
                                <i class='bx bx-check-double'></i>
                                <span>Referral Visitor</span>
                                1,142 0.5%
                            </li>

                            <li>
                                <i class='bx bx-check-double'></i>
                                <span>Email Campaign</span>
                                3,214 0.5%
                            </li>

                            <li>
                                <i class='bx bx-check-double'></i>
                                <span>Social Media</span>
                                2,214 0.9%
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Activity</h3>
                </div>

                <div class="card-body activity-card-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="progress-list">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Income Amount</span>

                                    <span>$8,098</span>
                                </div>
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="80"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="progress-list">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Total Budget</span>

                                    <span>$7,754</span>
                                </div>
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="98"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="progress-list">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Total Sales</span>

                                    <span>$6,542</span>
                                </div>
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="95"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="progress-list">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Completed Tasks</span>

                                    <span>105</span>
                                </div>
                                <div class="bar-inner">
                                    <div class="bar progress-line" data-width="90"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7 col-md-12">
            <!-- Traffic Source -->
            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Traffic Source</h3>

                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-show'></i> View
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-edit-alt'></i> Edit
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-trash'></i> Delete
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-printer'></i> Print
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-download'></i> Download
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="traffic-source-chart" class="extra-margin"></div>
                </div>
            </div>
            <!-- End Traffic Source -->

            <div class="row">
                <div class="col-lg-5">
                    <div class="card mb-30">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3>Best Sales</h3>

                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class='bx bx-show'></i> View
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class='bx bx-edit-alt'></i> Edit
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class='bx bx-trash'></i> Delete
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class='bx bx-printer'></i> Print
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class='bx bx-download'></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body best-sales-box">
                            <ul>
                                <li class="d-flex align-items-center">
                                    <span>S</span>

                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="95"></div>
                                    </div>
                                </li>

                                <li class="d-flex align-items-center">
                                    <span>M</span>

                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="87"></div>
                                    </div>
                                </li>

                                <li class="d-flex align-items-center">
                                    <span>T</span>

                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="90"></div>
                                    </div>
                                </li>

                                <li class="d-flex align-items-center">
                                    <span>W</span>

                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="45"></div>
                                    </div>
                                </li>

                                <li class="d-flex align-items-center">
                                    <span>T</span>

                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="79"></div>
                                    </div>
                                </li>

                                <li class="d-flex align-items-center">
                                    <span>F</span>

                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="58"></div>
                                    </div>
                                </li>

                                <li class="d-flex align-items-center">
                                    <span>S</span>

                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="77"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="card mb-30">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3>Browser Used</h3>

                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bx-dots-horizontal-rounded'></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class='bx bx-show'></i> View
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class='bx bx-edit-alt'></i> Edit
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class='bx bx-trash'></i> Delete
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class='bx bx-printer'></i> Print
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <i class='bx bx-download'></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body browser-used-box">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Browser</th>
                                        <th>Sessions</th>
                                        <th>Bounce Rate</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Google Chrome</td>
                                        <td>13,410</td>
                                        <td>31.24% (<i class='bx bx-up-arrow-alt'></i> 39%)</td>
                                    </tr>
                                    <tr>
                                        <td>Mozila Firefox</td>
                                        <td>13,443</td>
                                        <td>30.23% (<i class='bx bx-up-arrow-alt'></i> 54%)</td>
                                    </tr>
                                    <tr>
                                        <td>Opera Mini</td>
                                        <td>1,410</td>
                                        <td>68.24% (<i class='bx bx-down-arrow-alt red'></i> 20%)</td>
                                    </tr>
                                    <tr>
                                        <td>Microsoft edge</td>
                                        <td>2,241</td>
                                        <td>67.88% (<i class='bx bx-down-arrow-alt red'></i> 45%)</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Start -->
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Tasks</h3>

                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-show'></i> View
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-edit-alt'></i> Edit
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-trash'></i> Delete
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-printer'></i> Print
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-download'></i> Download
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body widget-todo-list">
                    <ul>
                        <li>
                            <div class="checkbox">
                                <input class="inp-cbx" id="cbx" type="checkbox" style="display: none;"/>
                                <label class="cbx" for="cbx">
                                            <span>
                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                </label>
                            </div>

                            <div class="todo-item-title">
                                <img src="assets/img/user1.jpg" data-toggle="tooltip" data-placement="top"
                                     title="Sarah Taylor" alt="image">
                                <h3>Print bills</h3>
                                <p>There are many variations of...</p>
                            </div>

                            <div class="todo-item-action">
                                <a href="#" class="edit"><i class='bx bx-edit-alt'></i></a>
                                <a href="#" class="delete"><i class='bx bx-trash'></i></a>
                            </div>
                        </li>

                        <li>
                            <div class="checkbox">
                                <input class="inp-cbx" id="cbx2" type="checkbox" style="display: none;"/>
                                <label class="cbx" for="cbx2">
                                            <span>
                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                </label>
                            </div>

                            <div class="todo-item-title">
                                <img src="assets/img/user2.jpg" data-toggle="tooltip" data-placement="top"
                                     title="Lucy Eva" alt="image">
                                <h3>Call Rampbo</h3>
                                <p>There are many variations of...</p>
                            </div>

                            <div class="todo-item-action">
                                <a href="#" class="edit"><i class='bx bx-edit-alt'></i></a>
                                <a href="#" class="delete"><i class='bx bx-trash'></i></a>
                            </div>
                        </li>

                        <li>
                            <div class="checkbox">
                                <input class="inp-cbx" id="cbx3" type="checkbox" style="display: none;"/>
                                <label class="cbx" for="cbx3">
                                            <span>
                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                </label>
                            </div>

                            <div class="todo-item-title">
                                <img src="assets/img/user3.jpg" data-toggle="tooltip" data-placement="top"
                                     title="John Smith" alt="image">
                                <h3>Print Statements all</h3>
                                <p>There are many variations of...</p>
                            </div>

                            <div class="todo-item-action">
                                <a href="#" class="edit"><i class='bx bx-edit-alt'></i></a>
                                <a href="#" class="delete"><i class='bx bx-trash'></i></a>
                            </div>
                        </li>

                        <li>
                            <div class="checkbox">
                                <input class="inp-cbx" id="cbx4" type="checkbox" style="display: none;"/>
                                <label class="cbx" for="cbx4">
                                            <span>
                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                </label>
                            </div>

                            <div class="todo-item-title">
                                <img src="assets/img/user4.jpg" data-toggle="tooltip" data-placement="top"
                                     title="Steven Smith" alt="image">
                                <h3>What reason think</h3>
                                <p>There are many variations of...</p>
                            </div>

                            <div class="todo-item-action">
                                <a href="#" class="edit"><i class='bx bx-edit-alt'></i></a>
                                <a href="#" class="delete"><i class='bx bx-trash'></i></a>
                            </div>
                        </li>

                        <li>
                            <div class="checkbox">
                                <input class="inp-cbx" id="cbx5" type="checkbox" style="display: none;"/>
                                <label class="cbx" for="cbx5">
                                            <span>
                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                </label>
                            </div>

                            <div class="todo-item-title">
                                <img src="assets/img/user5.jpg" data-toggle="tooltip" data-placement="top"
                                     title="Lucy Smith" alt="image">
                                <h3>Think about business content?</h3>
                                <p>There are many variations of...</p>
                            </div>

                            <div class="todo-item-action">
                                <a href="#" class="edit"><i class='bx bx-edit-alt'></i></a>
                                <a href="#" class="delete"><i class='bx bx-trash'></i></a>
                            </div>
                        </li>

                        <li>
                            <div class="checkbox">
                                <input class="inp-cbx" id="cbx6" type="checkbox" style="display: none;"/>
                                <label class="cbx" for="cbx6">
                                            <span>
                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                </label>
                            </div>

                            <div class="todo-item-title">
                                <img src="assets/img/user6.jpg" data-toggle="tooltip" data-placement="top"
                                     title="James Anderson" alt="image">
                                <h3>Reason would it be advisable</h3>
                                <p>There are many variations of...</p>
                            </div>

                            <div class="todo-item-action">
                                <a href="#" class="edit"><i class='bx bx-edit-alt'></i></a>
                                <a href="#" class="delete"><i class='bx bx-trash'></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Where are your users?</h3>

                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-show'></i> View
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-edit-alt'></i> Edit
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-trash'></i> Delete
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-printer'></i> Print
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-download'></i> Download
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="world-map-markers"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
@endsection
