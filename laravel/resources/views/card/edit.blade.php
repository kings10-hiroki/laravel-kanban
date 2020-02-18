@extends('layouts.app')

@section('content')

@include('common.errors')

<div class="cardeditPage">
    <div class="container">
        <form class="cardeditForm" id="edit_card" action="/card/edit" method="POST" accept-charset="UTF-8">
            @csrf
            <input type="hidden" name="id" value="{{$card->id}}">
            <div class="cardeditForm_title">
                <label for="card_title">タイトル</label>
                <input class="form-control" placeholder="カード名" type="text" value="{{ old('card_title',$card->title) }}" name="card_title">
            </div>
            <div class="cardeditForm_memo">
                <label for="card_memo">メモ</label>
                <textarea class="form-control" placeholder="詳細" name="card_memo">
                    {{ old('card_memo',$card->memo) }}
                </textarea>
            </div>
            <div class="cardeditForm_memo">
                <label>リスト名</label>
                <select class="form-control" name="listing_id">
                    @foreach ($listings as $listing)
                        <option value="{{ $listing->id }}" 
                        @if (old('listing_id', $listing->id) == $listing->id)
                            selected
                        @endif>
                            {{ $listing->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <input type="submit" name="commit" value="更新する" class="submitBtn">
            </div>
        </form>
    </div>
</div>
@endsection
