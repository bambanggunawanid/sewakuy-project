<?= $this->extend('pages/layouts/auth-layout') ?>

<?= $this->section('content') ?>
<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
  <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
    <?php if (session()->getFlashdata('pesan')) : ?>
      <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-400">
        <span class="text-xl inline-block mr-5 align-middle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </span>
        <span class="inline-block align-middle mr-8">
          <b class="capitalize">Registered!, </b><?= session()->getFlashdata('pesan') ?>
        </span>
        <a href="/login" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
          <span>×</span>
        </a>
      </div>
    <?php endif ?>
    <?php if (session()->getFlashdata('cantLogin')) : ?>
      <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-400">
        <span class="text-xl inline-block mr-5 align-middle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </span>
        <span class="inline-block align-middle mr-8">
          <b class="capitalize">Ouchh!, </b><?= session()->getFlashdata('cantLogin') ?>
        </span>
        <a href="/login" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
          <span>×</span>
        </a>
      </div>
    <?php endif ?>
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
          <form action="/login" method="post">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Email</span>
              <input class="border-2 rounded-l block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="bambang@example.com" type="email" name="email" />
              <span class="<?= ($validation->hasError('email')) ? 'text-red-500' : 'hidden' ?>"><?= $validation->getError('email') ?></span>
            </label>
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Password</span>
              <input class="border-2 rounded-l block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="password" name="password" />
              <span class="<?= ($validation->hasError('password')) ? 'text-red-500' : 'hidden' ?>"><?= $validation->getError('password') ?></span>
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