@extends('layouts.app')

@section('content')
<h1 class="container ">{{ __('this is the search page') }}</h1>
    <div >hi</div>
         <tbody>
              @foreach($store as $st)
            <tr>
                <td>{{ $st->id }}</td>
                <td>{{ $st->name }}</td>
                <td><a href="{{ url('stores',$st->name) }}">{{ $st->name }}</a></td>
            </tr>
            @endforeach
        </tbody>

</div>
<br><br><br><br><br><br><br><br><br>
</div>

@endsection 
