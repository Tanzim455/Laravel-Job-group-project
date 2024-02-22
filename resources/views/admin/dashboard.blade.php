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
                        <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $totalCandidates }}">{{ $totalCandidates }}</span>
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
                        <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $verifiedCandidates }}">{{ $verifiedCandidates }}</span></h5>
                        <p class="text-slate-500 dark:text-zink-200">Verified Candidates</p>
                    </div>
                </div><!--end col-->
                <div class="col-span-12 card md:col-span-6 lg:col-span-3">
                    <div class="text-center card-body">
                        <div
                            class="flex items-center justify-center mx-auto text-green-500 bg-green-100 rounded-full size-14 dark:bg-green-500/20">
                            <i data-lucide="users"></i>
                        </div>
                        <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $unverifiedCandidates }}">{{ $unverifiedCandidates }}</span></h5>
                        <p class="text-slate-500 dark:text-zink-200">Unverified Candidates</p>
                    </div>
                </div><!--end col-->
                <div class="col-span-12 card md:col-span-6 lg:col-span-3">
                    <div class="text-center card-body">
                        <div
                            class="flex items-center justify-center mx-auto text-purple-500 bg-purple-100 rounded-full size-14 dark:bg-purple-500/20">
                            <i data-lucide="building-2"></i>
                        </div>
                        <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $totalCompanies }}">{{ $totalCompanies }}</span>
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
                        <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $disApprovedCompanies }}">{{ $disApprovedCompanies }}</span>
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
                        <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $approvedCompanies }}">{{ $approvedCompanies }}</span></h5>
                        <p class="text-slate-500 dark:text-zink-200">Approval Companies</p>
                    </div>
                </div><!--end col-->
                <div class="col-span-12 card md:col-span-6 lg:col-span-3">
                    <div class="text-center card-body">
                        <div
                            class="flex items-center justify-center mx-auto text-sky-500 bg-sky-100 rounded-full size-14 dark:bg-sky-500/20">
                            <i data-lucide="building-2"></i>
                        </div>
                        <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $verifiedCompanies }}">{{ $verifiedCompanies }}</span></h5>
                        <p class="text-slate-500 dark:text-zink-200">Verified Companies</p>
                    </div>
                </div><!--end col-->
                <div class="col-span-12 card md:col-span-6 lg:col-span-3">
                    <div class="text-center card-body">
                        <div
                            class="flex items-center justify-center mx-auto text-red-500 bg-red-100 rounded-full size-14 dark:bg-red-500/20">
                            <i data-lucide="building-2"></i>
                        </div>
                        <h5 class="mt-4 mb-2"><span class="counter-value" data-target="{{ $unverifiedCompanies }}">{{ $unverifiedCompanies }}</span></h5>
                        <p class="text-slate-500 dark:text-zink-200">Unverified Companies</p>
                    </div>
                </div><!--end col-->
            </div><!--end grid-->
        </div>
        <!-- container-fluid -->
    </div>
@endsection
