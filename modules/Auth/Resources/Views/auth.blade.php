@push('styles')
    <style>
        .row {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .wrapper {
            width: 440px;
            margin-bottom: 100px;
        }
    </style>
@endpush

@include('web::head')

<livewire:auth::auth-form-component />

@include('web::footer')
