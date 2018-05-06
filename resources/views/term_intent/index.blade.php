@extends('index')

@section('title')
	Bảng xác suất
@endsection

@section('extra-css')

@endsection

@section('content')
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Bảng xác suất Bayes
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    @foreach ($intents as $intent)
                                    <th colspan="2">{{$intent->name . " #words = ". $intent->count_total_term()}}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                	<th>Word</th>
                                    @foreach ($intents as $intent)
                                    <th>Freq</th>
                                    <th>prob(word|intent)</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($terms as $term)
                                    <tr>
                                        <td>{{$term}}</td>
	                                    @foreach ($intents as $intent)
	                                    <td>{{$intent->count_word($term)}}</td>
	                                    <td>{{number_format($intent->prob_word($term), 6)}}</td>
	                                    @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
@endsection

@section('extra-script')
        {{Html::script('plugins/jquery-countto/jquery.countTo.js')}}
        <script type="text/javascript">
            $('.count-to').countTo();
        </script>
        {{Html::script('//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js')}}
        <script type="text/javascript">
            $(document).ready( function () {
                $('#stopwordsTable').DataTable();
            } );
        </script>
@endsection