<?= $this->extend('pages/layouts/main-layout') ?>

<?= $this->section('content') ?>
<div class="flex items-center justify-center h-screen bg-gray-50 ">
    <div class="container">
        <div class="bg-white rounded-3xl shadow-lg px-2 py-32 md:mx-32 md:-mt-20 -mt-32">
            <div class="text-center">
                <h2 class="text-5xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                    Coming <span class="text-blue-600">Soon!</span>
                </h2>
                <p class="text-md md:text-xl mt-10">We will notify you once this feature is ready 🙌</p>
            </div>
            <div class="flex flex-wrap mt-10 justify-center">
                <div class="px-6 mt-20">
                    <a href="/">
                        <button class="flex items-center justify-between w-full px-8 py-4 md:text-lg font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                            Back to Homepage
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>