<?php $__env->startSection('title', '- Categories'); ?>

<?php $__env->startSection('content'); ?>

    <?php if(count($categories) > 0): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Categories
            </div>

            <div class="panel-body">
                <table class="table table-striped category-table">

                    <thead>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <?php if(Auth::user()): ?>
                        <th>Actions</th>
                        <?php endif; ?>
                    </thead>

                    <tbody>
                        <?php foreach($categories as $category): ?>
                            <tr id="<?php echo e($category->id); ?>">
                                <td class="table-text name">
                                    <a href="<?php echo e(url('category/'.$category->id)); ?>">
                                        <div class="name"><?php echo e($category->name); ?></div>
                                    </a>
                                </td>

                                <td class="table-text description">
                                    <a href="<?php echo e(url('category/'.$category->id)); ?>">
                                        <div class="description"><?php echo e($category->description); ?></div>
                                    </a>
                                </td>
                                <td class="table-text created_at">
                                    <a href="<?php echo e(url('category/'.$category->id)); ?>">
                                        <div><?php echo e($category->created_at); ?></div>
                                    </a>
                                </td>
                            <?php if(Auth::user()): ?>
                                <td class="table-text">
                                    <form method="post" action="<?php echo e(url('category/'.$category->id)); ?>">
                                        <button type="submit" class="btn btn-primary edit-btn" data-id="<?php echo e($category->id); ?>">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        &nbsp;
                                        <button type="submit" class="btn btn-danger delete-btn" data-name="<?php echo e($category->name); ?>" data-id="<?php echo e($category->id); ?>">

                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            Are you Sure you want to delete <span class="dname"></span> ? 
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn actionBtn btn-danger delete" data-dismiss="modal">
                                <span id="footer_action_button" class='glyphicon glyphicon-trash'>Delete</span>
                            </button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                <span class='glyphicon glyphicon-remove'></span> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            No categories found
        </div>

        <div class="panel-body">
            No categories found please add new one
        </div>
    </div>
    <?php endif; ?>

    <?php if(Auth::user()): ?>
    <?php echo $__env->make('categories.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            Not autherized
        </div>

        <div class="panel-body">
            You should <a href="<?php echo e(url('/login')); ?>">Login</a> or <a href="<?php echo e(url('/register')); ?>">Register</a> to be able to add new category
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>