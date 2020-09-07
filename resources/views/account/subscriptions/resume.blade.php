@extends('layouts.account')

@section('account')
    <div class="card">
        <div class="card-header">{{ __('Resume') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('account.subscriptions.resume') }}">
                @csrf
                <button type="submit" class="btn btn-success">Resume</button>
            </form>
        </div>
    </div>
@endsection
