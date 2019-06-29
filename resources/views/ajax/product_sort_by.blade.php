@foreach($products as $index => $row)
    <tr>
        <td>{{++$index}}</td>
        <td>{{$row->name}}</td>
        <td>Rp. {{number_format($row->price)}}</td>
        <td>
            @for($i=1 ; $i <=5 ; $i++)
                @if($i<=$row->rating)
                    <span class="fa fa-star checked"></span>
                @else
                    <span class="fa fa-star"></span>
                @endif
            @endfor
        </td>
        <td>{{ (isset($row->quantity)) ? $row->quantity : 0 }}</td>
        <td>{{ $row->views }}</td>
        <td class="text-center">
            <a href="{{route('admin.products.show', ['id'=>$row->id])}}" class="btn btn-info"> Show </a>
            <a href="{{route('admin.products.edit', ['id'=>$row->id])}}" class="btn btn-warning"> Edit </a>
            <a href="{{route('admin.products.delete', ['id'=>$row->id])}}" onclick="return confirm('Are you sure want to delete {{$row->name}} ?')" class="btn btn-danger"> Delete </a>
        </td>
    </tr>
@endforeach