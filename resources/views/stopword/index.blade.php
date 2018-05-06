@extends('index')

@section('title')
	Stopwords
@endsection

@section('extra-css')

@endsection

@section('content')
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-2 col-sm-2 col-xs-12">
                &nbsp;
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            UPLOAD STOPWORDS
                            <small>Accept .txt files.       
                                @if(Storage::disk('public_uploads')->exists('files/stopwords.txt'))
                                    <a href="{{route('stopword.show')}}" target="_blank">Current stopwords</a> list can be downloaded at: <a href="{{route('stopword.download')}}">stopwords.txt</a>
                                @endif
                            </small>
                        </h2>
                    </div>
                    <div class="body">
                        <form method="post" enctype="multipart/form-data" action="{{route('stopword.upload')}}">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="file" name="stopwords" accept=".txt" class="form-control" required>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <button type="submit" class="btn btn-block btn-xs waves-effect">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-2 col-sm-2 col-xs-12">
                &nbsp;
            </div>
        </div>
        <!-- #END# Widgets -->
@endsection

@section('extra-script')
        {{Html::script('plugins/jquery-countto/jquery.countTo.js')}}
        <script type="text/javascript">
            $('.count-to').countTo();
        </script>
@endsection