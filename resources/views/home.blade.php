@extends('index')

@section('title')
	Dashboard
@endsection

@section('extra-css')

@endsection

@section('content')
	<div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">collections_bookmark</i>
                        </div>
                        <div class="content">
                            <div class="text">INTENTS</div>
                            <div class="number count-to" data-from="0" data-to="4" data-speed="500" data-fresh-interval="20">4</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">folder</i>
                        </div>
                        <div class="content">
                            <div class="text">TRAINING DATA</div>
                            <div class="number count-to" data-from="0" data-to="4" data-speed="500" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">folder_open</i>
                        </div>
                        <div class="content">
                            <div class="text">TEST DATA</div>
                            <div class="number count-to" data-from="0" data-to="40" data-speed="500" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-purple hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">delete</i>
                        </div>
                        <div class="content">
                            <div class="text">STOPWORDS</div>
                            <div class="number count-to" data-from="0" data-to="117" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
        </div>
@endsection

@section('extra-script')
        {{Html::script('plugins/jquery-countto/jquery.countTo.js')}}
        <script type="text/javascript">
          $('.count-to').countTo();
        </script>
@endsection