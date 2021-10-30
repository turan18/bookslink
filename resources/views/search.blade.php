<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
</head>
<style>
    body{
        color: white;
    }
</style>
<body style="background: #1a202c">
{{--{{ddd($items)}}--}}
@foreach($items as $item)
    <ul>
        <img src="{{$item['large-thumbnail'] ?? $item['thumbnail']}}">
        <li>
            ID: {{$item['id']}}
        </li>
        <form method="GET" action="{{url("resource/book/{$item['title']}")}}">
            <input type="hidden" name="id" value="{{$item['id']}}">
            <button type="submit">View</button>
        </form>

        <li>
            Title: {{$item['title']}}
        </li>
        <li>
            @if(isset($item['authors']))
                @if(! $item['multiple_authors'])
                    Author: {{$item['authors'][0]}}
                @else
                    @foreach($item['authors'] as $key=>$value)
                        Author {{$key+1}}: {{$value}}
                    @endforeach
                @endif
            @else
                <b>Author could not be retrieved.</b>
            @endif
        </li>
        <li>
            @if(isset($item['description']))
                Snippet: {!! $item['snippet'] !!}
            @else
                <b>Snippet could not be retrieved.</b>
            @endif

        </li>

    </ul>


@endforeach

</body>
</html>
