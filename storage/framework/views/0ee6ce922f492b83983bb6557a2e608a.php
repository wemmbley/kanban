<div class="row">
    <div class="wrapper">
        <form wire:submit="submit" class="card p-3">
            <h3 class="m-auto mb-3">Authentication</h3>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1" class="mb-1">Email address</label>
                <input wire:model="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-flex">Invalid email format.</div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputPassword1" class="mb-1">Password</label>
                <input wire:model="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputPassword1" placeholder="Password">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback d-flex">Invalid passowrd format.</div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
            <div class="form-group form-check mb-3">
                <input wire:model="keepLogged" type="checkbox" class="form-check-input">
                <label class="form-check-label text-dark" for="exampleCheck1">Keep me logged in.</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Let's go</button>
        </form>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('livewire:init', function () {
            Livewire.on('incorrect-data', () => {
                $toastDanger('Incorrect data. Please, try again.');
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/modules/Auth/Resources/Views/livewire/auth-form.blade.php ENDPATH**/ ?>