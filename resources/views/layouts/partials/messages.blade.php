@if (isset($errors) && count($errors) > 0)
    <div style="color: red;">
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if(is_array($data))
        @foreach($data as $msg)
            <div style="color: green;">
                {{$msg}}
            </div>
        @endforeach
    @else
        <div style="color: green;">
            {{$data}}
        </div>
    @endif

@endif
