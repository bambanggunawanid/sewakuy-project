<?= $this->extend('admin/layouts/admin-layout') ?>

<?= $this->section('content') ?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Product
    </h2>

    <!-- Cards with title -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Your Products
    </h4>
    <div class="grid gap-6 mb-8 md:grid-cols-2">
      <?php foreach ($adminProduct as $ap) : ?>
        <div class="flex flex-col min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div class="flex justify-between mb-2">
            <div class="block">
              <p class="text-xs text-gray-600 dark:text-gray-400"><?= ($ap['category']) ?></p>
              <h4 class="font-semibold text-gray-600 dark:text-gray-300">
                <?= $ap['name'] ?>
              </h4>
              <p class="text-xs text-gray-600 dark:text-gray-400">Rp. <?= ($ap['price']) ?></p>
              <p class="text-xs text-gray-600 dark:text-gray-400">Stock: <?= ($ap['stock']) ?></p>
            </div>
            <div class="rounded-lg overflow-hidden m-2">
              <img src="<?= base_url('/image/image1/' . $ap['image1'])  ?>" alt="Gambar1" class="max-h-16">
            </div>
          </div>
          <p class="text-xs text-gray-600 dark:text-gray-400"><?= $ap['descriptions'] ?></p>
        </div>
      <?php endforeach ?>
    </div>

  </div>
</main>
<?= $this->endSection() ?>