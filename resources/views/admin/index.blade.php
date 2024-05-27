@extends('layouts.dashboard')

@section('extra-head')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work',     11],
                ['Eat',      2],
                ['Commute',  2],
                ['Watch TV', 2],
                ['Sleep',    7]
            ]);

            var options = {
                title: 'My Daily Activities',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
@endsection
@section('content')
        <div class="row">
             <div class="col-12">
                <h2 class="text-start m-3">لوحة التحكم</h2>
                <p class="text-start m-3">منطقة مدير النظام .. يجب أن تملك صلاحيات Administrator</p>
                </div>
            <div class="col-12">
            <hr class="text-danger mx-auto" style="width: 75%">
            </div>

             <div class="col-12 mb-4">
                <div class="widget">
                    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                </div>
            </div>


        </div>
@endsection
