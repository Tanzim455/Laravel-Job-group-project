@extends('layouts.admin')

@section('title', 'Admin Dashboard | ' . config('app.name'))

@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Job Board</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Dashboards</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Job Board
                    </li>
                </ul>
            </div>
            <div class="grid grid-cols-12 2xl:grid-cols-12 gap-x-5">

                <div class="col-span-12 card md:col-span-6 lg:col-span-3">
                    <div class="text-center card-body">
                        <div
                            class="flex items-center justify-center mx-auto rounded-full size-14 bg-custom-100 text-custom-500 dark:bg-custom-500/20">
                            <i data-lucide="users"></i>
                        </div>
                        <h5 class="mt-4 mb-2"><span class="counter-value"
                                data-target="{{ $totalCandidates }}">{{ $totalCandidates }}</span>
                        </h5>
                        <p class="text-slate-500 dark:text-zink-200">Total Candidate</p>
                    </div>
                </div><!--end col-->
                <div class="col-span-12 card md:col-span-6 lg:col-span-3">
                    <div class="text-center card-body">
                        <div
                            class="flex items-center justify-center mx-auto text-red-500 bg-red-100 rounded-full size-14 dark:bg-red-500/20">
                            <i data-lucide="users"></i>
                        </div>
                        <h5 class="mt-4 mb-2"><span class="counter-value"
                                data-target="{{ $verifiedCandidates }}">{{ $verifiedCandidates }}</span></h5>
                        <p class="text-slate-500 dark:text-zink-200">Verified Candidates</p>
                    </div>
                </div><!--end col-->
                <div class="col-span-12 card md:col-span-6 lg:col-span-3">
                    <div class="text-center card-body">
                        <div
                            class="flex items-center justify-center mx-auto text-green-500 bg-green-100 rounded-full size-14 dark:bg-green-500/20">
                            <i data-lucide="users"></i>
                        </div>
                        <h5 class="mt-4 mb-2"><span class="counter-value"
                                data-target="{{ $unverifiedCandidates }}">{{ $unverifiedCandidates }}</span></h5>
                        <p class="text-slate-500 dark:text-zink-200">Unverified Candidates</p>
                    </div>
                </div><!--end col-->
                <div class="col-span-12 card md:col-span-6 lg:col-span-3">
                    <div class="text-center card-body">
                        <div
                            class="flex items-center justify-center mx-auto text-purple-500 bg-purple-100 rounded-full size-14 dark:bg-purple-500/20">
                            <i data-lucide="building-2"></i>
                        </div>
                        <h5 class="mt-4 mb-2"><span class="counter-value"
                                data-target="{{ $totalCompanies }}">{{ $totalCompanies }}</span>
                        </h5>
                        <p class="text-slate-500 dark:text-zink-200">Total Companies</p>
                    </div>
                </div><!--end col-->
                <div class="col-span-12 card md:col-span-6 lg:col-span-3">
                    <div class="text-center card-body">
                        <div
                            class="flex items-center justify-center mx-auto text-green-500 bg-green-100 rounded-full size-14 dark:bg-green-500/20">
                            <i data-lucide="building-2"></i>
                        </div>
                        <h5 class="mt-4 mb-2"><span class="counter-value"
                                data-target="{{ $disApprovedCompanies }}">{{ $disApprovedCompanies }}</span>
                        </h5>
                        <p class="text-slate-500 dark:text-zink-200">Disapproval Companies</p>
                    </div>
                </div><!--end col-->
                <div class="col-span-12 card md:col-span-6 lg:col-span-3">
                    <div class="text-center card-body">
                        <div
                            class="flex items-center justify-center mx-auto text-yellow-500 bg-yellow-500 rounded-full size-14 dark:bg-yellow-500/20">
                            <i data-lucide="building-2"></i>
                        </div>
                        <h5 class="mt-4 mb-2"><span class="counter-value"
                                data-target="{{ $approvedCompanies }}">{{ $approvedCompanies }}</span></h5>
                        <p class="text-slate-500 dark:text-zink-200">Approval Companies</p>
                    </div>
                </div><!--end col-->
                <div class="col-span-12 card md:col-span-6 lg:col-span-3">
                    <div class="text-center card-body">
                        <div
                            class="flex items-center justify-center mx-auto text-sky-500 bg-sky-100 rounded-full size-14 dark:bg-sky-500/20">
                            <i data-lucide="building-2"></i>
                        </div>
                        <h5 class="mt-4 mb-2"><span class="counter-value"
                                data-target="{{ $verifiedCompanies }}">{{ $verifiedCompanies }}</span></h5>
                        <p class="text-slate-500 dark:text-zink-200">Verified Companies</p>
                    </div>
                </div><!--end col-->
                <div class="col-span-12 card md:col-span-6 lg:col-span-3">
                    <div class="text-center card-body">
                        <div
                            class="flex items-center justify-center mx-auto text-red-500 bg-red-100 rounded-full size-14 dark:bg-red-500/20">
                            <i data-lucide="building-2"></i>
                        </div>
                        <h5 class="mt-4 mb-2"><span class="counter-value"
                                data-target="{{ $unverifiedCompanies }}">{{ $unverifiedCompanies }}</span></h5>
                        <p class="text-slate-500 dark:text-zink-200">Unverified Companies</p>
                    </div>
                </div><!--end col-->

                <div class="col-span-12 card 2xl:col-span-12">
                    <div class="card-body">
                        <div class="grid items-center grid-cols-1 gap-3 mb-5 2xl:grid-cols-12">
                            <div class="2xl:col-span-3">
                                <h6 class="text-15">New Registered Companies</h6>
                            </div><!--end col-->
                            <div class="2xl:col-span-3 2xl:col-start-10">
                                <div class="flex gap-3">
                                    <div class="relative grow">
                                        <input type="text"
                                            class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                            placeholder="Search for ..." autocomplete="off">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" data-lucide="search"
                                            class="lucide lucide-search inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <path d="m21 21-4.3-4.3"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end grid-->
                        <div class="overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <thead
                                    class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
                                    <tr>
                                        <th
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                            #
                                        </th>
                                        <th
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                            Company Name</th>
                                        <th
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                            Email</th>
                                        <th
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                            Status</th>
                                        <th
                                            class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($newRegisteredCompanies as $index => $company)
                                        <tr>
                                            <td
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                {{ $index + 1 }}
                                            </td>
                                            <td
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                <a href="">{{ $company->name }}</a>
                                            </td>
                                            <td
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                {{ $company->email }}</td>
                                            <td
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                @if ($company->email_verified_at)
                                                    <span
                                                        class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-green-100 border-green-200 text-green-500 dark:bg-green-500/20 dark:border-green-500/20">
                                                        Verified
                                                    </span>
                                                @else
                                                    <span
                                                        class="delivery_status px-2.5 py-0.5 text-xs inline-block font-medium rounded border bg-red-100 border-red-200 text-red-500 dark:bg-red-500/20 dark:border-red-500/20">
                                                        Unverified
                                                    </span>
                                                @endif
                                            </td>
                                            <td
                                                class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                                                <div class="relative dropdown">
                                                    <button id="orderAction1" data-bs-toggle="dropdown"
                                                        class="flex items-center justify-center size-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" data-lucide="more-horizontal"
                                                            class="lucide lucide-more-horizontal size-3">
                                                            <circle cx="12" cy="12" r="1"></circle>
                                                            <circle cx="19" cy="12" r="1"></circle>
                                                            <circle cx="5" cy="12" r="1"></circle>
                                                        </svg></button>
                                                    <ul class="absolute z-50 py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600 hidden"
                                                        aria-labelledby="orderAction1"
                                                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(1425.6px, 1184.8px, 0px);"
                                                        data-popper-placement="bottom-start">
                                                        <li>
                                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                href="#"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    data-lucide="eye"
                                                                    class="lucide lucide-eye inline-block size-3 ltr:mr-1 rtl:ml-1">
                                                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                                                                    </path>
                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                </svg> <span class="align-middle">Overview</span></a>
                                                        </li>
                                                        <li>
                                                            <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                                href="#!"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    data-lucide="trash-2"
                                                                    class="lucide lucide-trash-2 inline-block size-3 ltr:mr-1 rtl:ml-1">
                                                                    <path d="M3 6h18"></path>
                                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                                    <line x1="10" x2="10" y1="11"
                                                                        y2="17"></line>
                                                                    <line x1="14" x2="14" y1="11"
                                                                        y2="17"></line>
                                                                </svg> <span class="align-middle">Delete</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div>
        <!-- container-fluid -->
    </div>
@endsection
