<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>K-Means Clustering</h1>

    <ul>
        @foreach ($clusters as $index => $cluster)
        <h2>Cluster {{ $index + 1 }}</h2>
        <ul>
            @foreach ($cluster as $sample)
                <li>[{{ implode(", ", $sample) }}]</li>
            @endforeach
        </ul>
    @endforeach
    </ul>
</body>
</html>
    
