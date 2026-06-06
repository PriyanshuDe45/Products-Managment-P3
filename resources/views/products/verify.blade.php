<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>GTIN VERIFICATION</title>
</head>
<body>
<div class="container mt-4" style="max-width:500px">
    <h2>GTIN VERIFICATION</h2>

    <form action="{{route('verify.post')}}" method="post">
        @csrf
        <div class="mb-3">
            <label>Enter GTIN (one per line)</label>
            <textarea name="gtins" class="form-control" rows="5">{{ old('gtins') }}</textarea>
        </div>
        <button class="btn btn-primary">Verify</button>
    </form>

    @isset($results)
{{--        <pre>{{ var_dump($allValid) }}</pre>--}}
{{--        <pre>{{ print_r($results, true) }}</pre>--}}
        @if($allValid)
            <div class="text-center mt-4">
                <span style="font-size:2rem">✔</span>
                <div><strong>All Valid</strong></div>
            </div>
        @endif

        <table class="table table-bordered mt-3">
            <tbody>
            @foreach($results as $result)
                <tr>
                    <td>{{ $result['gtin'] }}</td>
                    <td class="{{ $result['valid'] ? 'text-success' : 'text-danger' }}">
                        {{ $result['valid'] ? 'Valid' : 'Invalid' }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endisset
</div>
</body>
</html>
