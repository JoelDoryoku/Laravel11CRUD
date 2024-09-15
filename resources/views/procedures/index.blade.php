@extends('layouts.base')
@section('view:name', 'Procedures')
@section('view:route', route('procedures.create'))
@section('view:link-name', 'New Procedure')
@section('content')
    <table class="w-full mt-8">
        <thead>
            <tr class="[&>th]:text-left">
                <th>Name</th>
                <th>Type</th>
                <th>Status</th>
                <th>Client DNI</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($procedures as $procedure)
                @php
                    // Get the procedure type and client of the procedure
                    $procedureType = $procedureTypes->where('id', $procedure->procedure_type_id)->firstOrFail();
                    $client = $clients->where('id', $procedure->client_id)->firstOrFail();
                @endphp

                <tr>
                    <td class="">{{ $procedure->name }}</td>
                    <td>{{ $procedureType->name }}</td>
                    <td>{{ $procedure->status }}</td>
                    <td>{{ $client->dni }}</td>
                    <td class="flex justify-center gap-4 max-w-16 max-h-8">
                        <a href="{{ route('procedures.edit', $procedure->id) }}" class="text-sm bg-[#d3ac40] py-1 px-3 rounded-md">Editar</a>
                        <button type="button" onclick="confirmDelete('{{ $procedure->id }}')" class="text-sm bg-[#d34040] text-white py-1 px-3 rounded-md">Eliminar</button>
                    </td>
                </tr>
            @endforeach
    </table>
@endsection

<script>
    function confirmDelete(procedureId) {
        alertify.confirm('Delete Procedure', 'Are you sure you want to delete this procedure?', function(event) {
            if (event) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = `procedures/${procedureId}`;
                form.innerHTML = `@csrf @method('DELETE')`;
                document.body.appendChild(form);
                form.submit();
            }
        }, function() {
            alertify.error('Cancel');
        });
    }
</script>