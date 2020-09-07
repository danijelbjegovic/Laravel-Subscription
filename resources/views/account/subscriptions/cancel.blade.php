@extends('layouts.account')

@section('account')
    <div class="card">
        <div class="card-header">{{ __('Cancel') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('account.subscriptions.cancel') }}">
                @csrf
                <button type="submit" class="btn btn-warning">Cancel</button>
            </form>
        </div>
    </div>
@endsection
