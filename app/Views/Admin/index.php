<?= $this->extend('admin/layouts/admin-layout') ?>

<?= $this->section('content') ?>
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Dashboard
    </h2>
    <?php if (session()->getFlashdata('pesan')) : ?>
      <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-400">
        <span class="text-xl inline-block mr-5 align-middle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </span>
        <span class="inline-block align-middle mr-8">
          <b class="capitalize">Success, </b><?= session()->getFlashdata('pesan') ?>
        </span>
        <a href="admin/" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
          <span>×</span>
        </a>
      </div>
    <?php endif ?>
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
          </svg>

        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Total products
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?= count($adminProduct) ?>
          </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Balance
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <span class="text-lg">Rp</span> <?= number_format($user['balance'], 0, ',', '.') ?>
          </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Total User
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?= count($Allusers) ?>
          </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-yellow-400 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-400">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Reputation
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?= $user['reputation'] ?> %
          </p>
        </div>
      </div>
    </div>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Product Name</th>
              <th class="px-4 py-3">Price</th>
              <th class="px-4 py-3">Stock</th>
              <th class="px-4 py-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <?php foreach ($adminProduct as $ap) : ?>
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                      <img class="object-cover w-full h-full rounded-full" src="<?= "/image/image1/" .  $ap['image1'] ?>" alt="" loading="lazy" />
                      <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                      <p class="font-semibold"><?= $ap['name'] ?></p>
                      <p class="text-xs text-gray-600 dark:text-gray-400">
                        <?= ($ap['category']) ?>
                      </p>
                    </div>
                  </div>
                <td class="px-4 py-3 text-sm">
                  <?= $ap['price'] ?>
                </td>
                <td class="px-4 py-3 text-sm">
                  <?= $ap['stock'] ?>
                </td>
                <td class="flex text-xs py-3">
                  <a href="/admin/edit/<?= $ap['uuid'] ?>" class="px-4 py-2 mr-2 font-semibold leading-tight text-yellow-400 bg-yellow-100 rounded-full dark:bg-yellow-400 dark:text-yellow-100">
                    Edit
                  </a>
                  <form action="/admin/<?= $ap['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" id="" value="Delete">
                    <button type="submit" class="px-4 py-2 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100" onclick="return confirm('sure?')">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Charts -->
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Charts
    </h2>
    <div class="grid gap-6 mb-8 md:grid-cols-2">
      <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
          Revenue
        </h4>
        <canvas id="pie"></canvas>
        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
          <!-- Chart legend -->
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
            <span>Shirts</span>
          </div>
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
            <span>Shoes</span>
          </div>
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-blue-600 rounded-full"></span>
            <span>Bags</span>
          </div>
        </div>
      </div>
      <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
          Traffic
        </h4>
        <canvas id="line"></canvas>
        <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
          <!-- Chart legend -->
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
            <span>Organic</span>
          </div>
          <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-blue-600 rounded-full"></span>
            <span>Paid</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?= $this->endSection() ?>