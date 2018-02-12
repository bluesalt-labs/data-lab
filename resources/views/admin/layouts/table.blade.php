<div class="container">
    <table class="table">
        <thead>
            <tr>
            @foreach($headers as $title)
                <th>{{ $title }}</th>
            @endforeach
            </tr>
        </thead>
        <tbody>
        @php $headerKeys = array_keys($headers) @endphp
        @foreach($data as $rowValues)
            <tr>
            @foreach($headerKeys as $headerKey)
                <td>{{ $rowValues[$headerKey] }}</td>
            @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
    <!--
    <pre><code>
        < ?=json_encode($data, JSON_PRETTY_PRINT)?>
    </code></pre>
    -->
</div>