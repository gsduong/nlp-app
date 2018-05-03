@extends('index')

@section('title')
	Add new document
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
                                INPUT
                                <small>Create new document for <a href="{{route('intent.show', $intent->id)}}">{{$intent->name}}</a></small>
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post" action="{{route('intent.create.document', $intent->id)}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="document" class="form-control" required placeholder="Document">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <button type="submit" class="btn btn-block btn-xs waves-effect">Add</button>
                                    </div>
                                </div>
                            </form>
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