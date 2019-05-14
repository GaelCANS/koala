<div class="indicator-channel"> 
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <canvas id="chart-{{$graphName}}"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@include('statistics.graph-datas' , array('indicator' => $indicator , 'graphDatas' => $graphDatas , 'graphName' => $graphName, 'type' => $type)) 
