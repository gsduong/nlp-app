@extends('index')

@section('title')
	Intent
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
                            Intents
                            <small>Current intents and number of samples for each training intent</small>
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Intent</th>
                                    <th># Samples</th>
                                    <th>Probability</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($intents as $intent)
                                    <tr>
                                        <td>{{$intent->id}}</td>
                                        <td><a href="{{route('intent.show', $intent->id)}}">{{$intent->name}}</a></td>
                                        <td>{{$intent->documents->count()}}</td>
                                        <td>{{number_format($intent->prob, 3)}}</td>
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