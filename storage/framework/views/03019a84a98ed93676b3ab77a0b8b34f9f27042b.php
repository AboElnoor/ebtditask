<?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form action="<?php echo e(url('product')); ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <div class="form-group">
        <label for="product" class="col-sm-3 control-label">product</label>

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
        <label for="image" class="col-sm-3 control-label">image</label>
        
        <div class="col-sm-6">
            <input type="file" name="image" id="image" class="btn btn-default">
        </div>
    </div>
    <input type="hidden" name="category" value="<?php echo e($category->id); ?>">
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default" id="add">
                <i class="fa fa-plus"></i> Add product
            </button>
        </div>
    </div>
</form>
