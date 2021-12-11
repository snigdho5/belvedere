<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
</head>

<body>
    <h2> Hi {{ $data['name'] }}, you have successfully registered. Following are your account details: <br>
        </h3>
        <h3>Email: </h3>
        <p>{{ $data['email'] }}</p>
        <h3>Name: </h3>
        <p>{{ $data['name'] }}</p>
        <h3>Month: </h3>
        <p>{{ $data['month'] }}</p>
        <h3>Start Date: </h3>
        <p>{{ $data['start_date'] }}</p>
        <h3>End Date: </h3>
        <p>{{ $data['end_date'] }}</p>
        <h3>Year Left: </h3>
        <p>{{ $data['year_left'] }}</p>
</body>

</html>
