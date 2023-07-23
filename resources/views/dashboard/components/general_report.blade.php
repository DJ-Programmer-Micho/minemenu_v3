<!-- BEGIN: General Report -->
<div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            General Report
        </h2>
        <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <x-dashboard.general_report_card title='Total Food Item' value='124' theme="9" icon='box' iconColor="10" diff='15' updown='chevron-up'/>
        <x-dashboard.general_report_card title='Total Scans / Day' value='221' theme="6" icon='check' iconColor="12" diff='5' updown='chevron-down'/>
        <x-dashboard.general_report_card title='Total Scans / Month' value='3501' theme="9" icon='check-circle' iconColor="14" diff='3' updown='chevron-up'/>
        <x-dashboard.general_report_card title='Total Clicks' value='6850' theme="9" icon='eye' iconColor="16" diff='13' updown='chevron-up'/>
    </div>
</div>
<!-- END: General Report -->