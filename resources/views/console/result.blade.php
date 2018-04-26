@extends('index')

@section('title')
	Result
@endsection

@section('extra-css')

@endsection

@section('content')
	<div class="container-fluid">
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            RESULT
                            <small>Testing</a></small>
                        </h2>
                    </div>
                    <div class="body">
                        <form method="post" action="{{route('console.test')}}">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <div class="row clearfix">
                                        <div class="col-lg-5 col-md-10 col-sm-10 col-xs-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label for="document">Original Text</label>
                                                    <input type="text" name="document" class="form-control" required placeholder="Document" value="{{ isset($document) ? $document : ""}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-10 col-sm-10 col-xs-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Tokenized Text</label>
                                                    <input type="text" disabled class="form-control" value="{{isset($tokenized_text) ? $tokenized_text : ""}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-10 col-sm-10 col-xs-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Text After Processing</label>
                                                    <input type="text" disabled class="form-control" value="{{isset($processed_text) ? $processed_text : ""}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <button type="submit" class="btn btn-block btn-xs waves-effect">Test</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
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
                                <tr>
                                    <td>Prob("{{$processed_text}}"|intent)</td>
                                        @foreach ($intents as $intent)
                                        <td colspan="2">{{number_format($intent->prob_doc($processed_text), 7)}}</td>
                                        @endforeach
                                </tr>
                                <tr>
                                    <td>% "{{$processed_text}}"</td>
                                        @foreach ($intents as $intent)
                                        <td colspan="2">{{number_format($intent->percentage($processed_text), 2)}} %</td>
                                        @endforeach
                                </tr>
                            </tbody>
                        </table>
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
        {{Html::script('//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js')}}
        <script type="text/javascript">
            $(document).ready( function () {
                $('#stopwordsTable').DataTable();
            } );
        </script>
@endsection