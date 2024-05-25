<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includs.message-block', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="row new-post">
        <div class="col-md-6 offset-md-3">
            <header>
                <h3> what do you have to say</h3>
                <form action="<?php echo e(route('post.create')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                        <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                    </div>
                </form>
            </header>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 offset-md-3">
            <header>
                <h3> What other people say......</h3>
            </header>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class='post' data-postid="<?php echo e($post->id); ?>">
                    <p> <?php echo e($post->body); ?></p>
                    <div class="info">
                        posted by <?php echo e($post->user->first_name); ?> on <?php echo e($post->created_at); ?>

                    </div>
                    <div class="intercation">
                        <a href="#"
                            class=" link-offset-2 link-underline link-underline-opacity-10 like"><?php echo e(Auth::user()->likes()->where('post_id', $post->id)->first()? (Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1? 'You like this post': 'Like'): 'Like'); ?></a>
                        |
                        <a href="#"
                            class="link-offset-2 link-underline link-underline-opacity-10 like"><?php echo e(Auth::user()->likes()->where('post_id', $post->id)->first()? (Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0? 'You don\'t like this post': 'Dislike'): 'Dislike'); ?></a>|

                        <?php if(Auth::user() == $post->user): ?>
                            <a href="#" class="link-offset-2 link-underline link-underline-opacity-10 edit">Edit</a>|
                            <a class="link-offset-2 link-underline link-underline-opacity-10"
                                href="<?php echo e(route('post.delete', ['post_id' => $post->id])); ?>">Delete</a>|
                        <?php endif; ?>

                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <div class="modal" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="form-label"for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='modal-save'>Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var token = '<?php echo e(Session::token()); ?>';
        var urlEdit = '<?php echo e(route('edit')); ?>';
        var urlLike = '<?php echo e(route('like')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\basic-social-networking-platform-app\resources\views/dashboard.blade.php ENDPATH**/ ?>