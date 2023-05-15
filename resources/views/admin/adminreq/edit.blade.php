@extends('layouts.adminmain')

@section('container')

<h1 class="mb-3">Edit</h1>
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

    <button type="submit" class="btn btn-primary">Edit</button>
  </form>
@endsection

