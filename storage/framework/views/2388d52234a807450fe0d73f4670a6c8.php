<div class="header">
    <div class="project-list d-flex h-100 align-items-center">
        <label for="available-projects" class="me-3">Select project</label>
        <select name="projects" class="available-projects" id="available-projects">
            <option value="crypto">Crypto project</option>
            <option value="ecommerce">eCommerce</option>
            <option value="banking">Banking</option>
        </select>
        <button type="button" class="btn btn-outline-success ms-2">New project</button>
    </div>

    <div class="mini-profile">
        <div class="greeting d-flex align-items-center">
            <img src="<?php echo e(asset('modules/web/img/avatar.png')); ?>" alt="avatar" class="avatar">
            <p class="m-0 ps-2">Welcome, <b>Rustam</b>.</p>
            <a href="<?php echo e(route('logout')); ?>" class="text-decoration-none ps-3">Logout</a>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/modules/Web/Resources/Views/header.blade.php ENDPATH**/ ?>