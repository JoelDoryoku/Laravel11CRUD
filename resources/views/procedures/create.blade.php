@extends('layouts.base')
@section('view:name', 'New Procedure')
@section('view:route', route('procedures.index'))
@section('view:link-name', 'Go Back')
@section('content')
    <form method="POST" action="{{ route('procedures.store') }}">
        @csrf

        <div class="mt-8">
            <label for="name" class="block">Name</label>
            <input type="text" name="name" id="name" class="w-full mt-2" required>
        </div>

        <div class="mt-4">
            <label for="procedure_type_id" class="block">Type</label>
            <select name="procedure_type_id" id="procedure_type_id" class="w-full mt-2" required>
                <option value="">Select a type</option>
                @foreach ($procedureTypes as $procedureType)
                    <option value="{{ $procedureType->id }}">{{ $procedureType->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <label for="status" class="block">Status</label>
            <select name="status" id="status" class="w-full mt-2" required>
                <option value="">Select a status</option>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="done">Done</option>
            </select>
        </div>

        <div class="mt-4">
            <label for="client_id" class="block">Client DNI</label>
            <select name="client_id" id="client_id" class="w-full mt-2" required>
                <option value="">Select a client</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->dni }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-8">
            <button type="submit" class="bg-[#007364] text-white py-2 px-3">Create</button>
        </div>
    </form>
@endsection