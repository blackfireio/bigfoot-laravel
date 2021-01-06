@inject('activityHelper', 'App\BigFoot\UserActivityHelper')
<x-app-layout>
    <x-slot name="title">{{ $sighting->title }} | BigFoot</x-slot>
    <x-slot name="slot">
        <div class="col">
            <div class="sighting-log-container mb-5 pb-5">
                <h2 style="font-size: 1.5rem;">{{ $sighting->title }}</h2>
                <p><span class="pr-2"><i class="fa fa-clock"></i> <time datetime="{{ $sighting->created_at->format('Y-m-d H:i') }}">{{ $sighting->created_at->longRelativeDiffForHumans('now') }}</time></span>
                    |
                    <span class="pl-2">Big Foot Believability Score: <span class="badge badge-info">{{ $sighting->score }}</span> </span>
                </p>
                <div>
                    {{ $sighting->description }}
                </div>
            </div>

            <h3>Littlefoot (i.e. Human) Reactions</h3>

            @foreach ($sighting->comments as $comment)
            <div class="comment-container mb-3">
                <div class="row">
                    <div class="col-1">
                        <img class="px-1 py-1" src="{{ $comment->owner->avatarUrl() }}" alt="Avatar for {{ $comment->owner->email }}">
                    </div>
                    <div class="col">
                        <strong>{{ $comment->owner->email }}</strong>
                        <span>({{ user_activity_text($comment->owner) }})</span>
                        <span class="px-2">|</span>
                        <small><i class="fa fa-clock pr-2"></i><time datetime="{{ $comment->created_at->format('Y-m-d H:i') }}">{{ $comment->created_at->longRelativeDiffForHumans('now') }}</time></small>
                        <div class="pt-2">
                            {{ $comment->content }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </x-slot>
</x-app-layout>
