@php
    use App\Models\Etudiant ;
    use App\Models\Station ;
    $path = "C://xampp_new\htdocs\laravel_INSCRIPTION\PFE_APP_V5\laravel_inscription\dataSet" ;
    $stationValue = new Station();

    $radiationValue = Station::select('station.Radiation_Solaire')->first()->Radiation_Solaire;
    $dateValue = Station::select('station.date')->first()->date;
    $date = Station::select('Station.created_at')->first()->date;
    $etudiant = new Etudiant();
    $etudiant = Auth::user()->etudiant ;
    $dataSet = [];
    $realData = [] ;
    $predictedData = [] ;

    if (($open = fopen($path . "/station_data_ENSAM.csv", "r")) !== FALSE) {

        while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
            $dataSet[] = $data;
        }

    fclose($open);

}

if (($open = fopen($path . "/vraiData.csv", "r")) !== FALSE) {

while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
    $realData[] = $data;
}

fclose($open);

}

if (($open = fopen($path . "/dataPredicted.csv", "r")) !== FALSE) {

while (($data_ = fgetcsv($open, 1000, ",")) !== FALSE) {
    $predictedData[] = $data_;
}

fclose($open);

}

header('Access-Control-Allow-Origin: *');
@endphp
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">

    <title>Station Meteo Home  !</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors-rtl.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/custom-rtl.css')}}">


    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/cryptocoins/cryptocoins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style-rtl.css')}}">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="https://pyscript.net/alpha/pyscript.css" />
    <script defer src="https://pyscript.net/alpha/pyscript.js"></script>
    <py-env>
        - paths:
            - {{asset('/pickle5/pickle.py')}}
            - {{asset('/model.py')}}
            - {{asset('/model_RS_96.pkl')}}
    </py-env>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="modern admin logo" src="{{asset('app-assets/images/logo/logo.png')}}">
                            <h3 class="brand-text">Station Meteo </h3>
                        </a></li>
                    <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                        <li class="dropdown nav-item mega-dropdown d-none d-lg-block"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Mega</a>

                        </li>

                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">{{$etudiant->Nom}} {{$etudiant->Prenom}}<span class="mr-1 user-name text-bold-700"></span><span class="avatar avatar-online"><img src="../../../app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="app-kanban.html"><i class="ft-clipboard"></i> Todo</a><a class="dropdown-item" href="user-cards.html"><i class="ft-check-square"></i> Task</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>

                </li>
        </div>
    </div>

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc BTC warning font-large-2" title="BTC"></i>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>
                                                <py-script>
                                                    import pickle
                                                    model = pickle.load(open('./model_RS_96.pkl', 'rb'))
                                                    print(model)
                                                </py-script>
                                                Last RS value</h4>

                                            <h6 class="text-muted">W/m2</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{$radiationValue}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><canvas id="btc-chartjs" class="height-75"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>Laste Date Value</h4>
                                            <h6 class="text-muted">nombre des jours</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{$dateValue}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><canvas id="eth-chartjs" class="height-75"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="cc XRP info font-large-2" title="XRP"></i>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>Date</h4>
                                            <h6 class="text-muted"></h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{$date}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12"><canvas id="xrp-chartjs" class="height-75"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Candlestick Multi Level Control Chart -->

                <!-- Slaes & Purchase Order -->
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div id="accordionCrypto" role="tablist" aria-multiselectable="true">
                            <div class="card accordion collapse-icon accordion-icon-rotate">


                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Trade History & Place Order -->
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <div class="card-content">

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Artificial ET0 prediction</h4>
                                <div class="heading-elements">
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-underline no-hover-bg">
                                        <li class="nav-item">
                                            <a class="nav-link" id="base-market" data-toggle="tab" aria-controls="market" href="#market" aria-expanded="false">Prediction ET0</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content px-1 pt-1">
                                        <div role="tabpanel" class="tab-pane active" id="limit" aria-expanded="true" aria-labelledby="base-limit">
                                            <div class="row">
                                                <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4 pr-2">
                                                </div>
                                                <div class="col-12 col-xl-6 pl-2 p-0">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="market" aria-labelledby="base-market">
                                            <div class="row">
                                                <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4">
                                                    <div class="row my-2">
                                                        <div class="col-4">
                                                            <h5 class="text-bold-600 mb-0">Predict ET0</h5>
                                                        </div>
                                                        <div class="col-8 text-right">
                                                            <p class="text-muted mb-0" id="output_pyScript">La valeur estimer est :</p>
                                                        </div>
                                                    </div>
                                                    <form class="form form-horizontal">
                                                        <div class="form-body">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="btc-market-buy-price">Rs moy</label>
                                                                <div class="col-md-9">
                                                                    <input type="number" enable id="btc-market-buy-price" class="form-control" placeholder="Radiation solaire" name="btc-market-buy-price">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="btc-market-buy-amount">Date</label>
                                                                <div class="col-md-9">
                                                                    <input type="number" id="btc-market-buy-amount" class="form-control" placeholder="Date" name="btc-market-buy-amount">
                                                                </div>
                                                            </div>

                                                            <div class="form-actions pb-0">
                                                                <button id="run" type="button" class="btn round btn-success btn-block btn-glow">
                                                                   Predict </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="stop-limit" aria-labelledby="base-stop-limit">
                                            <div class="row">
                                                <div class="col-12 col-xl-6 border-right-blue-grey border-right-lighten-4">
                                                    <div class="row my-2">
                                                        <div class="col-4">
                                                            <h5 class="text-bold-600 mb-0">Buy BTC</h5>
                                                        </div>
                                                        <div class="col-8 text-right">
                                                            <p class="text-muted mb-0">USD Balance: $ 5000.00</p>
                                                        </div>
                                                    </div>
                                                    <form class="form form-horizontal">
                                                        <div class="form-body">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="btc-stop-buy">Stop</label>
                                                                <div class="col-md-9">
                                                                    <input type="number" id="btc-stop-buy" class="form-control" placeholder="$ 11916.9" name="btc-stop-buy">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="btc-stop-buy-limit">Limit</label>
                                                                <div class="col-md-9">
                                                                    <input type="number" id="btc-stop-buy-limit" class="form-control" placeholder="$ 12000.0" name="btc-stop-buy-limit">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="btc-stop-buy-amount">Amount</label>
                                                                <div class="col-md-9">
                                                                    <input type="number" id="btc-stop-buy-amount" class="form-control" placeholder="0.026547 BTC" name="btc-stop-buy-amount">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-3"></div>
                                                                <div class="col-md-9">
                                                                    <button type="button" class="btn round btn-outline-secondary btn-sm">25%</button>
                                                                    <button type="button" class="btn round btn-outline-secondary btn-sm">50%</button>
                                                                    <button type="button" class="btn round btn-outline-secondary btn-sm">75%</button>
                                                                    <button type="button" class="btn round btn-outline-secondary btn-sm">100%</button>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="btc-stop-buy-total">Total</label>
                                                                <div class="col-md-9">
                                                                    <input type="number" disabled id="btc-stop-buy-total" class="form-control" placeholder="$ 318.1856" name="btc-stop-buy-total">
                                                                </div>
                                                            </div>
                                                            <div class="form-actions pb-0">
                                                                <button type="submit" class="btn round btn-success btn-block btn-glow">
                                                                    Buy BTC </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-12 col-xl-6 pl-2 p-0">
                                                    <div class="row my-2">
                                                        <div class="col-4">
                                                            <h5 class="text-bold-600 mb-0">Sell BTC</h5>
                                                        </div>
                                                        <div class="col-8 text-right">
                                                            <p class="text-muted mb-0">BTC Balance: 1.2654898</p>
                                                        </div>
                                                    </div>
                                                    <form class="form form-horizontal">
                                                        <div class="form-body">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="btc-stop-sell">Stop</label>
                                                                <div class="col-md-9">
                                                                    <input type="number" id="btc-stop-sell" class="form-control" placeholder="$ 11916.9" name="btc-stop-sell">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="btc-stop-sell-limit">Limit</label>
                                                                <div class="col-md-9">
                                                                    <input type="number" id="btc-stop-sell-limit" class="form-control" placeholder="$ 12000.0" name="btc-stop-sell-limit">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="btc-stop-sell-amount">Amount</label>
                                                                <div class="col-md-9">
                                                                    <input type="number" id="btc-stop-sell-amount" class="form-control" placeholder="0.026547 BTC" name="btc-stop-sell-amount">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-3"></div>
                                                                <div class="col-md-9">
                                                                    <button type="button" class="btn round btn-outline-secondary btn-sm">25%</button>
                                                                    <button type="button" class="btn round btn-outline-secondary btn-sm">50%</button>
                                                                    <button type="button" class="btn round btn-outline-secondary btn-sm">75%</button>
                                                                    <button type="button" class="btn round btn-outline-secondary btn-sm">100%</button>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="btc-stop-sell-total">Total</label>
                                                                <div class="col-md-9">
                                                                    <input type="number" disabled id="btc-stop-sell-total" class="form-control" placeholder="$ 318.1856" name="btc-stop-sell-total">
                                                                </div>
                                                            </div>
                                                            <div class="form-actions pb-0">
                                                                <button type="submit" class="btn round btn-danger btn-block btn-glow">
                                                                    Sell BTC </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Trade History & Place Order -->


                <!-- Sell Orders & Buy Order -->
                <div class="row match-height">
                    <div class="col-12 col-xl-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">

                                            ET0 Real</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">
                                            <p class="card-text">The Real Values of ET0</p>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>ET0 real</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($realData as $data)

                                                        <tr>
                                                            @foreach($data as $val)
                                                            <td>{{$val}}</td>
                                                            @endforeach
                                                        </tr>
                                                        @endforeach
                                                    </tbody>


                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-xl-6">
                        <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <p class="text-muted"></p>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">

                                                ET0 Pred</h4>
                                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body card-dashboard">
                                                <p class="card-text">The predicted Values of ET0</p>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered zero-configuration">
                                                        <thead>
                                                            <tr>
                                                                <th>ET0 predicted</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($predictedData as $data)

                                                            <tr>
                                                                @foreach($data as $val)
                                                                <td>{{$val}}</td>
                                                                @endforeach
                                                            </tr>
                                                            @endforeach
                                                        </tbody>


                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                <!--/ Sell Orders & Buy Order -->

                <!-- Active Orders -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    DataSet utiliser</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <button class="btn btn-sm round btn-danger btn-glow"><i class="la la-close font-medium-1"></i>
                                        Cancel all</button>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">

                                        <thead>
                                            <tr>
                                                <th>Date/heure</th>
                                                <th>Temperature moy</th>
                                                <th>Temperature max</th>
                                                <th>Temperature min</th>
                                                <th>Radiation Solaire moy W/m2</th>
                                                <th>Humidit moy</th>
                                                <th>Humidit min</th>
                                                <th>Precipitation Somme</th>
                                                <th>Vitesse Du Vent moy</th>
                                                <th>Vitesse Du Vent min</th>
                                                <th>Vitesse Du Vent max</th>
                                                <th>ETP quotidien mm</th>
                                                <th>Cancel</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dataSet as $ligne)
                                            @foreach($ligne as $value)
                                            @php
                                            $hh = [];
                                            $hh = explode(";", $value);
                                            @endphp
                                            <tr>
                                                @foreach($hh as $val)

                                                <td>{{$val}}</td>
                                                @endforeach

                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Active Orders -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2022 Boureqba Ayoub <a class="text-bold-800 grey darken-2" href="https://1.envato.market/modern_admin" target="_blank">PIXINVENT</a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with<i class="ft-heart pink"></i><span id="scroll-top"></span></span></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('app-assets/vendors/js/charts/chart.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/charts/apexcharts/apexcharts.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('app-assets/js/scripts/pages/dashboard-crypto.js')}}"></script>
    <!-- END: Page JS-->


</body>
<!-- END: Body-->





</html>
