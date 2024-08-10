<div class="row">
    <div class="wrapper">
        <form wire:submit="submit" class="card p-3">
            <h3 class="m-auto mb-3">Authentication</h3>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="mb-1">Email address</label>
                <input wire:model="email" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                @error('email') <div class="invalid-feedback d-flex">Invalid email format.</div> @enderror
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputPassword1" class="mb-1">Password</label>
                <input wire:model="password" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                @error('password') <div class="invalid-feedback d-flex">Invalid passowrd format.</div> @enderror
            </div>
            <div class="form-group form-check mb-3">
                <input wire:model="keepLogged" type="checkbox" class="form-check-input">
                <label class="form-check-label text-dark" for="exampleCheck1">Keep me logged in.</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Let's go</button>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:init', function () {
            Livewire.on('incorrect-data', () => {
                $toastDanger('Incorrect data. Please, try again.');
            });
        });
    </script>
@endpush
