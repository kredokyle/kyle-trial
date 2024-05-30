@extends('layouts.app')

@section('title', 'Suggestions For You')

@section('content')
    <div class="row justify-content-center">
        <div class="col-5">
            <p class="fw-bold">Suggested</p>

            @foreach ($suggested_users as $user)
                <div class="row mb-3">
                    <div class="col-auto align-self-center">
                        <a href="{{ route('profile.show', $user->id) }}">
                            @if ($user->avatar)
                                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle avatar-md">
                            @else
                                <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                            @endif
                        </a>
                    </div>
                    <div class="col ps-0 text-truncate">
                        <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $user->name }}</a>
                        <p class="text-secondary mb-0">{{ $user->email }}</p>
                        <p class="text-secondary mb-0 xsmall">
                            @if ($user->isFollowingMe())
                                Follows you
                            @elseif ($user->followers->count() == 0)
                                No followers yet.
                            @else
                                {{ $user->followers->count() }} {{ $user->followers->count() == 1 ? 'follower' : 'followers' }}
                            @endif
                        </p>
                    </div>
                    <div class="col-auto align-self-center">
                        <form action="{{ route('follow.store', $user->id) }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary fw-bold btn-sm">Follow</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection