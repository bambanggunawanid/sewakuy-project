<?= $this->extend('pages/layouts/main-layout') ?>
<?= $this->section('content') ?>
<?php $result = 0 ?>
<div class="flex justify-center my-6">
    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
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

        <div class="flex-1 min-h-screen">
            <table class="w-full text-sm lg:text-base" cellspacing="0">
                <thead>
                    <tr class="h-12 uppercase">
                        <th class="text-left"><span class="block">Product</span></th>
                        <th class="lg:text-right text-left px-12">
                            <span class="md:block hidden" title="Quantity">QTY</span>
                        </th>
                        <th class="hidden text-right md:table-cell">Unit price</th>
                        <th class="lg:text-right text-left px-12">
                        <span class="md:block hidden" title="Quantity">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $p) : ?>
                        <tr class="border-t">
                            <td class="pb-4 md:table-cell">
                                <div class="flex flex-row items-center">
                                    <a href="#">
                                        <img src="<?= base_url('/image/image1/' . $p['image1']) ?>" class="w-20 rounded mt-4" alt="Thumbnail">
                                    </a>
                                    <div class="flex flex-col ml-4">
                                        <a href="/detail/<?= $p['uuid'] ?>">
                                            <p class=" text-xs md:text-lg"><?= $p['name'] ?></p>
                                        </a>
                                        <p class=" text-xs text-gray-400"><?= $p['category'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="justify-center md:justify-end md:flex mt-6">
                                <div class="w-20 h-10">
                                    <div class="relative flex flex-row w-full h-8">
                                        <input type="number" value="<?= $p['qty'] ?>" class="w-10 font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                                    </div>
                                </div>
                            </td>
                            <td class="hidden text-right md:table-cell">
                                <span class="text-sm lg:text-base font-medium">
                                    <?php $result += $p['price'] ?>
                                    Rp <?= number_format($p['price'], 0, ',', '.') ?>
                                </span>
                            </td>
                            <td class="flex justify-end text-right text-xs md:py-3">
                                <form action="/cart/<?= $p['uuid'] ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" id="" value="Delete">
                                    <button type="submit" class="px-6 py-2 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100" onclick="return confirm('sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <hr class="pb-6 mt-6">
            <div class="container fixed bottom-0 left-0 sm:right-0 lg:px-48 md:px-32 sm:px-32 px-1 py-6 m-0 bg-white">
                <div class="flex items-center justify-between">
                    <h1 class="ml-2 font-normal uppercase md:block">Subtotal</h1>
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                Rp <?= number_format($result, 0, ',', '.') ?>
                            </div>
                        </div>
                        <a href="/coming-soon">
                            <button class="flex justify-center w-full py-2 px-6 text-sm font-medium text-white uppercase bg-blue-500 shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                                Checkout
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>