<?= $this->extend('pages/layouts/auth-layout') ?>

<?= $this->section('content') ?>
<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
  <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
    <div class="flex flex-col overflow-y-auto md:flex-row">
      <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../assets/img/login-office.jpeg" alt="Office" />
        <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="../assets/img/login-office-dark.jpeg" alt="Office" />
      </div>
      <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
          <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Login
          </h1>
          <form action="login" method="post">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Email</span>
              <input class="border-2 rounded-l block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="bambang@example.com" type="email" name="email" required />
            </label>
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Password</span>
              <input class="border-2 rounded-l block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="password" name="password" required />
            </label>

            <!-- You should use a button here, as the anchor is only used for the example  -->
            <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
              Login
            </button>
          </form>

          <hr class="my-8" />
          <p class="mt-4">
            <a class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline" href="/forgot-password">
              Forgot your password?
            </a>
          </p>
          <p class="mt-1">
            <a class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline" href="/register">
              Create account
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>