@extends('layouts.adminmain')

@section('container')

<h1 class="mb-2 text-center">Edit Request</h1>
<hr class="mb-4 w-50">

<form action="/admin/req/{{ $request->id }}" method="post">
    {{-- hidden status waiting for approval --}}
    {{-- hidden user_id --}}
    {{-- hidden admin_id --}}
    @csrf
    @method('put')
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-control" name="status" id="status">
        @foreach ($statuses as $status)
          @if ($status == old('status', $request->status))
            <option value="{{ $status }}" selected>{{ $status }}</option>
          @else
            <option value="{{ $status }}">{{ $status }}</option>
          @endif
        @endforeach
      </select>
    </div>

    {{-- notes --}}
    <div class="mb-3">
      <label for="notes" class="form-label">Notes</label>
      <textarea class="form-control" name="notes" id="notes" rows="3">{{ old('notes', $request->notes) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
@endsection

