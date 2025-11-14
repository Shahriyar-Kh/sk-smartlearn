
<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="min-h-screen bg-gradient-to-br from-sky-50 to-blue-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-gray-900">Join SK SmartLearn</h2>
                <p class="mt-2 text-gray-600">Start your learning journey today</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8">
                
                <a href="<?php echo e(route('auth.google')); ?>" class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 rounded-lg shadow-sm bg-white hover:bg-gray-50 transition-colors mb-6">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    <span class="text-sm font-semibold text-gray-700">Continue with Google</span>
                </a>

                <div class="relative mb-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or register with email</span>
                    </div>
                </div>

                <form method="POST" action="<?php echo e(route('register')); ?>" class="space-y-5">
                    <?php echo csrf_field(); ?>

                    
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input id="username" type="text" name="username" value="<?php echo e(old('username')); ?>" required autofocus 
                            class="block w-full px-4 py-3 rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 transition-colors"
                            placeholder="Enter your username">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required 
                            class="block w-full px-4 py-3 rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 transition-colors"
                            placeholder="you@example.com">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input id="password" type="password" name="password" required 
                            class="block w-full px-4 py-3 rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 transition-colors"
                            placeholder="Minimum 8 characters">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required 
                            class="block w-full px-4 py-3 rounded-lg border-gray-300 shadow-sm focus:border-sky-500 focus:ring-sky-500 transition-colors"
                            placeholder="Re-enter your password">
                    </div>

                    
                    <div class="flex items-start">
                        <input type="checkbox" name="terms" id="terms" required 
                            class="mt-1 rounded border-gray-300 text-sky-600 focus:ring-sky-500">
                        <label for="terms" class="ml-2 text-sm text-gray-600">
                            I agree to the <a href="#" class="text-sky-600 hover:underline">Terms of Service</a> and <a href="#" class="text-sky-600 hover:underline">Privacy Policy</a>
                        </label>
                    </div>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                    
                    <button type="submit" class="w-full px-4 py-3 bg-sky-600 text-white rounded-lg hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition-colors font-semibold shadow-lg hover:shadow-xl">
                        Create Account
                    </button>

                    
                    <div class="text-center text-sm text-gray-600">
                        Already have an account? 
                        <a href="<?php echo e(route('login')); ?>" class="text-sky-600 hover:underline font-semibold">Sign in</a>
                    </div>
                </form>
            </div>

            <p class="mt-4 text-center text-xs text-gray-500">
                You can complete your profile details after registration
            </p>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?><?php /**PATH D:\HA_Technologies\Theory_and_Practices\Php_and_Laravel\Laravel\SK Study Managment Systems\sk-smartlearn\resources\views\livewire/pages/auth/register.blade.php ENDPATH**/ ?>