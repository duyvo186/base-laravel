<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">URL</th>
        <th scope="col">Status</th>
        <th scope="col">Path</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($items as $idx => $item)
        <tr>
            <th scope="row">{{ $idx + 1 }}</th>
            <td>{{ $item->url }}</td>
            <td>{{ $item->status }}</td>
            <td><a href="{{url($item->path ? $item->path : '')}}">{{ $item->path ? $item->path : '' }}</a></td>
        </tr>


       {!!$item->html!!}
    @endforeach
    </tbody>
</table>
