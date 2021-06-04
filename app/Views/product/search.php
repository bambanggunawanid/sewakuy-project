<?= $this->extend('pages/layouts/main-layout') ?>

<?= $this->section('content') ?>
<section class="bg-white py-8">
    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
        <nav id="store" class="w-full z-30 top-0 px-6 py-1">
            <div class="w-full container flex flex-wrap items-centertext-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:mx-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
                <span class=" tracking-wide no-underline hover:no-underline font-light text-gray-800 ">
                    <?php if(count($results) == 0) echo "We didn't find <i>" . $search . "</i> in the our product, please search again :)";
                         else echo "Search results for <i>" .  $search . "</i>"; ?>
                </span>
            </div>
        </nav>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-2 md:gap-6 md:p-12 p-4">
            <?php foreach ($results as $r) : ?>
                <div class="flex shadow-md border-2 hover:border-blue-600 rounded-2xl max-w-md overflow-hidden mb-8">
                    <a href="/product/<?= $r['uuid'] ?>" class="flex flex-col content-between">
                        <div class="overflow-hidden max-h-48 w-full">
                            <img class="hover:grow " src="<?= base_url("/image/image1/" . $r['image1']) ?>">
                        </div>
                        <div class="px-4 mb-n8 flex flex-col content-between">
                            <div class="pt-3 flex items-center justify-between">
                                <p class=""><?= $r['name'] ?></p>
                            </div>
                            <div class="flex items-center justify-between py-4 content-between">
                                <p class="text-gray-700 font-medium md:text-lg"><span class="text-sm">Rp</span> <?= number_format($r['price'], 0, ',', '.') ?></p>
                                <div class="md:flex items-center hidden">
                                    <span class="mx-2 font-bold text-yellow-300"><?= $r['rating'] ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FCE205" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>