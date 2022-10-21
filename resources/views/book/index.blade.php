@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            メイン画面
        </div>
        <div>
            <form method="GET" action="{{ route('bookApi.search') }}">
                <input name="keyword" type="text" value="">
                <button type="submit" class="btn btn-primary">
                    {{ __('検索') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection