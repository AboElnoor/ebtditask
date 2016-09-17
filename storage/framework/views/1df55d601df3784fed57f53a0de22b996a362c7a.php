<?php $__env->startSection('content'); ?>


    <div class="panel-body">

        <form action="<?php echo e(url('task')); ?>" method="POST" class="form-horizontal">
            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Category</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="category-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Category
                    </button>
                </div>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>