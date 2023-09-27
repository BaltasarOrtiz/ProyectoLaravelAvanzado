<div>

    @foreach ($periodArray as $day)
        <div aria-label="group of cards" tabindex="0" class="focus:outline-none py-8 w-full">
            <div class="lg:flex items-center justify-center w-full">

                <div tabindex="0" aria-label="card 1" class="focus:outline-none lg:w-4/12 lg:mr-7 lg:mb-0 mb-7 bg-white dark:bg-gray-800  p-6 shadow rounded">
                    <div class="flex items-center border-b border-gray-200 dark:border-gray-700  pb-6">

                        <div class="flex">

                            <div class="pl-3 w-full">
                                <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800 dark:text-white ">Dogecoin nerds</p>
                                <p tabindex="0" class="focus:outline-none text-sm leading-normal pt-2 text-gray-500 dark:text-gray-200 ">36 members</p>
                            </div>

                        </div>
                    </div>

                </div>
        </div>
    @endforeach


</div>
