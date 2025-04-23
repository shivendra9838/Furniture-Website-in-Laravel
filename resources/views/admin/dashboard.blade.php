<div>
    <h1>Dashboard</h1>
    <h2>Books -</h2>
    <div>
        @foreach($books as $book)
            <p>{{ $book['title'] }}</p>
        @endforeach
    </div>
    <h2>Total Users: {{ $totalUsers }}</h2>
</div>