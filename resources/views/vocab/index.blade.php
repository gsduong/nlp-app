@extends('index')

@section('title')
	Vocab
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
                            Vocabulary (Bag of words)
                            <small>Bag of words with frequencies</small>
                            # Distinc words: {{$words->count()}}. Total words: {{$words->sum('freq')}}
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Word</th>
                                    <th>Freq</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($words as $word)
                                    <tr>
                                        <td>{{$word->word}}</td>
                                        <td>{{$word->freq}}</td>
                                    </tr>
                                @endforeach
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