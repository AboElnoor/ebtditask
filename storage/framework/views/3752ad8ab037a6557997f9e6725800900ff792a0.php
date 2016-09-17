<?php $__env->startSection('content'); ?>


<?php if(count($categories) > 0): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Categories
            </div>

            <div class="panel-body">
                <table class="table table-striped category-table">

                    <thead>
                        <th>Category</th>
                        <th>Description</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <tbody>
                        <?php foreach($categories as $category): ?>
                            <tr>
                                <td class="table-text">
                                    <div><?php echo e($category->name); ?></div>
                                </td>

                                <td>
                                    <div><?php echo e($category->description); ?></div>
                                </td>
                                <td>
                                    <form action="<?php echo e(url('category/'.$category->id)); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('PUT')); ?>


                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-trash"></i> Edit
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?php echo e(url('category/'.$category->id)); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>


                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <div class="panel-body">


        <?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <form action="<?php echo e(url('category')); ?>" method="POST" class="form-horizontal">
            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <label for="category" class="col-sm-3 control-label">Category</label>

                <div class="col-sm-2">
                    <input type="text" name="name" id="category-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="Description" class="col-sm-3 control-label">Description</label>
                
                <div class="col-sm-6">
                    <input type="text" name="description" id="category-description" class="form-control">
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