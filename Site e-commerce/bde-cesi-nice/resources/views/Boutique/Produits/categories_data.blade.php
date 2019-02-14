<select>
	@foreach($data as $row)
	<option value='{{ $row->nom_categories }}' {{$selected}} >{{ $row->nom_categories }}</option>
	@endforeach
</select>
{!! $data->links() !!}