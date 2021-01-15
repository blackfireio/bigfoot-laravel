@foreach ($sightings as $sighting)
<tr>
    <td>
        <a class="text-white" href="{{ route('sightings.show', ['sighting' => $sighting]) }}">
            {{ $sighting->title }}
        </a>
    </td>
    <td class="text-nowrap">
        <time class="table-content" datetime="{{ $sighting->created_at->format('Y-m-d H:i') }}">{{ $sighting->created_at->longRelativeDiffForHumans('now') }}</time>
    </td>
    <td>
        <a class="text-white table-content text-center" href="{{ route('sightings.show', ['sighting' => $sighting]) }}">{{ $sighting->comments_count }}</a>
    </td>
</tr>
@endforeach
