<div class="card border-0 shadow-sm">
    <div class="card-body my-3">
        <ul class="list-unstyled">
            <li class="my-3"
                style="{{ Route::currentRouteName() == 'profile.index' ? 'border-left: 5px solid #3490DC' : 'border-left: 5px solid white'}}">
                <h5 class="font-weight-bold ml-3"><a href="{{ route('profile.index') }}" class="text-reset">Profile</a>
                </h5>
            </li>
            @if(auth()->user() && auth()->user()->role == 'member')
            <li class="my-3"
                style="{{ Route::currentRouteName() == 'friends.index' ?  'border-left: 5px solid #3490DC' : 'border-left: 5px solid white'}}">
                <h5 class="font-weight-bold ml-3"><a href="{{ route('friends.index') }}" class="text-reset">Friends</a>
                </h5>
            </li>
            <li class="my-3"
                style="{{ Route::currentRouteName() == 'transaction.index' ?  'border-left: 5px solid #3490DC' : 'border-left: 5px solid white'}}">
                <h5 class="font-weight-bold ml-3"><a href="#" class="text-reset">Transaction History</a></h5>
            </li>
            @endif
        </ul>
    </div>
</div>
