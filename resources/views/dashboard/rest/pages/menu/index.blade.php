@extends('dashboard.rest.layouts.layout')
@section('tail','Menu')
@section('rest_content')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8 mb-5">
    <h2 class="text-lg font-medium mr-auto">
        Tabulator
    </h2>
    <div class="w-full sm:w-auto mt-4 sm:mt-0">
        <button class="button text-white bg-theme-16 shadow-md mr-2">{{__('Add New Menu')}}</button>
    </div>
</div>

<div class="overflow-x-auto">
    <table class="table table-striped table-dark table-hover">
        <thead>
            <tr class="bg-gray-200 dark:bg-dark-5">
                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">#</th>
                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">{{__('Name')}}</th>
                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">{{__('Status')}}</th>
                <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border-b dark:border-dark-5">1</td>
                <td class="border-b dark:border-dark-5">Pizza</td>
                <td class="border-b dark:border-dark-5 text-theme-9">Active</td>
                <td class="border-b dark:border-dark-5 flex">
                    <a href="">
                        <span class="m-1 w-5 h-5 flex items-center justify-center bg-theme-1 border" style="width: 36px; height:36px; border-radius: 5px; border: 1px solid white;">
                            <i data-feather="edit" class="w-4 h-4"></i>
                        </span> 
                    </a>
                    <a href="">
                        <span class="m-1 w-5 h-5 flex items-center justify-center bg-theme-6 border" style="width: 36px; height:36px; border-radius: 5px; border: 1px solid white;">
                            <i data-feather="trash" class="w-4 h-4"></i>
                        </span> 
                    </a>
                </td>
            </tr>
            <tr class="bg-gray-200 dark:bg-dark-3">
                <td class="border-b dark:border-dark-5">2</td>
                <td class="border-b dark:border-dark-5">Salad</td>
                <td class="border-b dark:border-dark-5 text-theme-6">Deactive</td>
                <td class="border-b dark:border-dark-5 flex">
                    <a href="">
                        <span class="m-1 w-5 h-5 flex items-center justify-center bg-theme-1 border" style="width: 36px; height:36px; border-radius: 5px; border: 1px solid white;">
                            <i data-feather="edit" class="w-4 h-4"></i>
                        </span> 
                    </a>
                    <a href="">
                        <span class="m-1 w-5 h-5 flex items-center justify-center bg-theme-6 border" style="width: 36px; height:36px; border-radius: 5px; border: 1px solid white;">
                            <i data-feather="trash" class="w-4 h-4"></i>
                        </span> 
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection