@extends('admin.page')


@section('content')

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
      </tr>
    </thead>
    <tbody>

    @foreach ($results as $u)

        <tr>
          <td>{{ $u[0] }}</td>
          <td>{{ $u[1] }}</td>
          <td>{{ $u[2] }}</td>
        </tr>

    @endforeach

  </tbody>
</table>

@endsection
