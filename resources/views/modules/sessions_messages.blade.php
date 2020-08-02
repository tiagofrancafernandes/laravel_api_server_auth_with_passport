{{--
//How to use to set
->with(
            [
                'messages' => [
                    ['content' => 'A success!', 'status' => 'success'],
                    ['content' => 'An error!', 'status' => 'error'],
                ],
            ]
        )
 --}}
@if (session('messages'))                  
@foreach (session('messages') as $m)
    @php

    switch ($m['status']) {
        case 'success':
            $color = 'success';
            break;

        case 'error':
            $color = 'danger';
            break;

        default:
            $color = 'secondary';
            break;
    }
    @endphp

    <div class="alert alert-{{ $color }}">
        {{ __($m['content']) }}
    </div>                        
@endforeach
@endif