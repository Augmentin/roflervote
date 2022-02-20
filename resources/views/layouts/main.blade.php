@extends("welcome")
@section("content")
    <div >
        <main-page :collections="{{ Illuminate\Support\Js::from($collections)}}" ></main-page>
    </div>
@endsection
@push("scripts")
    <script src="https://www.youtube.com/iframe_api" ></script>
@endpush