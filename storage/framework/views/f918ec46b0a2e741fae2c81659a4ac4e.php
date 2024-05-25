<?php $__env->startSection('title'); ?>
    Welcome!
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includs.message-block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action='/signup' method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group" <?php echo e($errors->has('email') ? 'has-error' : ''); ?>>
                    <label for="email">Your Email</label>
                    <input class= "form-control" type="email" name="email" id="email"
                        value="<?php echo e(Request::old('email')); ?>">
                </div>
                <div class="form-group">
                    <label for="first-name">Your First Name</label>
                    <input class= "form-control" type="text" name="first-name" id="first-name"
                        value="<?php echo e(Request::old('first-name')); ?>">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password"
                        value="<?php echo e(Request::old('password')); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="/signin" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input class= "form-control" type="email" name="email" id="email"
                        value="<?php echo e(Request::old('email')); ?>">
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password"
                        value="<?php echo e(Request::old('password')); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\basic-social-networking-platform-app\resources\views/welcome.blade.php ENDPATH**/ ?>