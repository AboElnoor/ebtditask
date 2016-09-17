<?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form action="<?php echo e(url('category')); ?>" name="create" method="POST" class="form-horizontal">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="category" class="col-sm-3 control-label">Category</label>

        <div class="col-sm-2">
            <input type="text" name="name" id="name" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="Description" class="col-sm-3 control-label">Description</label>
        
        <div class="col-sm-6">
            <input type="text" name="description" id="description" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default" id="add">
                <i class="fa fa-plus"></i> Add Category
            </button>
        </div>
    </div>
</form>
