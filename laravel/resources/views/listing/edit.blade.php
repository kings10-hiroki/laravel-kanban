@extends('layouts.app')

@section('content')

<div class="panel-body">

@include('common.errors')

    <form action="{{ url('listing/edit') }}" method="POST" class="form-horizontal">
        @csrf
        <div class="form-group">
            <label for="listing" class="col-sm-3 control-label">リスト名</label>
            <div class="col-sm-6">
                <input type="text" name="list_name" class="form-control" value="{{ old('list_name', $listing->title) }}">
            </div>
            <input type="hidden" name="id" value="{{ old('id', $listing->id) }}">
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="glyphicon glyphicon-saved"></i>
                    更新
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
