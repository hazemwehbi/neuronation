@extends('layouts.app')

@section('title', 'History')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if (count($exercises) > 0)
                <h3>Dashboard</h3>
                <h4>Your exercises history</h4>
                <br>
                <div id="history-chart">
                    <ul id="bars">
                        @foreach ($exercises as $exercise)
                        <li>
                            <div data-score="{{ $exercise->score }}" class="bar">
                                <span>{{ $exercise->name }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <br>
                <br>
                <br>
                <hr>
                <div class="text-center">
                    <h3>Recently Trained within the very last session</h3>
                    <p>Category : <strong>{{ $latestExercise[0]->category_name}} </strong></p>
                    <p>Score : <strong>{{ $latestExercise[0]->score}} </strong></p>
                </div>
            @else
                <div class="text-center">You don't have any session yet.</div>
            @endif
        </div>
    </div>
</div>

@endsection
