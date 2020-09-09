@extends('layouts.account')

@section('account')
    <div class="card">
        <div class="card-header">{{ __('Swap') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('account.subscriptions.swap') }}">
                @csrf


                <div class="form-group">
                    <label for="plan">Plan</label>
                    <select name="plan" id="plan" class="form-control">
                        @foreach ($plans as $plan)
                            <option value="{{ $plan->slug }}">{{ $plan->title }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Swap</button>
            </form>
        </div>
    </div>
@endsection
