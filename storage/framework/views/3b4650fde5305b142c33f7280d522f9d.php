<!-- FIXME: Inline CSS here need to fix dragula.js bug when it dropped out styles. -->
<div class="card" style="padding: 10px" data-task-id="<?php echo e($task->getKey()); ?>">
    <div class="card-title">
        <p style="font-size: 13px"><?php echo e($task->name); ?></p>
    </div>
    <div class="card-footer d-flex justify-content-between"
         style="margin: 0; padding: 0; background-color: transparent; border: none;">
        <div class="d-flex align-items-center">
            <img class="task-icon me-1" src="<?php echo e($task->type->image_url); ?>" alt="task icon" height="16" width="16">
            <p class="card-number" style="font-size: 12px; margin: 0;"><?php echo e($task->project->identifier); ?>-<?php echo e($task->identifier); ?></p>
        </div>
        <div class="d-flex">
            <!--[if BLOCK]><![endif]--><?php if(!empty($task->story_points )): ?>
                <span class="badge bg-secondary rounded-pill story-points" style="
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 0;
                    height: 18px;
                    width: 18px;
                    background-color: #eae9e9 !important;
                    color: #585858;">
                    <?php echo e($task->story_points); ?>

                </span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <img class="priority-icon ms-2" src = "<?php echo e($task->priority->image_url); ?>" alt="high priority" height="18" width="18"/>
            <img class="avatar ms-2 me-1" src="<?php echo e(asset('modules/web/img/avatar.png')); ?>" alt="avatar" height="18" width="18">
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/modules/Kanban/Resources/Views/kanban/single-task.blade.php ENDPATH**/ ?>