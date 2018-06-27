<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ $user->name }}</h3>
    </div>
       
        <div class="panel-body">
            <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 75) }}" alt="">
        </div>
           
            <div class="profile">
            <ul>
                <li>{!! nl2br (e($user->profile)) !!}</li>
                <li class="birthday">birthday</li>
                <li>{{ $user->birthday }}</li>
                <li><a href="{{ $user->web_link }}">{{ $user->web_link }}</a></li>
                <a href="{{ route('edit') }}" type="button" class="btn">Edit Profile</a>
            </ul>
            </div>
</div>