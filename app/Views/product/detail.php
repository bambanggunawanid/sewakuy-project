<!-- <?= $this->extend('pages/layouts/main-layout') ?> -->
<?= $this->section('content') ?>
<div class="py-6">
  <!-- Breadcrumbs -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center space-x-2 text-gray-400 text-sm">
      <a href="#" class="hover:underline hover:text-gray-600">Home</a>
      <span>
        <svg class="h-5 w-5 leading-none text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </span>
      <a href="#" class="hover:underline hover:text-gray-600">Electronics</a>
    </div>
  </div>
  <!-- ./ Breadcrumbs -->

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 min-h-screen">
    <div class="flex flex-col md:flex-row -mx-4 ">
      <div class="md:flex-1 px-4 ">
        <div x-data="{ image: 1 }" x-cloak>
          <div class="h-64 md:h-96 rounded-lg bg-gray-100 overflow-hidden mb-8">
            <div x-show="image === 1" class="h-64 md:h-80 rounded-lg bg-gray-100 flex items-center justify-center">
              <img src="<?= base_url("/image/image1/" . $product['image1']) ?>" alt="">
            </div>
            <div x-show="image === 2" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
              <img src="<?= base_url("/image/image2/" . $product['image2']) ?>" alt="">
            </div>
            <div x-show="image === 3" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
              <img src="<?= base_url("/image/image3/" . $product['image3']) ?>" alt="" >
            </div>
          </div>

          <div class="flex gap-2 -mx-2 mb-4 ">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
              <div class="flex-1 px-2 ">
                <button x-on:click="image = <?= $i ?>" :class="{ 'ring-2 ring-blue-300 ring-inset': image === <?= $i ?> }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center overflow-hidden hover:opacity-75">
                  <img src="<?= base_url("/image/image" . $i . "/" . $product['image' . $i]) ?>" alt="" >
                </button>
              </div>
            <?php endfor ?>
          </div>
        </div>
      </div>
      <div class="md:flex-1 px-4">
        <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-700 text-2xl md:text-3xl"><?= $product['name'] ?></h2>
        <p class="text-gray-500 text-sm">By <a href="#" class="text-blue-600 hover:underline">Sewakuy Official Store</a></p>

        <div class="flex items-center space-x-4 my-4">
          <div>
            <div class="rounded-lg bg-gray-100 flex py-2 px-6">
              <span class="text-blue-400 mr-1 mt-1">Rp</span>
              <span class="font-medium text-blue-600 text-2xl"><?= number_format($product['price'], 0, ',', '.') ?></span>
            </div>
          </div>
        </div>
        <p class="text-gray-500 mb-20 md:mb-36"><?= $product['descriptions'] ?></p>
        <form action="#" method="get">
          <div class="flex py-4 space-x-4">
            <div class="relative">
              <div class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">Qty</div>
              <select class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>

              <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
              </svg>
            </div>
            <button type="submit" class="md:h-14 md:px-6 md:py-2 font-semibold rounded-xl border-2 border-blue-600 text-blue-600 hover:bg-blue-500 hover:text-white flex-1">
              Buy Now
            </button>
            <button type="submit" class="md:h-14 md:px-6 md:py-2 font-semibold rounded-xl bg-blue-600 hover:bg-blue-500 text-white flex-1">
              Add to Cart
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>