@foreach($vartest as $value)
    @if(!($loop->first or $loop->last))
        <p>{{$value}}</p>
    @endif
@endforeach

<script>
    @auth('admin')
        var newJson = @json($vartest);
        console.log(newJson);
    @endif
</script>
