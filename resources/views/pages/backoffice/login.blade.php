<html class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <section class="gradient-form h-full bg-neutral-200 dark:bg-neutral-700 flex justify-center">
        <div class=" w-8/12 h-full p-10">
            <div class="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
                <div class="w-full">
                    <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                        <div class="g-0 lg:flex lg:flex-wrap">
                            <div class="px-4 md:px-0 lg:w-6/12">
                                <div class="md:mx-6 md:p-12">
                                    <div class="text-center">
                                        <img class="mx-auto w-48"
                                            src="{{ asset('images/logo/1_transparent_logo_black.png') }}"
                                            alt="logo" />
                                        <h4 class="mt-1 mb-12 pb-1 text-xl font-semibold">
                                            Hairclip
                                        </h4>
                                    </div>
                                    <form>
                                        <p class="mb-4">Veuillez saisir vos identifiants</p>
                                        <div class="relative mb-4" data-te-input-wrapper-init>
                                            <input type="text"
                                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                id="exampleFormControlInput1" placeholder="Email" />
                                            <label for="exampleFormControlInput1"
                                                class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-d-green peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200">Email
                                            </label>
                                        </div>
                                        <div class="relative mb-4" data-te-input-wrapper-init>
                                            <input type="password"
                                                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                                id="exampleFormControlInput11" placeholder="Mot de passe" />
                                            <label for="exampleFormControlInput11"
                                                class="pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-d-green peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-neutral-200">Mot
                                                de passe
                                            </label>
                                        </div>
                                        <div class="mb-12 pt-1 pb-1 text-center">
                                            <button
                                                class="bg-d-green mb-3 inline-block w-full rounded px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
                                                type="button" data-te-ripple-init data-te-ripple-color="light">
                                                Log in
                                            </button>
                                            <a href="#!">Mot de passe oublie?</a>
                                        </div>
                                        <div class="flex items-center justify-between pb-6">
                                            <p class="mb-0 mr-2">Don't have an account?</p>
                                            <button type="button"
                                                class="inline-block rounded border-2 border-danger px-6 pt-2 pb-[6px] text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                                                data-te-ripple-init data-te-ripple-color="light">
                                                Register
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div
                                class="bg-d-green flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none">
                                <div class="px-4 py-6 text-white md:mx-6 md:p-12">
                                    <h4 class="mb-6 text-xl font-semibold">
                                        We are more than just a company
                                    </h4>
                                    <p class="text-sm">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing
                                        elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex
                                        ea commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
