<div class="col-12 col-xl-10 stretch-card grid-margin">
    <div class="row">

        <div class="indicator-channel" id="container-percent-graph"> 
            @include('statistics.graph-percent') 
        </div>

        @foreach($graphStats as $graphName => $graphValue) 

                @if($graphValue['type'] == 'percent') 
                    @include('statistics.graph-datas' , array('indicator' => $graphName , 'graphDatas' => $graphValue['periodes'] , 'graphName' => 'chart-percent' , 'type' => 'percent')) 
                @else
                    @include('statistics.graph-integer' , array('indicator' => $graphName , 'graphDatas' => $graphValue['periodes'] , 'graphName' => uniqid() , 'type' => 'numeric')) 
                @endif 

        @endforeach

    </div>

</div>