@extends('index')

@section('title')
	@if($intent)
    {{$intent->name}}
    @else
    Intent not found
    @endif
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
                            {{$intent->name}}
                            <small>Current samples for <a href="{{route('intent.show', $intent->id)}}">{{$intent->name}}</a></small>
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

                    <div class="body table-responsive">
                        <table class="table">
                            @if($intent->documents->count() > 0)
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Samples</th>
                                        <th>Tokenized Text</th>
                                        <th>Text After Removing Stopwords, Numbers and Punctuations</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($intent->documents as $index => $value)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$value->original_text}}</td>
                                            <td>{{$value->tokenized_text}}</td>
                                            <td>{{$value->text}}</td>
                                            <td><a href="{{route('intent.edit.document', [$intent->id, $value->id])}}">Edit</a>&nbsp;<a href="{{route('intent.delete.document', [$intent->id, $value->id])}}">Delete</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                Intent has no document
                            @endif
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