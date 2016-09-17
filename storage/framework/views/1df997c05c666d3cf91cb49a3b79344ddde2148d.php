<?php if($product): ?>
	<?php $__env->startSection('title', '- '.$product->name); ?>

	<?php $__env->startSection('content'); ?>
			<div class="featurette" id="about">
			    <img class="featurette-image img-circle img-responsive pull-right" src="<?php echo e(url($product->image)); ?>" height="500" width="500" alt="<?php echo e($product->name); ?>" />
			    <h2 class="featurette-heading"><a href="<?php echo e(url('/product/'.$product->id)); ?>"><?php echo e($product->name); ?></a> 
			        <h5 class="text-muted">By <?php echo e($product->user->name); ?></h5>
			    </h2>
			    <p class="lead">
			    	<?php echo e($product->description); ?>

			    </p>
			</div>
	<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>