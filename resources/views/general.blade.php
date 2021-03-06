@extends('layouts.app')

@section('content')

<div style="background-image: url('/images/pyrko-com-ua-uroki.png'); width: 100%; height: 800px; background-size: cover"><h1 class="u-align-center u-custom-font u-font-merriweather u-text u-text-body-alt-color u-text-1" style="padding-top:200px; font-size: 80px; text-decoration: underline">Donations for developers from all over<br>the world </h1></div>


<section class="u-align-center u-clearfix u-palette-3-base u-section-2" id="carousel_a3ed">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-center u-clearfix u-gutter-100 u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                <div class="u-layout-col">
                    <div class="u-size-20">
                        <div class="u-layout-row">
                            <div class="u-align-center u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                                <div class="u-container-layout u-valign-middle u-container-layout-1">
                                    <h2 class="u-align-center u-text u-text-black u-text-2">TOP DONATOR </h2>
                                </div>
                            </div>
                            <div class="u-container-style u-layout-cell u-size-30 u-white u-layout-cell-2" data-animation-name="bounceIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
                                <div class="u-container-layout u-container-layout-2"> <span style="font-size: 40px;">Name: <span id="topname"> {{$topDonationName}}</span> <br> Sum: <span id="topsum"> {{$topDonationSum}} $</span>  </div>
                            </div>
                        </div>
                    </div>
                    <div class="u-size-20">
                        <div class="u-layout-row">
                            <div class="u-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-3">
                                <div class="u-container-layout u-container-layout-3">
                                    <h2 class="u-align-center u-text u-text-3">ALL TIME AMOUNT</h2>
                                </div>
                            </div>
                            <div class="u-container-style u-layout-cell u-size-30 u-white u-layout-cell-4" data-animation-name="bounceIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
                                <div class="u-container-layout u-container-layout-4"> <span id="allamount" style="font-size: 40px;">{{$amount}} $</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="u-size-20">
                        <div class="u-layout-row">
                            <div class="u-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-5">
                                <div class="u-container-layout u-valign-middle u-container-layout-5">
                                    <h2 class="u-align-center u-text u-text-default u-text-4">LAST MONTH AMOUNT</h2>
                                </div>
                            </div>
                            <div class="u-container-style u-layout-cell u-shape-rectangle u-size-30 u-white u-layout-cell-6" data-animation-name="bounceIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
                                <div class="u-container-layout u-container-layout-6"> <span style="font-size: 30px;">Sum for mounth: <span id="month">{{$month}}</span> <br>Sum for day: <span id="day">{{$day}}</span> $</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="u-align-center u-clearfix u-grey-80 u-section-3" id="sec-8a52">
    <div id="curve_chart" style="width: 100%; height: 500px"></div>
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-expanded-width u-table u-table-responsive u-table-1">
            <table class="u-table-entity u-table-entity-1" id="myTable">
                <colgroup>
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                    <col width="20%">
                </colgroup>
                <thead class="u-black u-table-header u-table-header-1">
                <tr style="height: 46px;">
                    <th class="u-border-1 u-border-black u-table-cell">DONATOR NAME</th>
                    <th class="u-border-1 u-border-black u-table-cell">EMAIL</th>
                    <th class="u-border-1 u-border-black u-table-cell">SUM</th>
                    <th class="u-border-1 u-border-black u-table-cell">MESSAGE</th>
                    <th class="u-border-1 u-border-black u-table-cell">DATE</th>
                </tr>
                </thead>
                <tbody class="u-table-body">
                @foreach($donation as $value)
                    <tr style="height: 75px;">
                    <td class="u-border-1 u-border-grey-30 u-table-cell">{{$value->name}}</td>
                    <td class="u-border-1 u-border-grey-30 u-table-cell">{{$value->email}}</td>
                    <td class="u-border-1 u-border-grey-30 u-table-cell">{{$value->donation}}</td>
                    <td class="u-border-1 u-border-grey-30 u-table-cell">{{$value->message}}</td>
                    <td class="u-border-1 u-border-grey-30 u-table-cell">{{$value->created_at}}</td>
                </tr>
                @endforeach

                </tbody>
            </table>
            {{$donation->links('vendor.pagination.simple-bootstrap-4')}}
        </div>
    </div>
</section>






<footer class="u-clearfix u-footer u-grey-80" id="sec-6224"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <nav class="u-align-center u-menu u-menu-dropdown u-offcanvas u-menu-1">
            <div class="menu-collapse">
                <a class="u-button-style u-nav-link" href="#">
                    <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
                            </symbol>
                        </defs></svg>
                </a>
            </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    Pusher.logToConsole = true;

    var pusher = new Pusher('d91eec27faea72f28ec8', {
        cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {

        var name = data.message.name;
        var email = data.message.email;
        var donation = data.message.donation;
        var msg = data.message.msg;
        var date = data.message.date;
        var newAmount = data.message.newAmount;
        var topDonationName = data.message.topDonationName;
        var topDonationSum = data.message.topDonationSum;
        var month = data.message.month;
        var day = data.message.day;

        var charts = data.message.chartArray;
        console.log("charts", charts)
        drawChart(charts);

        $('#allamount').html(newAmount + '$');
        $('#topname').html(topDonationName);
        $('topsum').html(topDonationSum);
        $('month').html(month);
        $('day').html(day);
        $('#myTable').prepend('<tr style="height: 75px;"><td class="u-border-1 u-border-grey-30 u-table-cell">'+ name +'</td><td class="u-border-1 u-border-grey-30 u-table-cell">'+ email +'</td><td class="u-border-1 u-border-grey-30 u-table-cell">'+ donation +'</td><td class="u-border-1 u-border-grey-30 u-table-cell">'+ msg +'</td><td class="u-border-1 u-border-grey-30 u-table-cell">'+ date +'</td></tr>');

    });

    var chartsF = {!!json_encode($chartArray ?? '') !!};
    console.log("chartsF", chartsF)
    function drawChart(charts) {
        var data = charts
            ? google.visualization.arrayToDataTable(charts)
            : google.visualization.arrayToDataTable(chartsF);

        var options = {
            title: 'Donations',
            curveType: 'function',
            legend: {position: 'bottom'}
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
</script>
</body>
</html>
@endsection
