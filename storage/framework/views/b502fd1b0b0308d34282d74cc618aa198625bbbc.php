<?php $__env->startSection('content'); ?>

    <div class="container-fluid vh-100">
        <div class="row h-100 justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9 my-auto p-0 bg-light rounded shadow">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="<?php echo e(asset('/images/users/admin/Profile/' . $admin['image'])); ?>" alt="login image" class="img-fluid" style="width:100%; height: 100%; object-fit: cover">
                    </div>
                    <div class="col-lg-7 p-5 overflow-auto" style="max-height: 35rem">
                        <label style="position: absolute; top: 0; left: 0"> <?php echo e($admin['type']); ?> </label>
                        <div class="row">
                            <div class="col text-center">
                                <h3>Hello <?php echo e($admin['first_name']); ?>!</h3>
                                <hr class="bg-secondary">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form id="admin_profile_form">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="mb-0" for="first_name">First Name</label>
                                            <input type="text" class="form-control border-0" id="first_name" name="first_name" value="<?php echo e($admin['first_name']); ?>" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="mb-0" for="last_name">Last Name</label>
                                            <input type="text" class="form-control border-0" id="last_name" name="last_name" value="<?php echo e($admin['last_name']); ?>" required>
                                        </div>
                                    </div>
                                    <div></div>
                                    <div class="form-group">
                                        <label class="mb-0" for="email_address">Email Address</label>
                                        <input type="email" class="form-control border-0" id="email_address" name="email_address" value="<?php echo e($admin['email']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-0" for="phone_number">Phone Number</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend"><span class="input-group-text border-0">+254</span></div>
                                            <input type="number" class="form-control border-0" id="phone_number" name="phone_number" value="<?php echo e($primaryPhone['phone']); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" name="admin_crud" value="update_profile_details" class="btn btn-outline-danger">
                                            <i class="fas fa-pen"></i> Update Profile
                                        </button>
                                        <img class="d-none loader_gif" id="loader_gif_detalis" src="<?php echo e(asset('/images/loaders/Gear-0.2s-200px.gif')); ?>" alt="loader.gif">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <h3>Change Password!</h3>
                                <hr class="bg-secondary">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form id="admin_profile_pass_form">
                                    <div class="form-group">
                                        <input type="hidden" name="admin_pass_id" value="">
                                        <label for="current_pass"></label>
                                        <input type="password" class="form-control border-0" id="current_pass" name="current_pass" placeholder="Current password" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="new_pass"></label>
                                            <input type="password" class="form-control border-0" id="new_pass" name="new_pass" placeholder="New password" required>
                                        </div>
                                        <div class="form-group col">
                                            <label for="confirm_pass"></label>
                                            <input type="password" class="form-control border-0" id="confirm_pass" name="confirm_pass" placeholder="Confirm password" required>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" name="admin_crud" value="update_profile_pass" class="btn btn-outline-danger"><i class="fas fa-pen"></i> Change Password</button>
                                        <img class="d-none loader_gif" id="loader_gif_detalis" src="<?php echo e(asset('/images/loaders/Gear-0.2s-200px.gif')); ?>" alt="loader.gif">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nabcellent-7/Desktop/PHP/My Projects/suf-laravel/resources/views/Admin/profile.blade.php ENDPATH**/ ?>