@extends('layouts.app')

@section('content')
<h1 class="container ">{{ __('this is the search page') }}</h1>
    <div >hi</div>
         <tbody>
              @foreach($results as $result)
            <tr>
                <td>{{ $result->id }}</td>
                <td>{{ $result->name }}</td>
                <td>{{ $result->email }}</td>
            </tr>
            @endforeach
        </tbody>

</div>
<br><br><br><br><br><br><br><br><br>
</div>

@endsection 
