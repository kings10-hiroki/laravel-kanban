@extends('layouts.app')

@section('content')
<div class="container">
<div class="panel-body">

@include('common.errors')

    <form action="{{ url('listings') }}" method="POST" style="margin-top: 100px;">
        @csrf
        <div class="form-group row">
            <label for="listing" class="col-sm-2 col-form-label">リスト名</label>
            <div class="col-sm-4">
                <input type="text" name="list_name" class="form-control" value="{{ old('list_name') }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-outline-secondary">
                    <i class="fas fa-plus-square"></i>
                    作成
                </button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
