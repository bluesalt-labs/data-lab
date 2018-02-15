
<table class="table">
    <thead>
        <tr>
        @foreach($headers as $title)
            <th>{{ $title }}</th>
        @endforeach
        @if($editButton['enabled'])
            <th></th>
        @endif
        </tr>
    </thead>
    <tbody>
    @php $headerKeys = array_keys($headers) @endphp
    @foreach($data as $rowValues)
        <tr class="">
        @foreach($headerKeys as $headerKey)
            <td>
            @if($headerKey === 'created_at' || $headerKey === 'updated_at')
                {{ Carbon\Carbon::instance($rowValues->$headerKey)->toFormattedDateString() }}
            @elseif(gettype($rowValues->$headerKey) === 'object')
            @foreach($rowValues->$headerKey as $item)
                <span class="label label-default">{{ $item['name'] }}</span>
            @endforeach
            @else
                {{ $rowValues->$headerKey }}
            @endif
            </td>
        @endforeach
        @if($editButton['enabled'])
        <td>
            <a  type="button" class="{{ $editButton['class'] }}"
                href="{{ route($modelSlug.'_view', [ 'id' => $rowValues['id'] ]) }}">
                Edit
            </a>
        </td>
        @endif
        </tr>
    @endforeach
    </tbody>
</table>
<!--
<pre><code>
    < ?=json_encode($data, JSON_PRETTY_PRINT)?>
</code></pre>
-->