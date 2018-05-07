@extends('index')

@section('title')
	Naive Bayes Model
@endsection

@section('extra-css')

@endsection

@section('content')
        <!-- Widgets -->
        @if($vocabs->count() > 0)
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        @include('layouts.partials.errors')
                        <h2>
                            Vocabulary (Bag of words)
                            <small># Distinc words: {{$vocabs->count()}}. Total words: {{$vocabs->sum('freq')}}</small>
                        </h2>
                        <br/>
                        <form method="post" action="{{route('nbmodel.test')}}">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <div class="row clearfix">
                                        <div class="col-lg-5 col-md-10 col-sm-10 col-xs-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label for="text_to_test">Original Text</label>
                                                    <input type="text" name="text_to_test" class="form-control" required placeholder="New document" value="{{ $sample ? $sample->original_text : ""}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-10 col-sm-10 col-xs-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Tokenized Text</label>
                                                    <input type="text" disabled class="form-control" value="{{$sample ? $sample->tokenized_text : ""}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-10 col-sm-10 col-xs-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Text After Processing</label>
                                                    <input type="text" disabled class="form-control" value="{{$sample ? $sample->processed_text : ""}}">
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
                            <br/>
                            @if($sample)
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">Intent: {{$sample->predicted_label}}. Score: {{$sample->score}}</div>     
                            </div>
                            @endif
                            @if($sample)
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p>
                                        @foreach(json_decode($sample->score_table) as $key => $value)
                                        Score({{$key}}) = {{number_format($value, 3)}}.&nbsp;
                                        @endforeach
                                    </p>
                                </div>     
                            </div>
                            @endif
                        </form>
                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Word</th>
                                    <th>Freq</th>
                                    @foreach($intents as $intent)
                                    <th>P(word | {{$intent->name}})</th>
                                    @endforeach 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vocabs as $no => $word)
                                    <tr>
                                        <td>{{$no + 1}}</td>
                                        <td>{{$word->word}}</td>
                                        <td>{{$word->freq}}</td>
                                        @foreach(json_decode($word->prob_table, true) as $key => $value)
                                        <td>{{number_format($value, 3)}}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Your model need to be trained. Please click <a href="{{route('nbmodel.train')}}">Train</a> to train intent classifier.
                        </h2>
                    </div>
                    <div class="body table-responsive">
                    </div>
                </div>
            </div>
        </div>
        @endif
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