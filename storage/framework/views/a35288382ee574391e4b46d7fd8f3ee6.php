<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web::head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('auth::auth-form-component', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1563652812-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php echo $__env->make('web::footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/modules/Auth/Resources/Views/auth.blade.php ENDPATH**/ ?>