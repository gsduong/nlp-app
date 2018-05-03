@extends('index')

@section('title')
	Edit document
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
                                <a href="{{route('intent.show', $intent->id)}}">{{$intent->name}}</a>
                                <small>You can only update original text</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{route('intent.add.document', $intent->id)}}" class=" waves-effect waves-block">Add new document</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form method="post" action="{{route('intent.update.document', [$intent->id, $document->id])}}">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <div class="row clearfix">
                                            <div class="col-lg-5 col-md-10 col-sm-10 col-xs-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label for="document">Original Text</label>
                                                        <input type="text" name="document" class="form-control" required placeholder="Document" value="{{$document->original_text}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-10 col-sm-10 col-xs-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label>Tokenized Text</label>
                                                        <input type="text" disabled class="form-control" value="{{$document->tokenized_text}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-10 col-sm-10 col-xs-12">
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label>Text After Removing Stopwords</label>
                                                        <input type="text" disabled class="form-control" value="{{$document->text}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <button type="submit" class="btn btn-block btn-xs waves-effect">Update</button>
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