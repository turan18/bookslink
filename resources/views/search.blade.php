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
        <li>
            Title: {{$item['title']}}
        </li>
        <li>
            @if(isset($item['authors']))
                @if(count($item['authors']) == 1)
                    Author: {{$item['authors'][0]}}
                @else
                    @foreach($item['authors'] as $key=>$value)
                        Author {{$key+1}}: {{$value}}
                    @endforeach
                @endif
            @endif
        </li>
        <li>
            Snippet: {!!html_entity_decode(strip_tags($item['snippet'])) !!}
        </li>

    </ul>


@endforeach

</body>
</html>
