<?= $this->extend('admin/layouts/admin-noside-layout') ?>

<?= $this->section('content') ?>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .t6t6 {
        display: inline-block;
        position: absolute;
        z-index: 1;
        width: 100%;
        height: 50px;
        top: 0;
        left: 0;
        opacity: 0;
        cursor: pointer;
        color: black;
    }
    .isInvalid{
        border: 1px solid red;
        box-shadow: 1px 1px 6px rgba(200, 0, 0, .2);
    }
</style>
<div class="flex justify-center">
    <div class="grid grid-cols-1 mt-4 p-8 pb-12 md:min-w-1/2 min-w-full mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h1 class="text-2xl text-gray-600 dark:text-white font-bold mb-2">Upload a New Product</h1>
        <p class="text-xs text-gray-400 dark:text-white mb-12">Choose the right category for your product and gift the best descriptions.</p>
        <?= $validation->listErrors() ?>

        <form action="/admin/save" method="POST">
            <!-- Untuk menjaga agar formnya hanya bisa dikirim lewat halaman ini. Selain itu di block karena dianggap palsu -->
            <?= csrf_field() ?>
            <span class="text-gray-700 dark:text-gray-400 block text-sm mb-2">
                Product image
            </span>
            <div class="flex gap-4 mb-8 flex-wrap">
                <div class="flex flex-col text-center">
                    <label class="coba my-2 w-36 h-24 flex flex-col items-center bg-white text-blue rounded-lg tracking-wide uppercase border-2 border-blue-600 cursor-pointer hover:bg-blue-50 overflow-hidden ">
                        <img id="img_t1" src="" width="100%" alt="" class="object-cover center">
                        <input name="image_1" type="file" class="t6t6 w-12" id="input_1" accept="image/*" onchange="previewFile()" required/>
                    </label>
                    <span class="text-xs text-gray-500">* Main photo</span>
                </div>
                <div class="flex flex-col text-center">
                    <label class="coba my-2 w-36 h-24 flex flex-col items-center bg-white text-blue rounded-lg tracking-wide uppercase border-2 border-blue-600 cursor-pointer hover:bg-blue-50 overflow-hidden">
                        <img id="img_t2" src="" width="100%" alt="" class="object-cover center">
                        <input name="image_2" type="file" class="t6t6 w-12" id="input_2" accept="image/*" onchange="previewFile2()" required/>
                    </label>
                    <span class="text-xs text-gray-500">Photo 2</span>
                </div>
                <div class="flex flex-col text-center">
                    <label class="coba my-2 w-36 h-24 flex flex-col items-center bg-white text-blue rounded-lg tracking-wide uppercase border-2 border-blue-600 cursor-pointer hover:bg-blue-50 overflow-hidden">
                        <img id="img_t3" src="" width="100%" alt="" class="object-cover center">
                        <input name="image_3" type="file" class="t6t6 w-12" id="input_3" accept="image/*" onchange="previewFile3()" required/>
                    </label>
                    <span class="text-xs text-gray-500">Photo 3</span>
                </div>
            </div>
            <div class="grid md:grid-cols-3 grid-cols-1 gap-4  items-center justify-start">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400 mb-2">
                        Category
                    </span>
                    <select class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="choose_category" required>
                        <option value="1">Notebook</option>
                        <option value="2">Smartphone</option>
                        <option value="3">Camera</option>
                        <option value="4">Drone</option>
                        <option value="5">CPU</option>
                    </select>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Price
                    </span>
                    <div class="relative text-gray-500 focus-within:text-blue-600">
                        <input type="number" class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray form-input" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="product_price" />
                        <div class="font-light mt-2 absolute inset-y-0 right-0 px-4 text-xs leading-5">
                        </div>
                    </div>

                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Stock
                    </span>
                    <div class="relative text-gray-500 focus-within:text-blue-600">
                        <input type="number" class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray form-input" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="product_stock" />
                        <div class="font-light mt-2 absolute inset-y-0 right-0 px-4 text-xs leading-5">
                        </div>
                    </div>
                </label>
            </div>
            <label class="block text-sm my-6">
                <span class="text-gray-700 dark:text-gray-400">
                    Product name
                </span>
                <div class="relative text-gray-500 focus-within:text-blue-600">
                    <input class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray form-input <?= ($validation->hasError('product_name')) ? 'isInvalid' : '' ?>" onkeyup="getCombo(this)" id="t2t2" maxlength="30" name="product_name" value="<?= old('product_name') ?>"/>
                    <div class="font-light mt-2 absolute inset-y-0 right-0 px-4 text-xs leading-5">
                        | <span id="count_1" class="ml-1">0</span>/30
                    </div>
                </div>
                <span class="<?= ($validation->hasError('product_name')) ? 'text-red-500' : 'hidden' ?>"><?= $validation->getError('product_name') ?></span>
            </label>
            <label class="flex flex-col text-sm my-6">
                <span class="text-gray-700 dark:text-gray-400">
                    Product descriptions
                </span>
                <textarea class="block w-full mt-2 text-sm border-blue-600 dark:text-gray-300 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input" name="product_descriptions" onkeyup="getCombo2(this)" rows="8" id="t3t3" maxlength="3000" value="<?= old('product_descriptions') ?>"></textarea>
                <div class="flex text-xs font-light pt-2 self-end">
                    <span id="count_2">0</span>/3000
                </div>
            </label>
            <div class="grid md:grid-cols-3 grid-cols-1 gap-4  items-center justify-start">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Weight
                    </span>
                    <div class="relative text-gray-500 focus-within:text-blue-600">
                        <input class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray form-input" maxlength="13" name="product_wieght" />
                        <div class="font-light mt-2 absolute inset-y-0 right-0 px-4 text-xs leading-5">
                        </div>
                    </div>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400 mb-2">
                        Condition
                    </span>
                    <select class="block w-full mt-2 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:focus:shadow-outline-gray" name="product_condition" required>
                        <option>New</option>
                        <option>Second Hand</option>
                    </select>
                </label>
            </div>
            <div class="flex justify-end">
                <a href="/admin" class="flex mr-4 items-center justify-between px-4 py-4 text-lg  leading-5 text-center text-red-600 hover:text-white font-semibold transition-colors duration-150 border-2 border-red-600 rounded-lg active:bg-red-600 hover:bg-red-600 focus:outline-none focus:shadow-outline-red mt-12 w-full md:w-1/3">
                    <span>Back and Discard</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                    </svg>
                </a>
                <button type="submit" class="flex font-bold items-center justify-between px-4 py-4 text-lg leading-5 text-white transition-colors duration-150 bg-blue-600 border rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue mt-12 w-full md:w-1/3 ">
                    <span>Save and Publish</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cloud-upload-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    const t2 = document.getElementById('t2t2')
    const t3 = document.getElementById('t3t3')
    let flag = 0
    let flag2 = 0

    function getCombo(selectObject) {
        let v = String(selectObject.value)
        flag = v.length
        return flag
    }

    function getCombo2(selectObject) {
        let v = String(selectObject.value)
        flag2 = v.length
        return flag2
    }
    t2.addEventListener('keyup', function() {
        document.getElementById('count_1').innerHTML = flag
    })
    t3.addEventListener('keyup', function() {
        document.getElementById('count_2').innerHTML = flag2
    })

    // additional
    function previewFile() {
        let preview = document.querySelector('#img_t1')
        let file = document.querySelector('#input_1').files[0]
        console.log(file);
        let reader = new FileReader();
        reader.onloadend = function() {
            preview.src = reader.result;
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    function previewFile2() {
        let preview = document.querySelector('#img_t2')
        let file = document.querySelector('#input_2').files[0]
        console.log(file);
        let reader = new FileReader();
        reader.onloadend = function() {
            preview.src = reader.result;
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    function previewFile3() {
        let preview = document.querySelector('#img_t3')
        let file = document.querySelector('#input_3').files[0]
        console.log(file);
        let reader = new FileReader();
        reader.onloadend = function() {
            preview.src = reader.result;
        }
        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>
<?= $this->endSection() ?>